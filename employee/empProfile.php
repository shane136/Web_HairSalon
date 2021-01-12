<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];
include("upDet.php");
$sql = mysqli_query($con, "SELECT * from employee WHERE employee.user_id = $user_id;");
$conResult = mysqli_fetch_assoc($sql);

	if($conResult['job_type'] == 1){
	  $type = "Colourist";
	}
	elseif($conResult['job_type'] == 2){
	  $type = "Waxing Specialist";
	}
	elseif($conResult['job_type'] == 3){
	  $type = "Barber Stylist";
	}
	elseif($conResult['job_type'] == 4){
	  $type = "Hair Extenstion Stylist";
	}
	elseif($conResult['job_type'] == 5){
	  $type = "Senior Stylist";
	}
	else{
	  $type = "Hairdresser";
	}

$sqli = mysqli_query($con, "SELECT * FROM user_account WHERE user_id='$user_id';");
$usResult = mysqli_fetch_assoc($sqli);
?>
<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
<head>
<meta charset="utf-8">

<title>J.HairSalon</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body class = "d-flex h-100">

<div class="col-2 border border-danger h-100 flex-column d-flex"style="height:50px;background: #ffe6e6 !important;">

<a href="employee.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Home</small></p></a>
<a href="empProfile.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Profile</small></p></a>
<a href="empBookings.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Bookings</small></p></a>
<a href="payroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>View Payroll</small></p></a>
<a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>About</small></p></a>
<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Logout</small></p></a>

</div>

<div class="container-fluid mh-100 p-3" style="background:#0F222D;height:20vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>

<div class="container-fluid col-lg-12 p-1 mt-4" style ="background: #ffe6e6; border-radius: 10px;">
	
<div class="col-lg-12 p-3">
          <div class="card bg-secondary shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
              </div>
            </div>
            <div class="card-body bg-white">
              <form>
                <div class="row col-12">
                <div class="col-sm-6">
                  <h6 class="heading-small text-muted mb-4">User information</h6>
                </div>
                <div class="col-sm-6">                  
                  <button type="button" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="float: right;">Settings</button>
                </div>
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $usResult['user_name']; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Email" value="<?php echo $conResult['email']; ?> " disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="First name" value="<?php echo $conResult['f_name']; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Last name" value="<?php echo $conResult['l_name']; ?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $conResult['address']; ?>" type="text" disabled>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-contact-name">Phone number</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Last name" value="<?php echo $conResult['phone_number']; ?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <h6 class="heading-small text-muted mb-4">Job information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-job">Job</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $type; ?>" type="text" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
        </div>
</div>
<div class="modal fade" id="edit" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
      <h3 style="padding: 10px 30% 0px 0px"><b>Settings</b></h3>
    </div>

        <div class="modal-body" style="padding:20px 40px;">

      <form class="form-horizontal" action="#" name="form" method="post">
        <div class="form-group">
        	<?php echo $user_id;?>
          <label class="col-sm-4 control-label">Full Name</label>
          <div class="row col-12">
          	<div class="col-6">
            	<input type="text" name="fname" class="form-control" placeholder="<?php echo $conResult['f_name']; ?>" required="required">
            </div>
            <div class="col-6">
            	<input type="text" name="lname" class="form-control" placeholder="<?php echo $conResult['l_name']; ?>" required="required">
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="form-group">
<label class="col-sm-4 control-label">Email</label>
        	<div class="row col-12">
        		<div class="col-12">
        			<input type="text" name="email" class="form-control" placeholder="<?php echo $conResult['email']; ?>" required="required">
        		</div>
<label class="col-sm-4 control-label">Address</label>
        		<div class="col-12">
        			<input type="text" name="address" class="form-control" placeholder="<?php echo $conResult['address']; ?>" required="required">
        		</div>        	
<label class="col-sm-4 control-label">Phone#</label>
        		<div class="col-12">
        			<input type="text" name="pnumber" class="form-control" placeholder="<?php echo $conResult['phone_number']; ?>" required="required">
        		</div>
<label class="col-sm-12 control-label">Job type</label>        		
<div class="col-12">
	<select class="form-control text-muted" name="jobtype">
		<option value="<?php echo $conResult['job_type'];?>" disabled selected><?php echo $type;?></option>
		<option value="1">Colourist</option>
		<option value="2">Waxing Specialist</option>
		<option value="3">Barber Stylist</option>
		<option value="4">Hair Extenstion Stylist</option>
		<option value="5">Senior Stylist</option>
		<option value="6">Hairdresser</option>
	</select>        		
</div>
<hr class="my-4">
        <div class="form-group">
          <label class="col-sm-4 control-label">Username</label>
          <div class="col-sm-8">
            <input type="text" name="username" class="form-control" placeholder="<?php echo $usResult['user_name']; ?>" required="required">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-4 control-label">Password</label>
          <div class="col-sm-8">
            <input type="text" name="password" class="form-control" placeholder="<?php echo $usResult['user_password']; ?>" required="required">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-4 control-label"></label>
          <div class="col-sm-8">
            <input type="submit" name="submit" class="btn btn-success" value="Confirm">
            <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
          </div>
        </div>
        <input name="user_id" type="hidden" value="<?php echo $user_id;?>" />
      </form>

    </div>
  </div>
</div>
</div>

</div>

</body>
</html>
