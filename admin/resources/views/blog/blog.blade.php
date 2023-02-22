@extends('layouts.app');
@section('content')
<div class="row preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>

<div class="row blogWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allblog d-none">
	<div class="card">
	  <div class="card-body">
        <h4 class="card-title">All blog</h4>
        <p class="card-description"> All blog Data is Showing</p>
       <div class="table-responsive">
				<table class="table table-dark table-bordered" id="myTable">
					<thead>
						  <th>ID: </th>
						  <th>Title: </th>
						  <th>Descrtiption: </th>
						  <th>Image: </th>
						  <th>Status: </th>
						  <th>Action: </th>
					</thead>
					 <tbody>
							@if($blogs->count() == null)
								<div class="text-center p-5">
									<h3>blog Data Empty.</h3>
								</div>
							
							@else
							@foreach($blogs as $blog)
								<tr>
							 		<td>{{$blog->id}}</td>
							 		<td>{{$blog->title}}</td>
							 		<td>{{$blog->description}}</td>
							 		<td><img src="{{$blog->blog_img}}" alt="Blog" class="custom_img"></td>
							 		<td>
							 			@if($blog->status ==1 )
							 			 <label class="badge badge-success btn-icon btn-rounded">Active</label>
							 			 @else
							 			  <label class="badge badge-danger btn-icon btn-rounded">InActive</label>
							 			 @endif
							 		</td>
							 		<td>
							 			 @if($blog->status != 1)
									 		<button data-link="{{route('blog.activeStatus',['id'=>$blog->id]) }}" class="btn btn-info btn-icon btn-rounded" title="blog Active" id="StatusActive"><i class="mdi mdi-thumb-up-outline"></i></button>
									 	@else
									 		<button data-link="{{route('blog.activeStatus',['id'=>$blog->id]) }}" class="btn btn-danger btn-icon btn-rounded" title="blog InActive" id="StatusInActive"><i class="mdi mdi-thumb-down-outline"></i></button>
									 	@endif
							 			<button class="btn btn-primary btn-icon btn-rounded" id="editBlogBtn" data-link="{{route('blog.edit',['id'=>$blog->id])}}"  title="blog Edit {{$blog->id}}">
							 				<i class="mdi mdi-table-edit"></i>
							 			</button>
							 			<button class="btn btn-danger btn-icon btn-rounded" id="deleteBlogBtn"  data-id="{{$blog->id}}"  title="blog Delete {{$blog->id}}">
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
<div class="modal fade" id="editBlogs" tabindex="-1" aria-labelledby="editblog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Blog Item Edit</h5>
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
		                <label for="title">Title: </label>
		                <input type="text" class="form-control" id="title" name="title" placeholder="Blog Title">
		              </div>
		              <div class="form-group">
		                <label for="description">Desctiption: </label>
		                <textarea type="text" class="form-control" id="description" name="description" placeholder="Blog Description "></textarea>
		              </div>
		              <div class="form-group">
			                <label for="blog_img">Blog Image: </label>
			                <input type="file" class="file-upload-default" id="blog_img" name="blog_img" hidden>
			                <div class="input-group col-xs-12">
			                  <input type="text" class="form-control file-upload-info" placeholder="Upload Image">
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
		               <input type="hidden" id="editBlogID">
		               <button type="submit" class="btn btn-primary mr-2" id="blogUpdate">Submit</button>
		              <a href="{{url('blogs')}}" class="btn btn-dark">Cancel</a>
				</div>
		    </div>
      </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="DeleteBlogs" tabindex="-1" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title text-center">Are You Sure Delete Your Blog Item</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <input type="hidden" name="" id="del_type_id">
        <button type="button" class="btn btn-danger"  id="blogDeleteSubmit">Delete</button>
      </div>

    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
	 $(document).ready(function(){
		 getBlog();
		  function getBlog(){
		  	axios.get('blogs')
		  	 .then(function(response){
		  	 		 if(response.status == 200){
			  	 		 $(".preloader").addClass('d-none');
			  	 		 $(".allblog").removeClass('d-none');
		  	 		 }
		  	 		 else{
		  	 		 	  $(".preloader").addClass('d-none');
			  	 		 $(".blogWrong").removeClass('d-none');
		  	 		 }
		  	 })
		  	 .catch(function(error){
		  	 	   $(".preloader").addClass('d-none');
			  	   $(".blogWrong").removeClass('d-none');
		  	 })
		  };
		// Edit blog
      $(document).on('click','#editBlogBtn',function(){
		  	   let link = $(this).data('link'); 
		  	   $('#editBlogs').modal('show');
		  		axios.post(link)
		  		 .then(function(response){
		  		 		  if(response.status == 200){
		  		 		  	// console.log(response);
				  	 		 	$(".modelEditLoader").addClass('d-none');
				  	 		 	$(".modalEdit").removeClass('d-none');

				  	 		 	let data = response.data;

							     	$("#editBlogID").val(data.id);
							     	$("#title").val(data.title);
			  	  					$("#description").val(data.description);
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

      	// Update blog
		$('#blogUpdate').click(function(){
				let id           = $("#editBlogID").val();
	    	    let title    	 = $("#title").val();
	  	  		let description  = $("#description").val();
	  	  		let blog_img   	 = $('#blog_img')[0].files[0];
	  	  		let status		 = $("#status").val();

		  	    if(title.length == 0){
						toastr.error("Title is Required !");
			  	 }else if(description.length == 0){
			  	 		toastr.error("Description is Required !");
			  	 }else if(!blog_img){
			  	 		toastr.error("Image is Required !");
			  	 }else if(blog_img.type == 'image/jpg' || blog_img.type =='image/png'){
			  	 		toastr.error("Image Type Must be jpg,png !");
			  	 }
			  	 else{
				  	 	let formData = new FormData();

				  	 	formData.append('title',title);
				  	 	formData.append('description',description);
				  	 	formData.append('blog_img',blog_img);
				  	 	formData.append('status',status);

				  	 	axios.post('blog/update/'+id,formData,{
				  	 		headers: {
							        'Content-Type': 'multipart/form-data'
							     }
				  	 	})
			  	  		 .then(function(response){
			  	  		 	console.log(response);
			  	  		 		 if(response.status ==200){
			  	  		 		 	 if(response.data == 1){
			  	  		 		 	 	$('#editBlogs').modal('hide');
				  	  		 		  	toastr.success('Blog Item Update Successfully!')
				  	  		 		  	   setTimeout(function(){ 
				                           	 window.location.href = '/blogs';
				                           },2000)
				  	  		 		  }
				  	  		 		  else{
				  	  		 		  	toastr.error('blog Item Update Failed!')
				  	  		 		  }
			  	  		 		 }
			  	  		 		 else{
			  	  		 		 	 toastr.error('Something Went Wrong!')
			  	  		 		 }
			  	  		 })
			  	  		.catch(function(error){
			  	  			console.log(error);
						  	 $('#editBlogs').modal('hide');
							toastr.error("Something Went Wrong!");
							   // setTimeout(function(){ 
			                   //   	 window.location.href = '/blogs';
			                   //    },2000)
			  	  		})
		  	  	}
  	     });

		  // Delete blog
		  $(document).on('click','#deleteBlogBtn',function(){
		  	   let id = $(this).data('id');
		  	    $('#del_type_id').val(id);
		  		$('#DeleteBlogs').modal('show');
		  });
		  // Delete Submit
		  $('#blogDeleteSubmit').click(function(){
		  		let deleteID = $('#del_type_id').val();

		  		axios.post('blog/delete/'+deleteID)
		  		 .then(function(response){
			  		 	if(response.status == 200){
			  		 		console.log(response);
		  		 			 // $("#allblog").load(window.location + " #allblog");
				     		 $("#DeleteBlogs").modal('hide');
					 			if(response.data == 1){
						     		 toastr.success("Blog Item Deleted Success !");
						     		 setTimeout(function(){
						     		 	window.location.href = '/blogs';
						     		 },2000)
					 			 }
					 			 else{
					 				toastr.error("Blog Item Deleted Failed !");
					 			}
					 		}
					 	 else{
					 		  $("#DeleteBlogs").modal('hide');
				     	      toastr.error("Something Went Wrong!");

					 	  }

		  		 })
		  		 .catch(function(error){
				     	 $("#DeleteBlogs").modal('hide');
				     	 toastr.error("Something Went Wrong!");
				     	 setTimeout(function(){
			     		 	window.location.href = '/blogs';
			     		 },2000)
		  		 })
		  });

		   // Status Active an InActive
		  $(document).on('click','#StatusInActive',function(){
		   		let link = $(this).data('link');
		   		axios.post(link)
	   			.then(function(response){
	   				console.log(response);
			   			toastr.success('Blog Item InActive Successfully!');
			   			setTimeout(function(){
			   				window.location.href = '/blogs';
			   			},2000)
		   			})
		   		.catch(function(error){
		   			console.log(error);
		   				 toastr.warning('Blog Item InActive Failed!');
		   		   })
		   });
		   $(document).on('click','#StatusActive',function(){
		   		let link = $(this).data('link');
		   		axios.post(link)
		   		.then(function(response){
		   			console.log(response);
		   			toastr.success('Blog Item Active Successfully!');
		   			setTimeout(function(){
		   				window.location.href = '/blogs';
		   			},2000)
		   		})
		   		.catch(function(error){
		   			console.log(error);
		   			toastr.warning('Blog Item Active Failed!');
		   		})
		   });

	  
	 })


</script>
@endsection
