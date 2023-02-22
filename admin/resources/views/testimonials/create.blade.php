@extends('layouts.app')
@section('content')
   <div class="row">
       <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Testimonial  Item</h4>
            <p class="card-description"> Testimonial Item </p>

						<div class="TestimonialCreate">
	              <div class="form-group">
	                <label for="name">Name: </label>
	                <input type="text" class="form-control" id="name" name="name" placeholder="Member Name">
	              </div>
	              <div class="form-group">
	                <label for="designation">Client Designation: </label>
	                <input type="text" class="form-control" id="designation" name="designation" placeholder="Client Designation. Ex: Web Designer">
	              </div>
	              <div class="form-group">
	                <label for="review">Client Review: </label>
	                <textarea type="text" class="form-control" id="review" name="review" placeholder="Client Review "></textarea>
	              </div>
	              <div class="form-group">
			                <label for="client_img">Client Image: </label>
			                <input type="file" class="file-upload-default" id="client_img" name="client_img" hidden>
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
	                      <small class="text-lowercase text-sm-left">Click the checkbox and active this item.</small>
	                  </div>
	              </div>	
	              <button type="submit" class="btn btn-primary mr-2" id="CreateTestimonial">Submit</button>
	              <a href="{{url('testimonials')}}" class="btn btn-dark">Cancel</a>
				         
          </div>
        </div>

      </div>
   </div>

@endsection
@section('scripts')
  <script>
  	  $(document).ready(function(){
  	  		// Testimonial Data Add 
			  	 $("#CreateTestimonial").click(function(){
				  	  		let name    		= $("#name").val();
				  	  		let designation = $("#designation").val();
				  	  		let review   	  = $("#review").val();
				  	  		let client_img 	= $('#client_img')[0].files[0];
				  	  		let status			= $("#status").val();

			  	  		 if(name.length == 0){
						  	 		toastr.error("Name is Required !");
						  	 }else if(designation.length == 0){
						  	 		toastr.error("Designationis Required !");
						  	 }else if(review.length == 0){
						  	 		toastr.error("Review is Required !");
						  	 }else if(!client_img){
						  	 		toastr.error("Client Image is Required !");
						  	 }
						  	 else if(!(client_img.type == 'image/jpeg' || client_img.type == 'image/png')){
										toastr.error("Image should be in jpg, png format !");
									}
									else{

						  	 	    let formData=new FormData();
						  	 	    formData.append('name',name);
						  	 	    formData.append('designation',designation);
						  	 	    formData.append('review',review);
						  	 	    formData.append('client_img', client_img);
						  	 	    formData.append('status',status);
					  	  		 

					  	  		 axios.post('{{route('testimonial.create_confirm')}}',formData,{
					  	  		 	 headers: {
											        'Content-Type': 'multipart/form-data'
											     }
					  	  		 })
					  	  		 .then(function(response){
					  	  		 	console.log(response);
					  	  		 		 if(response.status ==200){

					  	  		 		 	 if(response.data == 1){
						  	  		 		  	toastr.success('Client Item Create Successfully!')
						  	  		 		  	 setTimeout(function(){ 
		                                window.location.href = '/testimonials';
		                            },2000)
						  	  		 		  }
						  	  		 		  else{
						  	  		 		  	toastr.error('Client Item Create Failed!')
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