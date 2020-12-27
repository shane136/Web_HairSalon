<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$date_sched = "";
$user_id = $_SESSION['user_id'];

if(isset($_SESSION['date_sched'])){
  $date_sched =  $_SESSION['date_sched'];
}
$total_price = 0;
$sql = "SELECT * FROM bookings where date_sched = '$date_sched'";
$result = mysqli_query($con,$sql);
while($rows = mysqli_fetch_assoc($result)){
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
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   </head>

   <body class = "d-flex flex-row h-100">
     <div class="col-2 border border-danger flex-column d-flex"style="height:130%;background: #ffe6e6 !important;">
       <a href="\Web_HairSalon\customer\index.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Home</small></p></a>

       <a href="\Web_HairSalon\conn\logout.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Logout</small></p></a>
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

       <div class="container h-100 p-3" style="background: #60a3bc;">
            <form class="" action="\Web_HairSalon\conn\payment_details.php" method="post">
             <div class="h-auto rounded p-3" style="background: #ffe6e6;">
                 <p class="h3" style="text-align:center;">PAYMENT DETAILS</p>
                 <div class="h-auto rounded p-3 d-flex flex-row text-center" style="background: #FFFF;">
                   <p class="col m-2" style="color:black">Booking Schedule</p>
                   <p class="col m-2" style="color:black">Total Price</p>

                 </div>
              <div class="border h-auto rounded p-3 d-flex flex-row text-center" style="background: #FFFF;">
                   <input type="hidden" name="date_sched" value="<?php echo "$date_sched"; ?>">
                  <input type="hidden" name="total_price" value="<?php echo "$total_price"; ?>">
                 <p class="col m-2"><?php echo $date_sched;?></p>
                 <p class="col m-2"><?php echo $total_price;?></p>
              </div>
             </div>

             <div class=" h-auto rounded p-3  flex-row text-center"  style="background: #ffe6e6;">
                   <select name="payment_type" required>
                       <option value="">Choose option</option>
                       <option value = "1">Cash</option>
                       <option value = "2">Mobile Cash</option>
                   </select>
               <!-- <p class="col m-2" style="">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp
                 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                 Cash</p> -->
               <input type="text" name="amount_paid" value="" class="col" placeholder="Input your cash" required>
               <button type="submit" class="btn btn-dark" name="button">Pay Now</button>
             </div>

            </form>

            <br>
                  <div class="h-auto rounded p-3" style="background: #ffe6e6;">
                      <p class="h3" style="text-align:center;">RECEIPT</p>
                      <div class="h-auto rounded p-3 d-flex flex-row text-center" style="background: #FFFF;">
                        <p class="col m-2" style="color:black">Customer Name</p>
                        <p class="col m-2" style="color:black">Schedule</p>
                        <p class="col m-2" style="color:black">Payment Type</p>
                        <p class="col m-2" style="color:black">Total Amount</p>
                        <p class="col m-2" style="color:black">Your Cash</p>
                        <p class="col m-2" style="color:black">Payment Date</p>

                      </div>

                      <?php
                          $get_id = "SELECT * FROM customer where user_id = '$user_id'";
                          $result = mysqli_query($con,$get_id);
                          while ($rows = mysqli_fetch_assoc($result)) {
                            $customer_id = $rows['customer_id'];
                            $customer_name = $rows['f_name']." ".$rows['l_name'];
                          }

                          $query = "SELECT * FROM payment_details where user_id = '$user_id'";
                          $payment_details = mysqli_query($con,$query);

                          while ($row = mysqli_fetch_assoc($payment_details)) {
                                $date_sched = $row['booking_sched'];
                                $payment_type = $row['payment_type'];
                                $total = $row['total_amount'];
                                $cash = $row['cash'];
                                $payment_date = $row['payment_date'];
                       ?>
                      <div class="border h-auto rounded p-3 d-flex flex-row text-center" style="background: #FFFF;">
                        <p class="col m-2"><?php echo "$customer_name"; ?></p>
                        <p class="col m-2"><?php echo "$date_sched"; ?></p>
                        <p class="col m-2"><?php echo "$payment_type"; ?></p>
                        <p class="col m-2"><?php echo "$total"; ?></p>
                        <p class="col m-2"><?php echo "$cash"; ?></p>
                        <p class="col m-2"><?php echo "$payment_date"; ?></p>

                      </div>
                      <?php
                        }
                      ?>
                  </div>
            </div>
      </body>
      </html>
      <script type="text/javascript">

<?php if(isset($_SESSION['Paid Successfully'])){
      if ($_SESSION['Paid Successfully'] == 1) {
        ?>alert('Paid Successfully');<?php
      }
      else {
        ?> alert('Paid Not Successful');<?php
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
        ?> alert('Book Not Successful');<?php
      }
  ?>
    console.log(<?php echo $_SESSION['book']; ?>);
  <?php
   unset($_SESSION['book']);
    }
  ?>
</script>
