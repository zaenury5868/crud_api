<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::query();

        // Filter pencarian kategori
        $searchKeyword = $request->query('search');
        if ($searchKeyword) {
            $categories->where('name', 'LIKE', '%'.$searchKeyword.'%');
        }

        // paginate tabel categori
        $categories = $categories->orderBy('created_at', 'DESC')->get();
        return response()->json([
            'data' => $categories,
            'message' => 'Kategori yang berhasil diambil.'
        ]);
    }

        /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json([
            'data' => $category,
            'message' => 'Kategori yang berhasil diambil.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $result = Category::create([
            'name' => $request->input('name'),
            'is_publish' => $request->input('is_publish'),
        ]);

        return response()->json([
            'data' => $result,
            'message' => 'Kategori yang berhasil diambil.'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $result = $category->update([
            'name' => $request->input('name'),
            'is_publish' => $request->input('is_publish'),
        ]);

        return response()->json([
            'data' => $result,
            'message' => 'Kategori yang berhasil diambil.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'message' => 'Kategori yang berhasil dihapus.'
        ], 204);
    }
}
