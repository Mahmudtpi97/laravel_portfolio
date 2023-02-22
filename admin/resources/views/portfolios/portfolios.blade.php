@extends('layouts.app');
@section('content')
<div class="row preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>

<div class="row portfolioWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allportfolio d-none">
	<div class="card">
	  <div class="card-body">
        <h4 class="card-title">All Portfolio</h4>
        <p class="card-description"> All Portfolio Data is Showing</p>
       <div class="table-responsive">
				<table class="table table-dark table-bordered" id="myTable">
					<thead>
						  <th>ID: </th>
						  <th>Tab Title: </th>
						  <th>Tab Filter: </th>
						  <th>Item Class: </th>
						  <th>Image: </th>
						  <th>Status: </th>
						  <th>Action: </th>
					</thead>
					 <tbody>
							@if($portfolios->count() == null)
								<div class="text-center p-5">
									<h3>portfolio Data Empty.</h3>
								</div>
							
							@else
							@foreach($portfolios as $portfolio)
								<tr>
							 		<td>{{$portfolio->id}}</td>
							 		<td>{{$portfolio->tab_title}}</td>
							 		<td>{{$portfolio->tab_filter}}</td>
							 		<td>{{$portfolio->item_class}}</td>
							 		<td><img src="{{$portfolio->portfolio_img}}" alt="portfolio_image" class="custom_img"></td>
							 		<td>
							 			@if($portfolio->status ==1 )
							 			 <label class="badge badge-success btn-icon btn-rounded">Active</label>
							 			 @else
							 			  <label class="badge badge-danger btn-icon btn-rounded">InActive</label>
							 			 @endif
							 		</td>
							 			<td>
							 				@if($portfolio->status != 1)
									 			<button data-id="{{$portfolio->id}}" class="btn btn-info btn-icon btn-rounded" title="portfolio Active" id="StatusActive"><i class="mdi mdi-thumb-up-outline"></i></button>
									 		@else
									 			<button data-id="{{$portfolio->id}}" class="btn btn-danger btn-icon btn-rounded" title="portfolio InActive" id="StatusInActive"><i class="mdi mdi-thumb-down-outline"></i></button>
									 		@endif

							 				<button class="btn btn-success btn-icon btn-rounded" id="showPortfolioBtn" data-id="{{$portfolio->id}}" title="Portfolio Show {{$portfolio->id}}">
											    <i class="mdi mdi-open-in-new"></i>
											  </button> 
								 			<button class="btn btn-primary btn-icon btn-rounded" id="editPortfolioBtn" data-id="{{$portfolio->id}}"  title="portfolio Edit {{$portfolio->id}}">
								 				<i class="mdi mdi-table-edit"></i>
								 			</button>
								 			<button class="btn btn-danger btn-icon btn-rounded" id="deletePortfolioBtn"  data-id="{{$portfolio->id}}"  title="portfolio Delete {{$portfolio->id}}">
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
<div class="modal fade" id="showPortfolios" tabindex="-1" aria-labelledby="showportfolio" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>Portfolio Item Data</h5>
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
								 		<th>Overly Title: </th>
								 		<td id="overly_title"></td>
								 	</tr> 
							 		<tr>
							 			<th>Overly Description: </th>
							 			<td id="overly_description"></td>
							 		</tr> 
							 		<tr>
							 			<th>Site Url: </th>
							 			<td id="link"></td>
							 		</tr> 
							 		<tr>
			              <th>Big Image:</th>
			              <td id="p_img" class="img-fluid"></td>
			            </tr> 
							 </tbody>
						</table>
					</div>
       
      </div>
    </div>
  </div>
