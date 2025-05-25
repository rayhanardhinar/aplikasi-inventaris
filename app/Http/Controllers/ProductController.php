<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $view = auth()->user()->hasRole('admin') ? 'admin.products.index' : 'user.products.index';
        $products = Product::with('category')->paginate(10);

        if ($request->ajax()) {
            $view = auth()->user()->hasRole('admin')
                ? 'admin.components.admin-products-table'
                : 'user.components.user-products-table';

            return view($view, compact('products'))->render();
        }

        return view($view, [
            "products" => $products,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', [
            "categories" => $categories,
        ]);
    }

    public function store(Request $request)
    {
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

    public function delete($id)
    {
        Product::destroy($id);

        return redirect('/products');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('admin.products.edit', [
            "categories" => $categories,
            "product" => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
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

        Product::findOrFail($id)->update($validated);

        return redirect('/products')->with('success', 'Produk berhasil diperbarui!');
    }

    public function formatRupiah($value, $decimal = 2)
    {
        return 'Rp ' . number_format($value, $decimal, ',', '.');
    }
}
