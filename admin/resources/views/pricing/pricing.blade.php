@extends('layouts.app');
@section('content')
<div class="row preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>

<div class="row pricingWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allpricing d-none">
	<div class="card">
	  <div class="card-body">
        <h4 class="card-title">All pricing</h4>
        <p class="card-description"> All pricing Data is Showing</p>
       <div class="table-responsive">
				<table class="table table-dark table-bordered" id="myTable">
					<thead>
						  <th>ID: </th>
						  <th>Price: </th>
						  <th>Tab Duration: </th>
						  <th>Title: </th>
						  <th>Btn: </th>
						  <th>Status: </th>
						  <th>Action: </th>
					</thead>
					 <tbody>
							@if($pricings->count() == null)
								<div class="text-center p-5">
									<h3>Pricing Data Empty.</h3>
								</div>
							
							@else
							@foreach($pricings as $pricing)
								<tr>
							 		<td>{{$pricing->id}}</td>
							 		<td>{{$pricing->price}}</td>
							 		<td>{{$pricing->price_duration}}</td>
							 		<td>{{$pricing->title}}</td>
							 		<td>{{$pricing->btn}}</td>
							 		<td>
							 			@if($pricing->status ==1 )
							 			 <label class="badge badge-success btn-icon btn-rounded">Active</label>
							 			 @else
							 			  <label class="badge badge-danger btn-icon btn-rounded">InActive</label>
							 			 @endif
							 		</td>
							 			<td>
							 				@if($pricing->status != 1)
									 			<button data-id="{{$pricing->id}}" class="btn btn-info btn-icon btn-rounded" title="pricing Active" id="StatusActive"><i class="mdi mdi-thumb-up-outline"></i></button>
									 		@else
									 			<button data-id="{{$pricing->id}}" class="btn btn-danger btn-icon btn-rounded" title="pricing InActive" id="StatusInActive"><i class="mdi mdi-thumb-down-outline"></i></button>
									 		@endif

							 				<button class="btn btn-success btn-icon btn-rounded" id="showPricingBtn" data-link="{{route('pricing.show',['id'=>$pricing->id])}}" title="pricing Show {{$pricing->id}}">
											    <i class="mdi mdi-open-in-new"></i>
											  </button> 
								 			<button class="btn btn-primary btn-icon btn-rounded" id="editPricingBtn" data-link="{{route('pricing.edit',['id'=>$pricing->id])}}"  title="pricing Edit {{$pricing->id}}">
								 				<i class="mdi mdi-table-edit"></i>
								 			</button>
								 			<button class="btn btn-danger btn-icon btn-rounded" id="deletePricingBtn"  data-id="{{$pricing->id}}"  title="pricing Delete {{$pricing->id}}">
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
<div class="modal fade" id="showPricings" tabindex="-1" aria-labelledby="showpricing" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>Pricing Item Data</h5>
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
						 		 <td id="p_id"></td>
						 	</tr>
						 	<tr>
						 		<th>Button Link: </th>
						 		<td id="priceBtn_link"></td>
						 	</tr> 
					 		<tr>
					 			<th>Pricing Item: </th>
					 			<td id="price_item"></td>
					 		</tr> 
					 </tbody>
				</table>
			</div>
       
      </div>
    </div>
  </div>
