<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $view = auth()->user()->hasRole('admin') ? 'admin.dashboard.index' : 'user.dashboard.index';
        $categories = Category::withCount('product')->get()->map(function ($category) {
            $category->color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            return $category;
        });

        return view($view, [
            "productsCount" => Product::count(),
            "categoriesCount" => Category::count(),
            "usersCount" => User::count(),
            "rolesCount" => Role::count(),
            "categories" => $categories,
        ]);
    }
}
