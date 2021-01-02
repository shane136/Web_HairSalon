<?php 
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$id=$_GET['employee_id'];

$sql = mysqli_query($con, "SELECT * from deductions WHERE deduction_id='1'");
  while($row = mysqli_fetch_array($sql))
  {
    $phil = $row['philhealth'];
    $bir = $row['bir'];
    $gsis = $row['gsis'];
    $love = $row['pag_ibig'];
    $loans = $row['loans'];
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

<div style="width:450px;height:100%; text-align:left; margin: auto; padding: 10px;">
<?php
    $id=$_REQUEST['employee_id'];
    $query = "SELECT * from employee where employee_id='".$id."'";
    $result = mysqli_query($con, $query) or die ( mysql_error());

    $query  = mysqli_query($con, "SELECT * from overtime");
    while($row=mysqli_fetch_array($query))
    {
      $rate   = $row['rate'];
    }

    $query  = mysqli_query($con, "SELECT * from salary");
    while($row=mysqli_fetch_array($query))
    {
      $salary   = $row['commission_rate'];
    }

    while ($row = mysqli_fetch_assoc($result))
    {
        $overtime     = $row['overtime'] * $rate;
        $deduction  = $row['deduction'];
        $income   = $overtime  + $salary;
        $netpay   = $income - $deduction;
      ?>

          <form style="margin: auto; padding: 10px;" action="update_account.php" method="post" name="form">
            <input type="hidden" name="new" value="1" />
            <input name="id" type="hidden" value="<?php echo $row['employee_id'];?>" />
              <div class="">
                <label class="col-sm-1 control-label"></label>
                <div class="col-sm-0">
                  <h2><?php 
                  echo $row['l_name']; ?>, <?php echo $row['f_name']; ?></h2>
                </div>
              </div>
              <div class="">
                <label class="col-sm-0 control-label">Deduction/s  :</label>
                <div class="col-sm-0">
                <select name="deduction" class="form-control" required>
                  <option value=""><?php echo $row['deduction'];?></option>
                  <option value="<?php echo $phil; ?>">PhilHealth</option>
                  <option value="<?php echo $bir; ?>">BIR</option>
                  <option value="<?php echo $gsis; ?>">GSIS</option>
                  <option value="<?php echo $love; ?>">PAG-IBIG</option>
                  <option value="<?php echo $loans; ?>">Loans</option>
                </select>
              </div>
              </div>
              <div class="">
                <label class="col-sm-0 control-label">Overtime  :</label>
                <div class="col-sm-0">
                  <input type="text" name="overtime" class="form-control" value="<?php echo $row['overtime'];?>" required="required">
                </div>
              </div>
              <br><br>

              <div class="">
                <label class="col-sm-0 control-label">Netpay  :</label>
                <div class="col-sm-0">
                  <?php echo $netpay;?>.00
                </div>
              </div><br><br>
              <div style="text-align: right;">
                <label class="col-sm-5 control-label"></label>
                <div class="col-sm-0">
                  <input type="submit" name="submit" value="Update" class="btn btn-danger">
                  <a href="managePayroll.php" class="btn btn-primary">Cancel</a>
                </div>
              </div>
          </form>
        <?php
      }
    ?>
</div>
</div>

</body>
</html>
