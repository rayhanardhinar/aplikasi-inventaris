<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        return view('pages.dashboard.index', [
            "totalProducts" => $totalProducts,
            "totalCategories" => $totalCategories,
        ]);
    }
}
