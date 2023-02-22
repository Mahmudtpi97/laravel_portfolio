<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorModel;

class VisitorController extends Controller
{
     public function visitors(){
        $this->data['visitors'] = VisitorModel::orderBy('id','desc')->take(50)->get();
        return view('visitor',$this->data); 
     }
}
