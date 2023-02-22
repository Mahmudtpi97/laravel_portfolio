<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
class FeaturesController extends Controller
{
     public function index(){
        $features = Feature::orderBy('id','DESC')->get();
        return view('features.features',['features'=>$features]);
     }
     public function create(){
        return view('features.create');
    } 
    public function store(Request $request){
        $allData = $request->all();

        $f_image = $request->file('f_image');
          $imgName = date("Y-m-d-H-i-s_").'team_member.'.$f_image->getClientOriginalExtension();
          $f_image->move(public_path('storage/images/features/'), $imgName);
          $allData ['f_image'] = asset('storage/images/features/'.$imgName);

        $result = Feature::create($allData);

        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }
        
    }

    // Show Function 
    public function show($id){
        $data =Feature::findOrFail($id);
        return response()->json($data);
    }
    // Edit Function 
    public function edit($id){
        $data =Feature::findOrFail($id);
        return response()->json($data);
    }
    // Update Function 
    public function update(Request $request,$id){
       $allData = $request->all();
       
       $f_image = $request->file('f_image');
          $imgName = date("Y-m-d-H-i-s_").'f_image.'.$f_image->getClientOriginalExtension();
          $f_image->move(public_path('storage/images/features/'), $imgName);
          $allData ['f_image'] = asset('storage/images/features/'.$imgName);

       $result = Feature::where('id',$id)->update($allData);
        
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }
    // Delete Function 
    public function delete($id){
       $result = Feature::where('id',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }
    }
    // Status Function 
    public function activeStatus(Feature $feature){
       if ($feature->status==1) {
            $feature->update(['status'=> 0]);
        }
        else{
            $feature->update(['status'=> 1]);
        }
    }


}
