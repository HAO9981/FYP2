<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function add(Request $r){
        $r->validate([
            'menuName' => 'required|string|max:255',
            'menuType' => 'required|string|max:255',
            'menuPrice' => 'required|string',
            'menuImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if($r->hasFile('menuImage')){
            $image=$r->file('menuImage');        
            $imageName=$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        } else{
            $imageName='empty.jpg';
        }
    
        $add=Menu::create([
            'name'=>$r->menuName,
            'type'=>$r->menuType,
            'price'=>$r->menuPrice,
            'image'=>$imageName,
        ]);

        return redirect()->route('staffMenu');
    }
    
    public function view(){
        $menu = Menu::all();
        return view('staffMenu')->with('menus',$menu);
    }

    public function viewMenu(){
        $menu = Menu::all();
        return view('menu')->with('menus',$menu);
    }

    public function edit($id){
        $menu = Menu::all()->where('id',$id);
        return view('editMenu')->with('menus',$menu);
    }
    
    public function update(){
        $r=request();
        $menu=Menu::find($r->id);
        if($r->file('menuImage')){
            $image=$r->file('menuImage');
            $image->move('images',$image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
            $menu->image=$imageName;
        }
        $menu->name=$r->menuName;
        $menu->type=$r->menuType;
        $menu->price=$r->menuPrice;
        $menu->save();
        return redirect()->route('staffMenu');
    }

    public function delete($id){
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('staffMenu');
    }
}
