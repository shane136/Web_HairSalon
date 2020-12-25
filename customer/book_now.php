<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];
$counter = 1;
  if(isset($_GET['pid'])){
      $user_id = $_SESSION['user_id'];
      $product_id = $_GET['pid'];
      $cart_items = explode(',',$product_id);
      // print_r($cart_items);
      $prod_id = [];
      $prod_id = $cart_items;

      for($i = 0; $i < count($prod_id); $i++){
          $j = $i;
          $temp = $prod_id[$i];
          for($k = 0; $k < count($prod_id); $k++){
            if($j!= $k)
            {
              if($temp==$prod_id[$k]){
                $prod_id[$k]="";
              }
            }
          }
      }

      $output = array();

      for($i = 0; $i < count($prod_id); $i++){
          $output = array_count_values($cart_items);
      }

      $sql = "SELECT * FROM customer where user_id = '$user_id'";
      $result = mysqli_query($con,$sql);
      $customer_id = "";
      while ($rows = mysqli_fetch_assoc($result)) {
        $customer_id = $rows['customer_id'];
      }

      $get_count = "SELECT * FROM bookings";

      $result = mysqli_query($con,$get_count);
      while($rows = mysqli_fetch_assoc($result)){
        $counter = $counter + 1;
      }

      foreach ($output as $key => $value) {
        $query = "INSERT INTO bookings VALUES(NULL,CURRENT_TIMESTAMP(),'$customer_id','$key','$counter',NULL)";
        mysqli_query($con,$query);
      }
    }


 $sql = "SELECT * FROM customer where user_id = '$user_id'";

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

       <div class="container h-100 p-3" style="background: #0F222D;">
             <div class="h-auto rounded p-3" style="background: #ffe6e6;">
                 <p class="h3" style="text-align:center;">BOOKING DETAILS</p>

                 <div class="h-auto rounded p-3 d-flex flex-row text-center" style="background: #FFFF;">
                   <p class="col m-2" style="color:black">Service Name</p>
                   <p class="col m-2" style="color:black">Price</p>

                 </div>

                 <div class="list_of_product">
                 <form class="" action="\Web_HairSalon\conn\update_booking.php" method="post">
                   <?php
                     $total = 0;
                     $total_product_price = 0;
                     $product_quantity = 0;

                   // I think buhat ko dres if statement to test if naa bai sulod ang product_id nga gi check_out
                     if(!empty($product_id)){
                     foreach ($output as $id => $value) {
                       $product_quantity = $value;
                       $sql = "SELECT * FROM services where service_id = $id";
                       $products = mysqli_query($con,$sql);

                         while($rows = mysqli_fetch_assoc($products)){
                         if ($id == $rows['service_id'])
                         {
                           $id = $rows['service_id'];
                           $product_name = $rows['service_name'];
                           $product_price = $rows['service_price'];
                           $total_product_price = $product_price;
                         }
                       }
                     $total = $total + $total_product_price;
                 ?>
                    <div class="border h-auto rounded p-3 d-flex flex-row text-center" style="background: #FFFF;">
                      <input type="hidden" name="product_id[]" value="<?php echo "$id";?>">
                      <input type="hidden" name="product_quantity[]" value="<?php echo "$product_quantity";?>">
                      <input type="hidden" name="product_price[]" value="<?php echo "$product_price";?>">
                      <p class="col m-2"><?php echo $product_name;?></p>
                      <p class="col m-2"><?php echo $product_price;?></p>
                    </div>
                   <?php
                  }
                  }
                    ?>
                 </div>

                 <div class="h-auto rounded p-3 d-flex flex-row text-left" style="background: #FFFF;">
                   <p class="col m-2"></p>
                   <p class="col m-2"></p>
                   <p class="col m-2">Book Schedule:</p>
                   <input type="datetime-local" name="date_sched" value=""  required style="">
                   &nbsp &nbsp
                   <p class="col m-2">Total Amount:</p>
                   <p class="col m-2"><?php echo $total;?></p>

                   <input type="hidden" name="counter" value="<?php echo"$counter";?>">
                   <input type="hidden" name="total_amount" value="<?php echo "$total";?>">

                   <button type="submit" class="btn btn-dark" name="button">Book</button>
                 </div>

                 </form>

       </div>
     </div>

   </body>
 </html>
