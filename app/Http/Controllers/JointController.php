<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;

use Illuminate\Http\Request;

class JointController extends Controller
{ 
    public function index()
    {
        $products = Product::with('brand')->get();
        $brands = Brand::with('products')->get();
        
        return view('admin.product.join', compact('products', 'brands'));
    }
    
    
}
