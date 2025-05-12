<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function dashboard() {
        return view('pages.dashboard');
    }

    public function product() {
        $products = Product::with('category')->get();

        return view('pages.products.product', [
            "products" => $products,
        ]);
    }

    public function create() {
        $categories = Category::all();

        return view('pages.products.create', [
            "categories" => $categories,
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "quantity" => "required|integer|min:0",
            "price" => "required",
            "category_id" => "required|exists:categories,id",
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.min' => 'Nama produk minimal harus 3 karakter.',
            'quantity.required' => 'Jumlah produk harus diisi.',
            'quantity.numeric' => 'Jumlah produk harus berupa angka.',
            'quantity.min' => 'Jumlah produk tidak boleh kurang dari 0.',
            'price.required' => 'Harga produk harus diisi.',
            'price.numeric' => 'Harga produk harus berupa angka.',
            'price.min' => 'Harga tidak boleh kurang dari 0.',
            'category_id.required' => 'Kategori harus dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
        ]);

        Product::create($validated);

        return redirect('/products');
    }

    public function delete($id) {
        $product = Product::where('id', $id);
        $product->delete();

        return redirect('/products');
    }

    public function edit($id){
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('pages.products.edit', [
            "categories" => $categories,
            "product" => $product,
        ]);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "quantity" => "required|integer|min:0",
            "price" => "required",
            "category_id" => "required|exists:categories,id",
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.min' => 'Nama produk minimal harus 3 karakter.',
            'quantity.required' => 'Jumlah produk harus diisi.',
            'quantity.numeric' => 'Jumlah produk harus berupa angka.',
            'quantity.min' => 'Jumlah produk tidak boleh kurang dari 0.',
            'price.required' => 'Harga produk harus diisi.',
            'price.numeric' => 'Harga produk harus berupa angka.',
            'price.min' => 'Harga tidak boleh kurang dari 0.',
            'category_id.required' => 'Kategori harus dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
        ]);

        Product::where('id', $id)->update($validated);

        return redirect('/products')->with('success', 'Produk berhasil diperbarui!');
    }
}
