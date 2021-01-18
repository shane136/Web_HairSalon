<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
<head>
<meta charset="utf-8">

<script>

var ScrollMsg= "J.HairSalon | Manage Services - "
var CharacterPosition=0;
function StartScrolling() {
document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
ScrollMsg.substring(0, CharacterPosition);
CharacterPosition++;
if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
window.setTimeout("StartScrolling()",150); }
StartScrolling();

  </script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
div.form-textbox{
  margin: 10px;
  font-size: 20px;
  padding: 10px 30px 0px 30px;
}
input#box{
  width: 100%;
  text-align: right;
}
input.btn{
  width: 20%;
  margin: 10px 40px 0px 0px;
}
</style>
</head>

<body class = "d-flex flex-row h-100">

<div class="col-2 border flex-column d-flex"style="height:123%;background: #ffe6e6 !important;">

<a href="\Web_HairSalon\admin\index.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-home"></i><small> Home</small></p></a>

<a href="../admin/manageService.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:110%; text-align:left;"> <i class="fas fa-tasks"></i><strong> Manage Service</strong></p></a>

<a href="../admin/manageEmployee.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-users"></i><small> Manage Employee</small></p></a>

<a href="../admin/managePayroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-clipboard"></i><small> Manage Payroll</small></p></a>

<!-- <a href="../admin/reports.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-chart-line"></i><small> Sales Reports</small></p></a> -->

<!-- <a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-info-circle"></i><small> About</small></p></a> -->

<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:115%; text-align:left;"> <i class="fas fa-sign-out-alt"></i><small> Logout</small></p></a>
</div>


<div class="container-fluid" style="background:#0F222D;height:123%;">
<div class="mh-100 p-3" style="height:20vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>

<div class="container-fluid col-sm-12 p-1 mt-4" style ="background: #ffe6e6; border-radius: 10px;">
<div class="row p-5" >
<div class="col-lg-8 p-2">
    <div class="card shadow mb-0">
    <div class="card-header py-4">
                <h9 class="m-0 font-weight-bold text-primary">Services</h9>
    </div>
            <div class="card-body p-2">
                <div class="table-responsive-sm">
                    <table class="table table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Service Name</th>
                                <th>Service Price</th>
                                <th>Type of Service</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$product_query = "SELECT * from services, service_type WHERE services.type_id = service_type.type_id;";
