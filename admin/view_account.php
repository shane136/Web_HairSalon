<?php
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
  include("update_account.php");
  $id=$_GET['employee_id'];
	$salary = 0;
  $total = 0;

$paytime = mysqli_query($con, "SELECT * FROM bookings WHERE employee_id='$id';");
$array = mysqli_fetch_assoc($paytime);

	$get_salary = "SELECT * FROM salary WHERE employee_id = '$id'";
	$salary_result = mysqli_query($con, $get_salary);
	while($row = mysqli_fetch_assoc($salary_result)){

		$salary = $row['total_salary'];
	}


  $payroll = "SELECT * FROM payroll_record WHERE employee_id = '$id';";
  $payroll_result = mysqli_query($con, $payroll);
  $rawr = mysqli_fetch_assoc($payroll_result);
  $checker=mysqli_num_rows($payroll_result);
  if ($checker>0) {
    $rawl=$rawr['payroll_date'];
  }else{
    $rawl='New Employee';
  }

$sqlf = mysqli_query($con, "SELECT COUNT(*) AS cnt FROM salary WHERE employee_id='$id';");
$inct = mysqli_fetch_assoc($sqlf);
$sqlop = mysqli_query($con, "SELECT * FROM salary WHERE employee_id='$id' ;");

$numrows = mysqli_num_rows($sqlop);
$x=0;
if ($numrows >= 15) {
  while ($x <= 15) {
    $sume = mysqli_fetch_assoc($sqlop);
    $total = $total + $sume['total_salary'];
    $x = $x + 1;
  }
} else {
  while ($x != $numrows) {
    $sume = mysqli_fetch_assoc($sqlop);
    $total = $total + $sume['total_salary'];
    $x = $x + 1;
  }
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
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body class = "d-flex flex-row h-100">

<div class="col-2 border h-100 flex-column d-flex" style="height:50px;background: #ffe6e6 !important;">

<a href="\Web_HairSalon\admin\index.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:115%; text-align:left;"> <i class="fas fa-home"></i><small> Home</small></p></a>

<a href="../admin/managePayroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-clipboard"></i><strong> Manage Payroll</strong></p></a>

<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-sign-out-alt"></i><small> Logout</small></p></a>
</div>

<div class="container-fluid p-0" style="background: #0F222D;height: 100%;">
<div class="mh-100 p-3" style="height:25vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>

<div class="col-md-12 mt-4" style="margin:1px;background:#ffe6e6;border-radius:5px;">
<div class="row container-fluid p-0 m-0">
<div class="col-md-6 mt-4 mb-4">
  <div class="col-md-12 p-4" style="background:#fff;border: 1px solid #000; border-radius: 20px; height: 500px;">

<form action="update_account.php" method="post" name="form">
  <div class="col-sm-12 d-flex m-2 mt-0 pt-0">
      <div class="p-2">
        <strong>Sum of 15 days work: <p class="bg-warning" style="text-align: center;"><?php echo $total.".00";?></p></strong>
      </div>
      <br>

  </div>

<div class="container">
 <div class="text-center">
     <h1><b>Payroll</b></h1>
 </div>

  <table class="table table-hover">
     <thead>
         <tr>
             <th class="text-center">Employee Name</th>
             <th class="text-center">Total Salary</th>
             <th class="text-center">Date</th>
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
        $payroll = "SELECT * FROM payroll_record WHERE employee_id = '$id' ORDER BY payroll_date DESC";
        $payroll_result = mysqli_query($con, $payroll);
        while($rows = mysqli_fetch_assoc($payroll_result)){
        $total_salary = $rows['total_salary'];
?>
         <tr>

             <td class="text-center"><?php echo "$fullname"; ?></td>
             <td class="text-center"><?php echo "$total_salary"."00"; ?></td>
             <td class="text-center"><?php echo $rawl; ?></td>
         </tr>
<?php
}
?>
     </tbody>
  </table>
</div>
              <div style="text-align: right;">
                <label class="col-sm-12 control-label"></label>
                <div class="col-sm-12">
                  <button type="button" data-toggle="modal" data-target="#addPay" class="btn btn-outline-primary" style="">Add Payroll</button>
                  <a href="managePayroll.php" class="btn btn-warning">Cancel</a>
                </div>
              </div>

          </form>
    </div>
</div>
<div class="col-md-6 mt-4 mb-4">
    <div class="col-md-12 p-4" style="background:#fff;border: 1px solid #000; border-radius: 20px; height: 500px;">
<div class="card-header d-flex justify-content-between">

  <div class="d-flex flex-row p-2">
      <h5 class="m-0 font-weight-bold text-muted">Service Record</h5>
  </div>
  <div class="d-flex flex-row-reverse">
    <p class="">Total of Days
      <span class="p-2 bg-info"><?php echo $inct['cnt']; ?></span>
      before 15.
    </p>
  </div>

</div>
<div class="card-body">
          <div class="table-responsive-sm">
            <form method="">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="info">
                  <th><p align="center">ID</p></th>
                  <th><p align="center">No. of Service Rendered</p></th>
                  <th><p align="center">Rate</p></th>
                  <th><p align="center">Total Salary</p></th>
                </tr>
              </thead>
              <tbody>
                
<?php
  $sql = mysqli_query($con, "SELECT * FROM salary WHERE employee_id = '$id';");
  $i=0;
  while ($check = mysqli_fetch_assoc($sql)) {
    $i=$i+1;
?>
<tr>
                  <td><p align="center"><?php echo $i;?></p></td>
                  <td><p align="center"><?php echo $check['num_service_rendered'];?></p></td>
                  <td><p align="center"><?php echo $check['commission_rate'];?></p></td>
                  <td><p align="center"><?php echo $check['total_salary'].".00";?></p></td>
</tr>                  
<?php } ?>
                
              </tbody>
              </table>
            </form>
          </div>
</div>
    </div>
</div>
</div>
    </div>
</div>
</div>


<?php
$checker=mysqli_num_rows($payroll_result);
  if ($checker>0) {
    $rawli=$rawr['total_salary'];
  }else{
    $rawli='No Salary';
  }
?>
</div>
<!-- this modal is for ADDING an Payroll -->
<div class="modal fade" id="addPay" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding:15px 30px;">
            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            <h3 style="padding: 10px 30% 0px 0px"><b>Add Payroll</b></h3>
          </div>

          <div class="modal-body" style="padding:20px 30px;">
            <form class="form-horizontal" action="" name="form" method="POST">

							<input name="empl_id" type="hidden" value="<?php echo $emp_id;?>" />

              <div class="form-group">
                <label class="col-sm-12 control-label">Payroll</label>
                <div class="col-sm-12">
									<input type="hidden" name="totalsalary" value="<?php echo $total.".00"; ?>">
                  <p class="form-control" style="text-align: right;"><?php echo $total.".00"?></p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-12 control-label">Previous Payroll</label>
                <div class="col-sm-12">
                  <p class="form-control" style="text-align: right;"><?php echo $rawli.' '.'-'.' '.$rawl?></p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-12 control-label"></label>
                <div align="right" class="col-sm-12">
                  <input type="submit" name="submit" class="btn btn-success" value="Submit">
                  <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                </div>
              </div>

            </form>
          </div>

        </div>
  </div>
</div>

</div>
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../js/demo/datatables-demo.js"></script>
</body>
</html>
