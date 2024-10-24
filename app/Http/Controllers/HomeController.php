<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $totalBrand = Brand::get()->count();
        $totalProduct = Product::get()->count();
        $totalUser = User::where('role', 0)->get()->count();
        $categoryC2 = Category::where('parent_id', '<>', 0)->get();
        $brand = Brand::get();
        return view('Admin.Pages.home', compact('totalBrand', 'totalProduct', 'totalUser', 'categoryC2', 'brand'));
    }
}
