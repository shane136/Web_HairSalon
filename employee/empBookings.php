<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];
$empl=mysqli_query($con, "SELECT * from employee WHERE employee.user_id = $user_id;");
$empl = mysqli_fetch_assoc($empl);
$emid = $empl['employee_id'];

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
<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="../css/startmin.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<style type="text/css">
*{
	font-family: var(--bs-font-sans-serif);
}
span{
  float: left;
}
</style>
<body class = "d-flex flex-row h-100">
<div class="col-2 border border-danger h-100 flex-column d-flex"style="height:50px;background: #ffe6e6 !important;">

<a href="employee.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Home</small></p></a>
<a href="empProfile.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Profile</small></p></a>
<a href="empBookings.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Bookings</small></p></a>
<a href="payroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>View Payroll</small></p></a>
<a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>About</small></p></a>
<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Logout</small></p></a>

</div>

<div class="col-10 h-100 flex-column d-flex" style="background:#0F222D;">
<div class="flex-column m-3" style="height:17vh;">
	<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
	<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
	</div>
</div>

<div class="flex-column d-flex m-3 mt-0">
	<div class="row m-1 p-2 bg-white">
<?php 
$sql = mysqli_query($con, "SELECT * from bookings WHERE employee_id = $emid ORDER BY date_sched ASC;");

?>
<div class="row ">
  <div class="col-6">
<div class="card shadow mb-0">
<div class="card-header">
  <b style="float: left; font-size: 25px;">Booked Customer -</b>
  <p id="date" style="float: left; font-size: 25px;"></p>
</div>
<div class="card-body">
    <div class="col-12 p-3" style="border: 1px solid #000; height: 100%;">      
  <div class="chat-panel panel panel-default" >
    <!-- /.panel-heading -->
    <div class="card-body">
        <ul class="chat">
<?php
$sql = mysqli_query($con, "SELECT * from bookings WHERE employee_id = $emid ORDER BY date_sched ASC;");
          while ($wow = mysqli_fetch_assoc($sql)) {
                  $date = date_create($wow['date_sched']);
                  $boDe = date_create($wow['book_date']);
                  $customer=$wow['customer_id'];
                  $service=$wow['service_id'];
                  $sqli=mysqli_query($con,"SELECT * FROM customer WHERE customer_id=$customer;");
                  $reCus = mysqli_fetch_assoc($sqli);
                  $sqli=mysqli_query($con,"SELECT * FROM services WHERE service_id=$service;");
                  $reSer = mysqli_fetch_assoc($sqli);
  ?>          
            <li class="right">
<!--                    <span class="chat-img pull-left">
                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar"
                             class="img-circle"/>
                    </span>
-->
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong><?php echo $reCus['f_name'].' '.$reCus['l_name'];?></strong>
                        <small class="pull-right text-muted">
                            <i class="fa fa-clock-o fa-fw"></i><?php echo date_format($date, "F - d, Y: g:i A");?>
                        </small>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                        ornare dolor, quis ullamcorper ligula sodales.
                    </p>
                </div>
            </li>
<?php }
?>
        </ul>
    </div>
    <!-- /.panel-body -->
<!-- /.chat panel enddahdahdah -->
    </div>        
</div>
<hr>
</div>

  </div>
</div>
	</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../js/startmin.js"></script>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
</script>
</body>
</html>