$all_products = mysqli_query($con, $product_query);
$resultCount = mysqli_num_rows($all_products);

                                if($resultCount>0){
                                $i=0;
                                    while ($products = mysqli_fetch_assoc($all_products)) {
                                        echo '<tr>';
                                        $i=$i+1;
                                    ?>
                                        <td><?php echo $i;?></td>
                                    <?php
                                    echo '<td>'.$products['service_name'].'</td>';
                                    echo '<td>'.$products['service_price'].'</td>';
                                    echo '<td>'.$products['type_name'].'</td>';

?>
<td>
<a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');" href="serDel.php?service_id=<?php echo $products["service_id"]; ?>">Delete</a>
<a class="btn btn-primary" href="editService.php?service_id=<?php echo $products["service_id"]; ?>">Update</a>
</td>
<?php
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
<div class="col-lg-4 p-1">
    <div class="col-sm-12 d-flex" style="border: 1px solid #fff; border-radius: 10px; background-color: #fff; height: 100%;">
        <div class="p-4">
<h2>Service Menus</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu">Color</a></li>
    <li><a data-toggle="tab" href="#menu1">Styling</a></li>
    <li><a data-toggle="tab" href="#menu2">Waxing</a></li>
    <li><a data-toggle="tab" href="#menu3">Extensions</a></li>
    <li><a data-toggle="tab" href="#menu4">Design</a></li>
    <li><a data-toggle="tab" href="#menu5">Grooming</a></li>
  </ul>

  <div class="tab-content">
    <div id="menu" class="tab-pane fade in active">
      <h3>Color</h3>
      <div class="col-md-12" style="padding: 0px;">
        <center><h4  style="margin-top:0px; margin-bottom:5px;"><b><i>Service Details</i></b></h4></center>
        <div style="border: 1px solid #000; border-radius: 10px; height: 350px;">
          <form method="POST" action="addService.php">
            <input type="hidden" name="type_id" value="1">
            <div class="form-textbox">
              <label for="name">Name:</label>
              <input type="text" name="service_name" id="box" required/>
            </div>
            <div class="form-textbox">
              <label for="name">Price:</label>
              <input type="text" name="service_price" id="box" required/>
            </div>
<div style="text-align: right;">
  <label class="col-sm-5 control-label"></label>
  <div class="col-sm-0">
    <input type="submit" name="submit" value="Add" class="btn btn-primary">

  </div>
</div>
          </form>
        </div>
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Styling</h3>
      <div class="col-md-12" style="padding: 0px;">
        <center><h4  style="margin-top:0px; margin-bottom:5px;"><b><i>Service Details</i></b></h4></center>
        <div style="border: 1px solid #000; border-radius: 10px; height: 350px;">
          <form method="POST" action="addService.php">
            <input type="hidden" name="type_id" value="2">
            <div class="form-textbox">
              <label for="name">Name:</label>
              <input type="text" name="service_name" id="box" required/>
            </div>
            <div class="form-textbox">
              <label for="name">Price:</label>
              <input type="text" name="service_price" id="box" required/>
            </div>
<div style="text-align: right;">
  <label class="col-sm-5 control-label"></label>
  <div class="col-sm-0">
    <input type="submit" name="submit" value="Add" class="btn btn-primary">

  </div>
</div>
          </form>
        </div>
      </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Waxing</h3>
      <div class="col-md-12" style="padding: 0px;">
        <center><h4  style="margin-top:0px; margin-bottom:5px;"><b><i>Service Details</i></b></h4></center>
        <div style="border: 1px solid #000; border-radius: 10px; height: 350px;">
          <form method="POST" action="addService.php">
            <input type="hidden" name="type_id" value="3">
            <div class="form-textbox">
              <label for="name">Name:</label>
              <input type="text" name="service_name" id="box" required/>
            </div>
            <div class="form-textbox">
              <label for="name">Price:</label>
              <input type="text" name="service_price" id="box" required/>
            </div>
<div style="text-align: right;">
  <label class="col-sm-5 control-label"></label>
  <div class="col-sm-0">
    <input type="submit" name="submit" value="Add" class="btn btn-primary">

  </div>
</div>
          </form>
        </div>
      </div>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Extensions</h3>
      <div class="col-md-12" style="padding: 0px;">
        <center><h4  style="margin-top:0px; margin-bottom:5px;"><b><i>Service Details</i></b></h4></center>
        <div style="border: 1px solid #000; border-radius: 10px; height: 350px;">
          <form method="POST" action="addService.php">
            <input type="hidden" name="type_id" value="4">
            <div class="form-textbox">
              <label for="name">Name:</label>
              <input type="text" name="service_name" id="box" required/>
            </div>
            <div class="form-textbox">
              <label for="name">Price:</label>
              <input type="text" name="service_price" id="box" required/>
            </div>
<div style="text-align: right;">
  <label class="col-sm-5 control-label"></label>
  <div class="col-sm-0">
    <input type="submit" name="submit" value="Add" class="btn btn-primary">

  </div>
</div>
          </form>
        </div>
      </div>
    </div>
    <div id="menu4" class="tab-pane fade">
      <h3>Design</h3>
      <div class="col-md-12" style="padding: 0px;">
        <center><h4  style="margin-top:0px; margin-bottom:5px;"><b><i>Service Details</i></b></h4></center>
        <div style="border: 1px solid #000; border-radius: 10px; height: 350px;">
          <form method="POST" action="addService.php">
            <input type="hidden" name="type_id" value="5">
            <div class="form-textbox">
              <label for="name">Name:</label>
              <input type="text" name="service_name" id="box" required/>
            </div>
            <div class="form-textbox">
              <label for="name">Price:</label>
              <input type="text" name="service_price" id="box" required/>
            </div>
<div style="text-align: right;">
  <label class="col-sm-5 control-label"></label>
  <div class="col-sm-0">
    <input type="submit" name="submit" value="Add" class="btn btn-primary">

  </div>
</div>
          </form>
        </div>
      </div>
    </div>
    <div id="menu5" class="tab-pane fade">
      <h3>Grooming</h3>
      <div class="col-md-12" style="padding: 0px;">
        <center><h4  style="margin-top:0px; margin-bottom:5px;"><b><i>Service Details</i></b></h4></center>
        <div style="border: 1px solid #000; border-radius: 10px; height: 350px;">
          <form method="POST" action="addService.php">
            <input type="hidden" name="type_id" value="6">
            <div class="form-textbox">
              <label for="name">Name:</label>
              <input type="text" name="service_name" id="box" required/>
            </div>
            <div class="form-textbox">
              <label for="name">Price:</label>
              <input type="text" name="service_price" id="box" required/>
            </div>
<div style="text-align: right;">
  <label class="col-sm-5 control-label"></label>
  <div class="col-sm-0">
    <input type="submit" name="submit" value="Add" class="btn btn-primary">

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
</div>
</div>

</div>
</div>

<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../js/demo/datatables-demo.js"></script>

</body>
</html>
