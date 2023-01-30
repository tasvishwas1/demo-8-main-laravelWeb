<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminDataTableButtonHelper;
use App\Helpers\ImageUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogStoreRequests;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( BlogStoreRequests $request ): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();

        if ($validated['edit_value'] == 0) {
            try {
                if ($request->hasfile('image')) {
                    $image = ImageUploadHelper::imageUpload($request->file('image'));
                }
                Blog::create([
                    'name'        => $validated['name'],
                    'description' => $validated['description'],
                    'image'       => $image,
                    'status'      => 'Active',
                ]);
                DB::commit();
                return response()->json(['message' => 'Category Added Successfully']);
            } catch (\Exception $exception) {
                DB::rollback();
                return response()->json([
                    'message' => '$exception->getMessage()',
                ], 522);
            }
        } else {
            try {
                if ($request->hasfile('image')) {
                    $image = ImageUploadHelper::imageUpload($request->file('image'));
                    Blog::query()
                        ->where('id', $validated['edit_value'])
                        ->update(['image' => $image,]);
                }

                Blog::query()
                    ->where('id', $validated['edit_value'])
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
    public function show( Blog $category ): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $blog = Blog::where('id', $id)->first();
        return view('admin.blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Blog $blog )
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
        Blog::where('id', $id)->delete();
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
        Blog::where('id', $id)->update(['status' => $status]);
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
            $blogs = Blog::select('categories.*');
            return DataTables::of($blogs)
                ->addColumn('action', function ( $blogs ) {
                    $array['route'] = route('admin.category.edit', [$blogs->id]);
                    $array['id'] = $blogs->id;
                    $array['status'] = $blogs->status;
                    $edit_button = AdminDataTableButtonHelper::editButton($array);
                    $delete_button = AdminDataTableButtonHelper::deleteButton($array);
                    $status_button = AdminDataTableButtonHelper::activeInactiveStatusButton($array);
                    return '<div class="btn-icon-group">' . $status_button . ' ' . $edit_button . ' ' . $delete_button . '</div>';
                })
                ->addColumn('status', function ( $blogs ) {
                    $array['status'] = $blogs->status;
                    return AdminDataTableButtonHelper::statusBadge($array);
                })
                ->addColumn('image', function ( $blogs ) {
                    return '<div class="d-inline-block align-middle">
                                <img src="' . url($blogs->image) . '"
                                        class="img-40 m-r-15 align-center rounded" style="max-width:100px; max-height:100px;"/>
                            </div>';
                })
                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }
    }

}
