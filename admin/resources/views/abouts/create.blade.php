@extends('layouts.app')

@section('content')
   <div class="row">
       <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create About Item</h4>
            <p class="card-description"> Create About </p>
		<div class="aboutCreate">
            {{-- <form class="forms-sample" action="{{route('about.create_confirm')}}"  method="POST" enctype="multipart/form-data"> --}}
            <form class="forms-sample" id="aboutForm" action=""  method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Slider Title" value="{{old('title')}}">
              </div>
              <div class="form-group">
                <label for="description">Description: </label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Description">{{old('description')}}</textarea>
              </div>

              <div class="form-group">
                <label>About Image: </label>
                <input type="file" class="file-upload-default" name="about_img" id="about_img">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" placeholder="Upload Image">
                  <span class="input-group-append">
                     <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>

              <button type="submit" class="btn btn-primary mr-2" id="AboutCreate">Submit</button>
              <a href="{{url('abouts')}}" class="btn btn-dark">Cancel</a>

             </form>

            </div>
            {{-- DownloadItem --}}
            {{-- <div class="DownloadItem mt-4">
	              	<h4 class="card-title text-success">About Download Item</h4>
	              	<div class="form-group">
		                <label for="d_title">Download Title: </label>
		                 <input type="text" class="form-control" id="d_title" name="d_title" placeholder="Download Title">
		            </div>
		            <div class="form-group">
		                <label for="d_shortDes">Download Short Des:</label>
		                 <input type="text" class="form-control" id="d_shortDes" name="d_shortDes" placeholder="Download Short Des">
		            </div>
		            <div class="form-group">
		                <label for="d_btn">Download Btn:</label>
		                 <input type="text" class="form-control" id="d_btn" name="d_btn" placeholder="Download Btn Title">
		            </div>
		            <button type="submit" class="btn btn-primary mr-2" id="AboutCreate">Submit</button>
	              	<a href="{{url('abouts')}}" class="btn btn-dark">Cancel</a>
              </div> --}}

          </div>
        </div>

      </div>
   </div>
@endsection
  