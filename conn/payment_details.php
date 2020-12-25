<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $total_amount = $_POST['total_price'];
    $cash = $_POST['amount_paid'];
    $type = $_POST['payment_type'];
    $date_sched = $_POST['date_sched'];

    $payment_type = "";
    if($type == 1){
      $payment_type = "Cash";
    }
    else {
      $payment_type = "Mobile Cash";
    }
    if($cash >= $total_amount){
      $sql = "INSERT INTO payment_details VALUES(NULL,'$total_amount','$cash', '$payment_type', '$user_id', '$date_sched')";
      mysqli_query($con,$sql);
      if(isset($_SESSION['date_sched'])){
        $date_sched =  $_SESSION['date_sched'];
        unset($_SESSION['date_sched']);
      }
      header("Location: \\Web_HairSalon\\customer\\book_now.php");
      die;
    }

    else {
      header("Location: \\Web_HairSalon\\customer\\payment.php");
      die;
    }
}


 ?>
