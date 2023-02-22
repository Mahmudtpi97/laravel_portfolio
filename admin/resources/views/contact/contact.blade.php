@extends('layouts.app');
@section('content')

<div class="row preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>

<div class="row contactWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allContact d-none">
	<div class="card">
	  <div class="card-body">
        <h4 class="card-title">All contact</h4>
        <p class="card-description"> All contact Data is Showing</p>
       <div class="table-responsive">
				<table class="table table-dark table-bordered" id="myTable">
					<thead>
						  <th>ID: </th>
						  <th>Email: </th>
						  <th>Phone: </th>
						  <th>Website: </th>
						  <th>Address: </th>
						  <th>Action: </th>
					</thead>
					 <tbody>
							@if($contacts->count() == null)
								<div class="text-center p-5">
									<h3>contact Data Empty.</h3>
								</div>
							
							@else
							@foreach($contacts as $contact)
								<tr>
							 		<td>{{$contact->id}}</td>
							 		<td>{{$contact->mail}}</td>
							 		<td>{{$contact->phone}}</td>
							 		<td>{{$contact->website}}</td>
							 		<td>{!!$contact->address!!}</td>
							 		<td>
							 			<button class="btn btn-primary btn-icon btn-rounded" id="editContactBtn" data-link="{{route('contact.edit',['id'=>$contact->id])}}"  title="contact Edit {{$contact->id}}">
							 				<i class="mdi mdi-table-edit"></i>
							 			</button>
							 			<button class="btn btn-danger btn-icon btn-rounded" id="deleteContactBtn"  data-id="{{$contact->id}}"  title="contact Delete {{$contact->id}}">
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
<div class="modal fade" id="editContacts" tabindex="-1" aria-labelledby="editContact" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Contact Item Edit</h5>
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
		                 <label for="mail">Mail: </label>
		                 <input type="email" class="form-control" id="mail" name="mail" placeholder="Contact Mail" value="{{old('mail')}}">
		              </div>
		              <div class="form-group">
		                 <label for="phone">Phone: </label>
		                 <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact Phone" value="{{old('phone')}}">
		              </div>
		              <div class="form-group">
		                 <label for="website">Website: </label>
		                 <input type="url" class="form-control" id="website" name="website" placeholder="Contact Website" value="{{old('website')}}">
		              </div>
		              <div class="form-group">
		                 <label for="address">Address: </label>
		                 <textarea type="text" class="form-control" id="address" name="address" placeholder="Contact Address">{{old('website')}} </textarea>
		              </div>
		              <input type="hidden" id="editContactID">
		              <button type="submit" class="btn btn-primary mr-2" id="contactUpdate">Submit</button>
		              <a href="{{url('contacts')}}" class="btn btn-dark">Cancel</a>
			    </div>
			</div>
      </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="DeleteContacts" tabindex="-1" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title text-center">Are You Sure Delete Your contact Item</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <input type="hidden" name="" id="del_type_id">
        <button type="button" class="btn btn-danger"  id="contactDeleteSubmit">Delete</button>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
 <script>
 	$(document).ready(function(){
 		getContact();
 		function getContact(){
 			axios.get('contacts')
 			.then(function(response){
 				 if(response.status == 200){
 				 	 $(".preloader").addClass('d-none');
			  	     $(".allContact").removeClass('d-none');
 				 }
 				 else{
 				 	$(".preloader").addClass('d-none');
 				 	$(".contactWrong").removeClass('d-none');

 				 }
 			})
 			.catch(function(response){

 			})
 		}
 		// Edit Contact
 		$(document).on('click','#editContactBtn',function(){
 				let link = $(this).data('link');
 				$("#editContacts").modal('show');
 				axios.post(link)
 				.then(function(response){
 					 if(response.status == 200){
 					 	 $(".modelEditLoader").addClass('d-none');
			  	         $(".modalEdit").removeClass('d-none');

			  	         let data = response.data;

			  	      		$('#editContactID').val(data.id);
			  	       		$('#mail').val(data.mail);
			  	         	$('#phone').val(data.phone);
			  	         	$('#website').val(data.website);
			  	         	$('#address').val(data.address);
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
 		// Update Function
 		 $("#contactUpdate").click(function(){

 		 	 let id 	 =$('#editContactID').val();
  	         let mail 	 =$('#mail').val();
  	         let phone 	 =$('#phone').val();
  	         let website =$('#website').val();
  	         let address =$('#address').val();
  	         if(mail.length == 0){
  	         	toastr.error("Mail is Required !");
  	         } else if(phone.length == 0){
  	         	toastr.error("Phone is Required !");
  	         }else if(website.length == 0){
  	         	toastr.error("Website is Required !");
  	         }else if(address.length == 0){
  	         	toastr.error("Address is Required !");
  	         }
  	         else{
  	         	axios.post('contact/update/'+id,{
	  	         	mail:mail,
	  	         	phone:phone,
	  	         	website:website,
	  	         	address:address
	  	         })
	  	         .then(function(response){
	  	         	if(response.status == 200){
	  	         		$("#editContacts").modal('hide');
	  	         		if (response.data == 1) {
	  	         			toastr.success("Address Update Success !");
	  	         			setTimeout(function(){
	  	         				 window.location.reload();
	  	         			},3000)
	  	         		}
	  	         		else{
	  	         			toastr.error("Address Update Failed !");
	  	         		}
	  	         	}
	  	         	else{
	  	         		toastr.error("Something Went Wrong!!");
	  	         	}
	  	         })
	  	         .catch(function(error){
	  	         	$("#editContacts").modal('hide');
	  	         	toastr.error("Something Went Wrong!!");
  	         			setTimeout(function(){
  	         				 window.location.reload();
  	         			},3000)
	  	         })
  	         }
 		 });
 		 // Delete Function 
 		 $(document).on('click','#deleteContactBtn',function(){
 		 	 let id = $(this).data('id');
 		 	 $('#del_type_id').val(id);
 			 $("#DeleteContacts").modal('show');
 		 })
 		 $('#contactDeleteSubmit').click(function(){
 		 	let deleteID = $('#del_type_id').val();
 		 	axios.post('contact/delete/'+deleteID)
 		 	.then(function(response){
 		 		console.log(response);
 		 		if(response.status == 200){
		     		 $("#DeleteContacts").modal('hide');
			 			if(response.data == 1){
				     		 toastr.success("Address Item Deleted Success !");
				     		 setTimeout(function(){
				     		   	 window.location.reload()
				     		 },3000)
			 			 }
			 			 else{
			 				 toastr.error("Address Item Deleted Failed !");
			 			}
			 		}
			 	 else{
			 		  $("#DeleteContacts").modal('hide');
		     	      toastr.error("Something Went Wrong!");
			 	  }
 		 	})
 		 	.catch(function(error){
 		 		$("#DeleteContacts").modal('hide');
				toastr.error("Something Went Wrong!");
	     		 setTimeout(function(){
	     		   	 window.location.reload()
	     		 },3000)
 		 	})
 		 })

 	})
 </script>
@endsection