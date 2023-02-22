<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index(){
        $portfolios = Portfolio::orderBy('id','DESC')->get();
        return view('portfolios.portfolios',['portfolios'=>$portfolios]);
     }
     public function create(){
        return view('portfolios.create');
    } 
    public function store(Request $request){
         $allData = $request->all();
         $portfolioImg = $request->file('portfolio_img');

         $imgName = date('Y-m-d-H-i-s').'_portfolioImg.'.$portfolioImg->getClientOriginalExtension();
         $portfolioImg->move(public_path('storage/images/portfolios/'),$imgName);
         $allData['portfolio_img'] = asset('storage/images/portfolios/'.$imgName);

         $result = Portfolio::create($allData);

        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }
    }

    // Show Function 
    public function show(Request $request){
        $id = $request->input('pID');
        $data =Portfolio::findOrFail($id);
        return response()->json($data);
    }
    // Edit Function 
    public function edit(Request $request){
        $id = $request->input('pID');
        $data =Portfolio::findOrFail($id);
        return response()->json($data);
    }
    // Update Function 
    public function update(Request $request){
       $id = $request->input('id');
       $allData = $request->all();
 

         $portfolioImg = $request->file('portfolio_img');
         $imgName = date('Y-m-d-H-i-s').'_portfolioImg.'.$portfolioImg->getClientOriginalExtension();

         $portfolioImg->move(public_path('storage/images/portfolios/'),$imgName);
         $allData['portfolio_img'] = asset('storage/images/portfolios/'.$imgName);

      $result = Portfolio::where('id',$id)->update($allData);
        
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }
    // Delete Function 
    public function delete(Request $request){
       $id = $request->input('id');
       $result = Portfolio::where('id',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }
    }
    // Status Function 
    public function activeStatus(Request $request){
        $id   = $request->input('id');
        $data = Portfolio::where('id',$id)->first();
        $status= $data->status;

        if ($status==1) {
            $data->update(['status'=> 0]);
        }
        else{
            $data->update(['status'=> 1]);
        }
       
    }

}
