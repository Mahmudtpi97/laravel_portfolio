@extends('layouts.app')
@section('content')
   <div class="row">
       <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Team Member Item</h4>
            <p class="card-description"> Member Item </p>

						<div class="TeamCreate">
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
	                <textarea type="text" class="form-control" id="editor" name="social_link" placeholder="Member Social Link ">
				                <li><a target="_blank" href="https://www.facebook.com/mahmudtpi97" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>

												<li> <a target="_blank" href="https://www.linkedin.com/in/mahmudtpi97" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram"><i class="fa-brands fa-linkedin"></i></a> </li>

												<li><a target="_blank" href="https://www.twitter.com/mahmudtpi9" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa-brands fa-twitter"></i></a></li>

												<li><a target="_blank" href="https://www.instagram.com/mahmudtpi97" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram"><i class="fa-brands fa-instagram"></i></a> </li>
	                </textarea>
	              </div>
	              <div class="form-group">
			                <label for="Team_img">Member Image: </label>
			                <input type="file" class="file-upload-default" id="team_img" name="team_img" hidden>
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
	              <button type="submit" class="btn btn-primary mr-2" id="CreateTeam">Submit</button>
	              <a href="{{url('teams')}}" class="btn btn-dark">Cancel</a>
				         
          </div>
        </div>

      </div>
   </div>

@endsection
@section('scripts')
  <script>
  	  $(document).ready(function(){
  	  		// Team Data Add 
			  	 $("#CreateTeam").click(function(){
				  	  		let name    					= $("#name").val();
				  	  		let shortDes   	      = $("#shortDes").val();
				  	  		let social_link   	  = $("#editor").val();
				  	  		let team_img 					= $('#team_img')[0].files[0];
				  	  		let status						= $("#status").val();

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
					  	  		 
					  	  		 axios.post('{{route('team.create_confirm')}}',formData,{
					  	  		 	 headers: {
											        'Content-Type': 'multipart/form-data'
											     }
					  	  		 })
					  	  		 .then(function(response){
					  	  		 	console.log(response);
					  	  		 		 if(response.status ==200){

					  	  		 		 	 if(response.data == 1){
						  	  		 		  	toastr.success('Team Item Create Successfully!')
						  	  		 		  	 setTimeout(function(){ 
		                                window.location.href = '/teams';
		                            },2000)
						  	  		 		  }
						  	  		 		  else{
						  	  		 		  	toastr.error('Team Item Create Failed!')
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

  	  })



 </script>
@endsection