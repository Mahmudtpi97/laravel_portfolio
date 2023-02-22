@extends('layouts.app')
@section('content')
   <div class="row">
       <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Blog Item</h4>
            <p class="card-description"> Blog Item </p>

						<div class="BlogCreate">
	              <div class="form-group">
	                <label for="title">Title: </label>
	                <input type="text" class="form-control" id="title" name="title" placeholder="Blog Title">
	              </div>
	              <div class="form-group">
	                <label for="description">Desctiption: </label>
	                <textarea type="text" class="form-control" id="description" name="description" placeholder="Blog Description "></textarea>
	              </div>
	              <div class="form-group">
		                <label for="blog_img">Blog Image: </label>
		                <input type="file" class="file-upload-default" id="blog_img" name="blog_img" hidden>
		                <div class="input-group col-xs-12">
		                  <input type="text" class="form-control file-upload-info" placeholder="Upload Image">
		                  <span class="input-group-append">
		                     <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
		                  </span>
		                </div>
		             </div>
	               <div class="form-group">
	              	 <div class="form-check form-check-primary">
	                    <label class="form-check-label">
	                      <input type="checkbox" class="form-check-input" checked="" value="1" name="status" id="status"> Status <i class="input-helper"></i></label>
	                      <small class="text-lowercase text-sm-left">Click the checkbox and active this item.</small>
	                  </div>
	               </div>	

	              <button type="submit" class="btn btn-primary mr-2" id="CreateBlog">Submit</button>
	              <a href="{{url('blogs')}}" class="btn btn-dark">Cancel</a>
				         
          </div>
        </div>

      </div>
   </div>

@endsection
@section('scripts')
  <script>
  	  $(document).ready(function(){

  	  		// Blog Data Add 
			  	  $("#CreateBlog").click(function(){
			  	  		let title    					= $("#title").val();
			  	  		let description   	  = $("#description").val();
			  	  		let blog_img   	      = $('#blog_img')[0].files[0];
			  	  		let status						= $("#status").val();


			  	  		 if(title.length == 0){
						  	 		toastr.error("Title is Required !");
						  	 }else if(description.length == 0){
						  	 		toastr.error("Description is Required !");
						  	 }else if(!blog_img){
						  	 		toastr.error("Image is Required !");
						  	 }else if(!(blog_img.type == 'image/jpeg' || blog_img.type =='image/png')){
						  	 		toastr.error("Image Type Must be jpg,png !");
						  	 }
						  	 else{
						  	 	let formData = new FormData();
						  	 	formData.append('title',title);
						  	 	formData.append('description',description);
						  	 	formData.append('blog_img',blog_img);
						  	 	formData.append('status',status);

					  	  		axios.post('{{route('blog.create_confirm')}}',formData,{
					  	  			 headers: {
											        'Content-Type': 'multipart/form-data'
											     }
					  	  		})

					  	  		 .then(function(response){
					  	  		 	console.log(response);
					  	  		 		 if(response.status ==200){
					  	  		 		 	 if(response.data == 1){
						  	  		 		  	toastr.success('Blog Create Successfully!')
						  	  		 		  	 window.location.href = '/blogs';
						  	  		 		  }
						  	  		 		  else{
						  	  		 		  	toastr.error('Blog Create Failed!')
						  	  		 		  }
					  	  		 		 }
					  	  		 		 else{
					  	  		 		 	 toastr.error('Something Went Wrong!')
					  	  		 		 }
					  	  		 })
					  	  		 .catch(function(error){
					  	  		 	console.log(error);
					  	  		 	  toastr.error('Something Went Wrong!')
					  	  		 })
					  	  	}
			  	  });


  	  })



 </script>
@endsection