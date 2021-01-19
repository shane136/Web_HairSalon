<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$date_sched = "";
$user_id = $_SESSION['user_id'];
$counter = "";
$book_2 = "";//book_date
$book_3 = ""; //Receipt_date

if(isset($_SESSION['counter'])){
  $counter = $_SESSION['counter'];
}

if(isset($_SESSION['date_sched'])){
  $date_sched =  $_SESSION['date_sched'];
}
$total_price = 0;
$sql = "SELECT * FROM bookings where date_sched = '$date_sched'";
$result = mysqli_query($con,$sql);
while($rows = mysqli_fetch_assoc($result)){
  $book_2 = $rows['book_date'];
  $book_3 = substr($book_2,0,11);
  $service_id = $rows['service_id'];
  $query = "SELECT * FROM services where service_id = '$service_id'";
  $get_query = mysqli_query($con,$query);
  while ($row = mysqli_fetch_assoc($get_query)) {
    $price = $row['service_price'];
    $total_price = $total_price + $price;
  }
}
?>

<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>

     <script>

     var ScrollMsg= "J.HairSalon | Payment - "
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

   </head>

   <body class = "d-flex flex-row h-100">
     <div class="col-2 border  flex-column d-flex"style="height:130%;background: #ffe6e6 !important;">
       <a href="\Web_HairSalon\customer\index.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%; text-align: left;"> <i class="fas fa-home"></i><small> Home </small></p></a>

       <a href="\Web_HairSalon\index.php" class=" btn btn-outline-light pt-0" onclick="return confirm('Are you sure you want to log out?');" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-sign-out-alt"></i><small> Logout </small></p></a>
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
             <a href="\Web_HairSalon\customer\book_extensions.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align
             center;"><small>Extensions</small></p></a><br>
             <a href="\Web_HairSalon\customer\book_design.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Design</small></p></a><br>
             <a href="\Web_HairSalon\customer\book_grooming.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Grooming</small></p></a><br>
             <div class="btn btn-outline-light pt-0">
           </div>
           </div> -->

       <!-- <a href="\Website\conn\logout.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>About</small></p></a>
       <a href="\Website\conn\logout.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Booking Now</small></p></a>
       <a href="\Website\conn\logout.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Payment</small></p></a> -->
     </div>

   <div class="w-100 border  h-100">
       <!-- <div class="container-fluid border border-danger d-flex flex-row" style="height:50px;background: #ffe6e6 !important;">
         <div class="col-5 d-flex flex-row pt-2 pb-2 justify-content-end">
         <a href="\Website\conn\logout.php" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0" style="color:black"><p class="m-0"><small>Logout</small></p></a>
         </div>
       </div> -->

       <div class="container-fluid mh-100 p-3" style="background: #0F222D;height:25vh;">
         <div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
         <img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
         </div>
       </div>

       <div class="container-fluid p-3" style="background: #0F222D;height:130%;">
            <form class="" action="\Web_HairSalon\conn\payment_details.php" method="post">

              <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
              <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
              <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>J.HairSalon</strong>
                        <br>
                        Andres Bonifacio, Tibanga
                        <br>
                        Iligan City
                        <br>
                        <abbr title="Phone">P.:</abbr> (213) 484-6829
                    </address>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                     <p class="" style="color:black">Date: <?php echo "$book_3"; ?> </p>
                </div>

            </div>

            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th class="text-center">Book Schedule</th>
                            <th class="text-center">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php

                        $book = "SELECT * from bookings WHERE transaction = '$counter'"; //change counter sa db into -> 'transaction' :)
                        $get_result = mysqli_query($con, $book);
                        $total_price = 0;

                        while($row = mysqli_fetch_assoc($get_result)){

                          $service = $row['service_id'];
                          $date = $row['date_sched'];
                          $services = "SELECT * FROM services WHERE service_id = '$service'";
                          $services_result = mysqli_query($con, $services);

                        while($var = mysqli_fetch_assoc($services_result)){

                          $name = $var['service_name'];
                          $price = $var['service_price'];

                        }
                        $total_price = $total_price + $price;

                        //getting the month
                        $get_month = substr($date,0,10);

                        //getting the time
                        $time = substr($date,11,2);
                        $last_part = substr($date,14,2);

                        //test if time is past 12
                        if ($time > 12) {
                          $time = $time - 12;
                          $time_get = $get_month. " ".(string)$time . ":".$last_part." PM";
                        }
                        elseif($time == 0){
                          $time = 12;
                          $temp = substr($date,0,11);
                          $check_time = substr($date,14,2);
                          $time_get = $temp. " ".$time. ":".$check_time. " AM";
                        }
                        elseif($time == 12) {
                          $temp = substr($date_sched,0,16);
                          $time_get = $temp." ". " NN";
                        }
                        else {
                          $temp = substr($date,0,11);
                          $time = substr($date,11,5);
                          $time_get = $temp." ".$time ." AM ";
                        }
                       ?>
                        <tr>
                            <td><?php echo "$name"; ?></td>
                            <td class="text-center"><?php echo "$time_get";?></td>
                            <td class="text-center"><?php echo "$price"; ?></td>
                            <!-- <td class="text-right"> -->
                        </tr>
                        <?php
                      }
                        ?>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-center"><h4><strong>Total: PHP <?php echo "$total_price"; ?> </strong></h4></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
        <!-- <div class="row"> -->

          <form class="" action="\Web_HairSalon\conn\payment_details.php" method="post">

            <div class="">
                <p class="h3" style="text-align:center;">PAYMENT TYPE</p>
                <!-- <div class="h-auto rounded p-3 d-flex flex-row text-center" style="background: #FFFF;"> -->

                  <div class=" h-auto rounded p-3  flex-row text-center d-flex"  style="background: #ffe6e6; margin-left: 5px;">
                        <select name="payment_type" style="margin-right: 10px;" required>

                            <option value="">Choose option</option>
                            <option value = "Paymaya">Paymaya</option>
                            <option value = "Gcash">Gcash</option>
                        </select>

                        <input type="hidden" name="date_sched" value="<?php echo "$date_sched"; ?>">
                        <input type="hidden" name="total_price" value="<?php echo "$total_price"; ?>">
                        <input type="hidden" name="amount_paid" value="" class="text-center" style="margin-right: 10px;" placeholder="Input your cash" required>

                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                        </button>

                      </div>
                    </div>
                    </form>
                  </div>
                <!-- </div> -->
              <!-- </div> -->

      </body>
      </html>

      <script type="text/javascript">

      <?php if(isset($_SESSION['Paid Successfully'])){
      if ($_SESSION['Paid Successfully'] == 1) {
        ?>alert('Paid Successfully');<?php
      }
      else {
        ?> alert('Not Enough Balance!');<?php
      }
  ?>
    console.log(<?php echo $_SESSION['Paid Successfully']; ?>);
      <?php
   unset($_SESSION['Paid Successfully']);
    }
      ?>

    </script>

    <script type="text/javascript">

          <?php if(isset($_SESSION['book'])){
            if ($_SESSION['book'] == 1) {
          ?>alert('Book Successfully');<?php
          }

          else {
          ?>alert('Book Not Successful');<?php
          }
          ?>
          console.log(<?php echo $_SESSION['book']; ?>);
          <?php
          unset($_SESSION['book']);
          }
          ?>

    </script>