</div>
<!--Edit Modal -->
<div class="modal fade" id="editPortfolios" tabindex="-1" aria-labelledby="editportfolio" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Portfolio Item Edit</h5>
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
					<div class="tag-area mb-4">
			              	<h4 class="card-title text-success">Portfolio Tab Item:</h4>
			              	<div class="form-group">
				                <label for="tab_title">Tab Title: </label>
				                 <input type="text" class="form-control" id="tab_title" name="tab_title" placeholder="Tab Title">
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
				                <input type="text" class="form-control" id="img_title" name="img_title" placeholder="Overly Title ">
				              </div>

				              <div class="form-group">
				                <label for="overly_des">Overly Description: </label>
				                <textarea type="text" class="form-control" id="overly_des" name="img_short_des" placeholder="Overly Description "></textarea>
				              </div>
				              <div class="form-group">
				                <label for="link">Site Link: </label>
				                <input type="url" class="form-control" id="site_link" name="link" placeholder="Site URL">
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

				              <input type="hidden" name="" id="editPortfolioID">
				              <button type="submit" class="btn btn-primary mr-2" id="PortfolioUpdate">Submit</button>
				              <a href="{{url('portfolios')}}" class="btn btn-dark">Cancel</a>
				    </div>
			</div>
      </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="DeletePortfolios" tabindex="-1" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title text-center">Are You Sure Delete Your Portfolio Item</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <input type="hidden" name="" id="del_type_id">
        <button type="button" class="btn btn-danger"  id="portfolioDeleteSubmit">Delete</button>
      </div>

    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
	 $(document).ready(function(){
		 getPortfolio();
		  function getPortfolio(){
		  	axios.get('portfolios')
		  	 .then(function(response){
		  	 		 if(response.status == 200){
			  	 		 $(".preloader").addClass('d-none');
			  	 		 $(".allportfolio").removeClass('d-none');
		  	 		 }
		  	 		 else{
		  	 		 	  $(".preloader").addClass('d-none');
			  	 		 	$(".portfolioWrong").removeClass('d-none');
		  	 		 }
		  	 })
		  	 .catch(function(error){
		  	 	   $(".preloader").addClass('d-none');
			  	   $(".portfolioWrong").removeClass('d-none');
		  	 })
		  };
		 // Show portfolios
     	$(document).on('click','#showPortfolioBtn', function() {
     	    let id = $(this).data('id'); 
     	    $('#showPortfolios').modal('show');
     	    
  		    axios.post('portfolio/show',{pID:id})

			     .then(function(response){
							if(response.status == 200){
							   	 	$(".table-responsive").removeClass('d-none');
			 	  					$(".modelShowLoader").addClass('d-none');

			                  let data = response.data;
								    $('#p_id').text(data.id);
								    $('#overly_title').text(data.img_title);
								    $('#overly_description').text(data.img_short_des);
								    $('#link').text(data.link);
								    $('#p_img').html("<img src='" + data.portfolio_img + "' alt='Portfolio Image' class='big_img'>");
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
		  // Edit portfolio
      $(document).on('click','#editPortfolioBtn',function(){
		  	   let id = $(this).data('id');
		  	   $('#editPortfolios').modal('show');
		  		axios.post('portfolio/edit/',{pID:id})
		  		 .then(function(response){
		  		 	console.log(response);
		  		 		  if(response.status == 200){
				  	 		 	$(".modelEditLoader").addClass('d-none');
				  	 		 	$(".modalEdit").removeClass('d-none');

				  	 		 	let data = response.data;

		  	  		     	    $("#editPortfolioID").val(data.id);

					  	  		 		$("#tab_title").val(data.tab_title);
							  	  		$("#tab_filter").val(data.tab_filter);
							  	  		$("#item_class").val(data.item_class);
							  	  		$("#img_title").val(data.img_title);
							  	  		$("#overly_des").val(data.img_short_des);
							  	  		// $("#portfolio_img").val(data.portfolio_img);
							  	  		$("#site_link").val(data.link);
							  	  		$("#status").val(data.status);
				  	 		}
			  	 		 else{
			  	 		 	  $(".modelEditLoader").addClass('d-none');
				  	 		  $(".modelEditWrong").removeClass('d-none');
			  	 		 }
		  		 })
		  		 .catch(function(error){
		  		 		console.log(error);
		  		 		  $(".modelEditLoader").addClass('d-none');
				  	 	  $(".modelEditWrong").removeClass('d-none');
		  		 })
		  });

		$('#PortfolioUpdate').click(function(){

	    	    let id            = $("#editPortfolioID").val();
	    	    let tab_title     = $("#tab_title").val();
	  	  		let tab_filter   	= $("#tab_filter").val();

	  	  		let item_class   	= $("#item_class").val();
	  	  		let img_title 		= $("#img_title").val();
	  	  		let overly_des  	= $("#overly_des").val();
	  	  		let portfolio_img	= $("#portfolio_img")[0].files[0];
	  	  		let link					= $("#site_link").val();
	  	  		let status       	= $("#status").val();

	    	   updatePortfolio(id,tab_title,tab_filter,item_class,img_title,overly_des,portfolio_img,link,status);
		  });

		  function updatePortfolio(id,tab_title,tab_filter,item_class,img_title,overly_des,portfolio_img,link,status){

		  	 if(tab_filter.length == 0){
		  	 		toastr.error("Tab Filter is Required !");
		  	 }else if(item_class.length == 0){
		  	 		toastr.error("Item Class is Required !");
		  	 }
		  	 else if(img_title.length == 0){
		  	 		toastr.error("Overly Title is Required !");
		  	 }else if(overly_des.length == 0){
		  	 		toastr.error("Overly Description is Required !");
		  	 }
		  	 else if(!portfolio_img){
		  	 		toastr.error("Portfolio Image is Required !");
		  	 }else if(!(portfolio_img.type == 'image/jpeg' || portfolio_img.type == 'image/png')){
							  toastr.error("Image must be jpg, png format !");
							}
		  	 else{
		  	 	 let formData = new FormData();
		  	 	     formData.append('id',id);
		  	 	     formData.append('tab_title',tab_title);
		  	 	     formData.append('tab_filter',tab_filter);
		  	 	     formData.append('item_class',item_class);
		  	 	     formData.append('img_title',overly_title);
		  	 	     formData.append('img_short_des',overly_des);
		  	 	     formData.append('portfolio_img',portfolio_img);
		  	 	     formData.append('link',link);
		  	 	     formData.append('status',status);

			  	 axios.post('portfolio/update/',formData)
					 .then(function(response){
					 	console.log(response);
							 if(response.status == 200){
							 		$("#allportfolio").load(window.location + " #allportfolio");
							 		getPortfolio();
									$('#editPortfolios').modal('hide');
									
								 	if(response.data == 1){
										toastr.success("Portfolio Item Update Success !");
										window.location.href = '/portfolios';
									}

									else{
										toastr.error("Portfolio Item Update Failed !");
									 }
							 }
							 else{
									toastr.error("Something Went Wrong!");
							 }

					 })
					 .catch(function(error){
					 	console.log(error);
						    // $("#allportfolio").load(window.location + " #allportfolio");
						  	$('#editPortfolios').modal('hide');
							  toastr.error("Something Went Wrong!");
							  // window.location.href = '/portfolios';
					 })
			  }
		 
		  };

		  // Delete portfolio
		  $(document).on('click','#deletePortfolioBtn',function(){
		  		let id = $(this).data('id');
		  		$('#DeletePortfolios').modal('show');
		  	    $('#del_type_id').val(id);
		  });
		  $('#portfolioDeleteSubmit').click(function(){
		  		let deleteID = $('#del_type_id').val();
		  		deletePortfolio(deleteID);
		  });
		  function deletePortfolio(deleteID){
		  		axios.post('portfolio/delete/',{id:deleteID})
		  		 .then(function(response){
			  		 	if(response.status == 200){
			  		 		console.log(response);
		  		 			 // $("#allportfolio").load(window.location + " #allportfolio");
				     		 $("#DeletePortfolios").modal('hide');
					 			if(response.data == 1){
						     		 toastr.success("Portfolio Item Deleted Success !");
						     		 window.location.href = '/portfolios';
					 			 }
					 			 else{
					 				toastr.error("Portfolio Item Deleted Failed !");
					 			}
					 		}
					 	 else{
					 		  $("#DeletePortfolios").modal('hide');
				     	      toastr.error("Something Went Wrong!");
					 	  }

		  		 })
		  		 .catch(function(error){
		  		 	   // $("#allportfolio").load(window.location + " #allportfolio");
				     	 $("#DeletePortfolios").modal('hide');
				     	 toastr.error("Something Went Wrong!");
				     	 window.location.href = '/portfolios';
		  		 })
		  }
		   // Status Active an InActive
		  $(document).on('click','#StatusInActive',function(){
		   		let id = $(this).data('id');
		   		axios.post('portfolio/activeStatus/',{id:id})
		   			.then(function(response){
		   				    window.location.href = '/portfolios';
				   			toastr.success('Portfolio Item InActive Successfully!');
			   			})
			   		.catch(function(error){
			   				 toastr.warning('Portfolio Item InActive Failed!');
			   			})
		   });
		   $(document).on('click','#StatusActive',function(){
		   		let id = $(this).data('id');
		   		// alert(link);
		   		axios.post('portfolio/activeStatus/',{id:id})
		   		.then(function(response){
		   			window.location.href = '/portfolios';
		   			toastr.success('Portfolio Item Active Successfully!');
		   		})
		   		.catch(function(error){
		   			toastr.warning('Portfolio Item Active Failed!');
		   		})
		   });

	  
	 })


</script>
@endsection
