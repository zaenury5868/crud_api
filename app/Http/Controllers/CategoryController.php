<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
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
        $user = User::latest()->first();

        // paginate tabel categori
        $categories = $categories->orderBy('created_at', 'DESC')->paginate(10);
        return view('categories.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            //code...
            Category::create([
                'name' => $request->input('name'),
                'is_publish' => $request->input('is_publish'),
            ]);
    
            return redirect()->route('categories.index')->with('success', 'Kategori berhasil dibuat');
        } catch (\Throwable $th) {
            return redirect()->route('categories.index')->with('error', 'Tambah kategori gagal');
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            //code...
            $category->update([
                'name' => $request->input('name'),
                'is_publish' => $request->input('is_publish'),
            ]);
    
            return redirect()->route('categories.index')->with('success', 'Kategori berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->route('categories.index')->with('error', 'Update kategori gagal');
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            //code...
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('categories.index')->with('error', 'Hapus kategori gagal');
            //throw $th;
        }
    }
}
