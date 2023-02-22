<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
 // Index Function 
   public function index(){
        $about = About::get();
        return view('abouts.about',['abouts' => $about]);
  } 
  // Create Function 
   public function create(){
       return view('abouts.create');
    } 
 // Store Function 
  public function store(Request $request){

        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'about_img'   => 'required|mimes:jpg,png,jpeg'
        ]);

      $formData = $request->only('title','description');
      $aboutImg = $request->file('about_img');

      $imgName = date('Y-m-d-H-i-s').'_about_img.'.$aboutImg->getClientOriginalExtension();
      $aboutImg->move(public_path('storage/images/abouts'),$imgName);
      $formData ['about_img'] = asset('storage/images/abouts/'.$imgName);

      if(About::create($formData) ){
           Session::flash('success','About Item Create Successfully !');
      }
      else{
        Session::flash('error','About Item Create Failed !');
      }
     return redirect()->to('abouts');
  }

 // Edit Function 
  public function edit($id){
    $about = About::findOrFail($id);
    return response()->json($about );
  }
  // Update Function 
  public function update(Request $request,$id){
     $allData       = $request->all();
     $aboutImg = $request->file('about_img');

    $imgName = date('Y-m-d-H-i-s').'_about_img.'.$aboutImg->getClientOriginalExtension();
    $imgPath = $aboutImg->move(public_path('/storage/images/abouts'),$imgName);
    $allData['about_img'] = asset('/storage/images/abouts/'.$imgName);

    $result = About::where('id',$id)->update($allData);
    if($result == true){
        return 1;
    }
    else{
        return 0;
    }
  }
  // Delete Function 
  public function delete(Request $request,$id){
        
        $result = About::where('id',$id);
        $result->delete();

        if($result == true){
            return 1;
        }
        else{
            return 0;
        } 

  }
      
}
