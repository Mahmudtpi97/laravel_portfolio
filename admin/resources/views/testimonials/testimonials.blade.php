@extends('layouts.app');
@section('content')
<div class="row preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>

<div class="row TestimonialWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allTestimonial d-none">
	<div class="card">
	  <div class="card-body">
        <h4 class="card-title">All Testimonial</h4>
        <p class="card-description"> All Testimonial Data is Showing</p>
       <div class="table-responsive">
				<table class="table table-dark table-bordered" id="myTable">
					<thead>
						  <th>ID: </th>
						  <th>Name: </th>
						  <th>Designation: </th>
						  <th>Review: </th>
						  <th>Image: </th>
						  <th>Status: </th>
						  <th>Action: </th>
					</thead>
					 <tbody>
							@if($testimonials->count() == null)
								<div class="text-center p-5">
									<h3>Testimonial Data Empty.</h3>
								</div>
							
							@else
							@foreach($testimonials as $testimonial)
								<tr>
							 		<td>{{$testimonial->id}}</td>
							 		<td>{{$testimonial->name}}</td>
							 		<td>{{$testimonial->designation}}</td>
							 		<td>{!!$testimonial->review!!}</td>
							 		<td><img src="{{$testimonial->client_img}}" alt="Testimonial Member" class="custom_img"></td>
							 		<td>
							 			@if($testimonial->status ==1 )
							 			 <label class="badge badge-success btn-icon btn-rounded">Active</label>
							 			 @else
							 			  <label class="badge badge-danger btn-icon btn-rounded">InActive</label>
							 			 @endif
							 		</td>
							 		<td>
							 				@if($testimonial->status != 1)
									 			<button data-link="{{route('testimonial.activeStatus',['id'=>$testimonial->id]) }}" class="btn btn-info btn-icon btn-rounded" title="Testimonial Active" id="StatusActive"><i class="mdi mdi-thumb-up-outline"></i></button>
									 		@else
									 			<button data-link="{{route('testimonial.activeStatus',['id'=>$testimonial->id]) }}" class="btn btn-danger btn-icon btn-rounded" title="Testimonial InActive" id="StatusInActive"><i class="mdi mdi-thumb-down-outline"></i></button>
									 		@endif
								 			<button class="btn btn-primary btn-icon btn-rounded" id="editTestimonialBtn" data-link="{{route('testimonial.edit',['id'=>$testimonial->id])}}"  title="Testimonial Edit {{$testimonial->id}}">
								 				<i class="mdi mdi-table-edit"></i>
								 			</button>
								 			<button class="btn btn-danger btn-icon btn-rounded" id="deleteTestimonialBtn"  data-id="{{$testimonial->id}}"  title="Testimonial Delete {{$testimonial->id}}">
								 				<i class="mdi mdi-delete"></i>
								 			</button>
							 			</td>
							 	</tr>
							 		
							@endforeach
							@endif
					 </tbody>
				</table>
			 </div>

	  </div>
	</div>
