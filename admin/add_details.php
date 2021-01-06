<?php
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$user_id=$_GET['user_id'];
$query = "SELECT * FROM user_account WHERE user_id='$user_id';";
$sql = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($sql);
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

<body class = "d-flex flex-row h-100">

<div class="col-2 border border-danger h-100 flex-column d-flex"style="height:50px;background: #ffe6e6 !important;">

<a href="\Web_HairSalon\admin\index.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:115%; text-align:center;"><strong>Home</strong></p></a>

<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Logout</small></p></a>
</div>

<div class="container mh-100 p-3" style="background: #0F222D;height:30vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>

<div class="row p-1 mt-4" style="width:250px; text-align:left; margin: auto;">


<form method="POST" action="submit_details.php">

<label class="col-sm-1 control-label"></label>
    <div class="col-sm-0">
      <h2><?php echo $row['user_name']; ?></h2>
    </div>

<input name="user_id" type="hidden" value="<?php echo $row['user_id'];?>" />

        <div class="form-textbox">
            <label for="name">First Name:</label>
            <input type="text" name="f_name" id="name" required />
        </div>

        <div class="form-textbox">
            <label for="name">Last Name:</label>
            <input type="text" name="l_name" id="name" required/>
        </div>

        <div class="form-textbox">
            <label for="name">Address:</label>
            <input type="text" name="address" id="name" required />
        </div>

        <div class="form-textbox">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="p_number" id="p_number" required/>
        </div>

        <div class="form-textbox">
            <label for="phone_number">Email:</label>
            <input type="text" name="email" id="p_number"  required/>
        </div>

        <div class="form-group">
          <label class="control-label">Job Type:</label>
          <div class="col-sm-8">
            <select name="job_type" class="form-control-sm" placeholder="Employee Type" required>
              <option value="">Job Type</option>
              <option value="1">Color</option>
              <option value="2">Waxing</option>
              <option value="3">Grooming</option>
              <option value="4">Extensions</option>
              <option value="5">Styling</option>
              <option value="6">Design</option>
            </select>
          </div>
        </div>

<div style="text-align: right;">
	<label class="col-sm-5 control-label"></label>
	<div class="col-sm-0">
	  <input type="submit" name="submit" value="Add Details" class="btn btn-outline-primary">
	  <a href="manageEmployee.php" class="btn btn-danger">Cancel</a>
	</div>
</div>
    </form>

</div>
</div>
</body>
</html>
