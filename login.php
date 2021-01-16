<?php
session_start();

 ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>

	<script>
      <!--
        var ScrollMsg= "J.HairSalon|Login - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // Sorry wala rani char2 T.T-->
    
    </script>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/login_page.css">
  	
</head>
<style>
div.modal-content{
	border-radius: 1.1rem;
}
div.sign-up-content{
	padding: 40px 50px 32px 50px;
  	position: relative;
  	z-index: 99;
}

.form-textboxx {
  position: relative; }
  .form-textboxx label {
    position: absolute;
    left: 28px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    font-weight: 600;
    color: #888;
    font-size: 18px; 
}
input.name {
    border: solid 2px #ebebeb;
    box-sizing: border-box;
    width: 100%;
    font-weight: 700;
    font-size: 16px;
    padding: 14px 10px 14px 152px;
}
, select, textarea {
    outline: none;
    -webkit-appearance: unset !important;
}
.term-service {
  color: #1da0f2;
  text-decoration: none; }
  .term-service:hover {
    text-decoration: underline; 
}
:-webkit-autofill {
  -webkit-box-shadow: 0 0 0 30px white inset; 
}
@media screen and (max-width: 400px) {
  .form-textbox label {
    left: 15px; 
}

</style>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="image/logo.png" class="brand_logo" alt="Logo" >
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="\Web_HairSalon\conn\login.php" class="" method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" required class="form-control input_user" value="" placeholder="Username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" id="myInput" required class="form-control input_pass" value="" placeholder="Password">
						</div>
			<hr>		
              <input type="checkbox" onclick="myFunction()"> Show Password
          
              <script>
              function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
            </script>

						<div class="form-group">

						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>

					</form>
				</div>

				<?php if(isset($_SESSION['ERROR 1'])){
					?>

            <script type="text/javascript">
						alert('INVALID PASSWORD OR USERNAME');
				    </script>

					<?php
					unset($_SESSION['ERROR 1']);
				} ?>

				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account?<button type="button" data-toggle="modal" data-target="#addPay" class="text-blue" style=";margin-left:5px;padding:0;border:none;background:none;color:#00F;"><u>Create Account<u></button>
					</div>

<div class="modal fade" id="addPay" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
      	  </div>
<div class="modal-body">
<div class="container">
<div class="sign-up-content">
<form method="POST" class="signup-form" action="\Web_HairSalon\conn\employee_reg.php">
    <center style="padding-bottom: 10px;"><h2><b>CREATE ACCOUNT</b></h2></center>

    <div class="form-textboxx">
        <label for="name">First Name:</label>
        <input type="text" name="f_name" class="name" required />
    </div>

    <div class="form-textboxx">
        <label for="name">Last Name:</label>
        <input type="text" name="l_name" class="name" required/>
    </div>

    <div class="form-textboxx">
        <label for="name">Username:</label>
        <input type="text" name="username" class="name" required />                  
    </div>

    <div class="form-textboxx">
        <label for="name">Password:</label>
        <input type="password" name="password" class="name" required />     
    </div>
        
    <div class="form-textboxx">
        <label for="name">Address:</label>
        <input type="text" name="address" class="name" required />
    </div>

    <div class="form-textboxx">
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="p_number" class="name" required/>
    </div>

    <div class="form-textboxx">
        <label for="phone_number">Email:</label>
        <input type="text" name="email" class="name"  required/>
    </div>

    <div style="margin:15px 5px 10px 18px;">
        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required>
        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
    </div>

    <div class="form-textboxx">
        <input type="submit" name="submit" id="submit" class="btn login_btn" value="Create account" style="" />
    </div>
</form>      	  	
</div>
</div>
      	  </div>
    </div>
  </div>
</div>

          </div>
				</div>

			</div>
		</div>
	</div>
<script>
	$('#myModal').modal('show')
</script>
</body>
</html>
