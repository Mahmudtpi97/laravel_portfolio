@extends('layouts.app')
@section('content')
   <div class="row">
       <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Features Item</h4>
            <p class="card-description"> Feature Create </p>
						<div class="ServiceCreate">
		              <div class="form-group">
		                <label for="title">Tag Icon: </label>
		                <input type="text" class="form-control" id="t_icon" name="t_icon" placeholder="Ex: fa fa-line-chart" value="{{old('t_icon')}}">
		              </div>
		              <div class="form-group">
		                <label for="title">Title: </label>
		                <input type="text" class="form-control" id="title" name="title" placeholder="Ex: Web Design" value="{{old('title')}}">
		              </div>
		              <div class="form-group">
		                <label for="description">Description: </label>
		                <textarea type="text" class="form-control" id="description" name="description" placeholder="Description">{{old('description')}}</textarea>
		              </div>
		              <div class="form-group">
		                <label for="description">Features Image: </label>
		                <input type="file" class="file-upload-default" id="f_image" name="f_image" hidden>
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
		                      <input type="checkbox" class="form-check-input" checked="" value="1" name="status" id="status"> Status <i class="input-helper"></i></label>
		                      <small class="text-lowercase text-sm-left">Click the checkbox and active the Feature.</small>
		                  </div>
		              </div>	

		              <button type="submit" class="btn btn-primary mr-2" id="FeaturesCreate">Submit</button>
		              <a href="{{url('services')}}" class="btn btn-dark">Cancel</a>

            </div>

          </div>
        </div>

      </div>
   </div>

@endsection
@section('scripts')
  <script>
  	  $(document).ready(function(){
  	  		// Services Data Add 
			  	  $("#FeaturesCreate").click(function(){
			  	  		let t_icon  = $("#t_icon").val();
			  	  		let title   = $("#title").val();
			  	  		let description = $("#description").val();
			  	  		let f_image = $("#f_image")[0].files[0];
			  	  		let status  = $("#status").val();

              addFeature(t_icon,title,description,f_image,status);
            });
			  	  function addFeature(t_icon,title,description,f_image,status){
			  	  		 if(t_icon.length == 0){
						  	 		toastr.error("Icon is Required !");
						  	 }else if(title.length == 0){
						  	 		toastr.error("Title is Required !");
						  	 }else if(description.length == 0){
						  	 		toastr.error("Description is Required !");
						  	 }else if(!f_image){
						  	 		toastr.error("Image is Required !");
						  	 }else if(!(f_image.type == 'image/jpeg' || f_image.type == 'image/png')){
							  toastr.error("Image must be jpg, png format !");
						  	 }
						  	 else{
						  	 	 let formData = new FormData();
						  	 	    formData.append('t_icon',t_icon);
						  	 	    formData.append('title',title);
						  	 	    formData.append('description',description);
						  	 	    formData.append('f_image',f_image);
						  	 	    formData.append('status',status);

					  	  		axios.post('{{route('feature.create_confirm')}}',formData)
					  	  		 .then(function(response){
					  	  		 		 if(response.status ==200){
					  	  		 		 	 if(response.data == 1){
						  	  		 		  	 toastr.success('Features Item Create Successfully!')
						  	  		 		  	 window.location.href = '/features';
						  	  		 		  }
						  	  		 		  else{
						  	  		 		  	toastr.error('Features Item Create Failed!')
						  	  		 		  }
					  	  		 		 }
					  	  		 		 else{
					  	  		 		 	 toastr.error('Something Went Wrong!')
					  	  		 		 }
					  	  		 })
					  	  		 .catch(function(error){
					  	  		 	  toastr.error('Something Went Wrong!')
					  	  		 })
					  	  	}
			  	  };


  	  })


 </script>
@endsection