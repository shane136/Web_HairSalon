<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];

$emp = "SELECT * FROM employee WHERE user_id = '$user_id'";
$get_result = mysqli_query($con, $emp);
while($row = mysqli_fetch_assoc($get_result)){
  $emp_id = $row['employee_id'];
}
$payroll_date = "";
$payroll = "SELECT * FROM payroll_record WHERE employee_id = '$emp_id'";
$payroll_result = mysqli_query($con, $payroll);
while($rows = mysqli_fetch_assoc($payroll_result)){
  $payroll_date = $rows['payroll_date'];
}
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

<a href="employee.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%; text-align: left;"> <i class="fas fa-home"></i><small> Home</small></p></a>

<a href="empProfile.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%; text-align: left;"> <i class="fas fa-user"></i><small> Profile</small></p></a>

<a href="empBookings.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-calendar-alt"></i><small> Bookings</small></p></a>

<a href="payroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-clipboard-list"></i><small> View Payroll</small></p></a>

<!-- <a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-info-circle"></i><small> About</small></p></a> -->

<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-sign-out-alt"></i><small> Logout</small></p></a>

</div>

<div class="col border border-danger h-100">

<div class="container-fluid mh-100 p-3" style="background: #0F222D;height:25vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>
</div>


<div class="container-fluid p-3" style="background: #0F222D;height: 75%;">
     <!-- <form class="" action="\Web_HairSalon\conn\payroll.php" method="post"> -->

       <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
       <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
       <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
<div class="row">
 <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
     <div class="row">
         <div class="col-xs-6 col-sm-6 col-md-6">
             <address>
                 <strong>J.HairSalon</strong>
                 <br>
                 <!-- Employee Name:
                 <br> -->
                 <!-- Philippines
                 <br>
                 <abbr title="Phone">P.:</abbr> (213) 484-6829
             </address> -->
         
     </div>
        <div class="col-xs-6 col-sm-6 col-md-6 text-right" style="color:black">
          Date:
              <span id="date"></span>
         </div>
     <div class="col-12">
         <div class="text-center">
             <h1>Payroll Record</h1>
         </div>
         </span>
         <table class="table table-hover">
             <thead>
                 <tr>
                     <th class="text-center">Employee Name</th>
                     <th class="text-center">Total Salary</th>
                     <th class="text-center">Payroll Date</th>
                 </tr>
             </thead>
             <tbody>
               <?php


                $emp = "SELECT * FROM employee WHERE user_id = '$user_id'";
                $get_result = mysqli_query($con, $emp);
                while($row = mysqli_fetch_assoc($get_result)){
                  $emp_id = $row['employee_id'];
                  $fname = $row['f_name'];
                  $lname = $row['l_name'];
                }
                $fullname = $fname." ".$lname;
                $payroll = "SELECT * FROM payroll_record WHERE employee_id = '$emp_id' ORDER BY payroll_date DESC;";
                $payroll_result = mysqli_query($con, $payroll);
                while($rows = mysqli_fetch_assoc($payroll_result)){
                  $total_salary = $rows['total_salary'];



                ?>
                 <tr>
                     <td class="text-center"><?php echo "$fullname"; ?></td>
                     <td class="text-center"><?php echo "$total_salary"; ?></td>
                     <td class="text-center"><?php echo $rows['payroll_date']; ?></td>
                 </tr>
                  <?php
                   }

                 ?>
                 <!-- <tr>
                     <td>   </td>
                     <td>   </td>
                     <td class="text-center"><h4><strong>Total: PHP  </strong></h4></td> 
                 </tr>
-->
             </tbody>
         </table>
     </div>
   </div>
 </div>
</div>

<script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
</script>

</body>
</html>
