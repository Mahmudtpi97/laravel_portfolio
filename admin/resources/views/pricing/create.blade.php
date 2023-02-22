@extends('layouts.app')
@section('content')
   <div class="row">
       <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Pricing Item</h4>
            <p class="card-description"> Pricing Item </p>

						<div class="PricingCreate">
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
	                <textarea type="text" class="form-control editor" id="editor" name="item" placeholder="Overly Description "></textarea>
	              </div>

	              <div class="form-group">
	              	<div class="form-check form-check-primary">
	                    <label class="form-check-label">
	                      <input type="checkbox" class="form-check-input" checked="" value="1" name="status" id="status"> Status <i class="input-helper"></i></label>
	                      <small class="text-lowercase text-sm-left">Click the checkbox and active this item.</small>
	                  </div>
	              </div>	

	              <button type="submit" class="btn btn-primary mr-2" id="CreatePricing">Submit</button>
	              <a href="{{url('pricings')}}" class="btn btn-dark">Cancel</a>
				         
          </div>
        </div>

      </div>
   </div>

@endsection
@section('scripts')
  <script>
  	  $(document).ready(function(){

  	  		// Services Data Add 
			  	  $("#CreatePricing").click(function(){
			  	  		let price    					= $("#price").val();
			  	  		let price_duration   	= $("#price_duration").val();
			  	  		let title   					= $("#title").val();
			  	  		let btn 							= $("#btn").val();
			  	  		let btn_link  				= $("#btn_link").val();
			  	  		let item							= $("#editor").val();
			  	  		let status						= $("#status").val();

              addPrice(price,price_duration,title,btn,btn_link,item,status);
            });
			 function addPrice(price,price_duration,title,btn,btn_link,item,status){

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
					  	  		axios.post('{{route('pricing.create_confirm')}}',{
					  	  			 price:price,
					  	  			 price_duration:price_duration,
					  	  			 title:title,
					  	  			 btn:btn,
					  	  			 btn_link:btn_link,
					  	  			 item:item,
					  	  			 status:status,
					  	  			  headers: {
											        'Content-Type': 'multipart/form-data'
											     }
					  	  		})
					  	  		 .then(function(response){
					  	  		 	console.log(response);
					  	  		 		 if(response.status ==200){
					  	  		 		 	 if(response.data == 1){
						  	  		 		  	toastr.success('Pricing Table Create Successfully!')
						  	  		 		  	 window.location.href = '/pricings';
						  	  		 		  }
						  	  		 		  else{
						  	  		 		  	toastr.error('Pricing Table Create Failed!')
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
			  	  };


  	  })



 </script>
@endsection