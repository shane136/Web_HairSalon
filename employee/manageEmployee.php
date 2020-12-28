<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
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

<div class="col-2 border border-danger h-100 flex-column d-flex"style="height:50px;background: #ffe6e6 !important;">

<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Logout</small></p></a>

<a href="../employee/manageService.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Manage Service</small></p></a>

<a href="../employee/manageEmployee.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Manage Employee</small></p></a>

<a href="../employee/managePayroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Manage Payroll</small></p></a>

<a href="../employee/reports.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Sales Reports</small></p></a>

<a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>About</small></p></a>

</div>

<div class="container mh-100 p-3" style="background: #0F222D;height:30vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>
<div class="row p-1 w-auto mt-4 d-flex justify-content-center" style ="background: #ffe6e6; border-radius: 10px;">
<div class="card shadow mb-0">
<div class="card-header py-4">
                <h9 class="m-0 font-weight-bold text-primary">Employee</h9>
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
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php\/. de-yjhgfd
                        		if($resultCount>0){

                        			while ($products = mysqli_fetch_assoc($all_products)) {
                        				echo '<tr>';
                        				echo '<td>'.$products['employee_id'].'</td>';
	                            		echo '<td>'.$products['f_name']." ".$products['l_name'].'</td>';
	                            		echo '<td>'.$products['email'].'</td>';
	                            		echo '<td>'.$products['address'].'</td>';
	                            		echo '<td>'.$products['phone_number'].'</td>';
	                            		echo '<td>'.$products['user_name'].'</td>';
	                            		echo '<td class="hidetext" style="-webkit-text-security: disc;">'.$products['user_password'].'</td>';
	                            		echo '</tr>';
                        			}
                        		}
                        	?>
                        </tbody>
                    </table>
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
