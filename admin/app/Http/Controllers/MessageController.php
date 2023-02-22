<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    // Index Function 
    public function index() {
        $Messages = Message::orderBy('id','DESC')->get();
        return view('contact.message',['Messages'=>$Messages]);
    }
    // Show Function 
    public function show($id) {
        $result = Message::findOrFail($id);
        return $result;

        return response()->json($result);
    }
    // Delete Function 
    public function delete($id){
        $result = Message::findOrFail($id)->delete();
         if ($result == true) {
             return 1;
         }
         else{
            return 0;
         }
    }
    // Status Function 
    public function status($id){
        $data = Message::findOrFail($id);
        $status= $data->status;
        if ($status == 1) {
            $data->update(['status'=> 0]);
        }
        else{
            $data->update(['status'=> 1]);
        }

    }


}