</div>
<!--Edit Modal -->
<div class="modal fade" id="editPricings" tabindex="-1" aria-labelledby="editpricing" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">pricing Item Edit</h5>
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
			                <label for="price">Price: </label>
			                <input type="text" class="form-control" id="price" name="price" placeholder="Price">
			              </div>
			              <div class="form-group">
			                <label for="price_duration">Price Duration: </label>
			                <input type="text" class="form-control" id="price_duration" name="price_duration" placeholder="Price Duration Time">
			              </div>
			              <div class="form-group">
			                <label for="title">Title: </label>
			                <input type="text" class="form-control" id="title" name="title" placeholder="Pricing Title ">
			              </div>
			              <div class="form-group">
			                <label for="btn">Button Name: </label>
			                <input type="text" class="form-control" id="btn" name="btn" placeholder="Pricing Button ">
			              </div>
			              <div class="form-group">
			                <label for="btn_link">Button Link: </label>
			                <input type="url" class="form-control" id="btn_link" name="btn_link" placeholder="Pricing Button Link">
			              </div>

			              <div class="form-group">
			                <label for="item">Pricing Item: </label>
			                <textarea type="text" class="form-control" id="editor" name="item" placeholder="Overly Description "></textarea>
			              </div>
			              <div class="form-group">
			              	<div class="form-check form-check-primary">
			                    <label class="form-check-label">
			                      <input type="checkbox" class="form-check-input" checked="" value="1" name="status" id="status"> Status <i class="input-helper"></i></label>
			                      <small class="text-lowercase text-sm-left">Click the checkbox and active this item.</small>
			                  </div>
			              </div>	

			              <input type="hidden" name="" id="editPricingID">
			              <button type="submit" class="btn btn-primary mr-2" id="pricingUpdate">Submit</button>
			              <a href="{{url('pricings')}}" class="btn btn-dark">Cancel</a>
				    </div>
			</div>
      </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="DeletePricings" tabindex="-1" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title text-center">Are You Sure Delete Your pricing Item</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <input type="hidden" name="" id="del_type_id">
        <button type="button" class="btn btn-danger"  id="pricingDeleteSubmit">Delete</button>
      </div>

    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
	 $(document).ready(function(){
		 getPricing();
		  function getPricing(){
		  	axios.get('pricings')
		  	 .then(function(response){
		  	 		 if(response.status == 200){
			  	 		 $(".preloader").addClass('d-none');
			  	 		 $(".allpricing").removeClass('d-none');
		  	 		 }
		  	 		 else{
		  	 		 	  $(".preloader").addClass('d-none');
			  	 		 $(".pricingWrong").removeClass('d-none');
		  	 		 }
		  	 })
		  	 .catch(function(error){
		  	 	   $(".preloader").addClass('d-none');
			  	   $(".pricingWrong").removeClass('d-none');
		  	 })
		  };
		 // Show pricings
     	$(document).on('click','#showPricingBtn', function() {
     	    let link = $(this).data('link'); 
  		    axios.post(link)
			  .then(function(response){
			  	console.log(response);
					    $('#showPricings').modal('show');
							if(response.status == 200){
							   	 	$(".table-responsive").removeClass('d-none');
			 	  					$(".modelShowLoader").addClass('d-none');

			                       let data = response.data;

								    $('#p_id').text(data.id);
								    $('#priceBtn_link').text(data.btn_link);
								    $('#price_item').text(data.item.replace(/&lt;\/?[^&gt;]*&gt;/g, ''));

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
     // };
		  // Edit pricing
      $(document).on('click','#editPricingBtn',function(){
		  	   let link = $(this).data('link'); 
		  	   $('#editPricings').modal('show');
		  		axios.post(link)
		  		 .then(function(response){
		  		 		  if(response.status == 200){

				  	 		 	$(".modelEditLoader").addClass('d-none');
				  	 		 	$(".modalEdit").removeClass('d-none');

				  	 		 	let data = response.data;

		  	  		     	    $("#editPricingID").val(data.id);

					  	  		$("#price").val(data.price);
								$("#price_duration").val(data.price_duration);
								$("#title").val(data.title);
								$("#btn").val(data.btn);
								$("#btn_link").val(data.btn_link);
								$("#editor").summernote("code", data.item);
								$("#status").val(data.status);
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

		$('#pricingUpdate').click(function(){

	    	    let id              = $("#editPricingID").val();
	    	    let price    		= $("#price").val();
	  	  		let price_duration  = $("#price_duration").val();
	  	  		let title   		= $("#title").val();
	  	  		let btn 			= $("#btn").val();
	  	  		let btn_link  		= $("#btn_link").val();
	  	  		let item			= $("#editor").val();
	  	  		let status			= $("#status").val();

	    	   updatePrice(id,price,price_duration,title,btn,btn_link,item,status);
		  });

		  function updatePrice(id,price,price_duration,title,btn,btn_link,item,status){

		  	 if(price.length == 0){
		  	 		toastr.error("Price is Required !");
		  	 }else if(price_duration.length == 0){
		  	 		toastr.error("Price Duration is Required !");
		  	 }else if(title.length == 0){
		  	 		toastr.error("Title is Required !");
		  	 }
		  	 else if(btn.length == 0){
		  	 		toastr.error("Button Name is Required !");
		  	 }else if(btn_link.length == 0){
		  	 		toastr.error("Button Link is Required !");
		  	 }else if(item.length == 0){
		  	 		toastr.error("Item is Required !");
		  	 }
		  	 else{
		  	    axios.post('pricing/update/'+id,{
		  	   			 price:price,
		  	  			 price_duration:price_duration,
		  	  			 title:title,
		  	  			 btn:btn,
		  	  			 btn_link:btn_link,
		  	  			 item:item,
		  	  			 status:status
		  	     })
				 .then(function(response){
						 if(response.status == 200){
						 		// $("#allpricing").load(window.location + " #allpricing");
						 		// getPricing();
								$('#editPricings').modal('hide');
								
							 	if(response.data == 1){
									toastr.success("Pricing Item Update Success !");
									window.location.href = '/pricings';
								}

								else{
									toastr.error("Pricing Item Update Failed !");
								 }
						 }
						 else{
								toastr.error("Something Went Wrong!");
						 }

				 })
				 .catch(function(error){
					    // $("#allpricing").load(window.location + " #allpricing");
					  	$('#editPricings').modal('hide');
						toastr.error("Something Went Wrong!");
						window.location.href = '/pricings';
				 })
			  }
		 
		  };

		  // Delete pricing
		  $(document).on('click','#deletePricingBtn',function(){
		  	   let id = $(this).data('id');
		  	    $('#del_type_id').val(id);
		  		$('#DeletePricings').modal('show');
		  });
		  $('#pricingDeleteSubmit').click(function(){
		  		let deleteID = $('#del_type_id').val();
		  		deletePricing(deleteID);
		  });
		  function deletePricing(deleteID){
		  		axios.post('pricing/delete/'+deleteID)
		  		 .then(function(response){
			  		 	if(response.status == 200){
			  		 		console.log(response);
		  		 			 // $("#allpricing").load(window.location + " #allpricing");
				     		 $("#DeletePricings").modal('hide');
					 			if(response.data == 1){
						     		 toastr.success("Pricing Item Deleted Success !");
						     		 window.location.href = '/pricings';
					 			 }
					 			 else{
					 				toastr.error("Pricing Item Deleted Failed !");
					 			}
					 		}
					 	 else{
					 		  $("#DeletePricings").modal('hide');
				     	      toastr.error("Something Went Wrong!");
					 	  }

		  		 })
		  		 .catch(function(error){
		  		 	   // $("#allpricing").load(window.location + " #allpricing");
				     	 $("#Deletepricings").modal('hide');
				     	 toastr.error("Something Went Wrong!");
				     	 console.log(error)
				     	 // window.location.href = '/pricings';
		  		 })
		  };

		   // Status Active an InActive
		  $(document).on('click','#StatusInActive',function(){
		   		let id = $(this).data('id');
		   		axios.post('pricing/activeStatus/',{id:id})

	   			.then(function(response){
	   				    window.location.href = '/pricings';
			   			toastr.success('Pricing Item InActive Successfully!');
		   			})
		   		.catch(function(error){
		   				 toastr.warning('pricing Item InActive Failed!');
		   		   })
		   });
		   $(document).on('click','#StatusActive',function(){
		   		let id = $(this).data('id');
		   		axios.post('pricing/activeStatus/',{id:id})
		   		.then(function(response){
		   			window.location.href = '/pricings';
		   			toastr.success('Pricing Item Active Successfully!');
		   		})
		   		.catch(function(error){
		   			toastr.warning('Pricing Item Active Failed!');
		   		})
		   });

	  
	 })


</script>
@endsection
