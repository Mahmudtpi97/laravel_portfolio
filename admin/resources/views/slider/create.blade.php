@extends('layouts.app')

@section('content')
   <div class="row">
       <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create A New Slider</h4>
            <p class="card-description"> Slider Create </p>

            <form class="forms-sample" action="{{route('sliders_create.confirm')}}"  method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Slider Title">
              </div>
              <div class="form-group">
                <label for="sub_title">Sub Title</label>
                <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Sub Titel">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Description"></textarea>
              </div>

              <div class="form-group">
                <label>Slider Image</label>
                <input type="file" class="file-upload-default" name="slider_img" hidden>
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" placeholder="Upload Image" >
                  <span class="input-group-append">
                     <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked="" value="1" name="status"> Status <i class="input-helper"></i></label>
                      <small class="text-lowercase text-sm-left">Click the checkbox and active the Slider.</small>
                  </div>
              </div
              >
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{url('sliders')}}" class="btn btn-dark">Cancel</a>

            </form>
          </div>
        </div>

      </div>
   </div>



@endsection