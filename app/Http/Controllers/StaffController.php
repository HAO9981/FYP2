<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function account(){
        $staffs = staff::all();
        return view('staffAccount', ['staffs' => $staffs]);
    }

    public function showLoginForm()
    {
        return view('auth.staffLogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('staff')->attempt($credentials)) {
            \Log::info('Login successful for user: ' . $request->email);
            return redirect()->route('showStock')->with('success', 'Login successful');
        } elseif (Auth::attempt($credentials)) {
            \Log::info('Login successful for user: ' . $request->email);
            return redirect()->route('home')->with('success', 'Login successful');
        } else {
            \Log::warning('Login failed for user: ' . $request->email);
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ])->withInput();
        }
    }

    public function showRegisterForm()
    {
        return view('auth.staffRegister');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:staff',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $staff=Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'staff',
        ]);

        Auth::login($staff);

        return redirect()->route('showStock')->with('success', 'Staff registered successfully');
    }

public function add(){
    $r=request();

    if($r->file('productImage')!=''){
        $image=$r->file('productImage');        
        $image->move('images',$image->getClientOriginalName());                   
        $imageName=$image->getClientOriginalName(); 
    } else{
        $imageName='empty.jpg';
    }

    if ($r->file('productVideo')) {
        $video = $r->file('productVideo');
        $videoName = time() . '_' . $video->getClientOriginalName();
        $video->move(public_path('videos'), $videoName);
    } else {
        $videoName = 'default.mp4';
    }

    $add=Product::create([
        'name'=>$r->productName,
        'type'=>$r->productType,
        'description'=>$r->productDescription,
        'quantity'=>$r->productQuantity,
        'image'=>$imageName,
        'video'=>$videoName,
    ]);
    return redirect()->route('staffShowProduct');
}

public function view(){
    $products=Product::paginate(8);
    return view('staffShowProduct', compact('products'));
}

public function productDetail($id){
    $viewProduct=Product::all()->where('id',$id);
    return view('staffProductDetail')->with ('products',$viewProduct);
}

public function edit($id){
    $products=Product::all()->where('id',$id);
    return view('editProduct')->with('products',$products);
}

public function update(){
    $r=request();
    $product=Product::find($r->id);
    if($r->file('productImage')){
        $image=$r->file('productImage');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        $product->image=$imageName;
    }

    if ($r->file('productVideo')) {
        $video=$r->file('productVideo');
        $videoName = time() . '_' . $video->getClientOriginalName();
        $video->move(public_path('videos'), $videoName);
        $product->video=$videoName;
    }

    $product->name=$r->productName;
    $product->type=$r->productType;
    $product->description=$r->productDescription;
    $product->quantity=$r->productQuantity;
    $product->save();
    return redirect()->route('staffShowProduct');
}

public function delete($id){
    $product = Product::find($id);
    $product->delete();
    return redirect()->route('staffShowProduct');
}

}
