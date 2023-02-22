@extends('layouts.app')
@section('content')
   <div class="row">
       <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Porfolio Item</h4>
            <p class="card-description"> Porfolio Create </p>

						<div class="ServiceCreate">
		             <div class="tag-area mb-4">
			              	<h4 class="card-title text-success">Portfolio Tab Item:</h4>
			              	<div class="form-group">
				                <label for="tab_title">Tab Title: </label>
				                 <input type="text" class="form-control" id="tab_title" name="tab_title" placeholder="Ex:Web Design">
				            </div>
				            <div class="form-group">
				                <label for="tab_filter">Tab Filter:</label>
				                 <input type="text" class="form-control" id="tab_filter" name="tab_filter" placeholder="Ex: web-design">
				                 <small class="text-warning">Tab Filter name must be one</small>
				                 <br>
				                 <small class="text-danger">Tab Filter && Item Class name must be same</small>
				            </div>
				          </div>
				          <div class="item-area mt-5">
			              	<h4 class="card-title text-success">Portfolio Item:</h4>
				              <div class="form-group">
				                <label for="item_class">Item Class: </label>
				                <input type="text" class="form-control" id="item_class" name="item_class" placeholder="Ex: web-design web-dev ">
				                <small class="text-warning">Item class used by multiple</small>
				                 <br>
				                <small class="text-danger">Tab Filter && Item Class name must be same</small>
				              </div>
				              <div class="form-group">
				                <label for="img_title">Overly Title: </label>
				                <input type="text" class="form-control" id="overly_title" name="img_title" placeholder="Overly Title ">
				              </div>
				              <div class="form-group">
				                <label for="img_short_des">Overly Description: </label>
				                <textarea type="text" class="form-control" id="overly_des" name="img_short_des" placeholder="Overly Description "></textarea>
				              </div>
				              <div class="form-group">
				                <label for="link">Site Link: </label>
				                <input type="url" class="form-control" id="link" name="link" placeholder="Site URL">
				              </div>

				              <div class="form-group">
				                <label for="portfolio_img">Portfolio Image: </label>
				                <input type="file" class="file-upload-default" id="portfolio_img" name="portfolio_img" hidden>
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

				              <button type="submit" class="btn btn-primary mr-2" id="CreatePortfolio">Submit</button>
				              <a href="{{url('portfolios')}}" class="btn btn-dark">Cancel</a>
				          </div>
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
			  	  $("#CreatePortfolio").click(function(){
			  	  		let tab_title    = $("#tab_title").val();
			  	  		let tab_filter   	= $("#tab_filter").val();

			  	  		let item_class   	= $("#item_class").val();
			  	  		let overly_title 	= $("#overly_title").val();
			  	  		let overly_des  	= $("#overly_des").val();
			  	  		let portfolio_img	= $("#portfolio_img")[0].files[0];
			  	  		let link					= $("#link").val();
			  	  		let status       	= $("#status").val();
			  	  		// alert(portfolio_img);

              addPortfolio(tab_title,tab_filter,item_class,overly_title,overly_des,portfolio_img,link,status);
            });
			  	  function addPortfolio(tab_title,tab_filter,item_class,overly_title,overly_des,portfolio_img,link,status){
						  	 if(tab_filter.length == 0){
						  	 		toastr.error("Tab Filter is Required !");
						  	 }else if(item_class.length == 0){
						  	 		toastr.error("Item Class is Required !");
						  	 }else if(overly_title.length == 0){
						  	 		toastr.error("Overly Title is Required !");
						  	 }else if(overly_des.length == 0){
						  	 		toastr.error("Overly Description is Required !");
						  	 }
						  	 // else if(link.length == 0){
						  	 // 		toastr.error("Site Link is Required !");
						  	 // }
						  	 else if(!portfolio_img){
						  	 		toastr.error("Portfolio Image is Required !");
						  	 }
						  	 else if(!(portfolio_img.type == 'image/jpeg' || portfolio_img.type == 'image/png')){
						  	 		toastr.error("Portfolio Image must be jpg or png !");
						  	 }

						  	 else{
						  	 	     let formData = new FormData();

						  	 	      formData.append('tab_title',tab_title);
						  	 	      formData.append('tab_filter',tab_filter);
						  	 	      formData.append('item_class',item_class);
						  	 	      formData.append('img_title',overly_title);
						  	 	      formData.append('img_short_des',overly_des);
						  	 	      formData.append('portfolio_img',portfolio_img);
						  	 	      formData.append('link',link);
						  	 	      formData.append('status',status);

					  	  		axios.post('{{route('portfolio.create_confirm')}}',formData,{
					  	  			 headers: {
											        'Content-Type': 'multipart/form-data'
											     }
					  	  		})
					  	  		 .then(function(response){
					  	  		 	console.log(response);
					  	  		 		 if(response.status ==200){
					  	  		 		 	 if(response.data == 1){
						  	  		 		  	toastr.success('Portfolio Item Create Successfully!')
						  	  		 		  	 window.location.href = '/portfolios';
						  	  		 		  }
						  	  		 		  else{
						  	  		 		  	toastr.error('Portfolio Item Create Failed!')
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