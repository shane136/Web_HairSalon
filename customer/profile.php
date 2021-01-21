<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM customer where user_id = '$user_id'";
$fn = "";
$ln = "";
$contact_number = "";
$email = "";
$address = "";
$customer_id = "";

$result = mysqli_query($con,$sql);
while ($rows = mysqli_fetch_assoc($result)) {
  $fn = $rows['f_name'];
  $ln = $rows['l_name'];
  $contact_number = $rows['phone_number'];
  $email = $rows['email'];
  $address = $rows['address'];
  $customer_id = $rows['customer_id'];
 // $address
}
?>

<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <script>

    var ScrollMsg= "J.HairSalon | Profile - "
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="../css/startmin.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

  </head>
<style type="text/css">
.modal-backdrop {
  z-index: -1;
}
</style>
  <body class = "d-flex flex-row h-100">
    <div class="col-2 border  flex-column d-flex"style="height:188%;background: #0f222d !important;">
      <a href="\Web_HairSalon\customer\index.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style=" outline-color:black;font-size:115%;text-align: left;"> <i class="fas fa-home"></i><small> Home </small></p></a>

      <a href="\Web_HairSalon\index.php" class=" btn btn-outline-light pt-0" onclick="return confirm('Are you sure you want to log out?');" style=""><p class="m-0" style="outline-color: black;font-size:115%; text-align:left;"> <i class="fas fa-sign-out-alt"></i><small> Logout </small></p></a>
      <!-- <p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Offered Services</small></p> -->

      <!-- <a href="" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Color</small></p></a>
      <a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Styling</small></p></a>
      <a href="" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Waxing</small></p></a>
      <a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Extensions</small></p></a>
      <a href="" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Design</small></p></a>
      <a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Grooming</small></p></a>
      <div class="btn btn-outline-light pt-0"> -->
        <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <small>Offered Services</small></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a href="\Web_HairSalon\customer\book_color.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Color</small></p></a>
            <br>
            <a href="\Web_HairSalon\customer\book_styling.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Styling</small></p></a><br>
            <a href="\Web_HairSalon\customer\book_waxing.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Waxing</small></p></a><br>
            <a href="\Web_HairSalon\customer\book_extensions.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Extensions</small></p></a><br>
            <a href="\Web_HairSalon\customer\book_design.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Design</small></p></a><br>
            <a href="\Web_HairSalon\customer\book_grooming.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Grooming</small></p></a><br>

            <div class="btn btn-outline-light pt-0">
          </div>
          </div> -->

      <!-- <a href="\Website\conn\logout.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>About</small></p></a>
      <a href="\Website\conn\logout.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Booking Now</small></p></a>
      <a href="\Website\conn\logout.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Payment</small></p></a> -->
    </div>

  <div class="col border  h-100">
      <!-- <div class="container-fluid border border-danger d-flex flex-row" style="height:50px;background: #ffe6e6 !important;">
        <div class="col-5 d-flex flex-row pt-2 pb-2 justify-content-end">
        <a href="\Website\conn\logout.php" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0" style="color:black"><p class="m-0"><small>Logout</small></p></a>
        </div>
      </div> -->

      <div class="container-fluid mh-100 p-3" style="background: firebrick;height:25vh;">
        <div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
        <img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
        </div>
      </div>

      <div class="container-fluid p-3" style="background:firebrick;">
            <div class="h-auto rounded p-3" style="background: #ffe6e6;">
                <p class="h3" style="text-align:center; font-family: 'Courier New', Courier, monospace; font-size: 200%;">MY PROFILE</p>

                <div class="input-group mb-3 w-50">
                  <div class="input-group-prepend">
                    <p class="h5"style="font-size:130%;font-family:Cambria;">Firstname: <?php echo $fn; ?></p> <br>
                    <p class="h5"style="font-size:130%; font-family:Cambria;">Lastname: <?php echo $ln; ?></p> <br>
                    <p class="h5"style="font-size:130%; font-family:Cambria;">Phone Number: <?php echo $contact_number; ?></p> <br>
                    <p class="h5"style="font-size:130%;font-family:Cambria;">Email: <?php echo $email; ?></p> <br>
                    <p class="h5"style="font-size:130%;font-family:Cambria;">Address: <?php echo $address; ?></p> <br>

                   <a href="\Web_HairSalon\customer\profile_edit.php" class=" btn btn-danger btn-sm"  style=""> <p class="m-0"  style="color:black; font-size:130%; font-family:tahoma;"></p> <i class="fas fa-user-edit"> EDIT</i> </a>

                  </div>

                </div>

            </div>

            <div class="container-fluid rounded p-3 mt-3" style="background: #ffe6e6;">
              <p class="h3" style="text-align:center; font-size: 200%;">MY ACCOUNT</p>

        <!-- <test_account -->
        <div class="container mt-3 " style="text-align: left; float:left;
  margin-left:5px;">
  <button type = "button" class=" btn btn-primary btn-lg rounded-0 pt-1 mt-2"
  id="add_exercise"style="text-align:center; width:auto;"  data-toggle="modal" data-target="#addaccount"> <i class="fas fa-plus-square"> </i> ADD ACCOUNT
  </button>

<div class="d-flex flex-row justify-content-center">
          <div class="col-md-6 well">

          <div class="chat-panel panel panel-default w-100 p-3">
          <!-- /.panel-heading -->
          <div class="panel-body">
          <ul class="chat">
          <div class="chat-body clearfix w-100">
                          <?php
                          $sql = "SELECT * FROM account WHERE customer_id = '$customer_id'";
                          $result = mysqli_query($con,$sql);
                          $account_id = "";
                          while($data = mysqli_fetch_assoc($result)){
                            $account_id = $data['account_id'];
                            ?>


  <div class="col-md-3"></div>
		<table class="table table-bordered">
			<thead class="alert-success">
				<tr>
					<th>Account ID</th>
					<th>Account Type</th>
					<th>Account Balance</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody style="background-color:#fff;">

				<tr>
					<td><?php echo $account_id?></td>
					<td><?php echo $data['type_name']?></td>
					<td><?php echo $data['amount']?></td>
					<td><button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $data['account_id']?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>
				</tr>

            <?php
            include 'update_balance.php';
          }
        ?>
      </tbody>
    </table>
</div>
</ul>
</div>
</div>
                    </div>
                </div>
            </div>
        </div>
<div id="addaccount" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Add Account</h1>
                </div>

                <div class="modal-body">
                  <form role="form" method="POST" action="\Web_HairSalon\conn\customer_account.php">
                    <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                      <div class="form-group">
                        <label class="control-label" style="font-size:25px;">Account</label>
                          <div class = "mt-2">
                            <select  class="form-control" required name="account" id="account";>
                              <option value="" style="font-size:20px;">Select Account Type</option>
                              <option value="Paymaya" style="font-size:20px;">Paymaya</option>
                              <option value="Gcash" style="font-size:20px;">Gcash</option>
                            </select>
                          </div>
                          <div class="mt-2">
                            <input type="text" name="Amount" value="" placeholder="Enter Amount" required>
                          </div>
                          <div class="col-12 col-sm-4 mt-2">
                            <button type="submit" class="btn btn-primary"name="button" style="">submit</button>
                          </div>
                      </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../js/startmin.js"></script>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
</body>
</html>
