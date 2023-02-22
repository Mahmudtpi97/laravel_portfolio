<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Index Function 
    public function index(){
        $contacts = Contact::all();
        return view('contact.contact',['contacts'=>$contacts]);
    }
    // Create Function 
    public function create(){
        return view('contact.create');
    }
   // Store Function 
    public function store(Request $request){
        $allData = $request->all();
        $result = Contact::create($allData);

         if ($result == true) {
             return 1;
         }
         else{
            return 0;
         }
    }
    // Edit Function 
    public function edit($id){
        $result = Contact::findOrFail($id);
        return response()->json($result);
    }
    // Update Function 
    public function update(Request $request,$id){
         $data = $request->all();
         $result = Contact::findOrFail($id)->update($data);
         if ($result == true) {
             return 1;
         }
         else{
            return 0;
         }
    }
    // Delete Function 
    public function Delete($id){
        $result = Contact::findOrFail($id)->delete();
         if ($result == true) {
             return 1;
         }
         else{
            return 0;
         }
    }
    
}
