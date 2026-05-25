<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products=Product::where(
            'featured',1
        )
        ->latest()
        ->take(12)
        ->get();  
        
        return view(
            'frontend.home',
            compact('products')
        );
    }
}