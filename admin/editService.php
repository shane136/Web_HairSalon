<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
  require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
  $id=$_GET['service_id'];

  $sql=mysqli_query($con, "SELECT * FROM services WHERE service_id='$id';");
  $check=mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>J.HairSalon</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body class = "d-flex flex-row h-100">

<div class="col-2 border flex-column d-flex"style="height:120%;background: #ffe6e6;">

<a href="\Web_HairSalon\admin\index.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-home"></i><small> Home</small></p></a>

<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-sign-out-alt"></i><small> Logout</small></p></a>

</div>

<div class="container-fluid p-0" style="background: #0F222D;">
<div class="mh-100 p-3" style="height:30vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>
<div class="mh-100 pt-2">
<div class="p-3 w-100 mt-4 d-flex justify-content-center" style ="background: #fff; border-radius: 10px;">    <div class="container">
<div class="d-flex justify-content-center p-4">
      <div class="modal-content" style="width: 50%;">
          <div class="modal-header">
            <h3 style="padding: 10px 0%;"><b>Update Service</b></h3>
            <a type="button" href="manageService.php" style="padding: 2px 10px;border:1px solid #000;text-decoration: none;">&times;</a>
          </div>

          <div class="modal-body" style="padding:20px 30px;">
            <form class="form-horizontal" action="#" name="form" method="POST">

              <div class="form-group">
                <label class="col-sm-12">Service Name:</label>
                <div class="col-sm-12">
                  <input type="text" name="service" style="text-align: right;" class="form-control" placeholder="<?php echo $check['service_name'];?>" required="required">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-12">Price:</label>
                <div class="col-sm-12">
                  <input type="text" name="price" style="text-align: right;" class="form-control" placeholder="<?php echo $check['service_price'];?>" required="required">
                </div>
              </div>
<hr>
              <div class="form-group">                
                <div class="col-sm-12">
                  <input type="submit" name="submitDATA" class="btn btn-success" value="Update" style="margin: 0; padding: 6px 7px 6px 7px;">
                  <input type="reset" class="btn btn-danger" value="Clear Fields" style="margin: 0; padding: 6px 7px 6px 7px;">
                </div>
              </div>
            </form>
          </div>
        </div>
</div>              
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<?php 
if (isset($_POST['submitDATA'])) {
$name = $_POST['service'];
$price = $_POST['price'];

    if ($name != '' && $price != '') {
      mysqli_query($con, "UPDATE services SET service_name='$name', service_price='$price' WHERE service_id='$id';");
      ?>
      <script type="text/javascript">
        alert('Successfully Update!')
        window.location.href = '/Web_HairSalon/admin/manageService.php';
      </script>
      <?php
    }else
    {
?>
      <script type="text/javascript">
        alert('Error! Try using Proper Naming and Pricing');
        window.location.href = '/Web_HairSalon/admin/manageService.php';
      </script>
<?php
    }
}
?>