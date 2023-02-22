@extends('layouts.app')
@section('content')
   <div class="row">
       <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Service Item</h4>
            <p class="card-description"> Create Service </p>
						<div class="ServiceCreate">
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

		              <button type="submit" class="btn btn-primary mr-2" id="ServicesCreate">Submit</button>
		              <a href="{{url('services')}}" class="btn btn-dark">Cancel</a>

            </div>

          </div>
        </div>

      </div>
   </div>

@endsection
@section('scripts')
  <script>
  	  $(document).ready(function(){
  	  		// Services Data Add 
			  	  $("#ServicesCreate").click(function(){
			  	  		let icon  = $("#icon").val();
			  	  		let title = $("#title").val();
			  	  		let description = $("#description").val();
			  	  		let status = $("#status").val();

			  	  		 if(icon.length == 0){
						  	 		toastr.error("Icon is Required !");
						  	 }else if(title.length == 0){
						  	 		toastr.error("Title is Required !");
						  	 }else if(description.length == 0){
						  	 		toastr.error("Description is Required !");
						  	 }
						  	 else{
					  	  		axios.post('{{route('service.create_confirm')}}',{
					  	  			 icon:icon,
					  	  			 title:title,
					  	  			 description:description,
					  	  			 status:status
					  	  		})
					  	  		 .then(function(response){
					  	  		 		 if(response.status ==200){
					  	  		 		 	 if(response.data == 1){
						  	  		 		  	toastr.success('Service Create Successfully!')
						  	  		 		  	 window.location.href = '/services';
						  	  		 		  }
						  	  		 		  else{
						  	  		 		  	toastr.error('Service Create Failed!')
						  	  		 		  }
					  	  		 		 }
					  	  		 		 else{
					  	  		 		 	 toastr.error('Something Went Wrong!')
					  	  		 		 }
					  	  		 })
					  	  		 .catch(function(error){
					  	  		 	  toastr.error('Something Went Wrong!')
					  	  		 })
					  	  	}
			  	  });


  	  })


 </script>
@endsection