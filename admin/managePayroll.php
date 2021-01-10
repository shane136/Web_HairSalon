<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];
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

<div class="col-2 border border-danger flex-column d-flex"style="height:120%;background: #ffe6e6 !important;">

<a href="\Web_HairSalon\admin\index.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Home</small></p></a>

<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Logout</small></p></a>

<a href="../admin/manageService.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Manage Service</small></p></a>

<a href="../admin/manageEmployee.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Manage Employee</small></p></a>

<a href="../admin/managePayroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:110%; text-align:center;"><strong>Manage Payroll</strong></p></a>

<a href="../admin/reports.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Sales Reports</small></p></a>

<a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>About</small></p></a>

</div>

<div class="container mh-100 p-3" style="background: #0F222D;height:30vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>
<br><hr>
<div class="row p-1 w-auto mt-4 d-flex justify-content-center" style ="background: #fff; border-radius: 10px;">
<form class="form-horizontal">
              <fieldset>

                <p align="center"><big><b>List of Employed Employees</b></big></p>
                <div class="table-responsive-sm">

                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">

                      <thead>
                        <tr class="info">
                          <th><p align="center">Name</p></th>
                          <th><p align="center">Job Type</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
$query = mysqli_query($con, "SELECT * from employee, user_account WHERE employee.user_id = user_account.user_id;");

                        while($row=mysqli_fetch_assoc($query))
                      	{
                            $id     =$row['employee_id'];
                            $lname  =$row['l_name'];
                            $fname  =$row['f_name'];
                            $type   =$row['job_type'];
                            //manipulation
                            if($type == 1){
                              $job_type = "Colourist";
                            }
                            elseif($type == 2){
                              $job_type = "Waxing Specialist";
                            }
                            elseif($type == 3){
                              $job_type = "Barber Stylist";
                            }
                            elseif($type == 4){
                              $job_type = "Hair Extenstion Stylist";
                            }
                            elseif($type == 5){
                              $job_type = "Senior Stylist";
                            }
                            else{
                              $job_type = "Hairdresser";
                            }

      if ($row['status']==1) {
                        ?>

                        <tr>
                          <td align="center"><h5><?php echo $row['l_name'] ?>,  <?php echo $row['f_name'] ?></h5></td>
                          <td align="center"><h5><?php echo "$job_type"; ?></h5></td>
                          <td align="center">
                            <a class="btn btn-primary" href="view_account.php?employee_id=<?php echo $row["employee_id"]; ?>">Account</a>
                          </td>
                        </tr>

                        <?php } } ?>
                      </tbody>

                    </table>
                  </div>
                  </form>
                </div>
              </fieldset>
            </form>
</div>

</div>


<hr>

<!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

</body>
</html>
