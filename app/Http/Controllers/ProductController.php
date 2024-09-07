<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function view(){
        $products=Product::paginate(8);
        return view('showProduct', compact('products'));
    }

    public function productDetail($id){
        $viewProduct=Product::all()->where('id',$id);
        return view('showProductDetail')->with ('products',$viewProduct);
    }

    public function search(){
        $r=request();
        $keyword=$r->searchProduct;
        $viewProduct=DB::table('products')
        ->select('products.*')
        ->where('products.name', 'like', '%' . $keyword . '%')
        ->orWhere('products.type', 'like', '%' . $keyword . '%')
        ->paginate(8);
        return view('showProduct')->with ('products',$viewProduct);
    }

    public function home(){
        $viewProduct=Product::all();
        return view('homePage')->with ('products',$viewProduct);
    }

    public function stock(){
        $viewProduct=Product::all();
        return view('showStock')->with ('products',$viewProduct);
    }

    public function updateStockQuantity(){
        $r=request();
        $product=Product::find($r->id);
    
        if ($product) {
            $product->quantity = $r->productQuantity;
            $product->save();
        }

        return redirect()->route('showStock');
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('showStock');
    }

    public function staffSearch(){
        $r=request();
        $keyword=$r->searchProduct;
        $viewProduct=DB::table('products')
        ->select('products.*')
        ->where('products.name', 'like', '%' . $keyword . '%')
        ->orWhere('products.type', 'like', '%' . $keyword . '%')
        ->paginate(8);
        return view('staffShowProduct')->with ('products',$viewProduct);
    }
}
