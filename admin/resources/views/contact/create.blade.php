@extends('layouts.app')

@section('content')
   <div class="row">
       <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h4 class="card-title">Create Contact Item</h4>
              <p class="card-description"> Create Contact </p>
					   <div class="ContactCreate">
                <form class="forms-sample" id="ContactForm" action=""  method="POST" enctype="multipart/form-data">
                  @csrf

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

		              <button type="submit" class="btn btn-primary mr-2" id="ContactCreate">Submit</button>
		              <a href="{{url('contacts')}}" class="btn btn-dark">Cancel</a>

                </form>

            </div>

          </div>
        </div>

      </div>
   </div>



@endsection
@section('scripts')
  <script>

  	 $('#ContactForm').on('submit',function(e){
	  	  	e.preventDefault();

		  		let mail 		= $('#mail').val();
		  		let phone = $('#phone').val();
		  		let website = $('#website').val();
		  		let address = $('#address').val();

					  if (mail.length == 0) {
					    toastr.error("Mail is required");
					  }else if (phone.length == 0) {
					    toastr.error("Phone is required");
					  }else if (website.length == 0) {
					    toastr.error("Website is required");
					  }else if (address.length == 0) {
					    toastr.error("Address is required");
					  }
					   else{
					   	let formData = new FormData ();
					   	 formData.append('mail',mail);
					   	 formData.append('phone',phone);
					   	 formData.append('website',website);
					   	 formData.append('address',address);

					   	axios.post('{{route('contact.create_confirm')}}',formData)
					   	 .then(function(response){
					   	 	  console.log(response);
					   	 	  if(response.status == 200){
					   	 	  		if(response.data== 1){
					   	 	  				toastr.success('Address Information Create Successfully!')
					   	 	  				setTimeout(function(){
					   	 	  					  window.location.href = '/contacts';
					   	 	  				},3000)
					   	 	  		}
					   	 	  		else{
					   	 	  			toastr.error('Address Information Create Failed!')
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


  	  
 </script>
@endsection