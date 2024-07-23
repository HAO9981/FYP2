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
}
