<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::orderBy('id','DESC')->get();
        return view('testimonials.testimonials',['testimonials'=>$testimonials]);
    }
    
    // Create Function 
    public function create(){
        return view('testimonials.create');
    }
    // Store Function 
    public function store(Request $request){
          $allData = $request->all();
          $TestimonialImage = $request->file('client_img');
          $imgName = date("Y-m-d-H-i-s_").'client_img.'.$TestimonialImage->getClientOriginalExtension();
          $TestimonialImage->move(public_path('storage/images/testimonials/'), $imgName);

          $allData ['client_img'] = asset('storage/images/testimonials/'.$imgName);

          $result = Testimonial::create($allData);

          if ($request == true) {
              return 1;
          }
          else{
            return 0;
          }
            
    }

     // Edit Function 
    public function edit($id){
        $data =Testimonial::findOrFail($id);
        return response()->json($data);
    }
    // Update Function 
    public function update(Request $request,$id){

          $allData = $request->all();
          $TestimonialImage = $request->file('client_img');
          $imgName = date("Y-m-d-H-i-s_").'client_img.'.$TestimonialImage->getClientOriginalExtension();
          $TestimonialImage->move(public_path('storage/images/testimonials/'),$imgName);
          $allData['client_img'] = asset('storage/images/testimonials/'.$imgName);

          $result =Testimonial::where('id',$id)->update($allData);

          if ($result == true) {
               return 1;
          }
          else{
            return 0;
          }

    }
     // Delete Function 
    public function delete($id){
         $result = Testimonial::where('id',$id)->delete();
         if ($result == true) {
               return 1;
          }
          else{
            return 0;
          }
    }
     // Status Function 
    public function activeStatus($id){
         $data = Testimonial::findOrFail($id);
         $status = $data->status;
         if ($status == 1) {
             $data->update(['status'=> 0]);
         }
         else{
            $data->update(['status'=> 1]);
         }
    }

}
