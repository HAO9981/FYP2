<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff')->except(['showLoginForm', 'login', 'showRegisterForm', 'register']);
    }

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
            return redirect()->route('staffShowProduct')->with('success', 'Login successful');
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

    return redirect()->route('staffShowProduct')->with('success', 'Staff registered successfully');
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

    $add=Product::create([
        'name'=>$r->productName,
        'type'=>$r->productType,
        'description'=>$r->productDescription,
        'image'=>$imageName,
        'categoryID'=>'1',
    ]);
    return redirect()->route('staffShowProduct');
}

public function view(){
    $product=Product::all();
    return view('staffShowProduct')->with ('products',$product);
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
    $product->name=$r->productName;
    $product->description=$r->productDescription;
    $product->save();
    return redirect()->route('staffShowProduct');
}

public function delete($id){
    $product = Product::find($id);
    $product->delete();
    return redirect()->route('staffShowProduct');
}

}
