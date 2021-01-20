<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];

/*
$counter = 1;
$service_empty = 1;
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
      $_SESSION['output'] = $output;

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

        $query = "INSERT INTO bookings VALUES(NULL,CURRENT_TIMESTAMP(),'$customer_id','$key','$counter',NULL,'Not Paid', NULL, '0')";


        // //get the employee who's job description same to the specific service_type;
         $get_service = "SELECT * FROM services WHERE service_id = '$key'";
         $service_result = mysqli_query($con,$get_service);
         $type_service = "";
         while ($row = mysqli_fetch_assoc($service_result)) {
          $service = $row['type_id'];

           if($service == 1){
             $type_service = 1;
           }
           elseif ($service == 2) {
             $type_service = 2;
          }
          elseif ($service == 3) {
             $type_service = 3;
           }

           elseif ($service == 4) {
            $type_service = 4;
           }

          elseif ($service == 5) {
             $type_service = 5;
          }

           else{
             $type_service = 6;
           }

         }

         $get_employee = "SELECT * FROM employee where job_type LIKE '$type_service'";
         $result_employee = mysqli_query($con,$get_employee);
         $emp_id = 0;
         while ($row = mysqli_fetch_assoc($result_employee)) {
        $emp_id = $row['employee_id'];
        }

        $query = "INSERT INTO bookings VALUES(NULL,CURRENT_TIMESTAMP(),'$customer_id','$key','$counter',NULL,'Not Paid', '$emp_id', '0')";

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
  if(isset($_SESSION['final_output'])){
    $output = $_SESSION['final_output'];
    unset($_SESSION['final_output']);
    $product_id = 1;
  }
  if(isset($_SESSION['transaction'])){
    $counter = $_SESSION['transaction'];
    unset($_SESSION['transaction']);
  }
  */
?>

<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>


         <script>

         var ScrollMsg= "J.HairSalon | Booking Details - "
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="../css/startmin.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

   </head>

   <body class = "d-flex flex-row h-100">
    <div class="col-2 border  flex-column d-flex"style=" height:130%; background:#0f222d !important;">
       <a href="\Web_HairSalon\customer\index.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="outline-color:black; font-size:115%;text-align:left;"> <i class="fas fa-home"></i><small> Home </small></p></a>

       <a href="\Web_HairSalon\index.php" class=" btn btn-outline-light pt-0" onclick="return confirm('Are you sure you want to log out?');"  style=""><p class="m-0" style="outline-color:black;font-size:115%; text-align:left;;"> <i class="fas fa-sign-out-alt"></i><small> Logout </small></p></a>
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

   <div class="container-fluid w-100" style="background:firebrick;height:130%;">
       <!-- <div class="container-fluid border border-danger d-flex flex-row" style="height:50px;background: #ffe6e6 !important;">
         <div class="col-5 d-flex flex-row pt-2 pb-2 justify-content-end">
         <a href="\Website\conn\logout.php" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0" style="color:black"><p class="m-0"><small>Logout</small></p></a>
         </div>
       </div> -->

       <div class="col-md-12 p-3" style="height:30vh;">
         <div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
         <img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
         </div>
       </div>

      <div class="row m-3 mt-2 p-3" style="background: #ffe6e6;">
        <div class="w-100 p-2 rounded d-flex justify-content-center">

<div class="chat-panel panel panel-default w-100 p-3">
    <!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="chat">

<?php
$sqli = mysqli_query($con, "SELECT * FROM customer WHERE user_id=$user_id;");
$cusid = mysqli_fetch_assoc($sqli);

$custids = $cusid['customer_id'];

$sql = mysqli_query($con, "SELECT * FROM bookings WHERE customer_id='$custids' ORDER BY date_sched, notify_status ASC;");
while($view = mysqli_fetch_assoc($sql)) {
  $emid=$view['employee_id'];

  $serid = $view['service_id'];

  $sqlo = mysqli_query($con, "SELECT * FROM services WHERE service_id='$serid';");
  $fetchser = mysqli_fetch_assoc($sqlo);

  $sqlw = mysqli_query($con, "SELECT * FROM employee WHERE employee_id='$emid';");
  $fetchdata = mysqli_fetch_assoc($sqlw);

  $comp = $view['notify_status'];
?>

  <li class="right">
    <div class="chat-body clearfix w-100">

<div class="m-2 p-3" style="border:1px solid #000;border-radius: 5px;">
<?php if ($comp == '1') { ?>



  <p><i class="fa fa-bell fa-fw" style="color:blue;"></i> Message: <span style="color:blue;"> Book Confirmed </span><span style="float: right;">Payment Status: <?php echo $view['status'];?></span></p>
  <p>Book Date: <?php echo $view['book_date'];?></p>
  <p>Date Scheduled: <?php echo $view['date_sched']." ".$view['time_status'];?></p>
  <p><b>Employee Name:</b> <?php echo $fetchdata['f_name'].' '.$fetchdata['l_name'];?></p>
  <p>Service Name: <?php echo $fetchser['service_name'];?></p>


<?php } elseif($comp == '0') { ?>


  <p><i class="fa fa-bell fa-fw"></i> Message: Book Pending <span style="float: right;">Payment Status: <?php echo $view['status'];?></span></p>

  <p>Book Date: <?php echo $view['book_date'];?></p>
  <p>Date Scheduled: <?php echo $view['date_sched']." ".$view['time_status'];?></p>
  <p><b>Employee Name:</b> <?php echo $fetchdata['f_name'].' '.$fetchdata['l_name'];?></p>
  <p>Service Name: <?php echo $fetchser['service_name'];?></p>

<?php } ?>
  <div class="d-flex flex-row-reverse">
    <a type="button" class="btn btn-danger m-1 mt-0" onclick="return confirm('Are you sure you want to delete?');" href="bookDel.php?book_id=<?php echo $view['booking_id'];?>">Delete</a>
  </div>
</div>

    </div>
  </li>



<?php } ?>
        </ul>
    </div>

<!-- /.panel-body -->

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
