<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $view = auth()->user()->hasRole('admin') ? 'admin.categories.index' : 'user.categories.index';
        $categories = Category::all();

        return view($view, [
            "categories" => $categories,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', [
            "categories" => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|min:3",
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.min' => 'Nama produk minimal harus 3 karakter.',
        ]);

        Category::create($validated);

        return redirect('/categories');
    }

    public function delete($id)
    {
        $category = Category::where('id', $id);
        $category->delete();

        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', [
            "category" => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "required|min:3",
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.min' => 'Nama produk minimal harus 3 karakter.',
        ]);

        Category::where('id', $id)->update($validated);

        return redirect('/categories');
    }
}
