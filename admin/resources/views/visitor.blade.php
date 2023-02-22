@extends('layouts.app')
@section('content')
<div class="row preloader" id="preloader">
	<div class="col-md-12">
		<div class="loader text-center">
			<img src="{{asset('images/loader.gif') }}" alt="">
		</div>
	</div>
</div>

<div class="row SliderWrong d-none">
	<div class="col-md-12">
		<div class="text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

<div class="allvisitor d-none" id="allvisitor">
	<div class="card">
	  <div class="card-body">
	        <h4 class="card-title">All Slider</h4>
	        <p class="card-description"> All Slider Data is Showing</p>
	      <div class="table-responsive">
					 <table class="table table-striped table-bordered" id="myTable">
					 	     <thead>
		                 <tr>
		                      <th>#</th>
		                      <th>IP Address</th>
		                      <th>Visit Time</th>
		                  </tr>
	                </thead>
						 <tbody>

								@foreach($visitors as $key => $visitor)
									<tr>
								 		<td>{{$key+1}}</td>
								 		<td>{{$visitor->ip_address}}</td>
								 		<td>{{$visitor->visit_time}}</td>
								 	</tr>
								@endforeach
						  </tbody>
					 </table>
					</div>

				</div>
			</div>
		</div>

@endsection
@section('scripts')
	<script>
		   GetVisitor();
		   function GetVisitor(){
		   		axios.get('visitor')
		   		.then(function(response){
		   			  if(response.status==200){
							 	  $("#allvisitor").removeClass('d-none');
							 	  $("#preloader").addClass('d-none');
			   			 } 
			   			 else{
								 $("#preloader").addClass('d-none');
							 	 $(".SliderWrong").removeClass('d-none');
			   			 }
		   		})
		   		.catch(function(error){
		   			    $("#preloader").addClass('d-none');
							 	$(".SliderWrong").removeClass('d-none');
		   		})
		   }
	</script>
@endsection