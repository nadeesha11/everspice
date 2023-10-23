<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E commerce admin login</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="http://infiniteiotdevices.com/images/logo.png" rel="icon" sizes="16x16" type="image/gif" />
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/login-form-5.css') }}">
   
   
   
   
   <style>
       
      

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  
}


 
       
       
       
   </style>
   
</head>
<body>
    
    


<div class="container mt-5">



      <!--<img  src="http://everspiceceylon.com/assets/imgs/theme/logo footer copy (1).png"    alt="" class="img-fluid">-->
  
<div style="   margin-top: 20px;"> 
<img class="center" src="http://everspiceceylon.com/assets/imgs/theme/logo footer copy (1).png" alt="logo" />

</div>






    
	<div class="box">
	    
	    
		<h2>Admin Login</h2>
       <div>

		@if (Session::has('login_error'))
		<p class="text-light"  >{{ Session('login_error') }}</p> 
	     @endif
	   </div>

		<form method="POST" action="{{ url('/admin/login') }}">
			@csrf
			<div class="inputBox">
				<input type="text-danger" name="username" required="">
				<label>Username</label>
			</div>
			<div class="inputBox">
				<input type="password" name="password" id="id_password" required="">
				 <i class="fa fa-eye" id="togglePassword" style="color:dark;  margin-left: -30px; cursor: pointer;"></i>
				<label>Password</label>
			</div>
			<input type="submit" name="" value="Login">
		</form>
	
	</div>
	
	
	
	
</div>	

<script>
    
    
    const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});





</script>



	
</body>
</html>