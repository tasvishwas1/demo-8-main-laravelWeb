<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ImageUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequests;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $query = DB::select("SELECT * FROM categories where status = 'Active'");
        return response()->json(['data' => $query]);
    }

    public function show( $id ): \Illuminate\Http\JsonResponse
    {
        $query = DB::select("SELECT * FROM categories where id = $id ");
        return response()->json(['data' => $query]);
    }

    public function create( CategoryStoreRequests $request ): \Illuminate\Http\JsonResponse
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

                Category::query()
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

    public function destroy( $id )
    {
        Category::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Category Deleted Successfully']);
    }

    public function changeStatus( $id, $status ): \Illuminate\Http\JsonResponse
    {
        Category::where('id', $id)->update(['status' => $status]);
        return response()->json(['success' => true, 'message' => 'Status Changed Successfully']);
    }

}
