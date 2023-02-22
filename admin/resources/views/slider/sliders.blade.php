@extends('layouts.app')
@section('content')

<div class="row preloader" id="preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>

<div class="row SliderWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allSlider d-none" id="allSlider">
	<div class="card">
	  <div class="card-body">
        <h4 class="card-title">All Slider</h4>
        <p class="card-description"> All Slider Data is Showing</p>
       <div class="table-responsive">
				<table class="table table-dark table-bordered" id="myTable">
				 	  <thead>
				          <tr>
				              <th>#</th>
				              <th>Title</th>
				              <th>Sub Title</th>
				              <th>Image</th>
				              <th>Status</th>
				              <th>Action</th>
				          </tr>
				      </thead>
					 <tbody>
							@foreach($sliders as $slider)
								<tr>
							 		<td>{{$slider->id}}</td>
							 		<td>{{$slider->title}}</td>
							 		<td>{{$slider->sub_title}}</td>
							 		<td><img src="{{$slider->slider_img}}" alt="slider_image" class="custom_img"></td>
							 		<td>
							 			@if($slider->status == 1)
							 			   <label class="badge badge-success btn-icon btn-rounded">Active</label>
							 			@else
							 			  <label class="badge badge-danger btn-icon btn-rounded">InActive</label>
							 			@endif
							 		</td>
							 		<td>
							 			<!-- Status -->
							 			 
							 		    @if($slider->status != 1)
								 			<button data-link="{{route('sliders.activeStatus',['slider'=>$slider->id] )}}" class="btn btn-info btn-icon btn-rounded" title="Slider Active" id="StatusActive"><i class="mdi mdi-thumb-up-outline"></i></button>
								 		@else
								 			<button data-link="{{route('sliders.activeStatus',['slider'=>$slider->id] )}}" class="btn btn-danger btn-icon btn-rounded" title="Slider InActive" id="StatusInActive"><i class="mdi mdi-thumb-down-outline"></i></button>
								 		@endif

								 			<!-- Link -->
							 			  <button class="btn btn-success btn-icon btn-rounded" id="showSliderBtn" data-sliderid="{{$slider->id}}" title="Slider Show {{$slider->id}}">
										    <i class="mdi mdi-open-in-new"></i>
										  </button> 

								 			<button class="btn btn-primary btn-icon btn-rounded" id="editSliderBtn" data-sliderid="{{$slider->id}}"  title="Slider Edit {{$slider->id}}">
								 				<i class="mdi mdi-table-edit" title="Slider Edit {{$slider->id}}"></i>
								 			</button>

								 			<button class="btn btn-danger btn-icon btn-rounded" title="Slider Delete" id="deleteSliderBtn" data-sliderid="{{$slider->id}}"  title="Slider Delete {{$slider->id}}">
								 				<i class="mdi mdi-delete"></i>
								 			</button>
								 			
							 		</td>
							 	</tr>
							@endforeach
					 </tbody>
				</table>
			 </div>

	  </div>
	</div>
</div>

<!--Show Modal -->
<div class="modal fade" id="showSliders" tabindex="-1" aria-labelledby="showSlider" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>Slider All Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
					<div class="modelShowLoader text-center">
						  <img src="{{asset('images/loader.gif') }}" alt="">
					</div>
					<div class="modelShowWrong d-none">
							<div class="text-center p-5">
								<h3>Something Went Wrong !</h3>
							</div>
					</div>

					<div class="table-responsive d-none">
						 <table class="table table-dark table-bordered">
							 <tbody>
								   <tr>
										<th>#</th>
								 		<td id="slider_id"></td>
								 	</tr>
								 	<tr>
								 		<th>Title: </th>
								 		<td id="title"></td>
								 	</tr> 
							 		<tr>
							 			<th>Sub Title: </th>
							 			<td id="sub_title"></td>
							 		</tr>

							 		<tr>
							 			<th>Description: </th>
							 			<td id="description"></td>
							 		</tr> 
							 		<tr>
				              <th>Image</th>
				              <td id="s_img"></td>
						        </tr> 
							 </tbody>
						</table>
					</div>
       
      </div>
    </div>
  </div>