</div>
<!--Edit Modal -->
<div class="modal fade" id="editTestimonials" tabindex="-1" aria-labelledby="editTestimonial" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Testimonial Item Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="modelEditLoader text-center">
					  <img src="{{asset('images/loader.gif') }}" alt="">
			</div>
			<div class="modelEditWrong d-none">
					<div class="text-center p-5">
						<h3>Something Went Wrong !</h3>
					</div>
			</div>
			<div class="modalEdit d-none">
				   <div class="item-area mt-5">
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
			                <label for="Testimonial_img">Client Image: </label>
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
			              <input type="hidden" id="editTestimonialID">
			              <button type="submit" class="btn btn-primary mr-2" id="TestimonialUpdate">Submit</button>
			              <a href="{{url('testimonials')}}" class="btn btn-dark">Cancel</a>
				   </div>
			</div>
      </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="DeleteTestimonials" tabindex="-1" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title text-center">Are You Sure Delete Your Testimonial Item</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <input type="hidden" name="" id="del_type_id">
        <button type="button" class="btn btn-danger"  id="TestimonialDeleteSubmit">Delete</button>
      </div>

    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
	 $(document).ready(function(){
		 getTestimonial();
		  function getTestimonial(){
		  	axios.get('testimonials')
		  	 .then(function(response){
		  	 		 if(response.status == 200){
			  	 		 $(".preloader").addClass('d-none');
			  	 		 $(".allTestimonial").removeClass('d-none');
		  	 		 }
		  	 		 else{
		  	 		 	  $(".preloader").addClass('d-none');
			  	 		 $(".TestimonialWrong").removeClass('d-none');
		  	 		 }
		  	 })
		  	 .catch(function(error){
		  	 	   $(".preloader").addClass('d-none');
			  	   $(".TestimonialWrong").removeClass('d-none');
		  	 })
		  };
		// Edit Testimonial
      $(document).on('click','#editTestimonialBtn',function(){
		  	   let link = $(this).data('link'); 
		  	   $('#editTestimonials').modal('show');
		  		axios.post(link)
		  		 .then(function(response){
		  		 		  if(response.status == 200){
				  	 		 	$(".modelEditLoader").addClass('d-none');
				  	 		 	$(".modalEdit").removeClass('d-none');

				  	 		 	let data = response.data;
		  	  		      $("#editTestimonialID").val(data.id);
					  	  	  $("#name").val(data.name);
										$("#designation").val(data.designation);
										$("#review").val(data.review);
										$("#status").val(data.status);
						  	 }
			  	 		 else{

			  	 		 	  $(".modelEditLoader").addClass('d-none');
				  	 		  $(".modelEditWrong").removeClass('d-none');
			  	 		 }
		  		 })
		  		 .catch(function(error){
		  		 	console.log(error);
		  		 		  $(".modelEditLoader").addClass('d-none');
				  	 	  $(".modelEditWrong").removeClass('d-none');
		  		 })
		  });

      	// Update Testimonial
		$('#TestimonialUpdate').click(function(){
				    let id          = $("#editTestimonialID").val();
	    	    let name    		= $("#name").val();
	  	  		let designation = $("#designation").val();
	  	  		let review      = $("#review").val();
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

			  	  		 axios.post('testimonial/update/'+id,formData,{
		  	  		 	 	 headers: {'Content-Type': 'multipart/form-data'}
			  	  		 })
			  	  		 .then(function(response){
			  	  		 	console.log(response);
			  	  		 		 if(response.status ==200){
			  	  		 		 	 if(response.data == 1){
			  	  		 		 	 	$('#editTestimonials').modal('hide');
				  	  		 		  	toastr.success('Testimonial Item Update Successfully!')
				  	  		 		  	   setTimeout(function(){ 
				                           	 window.location.href = '/testimonials';
				                           },2000)
				  	  		 		  }
				  	  		 		  else{
				  	  		 		  	toastr.error('Testimonial Item Update Failed!')
				  	  		 		  }
			  	  		 		 }
			  	  		 		 else{
			  	  		 		 	 toastr.error('Something Went Wrong!')
			  	  		 		 }
			  	  		 })
			  	  		.catch(function(error){
						  	 $('#editTestimonials').modal('hide');
							toastr.error("Something Went Wrong!");
							   setTimeout(function(){ 
                     	 window.location.href = '/testimonials';
                      },2000)
			  	  		})
		  	  	}
  	     });

		  // Delete Testimonial
		  $(document).on('click','#deleteTestimonialBtn',function(){
		  	   let id = $(this).data('id');
		  	    $('#del_type_id').val(id);
		  		$('#DeleteTestimonials').modal('show');
		  });
		  // Delete Submit
		  $('#TestimonialDeleteSubmit').click(function(){
		  		let deleteID = $('#del_type_id').val();

		  		axios.post('testimonial/delete/'+deleteID)
		  		 .then(function(response){
			  		 	if(response.status == 200){
			  		 		console.log(response);
		  		 			 // $("#allTestimonial").load(window.location + " #allTestimonial");
				     		 $("#DeleteTestimonials").modal('hide');
					 			if(response.data == 1){
						     		 toastr.success("Testimonial Item Deleted Success !");
						     		 setTimeout(function(){
						     		   	window.location.href = '/testimonials';
						     		 },2000)
					 			 }
					 			 else{
					 				  toastr.error("Testimonial Item Deleted Failed !");
					 			}
					 		}
					 	 else{
					 		  $("#DeleteTestimonials").modal('hide');
				     	      toastr.error("Something Went Wrong!");
					 	  }

		  		 })
		  		 .catch(function(error){
				     	 $("#DeleteTestimonials").modal('hide');
				     	 toastr.error("Something Went Wrong!");
				     	 setTimeout(function(){
			     		 	window.location.href = '/testimonials';
			     		 },2000)
		  		 })
		  });

		   // Status Active an InActive
		  $(document).on('click','#StatusInActive',function(){
		   		let link = $(this).data('link');
		   		axios.post(link)
	   			.then(function(response){
			   			toastr.success('Testimonial Item InActive Successfully!');
			   			setTimeout(function(){
			   				window.location.href = '/testimonials';
			   			},2000)
		   			})
		   		.catch(function(error){
		   			console.log(error);
		   				 toastr.warning('Testimonial Item InActive Failed!');
		   		   })
		   });
		   $(document).on('click','#StatusActive',function(){
		   		let link = $(this).data('link');
		   		axios.post(link)
		   		.then(function(response){
		   			toastr.success('Testimonial Item Active Successfully!');
		   			setTimeout(function(){
		   				window.location.href = '/testimonials';
		   			},2000)
		   		})
		   		.catch(function(error){
		   			console.log(error);
		   			toastr.warning('Testimonial Item Active Failed!');
		   		})
		   });

	  
	 })


</script>
@endsection
