<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(){
    return view('admin.product.home');
   }

   public function create(){
      return view('admin.product.create');
   }

   public function save(Request $request){
      $validation = $request->validate([
         'title'=>'required',
         'category'=>'required',
         'price'=>'required',
      ]);

      $data = Product::create($validation);
      if($data){
         session($key=null,$default = null)->flash('success','Product Add Successfully');
         return redirect(route('admin/products'));
      }

      else {
         session($key=null, $default=null)->flash('error','some problem occure');
         return redirect(route('admin.products/create'));
      }
   }
}


