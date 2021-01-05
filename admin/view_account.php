<?php 
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$id=$_GET['employee_id'];

  $payroll = "SELECT * FROM payroll_record WHERE employee_id = '$id'";
  $payroll_result = mysqli_query($con, $payroll);
  $rawr = mysqli_fetch_assoc($payroll_result);
$checker=mysqli_num_rows($payroll_result);
  if ($checker>0) {    
    $rawl=$rawr['payroll_date'];
  }else{
    $rawl='New Employee';
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

<a href="\Web_HairSalon\admin\index.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:115%; text-align:center;"><strong>Home</strong></p></a>

<a href="../admin/managePayroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Manage Payroll</small></p></a>

<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Logout</small></p></a>
</div>

<div class="container mh-100 p-3" style="background: #0F222D;height:30vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>

<div class="mt-5" style="width:550px;height:100%; text-align:left; margin: auto; padding: 10px;">
<?php
    $id=$_REQUEST['employee_id'];
    $query = "SELECT * from employee where employee_id='".$id."'";
    $result = mysqli_query($con, $query) or die ( mysql_error());
?>
<form class="" style="" action="update_account.php" method="post" name="form">
<div style="border: 1px solid #000; border-radius: 20px; padding: 50px; height: 500px;">
     <div class="row">
         <div class="col-sm-6">
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
         <div class="col-sm-6 text-right">
              <p class="" style="color:black">Payroll Date: <?php echo $rawl; ?></p>
         </div>
</div>
<div class="row">
 <div class="text-center">
     <h1>Payroll</h1>
 </div>
         </span>
  <table class="table table-hover">
     <thead>
         <tr>
             <th class="text-center">Employee Name</th>
             <th class="text-center">Total Salary</th>

         </tr>
     </thead>
     <tbody>
<?php
  $emp = "SELECT * FROM employee WHERE employee_id = '$id'";
  $get_result = mysqli_query($con, $emp);
  while($row = mysqli_fetch_assoc($get_result)){
  $emp_id = $row['employee_id'];
  $fname = $row['f_name'];
  $lname = $row['l_name'];
  }
  
  $fullname = $fname." ".$lname;
        $payroll = "SELECT * FROM payroll_record WHERE employee_id = '$id'";
        $payroll_result = mysqli_query($con, $payroll);
        while($rows = mysqli_fetch_assoc($payroll_result)){
          $total_salary = $rows['total_salary'];                  
?>
         <tr>

             <td class="text-center"><?php echo "$fullname"; ?></td>
             <td class="text-center"><?php echo "$total_salary"; ?></td>
         </tr>
<?php
}
?>
     </tbody>
  </table>
</div>
              <div style="text-align: right;">
                <label class="col-sm-5 control-label"></label>
                <div class="col-sm-0">
                  <input type="submit" name="submit" value="Update" class="btn btn-danger">
                  <a href="managePayroll.php" class="btn btn-primary">Cancel</a>
                </div>
              </div>
          </form>
<?php

?>
</div>
</div>

</body>
</html>
