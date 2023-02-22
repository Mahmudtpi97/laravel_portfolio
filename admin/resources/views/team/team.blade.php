@extends('layouts.app');
@section('content')
<div class="row preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>

<div class="row TeamWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allTeam d-none">
	<div class="card">
	  <div class="card-body">
        <h4 class="card-title">All Team</h4>
        <p class="card-description"> All Team Data is Showing</p>
       <div class="table-responsive">
				<table class="table table-dark table-bordered" id="myTable">
					<thead>
						  <th>ID: </th>
						  <th>Name: </th>
						  <th>Des: </th>
						  <th>Link: </th>
						  <th>Image: </th>
						  <th>Status: </th>
						  <th>Action: </th>
					</thead>
					 <tbody>
							@if($teams->count() == null)
								<div class="text-center p-5">
									<h3>Team Data Empty.</h3>
								</div>
							
							@else
							@foreach($teams as $team)
								<tr>
							 		<td>{{$team->id}}</td>
							 		<td>{{$team->name}}</td>
							 		<td>{{$team->shortDes}}</td>
							 		<td>{!!$team->social_link!!}</td>
							 		<td><img src="{{$team->team_img}}" alt="Team Member" class="custom_img"></td>
							 		<td>
							 			@if($team->status ==1 )
							 			 <label class="badge badge-success btn-icon btn-rounded">Active</label>
							 			 @else
							 			  <label class="badge badge-danger btn-icon btn-rounded">InActive</label>
							 			 @endif
							 		</td>
							 		<td>
							 				@if($team->status != 1)
									 			<button data-link="{{route('team.activeStatus',['id'=>$team->id]) }}" class="btn btn-info btn-icon btn-rounded" title="Team Active" id="StatusActive"><i class="mdi mdi-thumb-up-outline"></i></button>
									 		@else
									 			<button data-link="{{route('team.activeStatus',['id'=>$team->id]) }}" class="btn btn-danger btn-icon btn-rounded" title="Team InActive" id="StatusInActive"><i class="mdi mdi-thumb-down-outline"></i></button>
									 		@endif
								 			<button class="btn btn-primary btn-icon btn-rounded" id="editTeamBtn" data-link="{{route('team.edit',['id'=>$team->id])}}"  title="Team Edit {{$team->id}}">
								 				<i class="mdi mdi-table-edit"></i>
								 			</button>
								 			<button class="btn btn-danger btn-icon btn-rounded" id="deleteTeamBtn"  data-id="{{$team->id}}"  title="Team Delete {{$team->id}}">
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
<div class="modal fade" id="editTeams" tabindex="-1" aria-labelledby="editTeam" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Team Item Edit</h5>
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
			                <label for="Team">Name: </label>
			                <input type="text" class="form-control" id="name" name="name" placeholder="Member Name">
			            </div>
			            <div class="form-group">
			                <label for="shortDes">Member Description: </label>
			                <input type="text" class="form-control" id="shortDes" name="shortDes" placeholder="Member Short Description">
			            </div>
			            <div class="form-group">
			                <label for="item">Social Link: </label>
			                <textarea type="text" class="form-control" id="editor" name="social_link" placeholder="Member Social Link "></textarea>
			             </div>
			             <div class="form-group">
				                <label for="Team_img">Member Image: </label>
				                <input type="file" class="file-upload-default" id="team_img" name="team_img" hidden>
				                <div class="input-group col-xs-12">
				                    <input type="text" class="form-control file-upload-info" placeholder="Upload Image" id="img_path" disabled>
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
			              <input type="hidden" id="editTeamID">
			              <button type="submit" class="btn btn-primary mr-2" id="TeamUpdate">Submit</button>
			              <a href="{{url('teams')}}" class="btn btn-dark">Cancel</a>
				   </div>
			</div>
      </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="DeleteTeams" tabindex="-1" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5 class="modal-title text-center">Are You Sure Delete Your Team Item</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <input type="hidden" name="" id="del_type_id">
        <button type="button" class="btn btn-danger"  id="TeamDeleteSubmit">Delete</button>
      </div>

    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
	 $(document).ready(function(){
		 getTeam();
		  function getTeam(){
		  	axios.get('teams')
		  	 .then(function(response){
		  	 		 if(response.status == 200){
			  	 		 $(".preloader").addClass('d-none');
			  	 		 $(".allTeam").removeClass('d-none');
		  	 		 }
		  	 		 else{
		  	 		 	  $(".preloader").addClass('d-none');
			  	 		 $(".TeamWrong").removeClass('d-none');
		  	 		 }
		  	 })
		  	 .catch(function(error){
		  	 	   $(".preloader").addClass('d-none');
			  	   $(".TeamWrong").removeClass('d-none');
		  	 })
		  };
		// Edit Team
      $(document).on('click','#editTeamBtn',function(){
		  	   let link = $(this).data('link'); 
		  	   $('#editTeams').modal('show');
		  		axios.post(link)
		  		 .then(function(response){
		  		 		  if(response.status == 200){
					  	 		 	$(".modelEditLoader").addClass('d-none');
					  	 		 	$(".modalEdit").removeClass('d-none');

					  	 		 	let data = response.data;
			  	  		     	    $("#editTeamID").val(data.id);

								  	  		$("#name").val(data.name);
													$("#shortDes").val(data.shortDes);
													$("#editor").summernote("code",data.social_link);
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

      	// Update Team
		$('#TeamUpdate').click(function(){
				let id              = $("#editTeamID").val();
	    	    let name    		= $("#name").val();
	  	  		let shortDes   	= $("#shortDes").val();
	  	  		let social_link = $("#editor").val();
	  	  		let team_img 		= $('#team_img')[0].files[0];
	  	  		let status			= $("#status").val();

		  	    if(name.length == 0){
			  	 		toastr.error("Name is Required !");
			  	 }else if(shortDes.length == 0){
			  	 		toastr.error("Short Description is Required !");
			  	 }else if(social_link.length == 0){
			  	 		toastr.error("Social Link is Required !");
			  	 }else if(!team_img){
			  	 		toastr.error("Team Image is Required !");
			  	 }
			  	 else if(!(team_img.type == 'image/jpeg' || team_img.type == 'image/png')){
							toastr.error("Team Image should be in jpg, png format !");
						}
				 else{

			  	 	    let formData=new FormData();
			  	 	    formData.append('name',name);
			  	 	    formData.append('shortDes',shortDes);
			  	 	    formData.append('social_link',social_link);
			  	 	    formData.append('team_img', team_img);
			  	 	    formData.append('status',status);

			  	  		 axios.post('team/update/'+id,formData,{
		  	  		 	 	  headers: {'Content-Type': 'multipart/form-data'}
			  	  		 })
			  	  		 .then(function(response){
			  	  		 	console.log(response);
			  	  		 		 if(response.status ==200){
			  	  		 		 	 if(response.data == 1){
			  	  		 		 	 	$('#editTeams').modal('hide');
				  	  		 		  	toastr.success('Team Item Update Successfully!')
				  	  		 		  	   setTimeout(function(){ 
				                           	 window.location.href = '/teams';
				                           },2000)
				  	  		 		  }
				  	  		 		  else{
				  	  		 		  	toastr.error('Team Item Update Failed!')
				  	  		 		  }
			  	  		 		 }
			  	  		 		 else{
			  	  		 		 	 toastr.error('Something Went Wrong!')
			  	  		 		 }
			  	  		 })
			  	  		.catch(function(error){
			  	  			console.log(error);
						  	 $('#editTeams').modal('hide');
							toastr.error("Something Went Wrong!");
							   setTimeout(function(){ 
                     	 window.location.href = '/teams';
                      },2000)
			  	  		})
		  	  	}
  	     });

		  // Delete Team
		  $(document).on('click','#deleteTeamBtn',function(){
		  	   let id = $(this).data('id');
		  	    $('#del_type_id').val(id);
		  		$('#DeleteTeams').modal('show');
		  });
		  // Delete Submit
		  $('#TeamDeleteSubmit').click(function(){
		  		let deleteID = $('#del_type_id').val();

		  		axios.post('team/delete/'+deleteID)
		  		 .then(function(response){
			  		 	if(response.status == 200){
			  		 		console.log(response);
		  		 			 // $("#allTeam").load(window.location + " #allTeam");
				     		 $("#DeleteTeams").modal('hide');
					 			if(response.data == 1){
						     		 toastr.success("Team Item Deleted Success !");
						     		 setTimeout(function(){
						     		 	window.location.href = '/teams';
						     		 },2000)
					 			 }
					 			 else{
					 				toastr.error("Team Item Deleted Failed !");
					 			}
					 		}
					 	 else{
					 		  $("#DeleteTeams").modal('hide');
				     	      toastr.error("Something Went Wrong!");

					 	  }

		  		 })
		  		 .catch(function(error){
				     	 $("#DeleteTeams").modal('hide');
				     	 toastr.error("Something Went Wrong!");
				     	 setTimeout(function(){
			     		 	window.location.href = '/teams';
			     		 },2000)
		  		 })
		  });

		   // Status Active an InActive
		  $(document).on('click','#StatusInActive',function(){
		   		let link = $(this).data('link');
		   		axios.post(link)
	   			.then(function(response){
			   			toastr.success('Team Item InActive Successfully!');
			   			setTimeout(function(){
			   				window.location.href = '/teams';
			   			},2000)
		   			})
		   		.catch(function(error){
		   			console.log(error);
		   				 toastr.warning('Team Item InActive Failed!');
		   		   })
		   });
		   $(document).on('click','#StatusActive',function(){
		   		let link = $(this).data('link');
		   		axios.post(link)
		   		.then(function(response){
		   			toastr.success('Team Item Active Successfully!');
		   			setTimeout(function(){
		   				window.location.href = '/teams';
		   			},2000)
		   		})
		   		.catch(function(error){
		   			console.log(error);
		   			toastr.warning('Team Item Active Failed!');
		   		})
		   });

	  
	 })


</script>
@endsection
