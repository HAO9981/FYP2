<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Table;

class CusController extends Controller
{
    public function view(){
        $viewTable=Table::all();
        return view('showTable')->with ('tables',$viewTable);
    }

    
}
