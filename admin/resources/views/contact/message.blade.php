@extends('layouts.app');
@section('content')

<div class="row preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>

<div class="row MessageWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allMessage d-none">
	<div class="card">
	  <div class="card-body">
        <h4 class="card-title">All Message</h4>
        <p class="card-description"> All Message Data is Showing</p>
       <div class="table-responsive">
				<table class="table table-dark table-bordered" id="myTable">
					<thead>
						  <th>ID: </th>
						  <th>Name: </th>
						  <th>Email: </th>
						  <th>Subject: </th>
						  <th>Status: </th>
						  <th>Delete: </th>
					</thead>
					 <tbody>
							@if($Messages->count() == null)
							
									<div class="text-center p-5">
										<h3>Message Data Empty.</h3>
									</div>
							
							@else
							@foreach($Messages as $Message)
								<tr>
							 		<td>{{$Message->id}}</td>
							 		<td>{{$Message->name}}</td>
							 		 <td>{{$Message->email}}</td>
							 		 <td>{{$Message->subject}}</td>
							 		 	<td>
							 		 		@if($Message->status == 0)
									 			<span class="btn btn-danger">Pending</span>
									 		@else
									 			<span class="btn btn-success">Complete</span>
									 		@endif
							 		 </td>
							 			<td>
							 				@if($Message->status == 0)
							 						<button data-link="{{route('message.status',['id'=>$Message->id]) }}" class="btn btn-info btn-icon btn-rounded" id="StatusActive"><i class="mdi mdi-thumb-up-outline"></i></button>
							 				@else
							 						<button data-link="{{route('message.status',['id'=>$Message->id]) }}" class="btn btn-danger btn-icon btn-rounded" id="StatusInActive"><i class="mdi mdi-thumb-down-outline"></i></button>
							 				@endif
							 				<button class="btn btn-success btn-icon btn-rounded" id="showMessageBtn" data-link="{{route('message.show',['id'=>$Message->id]) }}" title="Message Show {{$Message->id}}">
											    <i class="mdi mdi-open-in-new"></i>
											 </button> 
								 			<button class="btn btn-danger btn-icon btn-rounded" id="deleteMessageBtn"  data-id="{{$Message->id}}"  title="Message Delete {{$Message->id}}">
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
<div class="modal fade" id="showMessages" tabindex="-1" aria-labelledby="showMessage" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>Message  Data</h5>
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
								 		<th>Message: </th>
								 		<td id="message"></td>
								 	</tr> 
							 		<tr>
							 			<th>Work Link: </th>
							 			<td><a target="_blank" id="work_link"></a></td>
							 		</tr>  
							 </tbody>
						</table>
					</div>
       
      </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="DeleteMessages" tabindex="-1" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title text-center">Are You Sure Delete Your Message Item</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <input type="hidden" name="" id="del_type_id">
        <button type="button" class="btn btn-danger"  id="MessageDeleteSubmit">Delete</button>
      </div>

    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
	 $(document).ready(function(){
	 	// Get Message
		 	 getMessage();
		  function getMessage(){
		  	axios.get('/message')
		  	 .then(function(response){
		  	 		 if(response.status == 200){
			  	 		 	$(".preloader").addClass('d-none');
			  	 		 	$(".allMessage").removeClass('d-none');
		  	 		 }
		  	 		 else{
		  	 		 	  $(".preloader").addClass('d-none');
			  	 		 	$(".MessageWrong").removeClass('d-none');
		  	 		 }
		  	 })
		  	 .catch(function(error){
		  	 	   $(".preloader").addClass('d-none');
			  	 	 $(".MessageWrong").removeClass('d-none');
		  	 })
		  	}
      // Show Message
     	$(document).on('click','#showMessageBtn', function() {
     	    let link = $(this).data('link'); 
     	    $('#showMessages').modal('show');
     	    
  		    axios.post(link)

			     .then(function(response){
							if(response.status == 200){
							   	 	$(".table-responsive").removeClass('d-none');
			 	  					$(".modelShowLoader").addClass('d-none');

			               let data = response.data;
								     $('#message').text(data.message);
								     $('#work_link').text(data.link);
								     $('#work_link').attr('href', data.link);
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

     	// Delete Message
		  $(document).on('click','#deleteMessageBtn',function(){
		  		let id = $(this).data('id');
		  		$('#DeleteMessages').modal('show');
		  	    $('#del_type_id').val(id);
		  });
		  $('#MessageDeleteSubmit').click(function(){
		  		let deleteID = $('#del_type_id').val();
         let link = 'message/delete/'+deleteID;
		  		axios.post(link)

		  		 .then(function(response){
			  		 	if(response.status == 200){
			  		 		console.log(response);
				     		 $("#DeleteMessages").modal('hide');

					 			if(response.data == 1){
						     		 toastr.success("Item Deleted Success !");
						     		 window.location.href = '/message';
					 			 }
					 			 else{
					 				toastr.error("Item Deleted Failed !");
					 			}
					 		}
					 	 else{
					 		    $("#DeleteMessages").modal('hide');
				     	    toastr.error("Something Went Wrong!");
					 	  }

		  		 })
		  		 .catch(function(error){
		  		 	console.log(error);
				     	 $("#DeleteMessages").modal('hide');
				     	 toastr.error("Something Went Wrong!");
				     	 // window.location.href = '/message';
		  		 })
		  });

		  // Status Active an InActive
		  $(document).on('click','#StatusInActive',function(){
		   		let link = $(this).data('link');
		   		axios.post(link)
	   			.then(function(response){
	   				console.log(response);
			   			toastr.success('Item is Pending!');
			   			setTimeout(function(){
			   				window.location.href = '/message';
			   			},2000)
		   			})
		   		.catch(function(error){
		   			console.log(error);
		   				 toastr.warning('Item Pending Failed!');
		   		   })
		   });
		   $(document).on('click','#StatusActive',function(){
		   		let link = $(this).data('link');
		   		// alert(link);
		   		axios.post(link)
		   		.then(function(response){
		   			console.log(response);
		   			toastr.success('Item is Complete!');
		   			setTimeout(function(){
		   				window.location.href = '/message';
		   			},2000)
		   		})
		   		.catch(function(error){
		   			console.log(error);
		   			toastr.warning('Item Complete Failed!');
		   		})
		   });

		  });

</script>
@endsection