</div>
<!--Edit Modal -->
<div class="modal fade" id="editSliders" tabindex="-1" aria-labelledby="editSlider" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Slider Data Edit</h5>
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
								  <div class="form-group">
		                 <label for="e_title">Title</label>
		                 <input type="text" class="form-control" id="e_title" name="title" placeholder="Slider Title">
		              </div>
		              <div class="form-group">
		                <label for="e_sub_title">Sub Title</label>
		                <input type="text" class="form-control" id="e_sub_title" name="sub_title" placeholder="Sub Titel">
		              </div>
		              <div class="form-group">
		                <label for="e_description">Description</label>
		                <textarea type="text" class="form-control" id="e_description" name="description" placeholder="Description"></textarea>
		              </div>

		              <div class="form-group">
		                <label>Slider Image</label>
		                <input type="file"  class="file-upload-default" id="slider_img" name="slider_img">
		                <div class="input-group col-xs-12">
		                  <input type="text" class="form-control file-upload-info" placeholder="Upload Image" >
		                  <span class="input-group-append">
		                     <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
		                  </span>
		                </div>
		              </div>

		              <input type="hidden" name="" id="editSliderID">
		              <button type="submit" class="btn btn-primary mr-2" id="SliderUpdate">Submit</button>
						</div>
      </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="DeleteSliders" tabindex="-1" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title text-center">Are You Sure Delete Your Slider</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <input type="hidden" name="" id="del_type_id">
        <button type="button" class="btn btn-danger"  id="SliderDeleteSubmit">Delete</button>
      </div>

    </div>
  </div>
</div>
<!-- Active && Inactive Status Loader -->
<div class="StatusLoader text-center d-none">
	  <img src="{{asset('images/loader.gif') }}" alt="">
</div>

@endsection



@section('scripts')

<script>

