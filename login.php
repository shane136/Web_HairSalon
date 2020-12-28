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
  <link rel="stylesheet" href="css/login_page.css">
</head>

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
							<input type="text" name="username" required class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" id="myInput" required class="form-control input_pass" value="" placeholder="password">
						</div>
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
						Don't have an account? <a href="registration\registration.html" class="ml-2">Create Account</a>

					</div>


          </div>
				</div>

			</div>
		</div>
	</div>
</body>
</html>
