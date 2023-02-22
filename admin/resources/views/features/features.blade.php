@extends('layouts.app');
@section('content')

<div class="row preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>

<div class="row featureWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allfeature d-none">
	<div class="card">
	  <div class="card-body">
        <h4 class="card-title">All feature</h4>
        <p class="card-description"> All feature Data is Showing</p>
       <div class="table-responsive">
				<table class="table table-dark table-bordered" id="myTable">
					<thead>
						  <th>ID: </th>
						  <th>Icon: </th>
						  <th>Title: </th>
						  <th>Status: </th>
						  <th>Image: </th>
					</thead>
					 <tbody>
							@if($features->count() == null)
							
								{{-- <div class="col-md-12"> --}}
									<div class="text-center p-5">
										<h3>feature Data Empty.</h3>
									</div>
								{{-- </div> --}}
							
							@else
							@foreach($features as $feature)
								<tr>
							 		<td>{{$feature->id}}</td>
							 		<td>{{$feature->t_icon}}</td>
							 		<td>{{$feature->title}}</td>
							 		<td><img src="{{$feature->f_image}}" alt="feature_image" class="custom_img"></td>
							 		<td>
							 			@if($feature->status ==1 )
							 			 <label class="badge badge-success btn-icon btn-rounded">Active</label>
							 			 @else
							 			  <label class="badge badge-danger btn-icon btn-rounded">InActive</label>
							 			 @endif
							 		</td>
							 			<td>
							 				@if($feature->status != 1)
									 			<button data-link="{{route('feature.activeStatus',['feature'=>$feature->id] )}}" class="btn btn-info btn-icon btn-rounded" title="feature Active" id="StatusActive"><i class="mdi mdi-thumb-up-outline"></i></button>
									 		@else
									 			<button data-link="{{route('feature.activeStatus',['feature'=>$feature->id] )}}" class="btn btn-danger btn-icon btn-rounded" title="feature InActive" id="StatusInActive"><i class="mdi mdi-thumb-down-outline"></i></button>
									 		@endif

							 				<button class="btn btn-success btn-icon btn-rounded" id="showfeatureBtn" data-featureid="{{$feature->id}}" title="Feature Show {{$feature->id}}">
											    <i class="mdi mdi-open-in-new"></i>
											  </button> 
								 			<button class="btn btn-primary btn-icon btn-rounded" id="editfeatureBtn" data-link="{{route('feature.edit',['id'=>$feature->id])}}"  title="feature Edit {{$feature->id}}">
								 				<i class="mdi mdi-table-edit"></i>
								 			</button>
								 			<button class="btn btn-danger btn-icon btn-rounded" id="deletefeatureBtn"  data-id="{{$feature->id}}"  title="feature Delete {{$feature->id}}">
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
<!--Show Modal -->
<div class="modal fade" id="showFeatures" tabindex="-1" aria-labelledby="showFeature" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>feature All Data</h5>
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
										 <th>Id:</th>
								 		 <td id="f_id"></td>
								 	</tr>
								 	<tr>
								 		<th>Icon: </th>
								 		<td id="icon"></td>
								 	</tr> 
								 	<tr>
								 		<th>Title: </th>
								 		<td id="title"></td>
								 	</tr> 
							 		<tr>
							 			<th>Description: </th>
							 			<td id="description"></td>
							 		</tr> 
							 		<tr>
				              <th>Image</th>
				              <td id="f_img"></td>
						        </tr> 
							 </tbody>
						</table>
					</div>
       
      </div>
    </div>
  </div>
