<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SlidersController extends Controller
{

    public function index(){
        $slider = Slider::orderBy('id', 'DESC')->get();
        return view('slider.sliders', ['sliders' => $slider]);
    }

    public function create(){
        return view('slider.create');
    }
    public function store(SliderRequest $request){
            $formData = $request->all();
            // Slider Image
            $sliderImg = $request->file('slider_img');

            $imgName   = date('Y-m-d-H-i-s').'.'.$sliderImg->getClientOriginalExtension();
            $imgPath   = $sliderImg->move(public_path('storage/images/sliders'),$imgName);
            $formData['slider_img'] = asset('storage/images/sliders/'.$imgName);

         if(Slider::create($formData)){
            Session::flash('success','Slider Create Successfully');
         }
         else{
            Session::flash('error','Slider Create Fail');
         }
         return redirect('sliders');
    }
    public function show($id){
        $sliders = Slider::findOrFail($id);
        return response()->json($sliders);
    }
    public function edit($id){
     $sliders =Slider::findOrFail($id);
     return response()->json($sliders);
    }

    public function update(Request $request){

         $id        = $request->input('id');
         $allData   = $request->all();

        $sliderImg = $request->file('slider_img');

            $imgName   = date('Y-m-d-H-i-s').'.'.$sliderImg->getClientOriginalExtension();
            $imgPath   = $sliderImg->move(public_path('storage/images/sliders'),$imgName);
            $allData['slider_img'] = asset('storage/images/sliders/'.$imgName);


         $result = Slider::where('id',$id)->update($allData);
          
           if ($result == true) {
                return 1;
           } 
           else{
              return 0;
           }

    }
    public function delete(Request $request){
        $id = $request->input('id');

        $data = Slider::find($id);
        $data->delete();

        if($data == true){
            Session::flash('success','Delete Success');
            return 1;
        }
        else{
          Session::flash('success','Delete Success');
          return 0;
        }  
    }
    public function activeStatus(Slider $slider){

     if ($slider->status==1) {
            $slider->update(['status'=> 0]);
        }
        else{
            $slider->update(['status'=> 1]);
        }
        return response()->json($slider);
    }


}
