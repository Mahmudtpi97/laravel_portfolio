<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::orderBy('id','DESC')->get();
        return view('team.team',['teams'=>$teams]);
    }
    
    // Create Function 
    public function create(){
        return view('team.create');
    }
    // Store Function 
    public function store(Request $request){
          $allData = $request->all();
          $teamImage = $request->file('team_img');
          $imgName = date("Y-m-d-H-i-s_").'team_member.'.$teamImage->getClientOriginalExtension();
          
          $teamImage->move(public_path('storage/images/teams/'), $imgName);

          $allData ['team_img'] = asset('storage/images/teams/'.$imgName);

          $result = Team::create($allData);

          if ($request == true) {
              return 1;
          }
          else{
            return 0;
          }
            
    }

     // Edit Function 
    public function edit($id){
        $data =Team::findOrFail($id);
        return response()->json($data);
    }
    // Update Function 
    public function update(Request $request,$id){

         $allData = $request->all();

          $teamImage = $request->file('team_img');
          $imgName = date("Y-m-d-H-i-s_").'team_member.'.$teamImage->getClientOriginalExtension();
          $teamImage->move(public_path('storage/images/teams/'),$imgName);
          $allData['team_img'] = asset('storage/images/teams/'.$imgName);

          $result = Team::findOrFail($id)->update($allData);

          if ($result == true) {
               return 1;
          }
          else{
            return 0;
          }
    }
     // Delete Function 
    public function delete($id){
         $result = Team::where('id',$id)->delete();
         if ($result == true) {
               return 1;
          }
          else{
            return 0;
          }
    }
     // Status Function 
    public function activeStatus($id){
         $data = Team::where('id',$id)->first();
         $status = $data->status;
         if ($status == 1) {
             $data->update(['status'=> 0]);
         }
         else{
            $data->update(['status'=> 1]);
         }
    }

}
