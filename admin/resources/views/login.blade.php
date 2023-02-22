<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin/Login</title>
	 <link rel="stylesheet" href="{{asset('css/style.css')}}">
	  <link rel="stylesheet" href="{{asset('vendors/toastr/toastr.min.css')}}">
	 {{-- Script --}}
	  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
	   <!-- Toastr -->
    <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js"></script>
</head>
<body>
	<style>
		.login-area{
			background:url({{asset('images/auth/Login_bg.jpg')}}) no-repeat 0 center / cover;
			padding:10rem;
		}
		.login img{
		    height: 300px;
		    width: 100%;
		    object-fit: cover;
		}
	</style>
	<div class="login-area">
		<div class="container">
			<div class="row justify-content-center align-items-center login">
				<div class="col-md-6">
                   <div class="card">
	                  <div class="card-body">
						<h4 class="card-title text-center">Login Form </h4>
	                    <form action=" " id="login-form">
	                    	<div class="form-group">
		                      <label for="username">Username: </label>
		                      <input required="" type="text" class="form-control" placeholder="Username" id="username" name="username" value="">
		                    </div>
		                    <div class="form-group">
		                      <label for="password">Password: </label>
		                      <input required="" type="text" class="form-control" placeholder="password" id="password" name="password" value="">
		                    </div>

		                    <div class="form-group">
		                    	<input type="submit" name="login" id="login" value="Login" class="btn btn-primary">
		                    </div>
	                    </form>
	                  </div>
                   </div>
                </div>

			</div>
		</div>
	</div>
	<script>

		$('#login-form').on('submit',function(event){
			event.preventDefault();
			let formData = $(this).serializeArray();
			let username = formData[0]['value'];
			let password = formData[1]['value'];

			axios.post('onLogin',{
				user: username,
				pass:password
			})
			.then(function(response){
				if (response.status == 200 && response.data == 1) {
					window.location.href ="/";
				}
				else{
					toastr.error('Login Fail ! Try Again')
				}
			})
			.catch(function(error){
				toastr.error('Login Fail ! Try Again')
			})
			
		})
	</script>
</body>
</html>
