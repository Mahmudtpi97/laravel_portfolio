<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index(){
        $service = Service::orderBy('id','DESC')->get();
        return view('services.services',['services'=>$service]);
    }
    public function create(){
        return view('services.create');
    } 
    public function store(Request $request){
        $icon = $request->input('icon');
        $title = $request->input('title');
        $description = $request->input('description');
        $status = $request->input('status');

        $result = Service::insert([
                'icon'=>$icon,
                'title'=>$title,
                'description'=>$description,
                'status'=>$status
            ]);
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }
        
    }
    // Edit Function 
    public function edit($id){
        $data =Service::findOrFail($id);
        return response()->json($data);
    }
    // Update Function 
    public function update(Request $request,$id){
       $data = $request->all();

       $result = Service::where('id',$id)->update($data);
        
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }
    // Delete Function 
    public function delete($id){
       $result = Service::where('id',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }
    // Delete Function 
    public function activeStatus(Service $service){
         if($service->status == 1){
                $service->update(['status'=>0]);
         }
         else{
             $service->update(['status'=>1]);
         }
    }

}
