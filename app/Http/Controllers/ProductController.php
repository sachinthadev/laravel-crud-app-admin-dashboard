<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(){

      $products=Product::orderBy('id','desc')->get();
      $total=Product::count();
      return view('admin.product.home',compact(['products','total']));

   }

   public function create(){
      return view('admin.product.create');
   }

   public function save(Request $request)
   {
  

      $validation=$request->validate([
       'title' =>'required',
       'category'=>'required',
       'price' =>'required',
      ]);
      $data=Product::create($validation);
      if($data){
         $request->session()->put('success','Product Add Successfully');
       return redirect(route('admin/products'));
      }else{
         $request->session()->put('error','Some problem occure');
       return redirect(route('admin.products.create'));
      }
   }


   public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('admin.product.update', compact('products'));
    }


    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $title = $request->title;
        $category = $request->category;
        $price = $request->price;
 
        $products->title = $title;
        $products->category = $category;
        $products->price = $price;
        $data = $products->save();
        if ($data) {
         $request->session()->put('success', 'Product Update Successfully');
            return redirect(route('admin/products'));
        } else {
         $request->session()->put('error', 'Some problem occure');
            return redirect(route('admin/products/update'));
        }
   

}



public function delete($id)
{
    $products = Product::findOrFail($id)->delete();
        return redirect(route('admin/products'));
    }
}

