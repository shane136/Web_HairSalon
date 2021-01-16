<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
include("add_employee.php");
$user_id = $_SESSION['user_id'];

$product_query = "SELECT * from employee, user_account WHERE employee.user_id = user_account.user_id;";
$all_products = mysqli_query($con, $product_query);
$resultCount = mysqli_num_rows($all_products);
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

<div class="col-2 border flex-column d-flex"style="height:135%;background: #ffe6e6 !important;">

<a href="\Web_HairSalon\admin\index.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-home"></i><small> Home</small></p></a>

<a href="../admin/manageService.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-tasks"></i><small> Manage Service</small></p></a>

<a href="../admin/manageEmployee.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:110%; text-align:left;"> <i class="fas fa-users"></i><strong> Manage Employee</strong></p></a>

<a href="../admin/managePayroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-clipboard"></i><small> Manage Payroll</small></p></a>

<!-- <a href="../admin/reports.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-chart-line"></i><small> Sales Reports</small></p></a> -->

<a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-info-circle"></i><small> About</small></p></a>

<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-sign-out-alt"></i><small> Logout</small></p></a>

</div>

<div class="container mh-100 p-3" style="background: #0F222D;height:30vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>
<div class="row p-1 w-auto mt-4 d-flex justify-content-center" style ="background: #ffe6e6; border-radius: 10px;">
<div class="card shadow mb-0">
<div class="card-header py-4">
                <h9 class="m-0 font-weight-bold text-primary">Employee</h9>

    <button type="button" data-toggle="modal" data-target="#addEmployee" class="btn btn-success" style="float: right;">Add New</button>
</div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Contact No.</th>
                                <th>User Name</th>
                                <th>Job Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
                        		if($resultCount>0){

                        			while ($products = mysqli_fetch_assoc($all_products)) {
                                if ($products['status']==1) {
                        				echo '<tr>';
                        				echo '<td>'.$products['employee_id'].'</td>';
	                            		echo '<td>'.$products['f_name']." ".$products['l_name'].'</td>';
	                            		echo '<td>'.$products['email'].'</td>';
	                            		echo '<td>'.$products['address'].'</td>';
	                            		echo '<td>'.$products['phone_number'].'</td>';
	                            		echo '<td>'.$products['user_name'].'</td>';
if ($products['job_type']==0) {
	$types='Error';
}elseif ($products['job_type']==1) {
	$types='Colourist';
}elseif($products['job_type']==2){
	$types='Senior Stylist';
}elseif($products['job_type']==3){
	$types='Waxing Specialist';
}elseif ($products['job_type']==4) {
	$types='Hair Extenstion Stylist';
}elseif ($products['job_type']==5) {
	$types='Hairdresser';
}else{
	$types='Barber Stylist';
}

	                            		echo '<td>'.$types.'</td>';

?>

    <td align="center"><a class="btn btn-danger" href="delete.php?employee_id=<?php echo $products["employee_id"]; ?>">Delete</a></td>
<?php
	                            		echo '</tr>';
                                  }
                        			}
                        		}
                        	?>
                        </tbody>
                    </table>
                </div>
            </div>
<hr>
<div class="row p-1 w-auto mt-4 d-flex justify-content-center" style ="background: #fff; border-radius: 10px;">
<form class="form-horizontal">
<fieldset>

  <p align="center"><big><b>List of New User Account</b></big></p>
  <div class="table-responsive">

    <form method="" action="" >
      <table class="table table-bordered table-hover table-condensed" id="">

        <thead>
          <tr class="info">
            <th><p align="center">ID</p></th>
            <th><p align="center">User Name</p></th>
            <th><p align="center">Password</p></th>
            <th><p align="center">Status</p></th>
            <th><p align="center">Action</p></th>
          </tr>
        </thead>
        <tbody>
          <?php

$query = mysqli_query($con, "SELECT * from user_account WHERE user_type='Employee' AND status='0';");

          if(mysqli_num_rows($query)>0)
          {
            while($row=mysqli_fetch_assoc($query))
            {

          ?>

          <tr>
            <td align="center"><h5><?php echo $row['user_id'] ?></h5></td>
            <td align="center"><h5><?php echo $row['user_name'] ?></h5></td>
            <td align="center"><h5><?php echo $row['user_password'] ?></h5></td>
            <td align="center"><h5><?php if($row['status'] == 0){ echo "Unallocated"; }
              else{
                echo "Error";
              }?></h5></td>
            <td align="center">
              <a class="btn btn-outline-primary" href="add_details.php?user_id=<?php echo $row["user_id"]; ?>">Add Details</a>
              <a class="btn btn-danger" href="userdel.php?user_id=<?php echo $row["user_id"]; ?>">Delete</a>
            </td>
          </tr>

          <?php } } ?>
        </tbody>

      </table>
    </form>
  </div>
</fieldset>
</form>
</div>
</div>

<!-- this modal is for ADDING an EMPLOYEE -->
      <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Employee</b></h3>
            </div>

                <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">

                <div class="form-group">
                  <label class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="text" name="password" class="form-control" placeholder="Password" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
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
</div>

</div>

<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../js/demo/datatables-demo.js"></script>

</body>
</html>
