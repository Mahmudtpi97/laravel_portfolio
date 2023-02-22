@extends('layouts.app');
@section('content')

<div class="row preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>
<div class="row serviceWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allServices d-none">
	<div class="card">
	  <div class="card-body">
	        <h4 class="card-title">All Services</h4>
	        <p class="card-description"> All Services Data</p>
	        <div class="table-responsive">
				<table class="table table-dark table-bordered" id="myTable">
					<thead>
						  <th>ID: </th>
						  <th>Icon: </th>
						  <th>Title: </th>
						  <th>Description: </th>
						  <th>Status: </th>
						  <th>Action: </th>
					</thead>
					 <tbody>
							@if($services->count() == null)
								<div class="text-center p-5">
									<h3>service Data Empty.</h3>
								</div>
							@else
							@foreach($services as $service)
								<tr>
							 		<td>{{$service->id}}</td>
							 		<td>{{$service->icon}}</td>
							 		<td>{{$service->title}}</td>
							 		 <td>{{$service->description}}</td>
							 		 <td>
							 			@if($service->status == 1)
							 			   <label class="badge badge-success btn-icon btn-rounded">Active</label>
							 			@else
							 			  <label class="badge badge-danger btn-icon btn-rounded">InActive</label>
							 			@endif
							 		</td>
							 		 <td class="d-flex justify-content-between">

							 		 	 @if($service->status != 1)
								 			<button data-link="{{route('service.activeStatus',['service'=>$service->id] )}}" class="btn btn-info btn-icon btn-rounded" title="Service Active" id="StatusActive"><i class="mdi mdi-thumb-up-outline"></i></button>
								 		@else
								 			<button data-link="{{route('service.activeStatus',['service'=>$service->id] )}}" class="btn btn-danger btn-icon btn-rounded" title="Service InActive" id="StatusInActive"><i class="mdi mdi-thumb-down-outline"></i></button>
								 		@endif

							 		 	<button class="btn btn-primary btn-icon btn-rounded" id="editServiceBtn" data-link="{{route('service.edit',['id'=>$service->id])}}"  title="Service Edit {{$service->id}}">
								 				<i class="mdi mdi-table-edit"></i>
								 			</button>
								 			<button class="btn btn-danger btn-icon btn-rounded" id="deleteServiceBtn" data-id="{{$service->id}}"  title="Service Delete {{$service->id}}">
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
<div class="modal fade" id="editService" tabindex="-1" aria-labelledby="editService" aria-hidden="true">
   <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
       <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Service Data Edit</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	            <div class="modelServiceLoader text-center">
					  <img src="{{asset('images/loader.gif') }}" alt="">
				 </div>
				<div class="modelServiceWrong d-none">
						<div class="text-center p-5">
							<h3>Something Went Wrong !</h3>
						</div>
				</div>
				<div class="ServiceEdit d-none">
					 <div class="form-group">
		                <label for="title">Icon Name: </label>
		                <input type="text" class="form-control" id="icon" name="icon" placeholder="Ex: fa fa-line-chart" value="{{old('icon')}}">
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
		              	<div class="form-check form-check-primary">
		                    <label class="form-check-label">
		                      <input type="checkbox" class="form-check-input" checked="" value="1" name="status" id="status"> Status <i class="input-helper"></i></label>
		                      <small class="text-lowercase text-sm-left">Click the checkbox and active the Slider.</small>
		                  </div>
		              </div>	

		              <input type="hidden" name="" id="editserviceID">
		              <button type="submit" class="btn btn-primary mr-2" id="serviceUpdate">Submit</button>

		        </div>
	       </div>
        </div>
   </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="Deleteservices" tabindex="-1" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title text-center">Are You Sure Delete Your Service Item</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <input type="hidden" name="" id="del_type_id">
        <button type="button" class="btn btn-danger"  id="serviceDeleteSubmit">Delete</button>
      </div>

    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
	$(document).ready(function(){
	   // Show Service Data
		getService()
	    function getService(){
			axios.get('services')
			 .then(function(response){
			 	if(response.status == 200){
			 		$('.allServices').removeClass('d-none');
			 		$('.preloader').addClass('d-none');
			 	}
			 	else{
			 		$('.serviceWrong').removeClass('d-none');
			 		$('.preloader').addClass('d-none');
			 	 }
			 })
			 .catch(function(error){
			 		$('.serviceWrong').removeClass('d-none');
			 		$('.preloader').addClass('d-none');
			 })
		}
	   // Edit Service
		$(document).on('click','#editServiceBtn',function(){
			let link =$(this).data('link');
			$('#editService').modal('show');

			axios.post(link)
			.then(function(response){
					if(response.status == 200){
						$(".modelServiceLoader").addClass('d-none');
				  	    $(".ServiceEdit").removeClass('d-none');

				  	    let data = response.data;
				  	  		$('#editserviceID').val(data.id);
				  	  		$('#icon').val(data.icon);
				  	  		$('#title').val(data.title);
				  	  		$('#description').val(data.description);
				  	  		$('#status').val(data.status);
					}
					else{
						$(".modelServiceLoader").addClass('d-none');
				  	$(".modelServiceWrong").removeClass('d-none');
					}
				
			})
			.catch(function(error){
				 $(".modelServiceLoader").addClass('d-none');
				 $(".modelServiceWrong").removeClass('d-none');
			})
		});
		// serviceUpdate Btn Click
		$("#serviceUpdate").click(function(){
		  // Show the loading spinner
		  $("#serviceUpdate").html(" <div class='spinner-border' role='status'> </div>");

		  // Get the values from the form fields
		  let id = $('#editserviceID').val();
		  let icon = $('#icon').val();
		  let title = $('#title').val();
		  let description = $('#description').val();
		  let status = $('#status').val();
		  // Call the updateService function and pass in the values
		  updateService(id,icon, title, description, status);
		});

		// Update Service Function
		function updateService(id,icon, title, description, status) {
		  // Make an Axios call to the server
			if(icon.length == 0){
		  	 	   toastr.error("Icon is Required !");
		  	 }else if(title.length == 0){
		  	 	   toastr.error("Title is Required !");
		  	 }else if(description.length == 0){
		  	 	   toastr.error("Description is Required !");
		  	 }
		  	 else{
				  axios.post('service/update/'+id,{
					  	  icon: icon,
					      title: title,
					      description: description,
					      status: status
					  })
				   .then(function(response){
				   		if(response.status == 200){
				   			 $("#serviceUpdate").html("Update");
							   $('#editService').modal('hide');
							   setTimeout(function(){ 
                    window.location.reload();
                },3000)
							
								 	if(response.data == 1){
										toastr.success("About Update Success !");
									}
									else{
											toastr.error("About Update Failed !");
									}
					   		}
						 else{
								toastr.error("Something Went Wrong!");
						  }
				   })

				   .catch(function(error){
				   	    $('#editService').modal('hide');
				   	   toastr.error("Something Went Wrong!");
				   	   setTimeout(function(){ 
                      window.location.reload();
                  },3000)
				   })
				}
			 }
	    // Edit Service
		$(document).on('click','#deleteServiceBtn',function(){
			let id =$(this).data('id');
			$('#del_type_id').val(id);
			$("#Deleteservices").modal('show');
		})
		$('#serviceDeleteSubmit').click(function(){
			let deleteId = $("#del_type_id").val();
			deleteService(deleteId);
		})
	    // Delete Service Function
	    function deleteService(deleteId){
	    	let link ='service/delete/'+deleteId;
	    	axios.post(link)
	    	 .then(function(response){
	    	 	   if(response.status == 200){
		     		  $("#Deleteservices").modal('hide');
			 			if(response.data == 1){
				     		 toastr.success("Service Item Deleted Success!");
				     		 setTimeout(function(){ 
                      window.location.reload();
                  },2000)
			 			 }
			 			 else{
			 				toastr.error("Service Item Deleted Failed!");
			 			}
				 	}
			 		else{
			 			$("#Deleteservices").modal('hide');
		     	        toastr.error("Something Went Wrong!");
			 		}
	    	 })
	    	 .catch(function(error){
	    	 	 $("#Deleteservices").modal('hide');
		     	 toastr.error("Something Went Wrong!");
	    	 })
	    };

	    // Service Status 
	    // Active Status
	    $(document).on('click','#StatusActive',function(){
	    		let link = $(this).data('link');
	    		axios.post(link)
	    		.then(function(response){

	    			 if(response.status == 200){
   			          toastr.success('Slider Active Successfully!');
   			          setTimeout(function(){ 
                      window.location.reload();
                  },3000)
	    			 	}
	    			 else{
	    			 	toastr.error('Slider Active Failed!');
	    			  }
	    		})
	    		.catch(function(response){
	    				toastr.error('Slider Active Failed!');
	    		})

	    });
	    // InActive Status
	    $(document).on('click','#StatusInActive',function(){
	    		let link = $(this).data('link');
	    		axios.post(link)
	    		.then(function(response){

	    			 if(response.status == 200){
   			          toastr.success('Slider InActive Successfully!');
   			          setTimeout(function(){ 
                      window.location.reload();
                  },3000)
	    			 	}
	    			 else{
	    			 	toastr.error('Slider InActive Failed!');
	    			  }
	    		})
	    		.catch(function(response){
	    				toastr.error('Slider InActive Failed!');
	    		})

	    });
	})
</script>
@endsection