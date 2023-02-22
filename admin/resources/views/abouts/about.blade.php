@extends('layouts.app');
@section('content')

<div class="row preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>

<div class="row aboutWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allabout d-none">
	<div class="card">
	  <div class="card-body">
        <h4 class="card-title">All about</h4>
        <p class="card-description"> All about Data is Showing</p>
       <div class="table-responsive">
				<table class="table table-dark table-bordered" id="myTable">
					<thead>
						  <th>ID: </th>
						  <th>Title: </th>
						  <th>Description: </th>
						  <th>Image: </th>
					</thead>
					 <tbody>
							@if($abouts->count() == null)
							
									<div class="text-center p-5">
										<h3>About Data Empty.</h3>
									</div>
							
							@else
							@foreach($abouts as $about)
								<tr>
							 		<td>{{$about->id}}</td>
							 		<td>{{$about->title}}</td>
							 		 <td>{{$about->description}}</td>
							 			<td><img src="{{$about->about_img}}" alt="about_image" class="custom_img"></td>
							 			<td>
							 				<button class="btn btn-primary btn-icon btn-rounded" id="editAboutBtn" data-link="{{route('about.edit',['id'=>$about->id])}}"  title="About Edit {{$about->id}}">
								 				<i class="mdi mdi-table-edit"></i>
								 			</button>
								 			<button class="btn btn-danger btn-icon btn-rounded" id="deleteAboutBtn"  data-id="{{$about->id}}"  title="About Delete {{$about->id}}">
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
<div class="modal fade" id="editabouts" tabindex="-1" aria-labelledby="editabout" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">About Data Edit</h5>
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
		                 <label for="title">Title</label>
		                 <input type="text" class="form-control" id="title" name="title" placeholder="About Title">
		              </div>
		              <div class="form-group">
		                <label for="description">Description</label>
		                <textarea type="text" class="form-control" id="description" name="description" placeholder="Description"></textarea>
		              </div>

		              <div class="form-group">
		                <label>About Image</label>
		                <input type="file"  class="file-upload-default" id="about_img" name="about_img">
		                <div class="input-group col-xs-12">
		                  <input type="text" class="form-control file-upload-info" placeholder="Upload Image" >
		                  <span class="input-group-append">
		                     <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
		                  </span>
		                </div>
		              </div>

		              <input type="hidden" name="" id="editaboutID">
		              <button type="submit" class="btn btn-primary mr-2" id="aboutUpdate">Submit</button>
						</div>
      </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="Deleteabouts" tabindex="-1" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title text-center">Are You Sure Delete Your About Item</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <input type="hidden" name="" id="del_type_id">
        <button type="button" class="btn btn-danger"  id="aboutDeleteSubmit">Delete</button>
      </div>

    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
	 $(document).ready(function(){
		 	 getAbout();
		  function getAbout(){
		  	axios.get('abouts')
		  	 .then(function(response){
		  	 		 if(response.status == 200){
			  	 		 	$(".preloader").addClass('d-none');
			  	 		 	$(".allabout").removeClass('d-none');
		  	 		 }
		  	 		 else{
		  	 		 	  $(".preloader").addClass('d-none');
			  	 		 	$(".aboutWrong").removeClass('d-none');
		  	 		 }
		  	 })
		  	 .catch(function(error){
		  	 	   $(".preloader").addClass('d-none');
			  	 	 $(".aboutWrong").removeClass('d-none');
		  	 })
		  };
		  // Edit About
    $(document).on('click','#editAboutBtn',function(){
		  	let link = $(this).data('link');
		  		$('#editabouts').modal('show');
		  		// alert(link);
		  		 axios.post(link)
		  		 .then(function(response){
		  		 		  if(response.status == 200){
		  		 		  	
				  	 		 	$(".modelEditLoader").addClass('d-none');
				  	 		 	$(".modalEdit").removeClass('d-none');

				  	 		 	let data = response.data;

	  	  		     	$("#editaboutID").val(data.id);
		  	  		 		$('#title').val(data.title);
		  	  		 		$('#description').val(data.description);
		  	  		 		// $('#about_img').val(data.about_img);
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

		  $('#aboutUpdate').click(function(){

	    	   let id          	=  $("#editaboutID").val();
	    	   let title 	   	  =  $("#title").val();
	    	   let description 	=  $("#description").val();
	    	   let about_img 	  =  $("#about_img")[0].files[0];

	    	  UpdateAbout(id,title,description,about_img);

	    	  console.log(UpdateAbout());
		  });
		  // UpdateAbout();

		  function UpdateAbout(id,title,description,about_img){

		  	 if(title.length == 0){
		  	 		toastr.error("Title is Required !");
		  	 }else if(description.length == 0){
		  	 		toastr.error("Description is Required !");
		  	 }else if(!about_img){
		  	 		toastr.error("About Image is Required !");
		  	 }else if(!(about_img.type == 'image/jpeg' || about_img.type == 'image/png')){
		  	 		toastr.error("Image must be jpg or png !");
		  	 }
 		    else{
 		    		 let formData = new FormData ();
 		    		      formData.append('title',title);
 		    		      formData.append('description',description);
 		    		      formData.append('about_img',about_img);
		  	    axios.post('about/update/'+id,formData)
						.then(function(response){
								 if(response.status == 200){
										  $('#editabouts').modal('hide');
										
									 	if(response.data == 1){
											toastr.success("About Update Success !");
											setTimeout(function(){
		  	         				  window.location.reload();
		  	         			},3000)
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
							  	$('#editabouts').modal('hide');
									toastr.error("Something Went Wrong!");
									setTimeout(function(){
	  	         				 window.location.reload();
	  	         			},3000)
						})
				}
		 
		  };

		  // Delete About
		  $(document).on('click','#deleteAboutBtn',function(){
		  		let id = $(this).data('id');
		  		$('#Deleteabouts').modal('show');
		  	  $('#del_type_id').val(id);
		  });
		  $('#aboutDeleteSubmit').click(function(){
		  		let deleteID = $('#del_type_id').val();
		  		aboutDelet(deleteID);
		  });
		  function aboutDelet(deleteID){
		  		axios.post('about/delete/'+deleteID)
		  		 .then(function(response){
			  		 	if(response.status == 200){
			  		 			 $("#allabout").load(window.location + " #allabout");
					     		 $("#Deleteabouts").modal('hide');
						 			if(response.data == 1){
							     		 toastr.success("About Item Deleted Success !");
						 			 }
						 			 else{
						 				toastr.error("About Item Deleted Failed !");
						 			}
					 		}
					 		else{
					 			$("#Deleteabouts").modal('hide');
				     	  toastr.error("Something Went Wrong!");
					 		}

		  		 })
		  		 .catch(function(error){
		  		 	   $("#allabout").load(window.location + " #allabout");
				     	 $("#Deleteabouts").modal('hide');
				     	 toastr.error("Something Went Wrong!");
		  		 })
		  }

	  
	 })


</script>
@endsection