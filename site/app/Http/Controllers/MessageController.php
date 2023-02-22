<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    public function store(Request $request){
       $allData = $request->all();
       $result = Message::create($allData);
       if ($result == true) {
         return 1;
       }
       else{
         return 0;
       }
    }
}