</div>
<!--Edit Modal -->
<div class="modal fade" id="editfeatures" tabindex="-1" aria-labelledby="editfeature" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">feature Data Edit</h5>
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
		                <label for="t_icon">Tag Icon: </label>
		                <input type="text" class="form-control" id="t_icon" name="t_icon" placeholder="Ex: fa fa-line-chart" value="{{old('t_icon')}}">
		              </div>
		              <div class="form-group">
		                <label for="title">Title: </label>
		                <input type="text" class="form-control" id="title" name="title" placeholder="Ex: Web Design" value="{{old('title')}}">
		              </div>
		              <h5 id="a"></h5>

		              <div class="form-group">
		                <label for="description">Description: </label>
		                <textarea type="text" class="form-control" id="description" name="description" placeholder="Description">{{old('description')}}</textarea>
		              </div>
		              <div class="form-group">
		                <label for="f_image">Features Image: </label>
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
		                      <small class="text-lowercase text-sm-left">Click the checkbox and active the feature.</small>
		                  </div>
		              </div>	

		              <input type="hidden" name="" id="editfeatureID">
		              <button type="submit" class="btn btn-primary mr-2" id="featureUpdate">Submit</button>
						</div>
      </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="Deletefeatures" tabindex="-1" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title text-center">Are You Sure Delete Your feature Item</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <input type="hidden" name="" id="del_type_id">
        <button type="button" class="btn btn-danger"  id="featureDeleteSubmit">Delete</button>
      </div>

    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
	 $(document).ready(function(){
		 	 getFeature();
		  function getFeature(){
		  	axios.get('features')
		  	 .then(function(response){
		  	 		 if(response.status == 200){
			  	 		 	$(".preloader").addClass('d-none');
			  	 		 	$(".allfeature").removeClass('d-none');
		  	 		 }
		  	 		 else{
		  	 		 	  $(".preloader").addClass('d-none');
			  	 		 	$(".featureWrong").removeClass('d-none');
		  	 		 }
		  	 })
		  	 .catch(function(error){
		  	 	   $(".preloader").addClass('d-none');
			  	 	 $(".featureWrong").removeClass('d-none');
		  	 })
		  };
		  // Show Features
     	$(document).on('click','#showfeatureBtn', function() {
     	    let id = $(this).data('featureid');

  		  axios.get('feature/show/'+id)

				  .then(function(response){
						    $('#showFeatures').modal('show');

								if(response.status == 200){
								   	 	$(".table-responsive").removeClass('d-none');
				 	  					$(".modelShowLoader").addClass('d-none');

				              let data = response.data;
									    $('#f_id').text(data.id);
									    $('#icon').text(data.t_icon);
									    $('#title').text(data.title);
									    $('#description').text(data.description);
									    $('#f_img').html("<img src='" + data.f_image + "' alt='Features Image' class='big_img'>");
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
		  // Edit feature
    $(document).on('click','#editfeatureBtn',function(){
		  	let link = $(this).data('link');
		  		$('#editfeatures').modal('show');
		  		 axios.post(link)
		  		 .then(function(response){
		  		 		  if(response.status == 200){
		  		 		  	
				  	 		 	$(".modelEditLoader").addClass('d-none');
				  	 		 	$(".modalEdit").removeClass('d-none');

				  	 		 	let data = response.data;


	  	  		     	$("#editfeatureID").val(data.id);
		  	  		 		$('#t_icon').val(data.t_icon);
		  	  		 		$('#editfeatures,#title').val(data.title);
		  	  		 		$('#editfeatures,#description').val(data.description);
			  	 		 }
			  	 		 else{
			  	 		 	  $(".modelEditLoader").addClass('d-none');
				  	 		 	$(".modelEditWrong").removeClass('d-none');
			  	 		 }
		  		 })
		  		 .catch(function(error){
		  		 		  $(".modelEditLoader").addClass('d-none');
				  	 		$(".modelEditWrong").removeClass('d-none');
		  		 })
		  });

		  $('#featureUpdate').click(function(){

	    	   let id          	=  $("#editfeatureID").val();
	    	   let t_icon       =  $("#t_icon").val();
	    	   let title 	   	  =  $("#title").val();
	    	   let description 	=  $("#description").val();
	    	   let f_image = $("#f_image")[0].files[0];

	    	  UpdateFeature(id,t_icon,title,description,f_image);
		  });
		  // Updatefeature();

		  function UpdateFeature(id,t_icon,title,description,f_image){

		  	 if(t_icon.length == 0){
		  	 		toastr.error("Icon is Required !");
		  	 }if(title.length == 0){
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

			  	   axios.post('feature/update/'+id,formData)
							.then(function(response){
									 if(response.status == 200){

											$('#editfeatures').modal('hide');
										 	if(response.data == 1){
												  toastr.success("Feature Update Success !");
												    setTimeout(function(){ 
                                window.location.reload();
                            },3000)
											 }

											else{
													toastr.error("Feature Update Failed !");
											}
									 }
									 else{
											toastr.error("Something Went Wrong!");
									 }

							})
							.catch(function(error){
								  	$('#editfeatures').modal('hide');
										toastr.error("Something Went Wrong!");
										setTimeout(function(){ 
                          window.location.reload();
                      },3000)
							})
				}
		 
		  };

		  // Delete feature
		  $(document).on('click','#deletefeatureBtn',function(){
		  		let id = $(this).data('id');
		  		$('#Deletefeatures').modal('show');
		  	  $('#del_type_id').val(id);
		  });
		  $('#featureDeleteSubmit').click(function(){
		  		let deleteID = $('#del_type_id').val();
		  		featureDelete(deleteID);
		  });
		  function featureDelete(deleteID){
		  		axios.post('feature/delete/'+deleteID)
		  		 .then(function(response){
			  		 	if(response.status == 200){
			  		 			 $("#allfeature").load(window.location + " #allfeature");
					     		 $("#Deletefeatures").modal('hide');
						 			if(response.data == 1){
							     		 toastr.success("Feature Item Deleted Success !");
						 			 }
						 			 else{
						 				toastr.error("Feature Item Deleted Failed !");
						 			}
					 		}
					 		else{
					 			$("#Deletefeatures").modal('hide');
				     	  toastr.error("Something Went Wrong!");
					 		}

		  		 })
		  		 .catch(function(error){
		  		 	   $("#allfeature").load(window.location + " #allfeature");
				     	 $("#Deletefeatures").modal('hide');
				     	 toastr.error("Something Went Wrong!");
		  		 })
		  }
		   // Status Active an InActive
		  $(document).on('click','#StatusInActive',function(){
		   		let link = $(this).data('link');
		   		axios.post(link)
		   			.then(function(response){
		   				    window.location.href = '/features';
				   				toastr.success('Features Item InActive Successfully!');
			   			})
			   		.catch(function(error){
			   				 toastr.warning('Features Item InActive Failed!');
			   				 console.log(error);
			   			})
		   });
		   $(document).on('click','#StatusActive',function(){
		   		let link = $(this).data('link');
		   		// alert(link);
		   		axios.post(link)
		   		.then(function(response){
		   			window.location.href = '/features';
		   			toastr.success('Features Item Active Successfully!');
		   		})
		   		.catch(function(error){
		   			console.log(error);
		   			toastr.warning('Features Item Active Failed!');
		   		})
		   });

	  
	 })


</script>
@endsection