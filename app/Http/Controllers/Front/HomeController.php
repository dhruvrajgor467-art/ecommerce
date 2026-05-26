<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::latest()->take(8)->get();

        $products = Product::query();

        // featured default products
        $products->where('featured', 1);

        // category filter (NEW)
        if ($request->category) {
            $products->where('category_id', $request->category);
        }

        $products = $products->latest()
            ->take(12)
            ->get();

        return view('frontend.home', compact('products', 'categories'));
    }
}