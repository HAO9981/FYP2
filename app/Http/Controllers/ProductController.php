<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function view(){
        $viewProduct=Product::all();
        return view('showProduct')->with ('products',$viewProduct);
    }

    public function productDetail($id){
        $viewProduct=Product::all()->where('id',$id);
        return view('showProductDetail')->with ('products',$viewProduct);
    }

    public function home(){
        $viewProduct=Product::all();
        return view('homePage')->with ('products',$viewProduct);
    }
}
