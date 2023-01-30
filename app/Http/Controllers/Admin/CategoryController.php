<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminDataTableButtonHelper;
use App\Helpers\ImageUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequests;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( CategoryStoreRequests $request ): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();

        if ($validated['edit_value'] == 0) {
            try {
                if ($request->hasfile('image')) {
                    $image = ImageUploadHelper::imageUpload($request->file('image'));
                }
                Category::create([
                    'name'        => $validated['name'],
                    'slug'        => SlugService::createSlug(Category::class, 'slug', $request['name']),
                    'description' => $validated['description'],
                    'image'       => $image,
                    'status'      => 'Active',
                ]);
                DB::commit();
                return response()->json(['message' => 'Category Added Successfully']);
            } catch (\Exception $exception) {
                DB::rollback();
                return response()->json([
                    'message' => $exception->getMessage(),
                ], 522);
            }
        } else {
            try {
                if ($request->hasfile('image')) {
                    $image = ImageUploadHelper::imageUpload($request->file('image'));
                    Category::query()
                        ->where('id', $validated['edit_value'])
                        ->update(['image' => $image,]);
                }

                Category::where('id', $validated['edit_value'])
                    ->update([
                        'name'        => $request->input('name'),
                        'description' => $request->input('description'),
                        'status'      => 'Active',
                    ]);
                DB::commit();
                return response()->json(['message' => 'Category Updated Successfully']);
            } catch (\Exception $exception) {
                DB::rollback();
                return response()->json([
                    'message' => $exception->getMessage(),
                ], 522);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show( $id ): \Illuminate\Http\JsonResponse
    {
        $category = Category::where('id', $id)->first();
        $view = view('admin.category.show', ['category' => $category])->render();
        return response()->json([
            'data'        => $view,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit( $slug )
    {
        $category = Category::where('slug', $slug)->first();
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Category $category )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy( $id ): \Illuminate\Http\JsonResponse
    {
        Category::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Category Deleted Successfully']);
    }

    /**
     * Change the status of specific record like (Active / Inactive)...
     *
     * @param $id
     * @param $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus( $id, $status ): \Illuminate\Http\JsonResponse
    {
        Category::where('id', $id)->update(['status' => $status]);
        return response()->json(['success' => true, 'message' => 'Status Changed Successfully']);
    }

    /**
     * Get records in jquery datatable of categories...
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategoryList( Request $request ): \Illuminate\Http\JsonResponse
    {
        if ($request->ajax()) {
            $categories = Category::select('categories.*');
            return DataTables::of($categories)
                ->addColumn('action', function ( $categories ) {
                    $array['route'] = route('admin.category.edit', [$categories->slug]);
                    $array['id'] = $categories->id;
                    $array['status'] = $categories->status;
                    $array['show'] = $categories->id;
                    $edit_button = AdminDataTableButtonHelper::editButton($array);
                    $delete_button = AdminDataTableButtonHelper::deleteButton($array);
                    $status_button = AdminDataTableButtonHelper::activeInactiveStatusButton($array);
                    $detail_button = AdminDataTableButtonHelper::detailButton($array);
                    return '<div class="btn-icon-group">' . $status_button . ' ' . $detail_button . ' ' . $edit_button . ' ' . $delete_button . '</div>';
                })
                ->addColumn('status', function ( $categories ) {
                    $array['status'] = $categories->status;
                    return AdminDataTableButtonHelper::statusBadge($array);
                })
                ->addColumn('image', function ( $categories ) {
                    return '<div class="d-inline-block align-middle">
                                <img src="' . url($categories->image) . '"
                                        class="img-40 m-r-15 align-center rounded" style="max-width:100px; max-height:100px;"/>
                            </div>';
                })
                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }
    }

}
