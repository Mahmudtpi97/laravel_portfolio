<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pricing;
class PricingController extends Controller
{
    public function index(){
        $pricing = Pricing::orderBy('id','DESC')->get();
        return view('pricing.pricing',['pricings'=>$pricing]);
     }
     public function create(){
        return view('pricing.create');
    } 
    public function store(Request $request){
         $data = $request->all();
         $result = Pricing::create($data);

        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }
    }

    // Show Function 
    public function show($id){
       $data =Pricing::findOrFail($id);
        return response()->json($data);
    }
    // Edit Function 
    public function edit($id){
        $data =Pricing::findOrFail($id);
        return response()->json($data);
    }
    // Update Function 
    public function update(Request $request,$id){
       $data = $request->all();
       $result = Pricing::where('id',$id)->update($data);
        
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }
    // Delete Function 
    public function delete($id){
       $result = Pricing::where('id',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }
    }
    // Status Function 
    public function activeStatus(Request $request,$id){
        $data = Pricing::where('id',$id)->first();
        $status= $data->status;
        if ($status==1) {
            $data->update(['status'=> 0]);
        }
        else{
            $data->update(['status'=> 1]);
        }
       
    }
}
