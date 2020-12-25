<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM customer where user_id = '$user_id'";
$fn = "";
$ln = "";
$contact_number = "";
$email = "";
$address = "";

$result = mysqli_query($con,$sql);
while ($rows = mysqli_fetch_assoc($result)) {
     $fn = $rows['f_name'];
     $ln = $rows['l_name'];
     $contact_number = $rows['phone_number'];
     $email = $rows['email'];
     $address = $rows['address'];
     // $address
 }
 ?>

<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>

  <body class = "d-flex flex-row h-100">
    <div class="col-2 border border-danger h-100 flex-column d-flex"style="height:50px;background: #ffe6e6 !important;">
      <a href="\Web_HairSalon\customer\index.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Home</small></p></a>

      <a href="\Web_HairSalon\login.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Logout</small></p></a>
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

  <div class="col border border-danger h-100">
      <!-- <div class="container-fluid border border-danger d-flex flex-row" style="height:50px;background: #ffe6e6 !important;">
        <div class="col-5 d-flex flex-row pt-2 pb-2 justify-content-end">
        <a href="\Website\conn\logout.php" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0" style="color:black"><p class="m-0"><small>Logout</small></p></a>
        </div>
      </div> -->

      <div class="container mh-100 p-3" style="background: #0F222D;height:30vh;">
        <div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
        <img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
        </div>
      </div>

      <div class="container h-100 p-3" style="background: #0F222D;">
            <div class="h-auto rounded p-3" style="background: #ffe6e6;">
                <p class="h3" style="text-align:center;font-family:Cambria;">EDIT PROFILE</p>
                    <form class="" action="\Web_HairSalon\conn\customer_profile.php" method="post">

                      <div class="input-group mb-3 w-50">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Firstname</span>
                        </div>
                        <input type="text" value = "<?php echo "$fn"; ?>" name="fn" placeholder="<?php echo "$fn"; ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      </div>

                      <div class="input-group mb-3 w-50">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Lastname</span>
                        </div>
                        <input type="text" value = "<?php echo "$ln"; ?>"name="ln" placeholder="<?php echo "$ln"; ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      </div>

                      <div class="input-group mb-3 w-50">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Phone Number:</span>
                        </div>
                        <input type="text" value = "<?php echo "$contact_number"; ?>"name="contact_number" placeholder="<?php echo "$contact_number"; ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      </div>

                      <div class="input-group mb-3 w-50">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Email:</span>
                        </div>
                        <input type="text" value = "<?php echo "$email"; ?>"name="email" placeholder="<?php echo "$email"; ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      </div>

                      <div class="input-group mb-3 w-50">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">Address:</span>
                        </div>
                        <input type="text" value = "<?php echo "$address"; ?>"name="address" placeholder="<?php echo "$address"; ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <button type="submit" name="change_profile">Save</button>
                    </form>
                    <!-- <a href="\Web_HairSalon\customer\profile_edit.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:130%;">EDIT</p></a> -->
                </div>

            </div>
      </div>
    </div>

  </body>
</html>
