<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $view = auth()->user()->hasRole('admin') ? 'admin.dashboard.index' : 'user.dashboard.index';

        return view($view, [
            "productsCount" => Product::count(),
            "categoriesCount" => Category::count(),
        ]);
    }
}