$(document).ready(function(){

  // Get Slider All Data
   getSlider();
   function getSlider(){
   		axios.get('sliders')
   		.then(function(response){
   			 if(response.status==200){
				 	  $("#allSlider").removeClass('d-none');
				 	  $("#preloader").addClass('d-none');
   			 } 
   			 else{
					 $("#preloader").addClass('d-none');
				 	 $(".SliderWrong").removeClass('d-none');
   			 }
   			  
   		 })
   		.catch(function(error){
   			    $("#preloader").addClass('d-none');
			 	$(".SliderWrong").removeClass('d-none');
   		})
   };

   // Show Single Slider
    showSlider();
    function showSlider(){
    	
     	$(document).on('click','#showSliderBtn', function() {
     	    let id = $(this).data('sliderid');
  
  		 axios.get('slider/show/'+id)
				  .then(function(response){
						    $('#showSliders').modal('show');
								if(response.status == 200){
								   	 	$(".table-responsive").removeClass('d-none');
				 	  					$(".modelShowLoader").addClass('d-none');

				              let data = response.data;
									    $('#title').text(data.title);
									    $('#sub_title').text(data.sub_title);
									    $('#description').text(data.description);
									    $('#s_img').html("<img src='" + data.slider_img + "' alt='slider_image' class='big_img'>");
								   }

						   else{
					    	    $(".modelShowWrong").removeClass('d-none');
			 	  					$(".modelShowLoader").addClass('d-none');
						   }
					})
					.catch(function(error){
			  					$(".modelShowWrong").removeClass('d-none');
		 	  					$(".modelShowLoader").addClass('d-none');
					});


	       }); 
     };

   // editSlider
  	 $(document).on('click','#editSliderBtn', function(){
  	  		let sliderID = $(this).data('sliderid');

  	  		 axios.get("slider/edit/"+sliderID)
  	  		     .then(function(response){
										$("#editSliders").modal('show');
										if(response.status == 200){
												$(".modalEdit").removeClass('d-none');
		 	  								$(".modelEditLoader").addClass('d-none');

											  let data = response.data;

				  	  		     	$("#editSliderID").val(data.id);
					  	  		 		$('#editSliders,#e_title').val(data.title);
					  	  		 		$('#editSliders,#e_sub_title').val(data.sub_title);
					  	  		 		$('#editSliders,#e_description').val(data.description);
										}
										else{
												$(".modelEditWrong").removeClass('d-none');
		 	  								$(".modelEditLoader").addClass('d-none');
										}
				  	  		     		
  	  		      })
  	  		     .catch(function(error){
  	  		     	   $(".modelEditWrong").removeClass('d-none');
		 	  					 $(".modelEditLoader").addClass('d-none');
  	  		     })
  	  });

     $("#SliderUpdate").click(function(){

    	   let id          	=  $("#editSliderID").val();
    	   let title 	   		=  $("#e_title").val();
    	   let sub_title 		=  $("#e_sub_title").val();
    	   let description 	=  $("#e_description").val();
    	   let slider_img   =  $("#slider_img")[0].files[0];

    	  UpdateSlider(id,title,sub_title,description,slider_img);
	});

     function UpdateSlider(id,title,sub_title,description,slider_img){

						if(title.length == 0){
				  	 		toastr.error("Title is Required !");
				  	 }else if(sub_title.length == 0){
				  	 		toastr.error("Sub Title Required !");
				  	 }else if(description.length == 0){
				  	 		toastr.error("Description is Required !");
				  	 }else if(!slider_img){
				  	 		toastr.error("Slider Image is Required !");
				  	 }
				  	 else if(!(slider_img.type == 'image/jpeg' || slider_img.type == 'image/png')){
								toastr.error("Image must be jpg, png format !");
							}
						else{
     	        	let formData = new FormData ();
					     	     formData.append('id',id);
					     	     formData.append('title',title);
					     	     formData.append('sub_title',sub_title);
					     	     formData.append('description',description);
					     	     formData.append('slider_img',slider_img);

						 		axios.post('slider/update',formData)
					 		    .then(function(response){
					 		    	console.log(response);
					 		    	    if(response.status == 200){
													 // getSlider();
													 $('#editSliders').modal('hide');
													 	if(response.data == 1){
															 toastr.success("Slider Update Success !");
															 setTimeout(function(){
							  	         				 window.location.reload();
							  	         			},3000)
														}
														else{
																toastr.error("Slider Update Failed !");
														}
												 }
												 else{
														toastr.error("Something Went Wrong!");
												 }
					 		    })

					 		    .catch(function(error){
					 		    	console.log(error);
					 		    	   $('#editSliders').modal('hide');
												toastr.error("Something Went Wrong!");
												setTimeout(function(){
						         				 window.location.reload();
						         			},3000)
					 		    })
     	        }

   };


  // Slider Delete
     $(document).on('click','#deleteSliderBtn', function(){
     	   var id = $(this).data('sliderid');
     	   $("#DeleteSliders").modal('show');
     	   $("#del_type_id").val(id);
		});

     $("#SliderDeleteSubmit").click(function(){
     	 var inputdelid = $('#del_type_id').val(); 
     	  Sliderdelete(inputdelid);
     });


		 function Sliderdelete(delid){

		 	axios.post('slider/delete',{
		 		id:delid
		 	})
		 	.then(function(response){
		 		    if(response.status == 200){
			     		 $("#DeleteSliders").modal('hide');
									 	if(response.data == 1){
											toastr.success("Slider Deleted Success!");
												setTimeout(function(){
			  	         				 window.location.reload();
			  	         			},3000)
										}
										else{
												toastr.error("Slider Deleted Failed!");
										}
						 }
						 else{
								toastr.error("Something Went Wrong!");
						  }
		 		}) 
		 	.catch(function(error){
			    $("#DeleteSliders").modal('hide');
		 		  toastr.error("Something Went Wrong!");
		 		  setTimeout(function(){
	     				 window.location.reload();
	     			},3000)
		 	})

	};

 // Status Active an InActive
  $(document).on('click','#StatusInActive',function(){

   		var link = $(this).data('link');
   		
   		axios.post(link)
   			.then(function(response){
		   				toastr.success('Slider InActive Successfully!');
		   				setTimeout(function(){
	     				 window.location.reload();
	     			 },3000)
	   			})
	   			.catch(function(error){
	   				 toastr.warning('Slider InActive Failed!');
	   			})
   });
   $(document).on('click','#StatusActive',function(){
   		var link = $(this).data('link');
   		axios.post(link)
   		.then(function(response){
   			toastr.success('Slider Active Successfully!');
   			setTimeout(function(){
	     				 window.location.reload();
	     			},3000)
   		})
   		.catch(function(error){
   			toastr.warning('Slider Active Failed!');
   		})
   });




});


</script>



<!-- 
  1. Data Update Problem.
  2. Page load (Active+inactive);
-->
@endsection