<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // Index Function 
    public function index(){
        $blogs = Blog::orderBy('id','DESC')->get();
        return view('blog.blog',['blogs'=>$blogs]);
    }
    // Create Function 
    public function create(){
        return view('blog.create');
    }
    // Store Function 
    public function store(Request $request){
        $allData = $request->all();
        $blogImg = $request->file('blog_img');

        $imgName = date('Y-m-d-H-i-s_').'blog_img.'.$blogImg->getClientOriginalExtension();
        $blogImg->move(public_path('storage/images/blogs/'),$imgName);
        $allData['blog_img'] = asset('storage/images/blogs/'.$imgName);
         
        $result = Blog::create($allData);
        if ($result == true) {
            return 1;
        }
        else{
            return 0;
        }
    }
    // Edit Function 
    public function edit($id){
        $result = Blog::findOrFail($id);
        return response()->json($result);
    }
    // Update Function 
    public function update(Request $request,$id){
        $allData = $request->all('title','description','status');
        $blogImg = $request->file('blog_img');

        $imgName = date('Y-m-d-H-i-s_').'blog_img.'.$blogImg->getClientOriginalExtension();
        $blogImg->move(public_path('storage/images/blogs/'),$imgName);
        $allData['blog_img'] = asset('storage/images/blogs/'.$imgName);
        $result = Blog::findOrFail($id)->update($allData);

        if ($result == true) {
            return 1;
        }
        else{
            return 0;
        }
    }
    // Delete Function 
    public function delete($id){
        $result = Blog::findOrFail($id)->delete();

       if ($result == true) {
            return 1;
        }
        else{
            return 0;
        }
    }
    // Status Function 
    public function activeStatus($id){
        $data = Blog::findOrFail($id);
        $status = $data->status;

        if ($status == 1) {
            $data->update(['status'=> 0]);
        }
        else{
            $data->update(['status'=> 1]);
        }
    }
}
