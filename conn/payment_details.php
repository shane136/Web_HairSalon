<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];
$counter = $_SESSION['counter'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $total_amount 	= $_POST['total_price'];
    $type 			= $_POST['payment_type'];
    $date_sched 	= $_POST['date_sched'];
    $time_counter 	= $_POST['timing'];

    $get_Date = $date_sched;

	$queue = mysqli_query($con, "SELECT * FROM salary WHERE day = '$get_Date';");
	$fday = mysqli_fetch_assoc($queue);
	$datesi = $fday['day'];

    // $payment_type = "";
    // if($type == 1){
    //   $payment_type = "Cash";
    // }
    // else {
    //   $payment_type = "Mobile Cash";
    // }

    $cust = "SELECT * FROM customer WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $cust);

    while($row=mysqli_fetch_assoc($result)){
    $customer = $row['customer_id'];
    }

    $card = "SELECT * FROM  account WHERE customer_id = '$customer'";
    $result = mysqli_query($con, $card);

    while($row=mysqli_fetch_assoc($result)){

      if($row['type_name'] == $type){
        $account = $row['account_id'];
        $payment_type = $row['type_name'];
        $balance = $row['amount'];

      }
    }

    $restriction = 99999; //of input cash_amount
    if(($balance >= $total_amount) && ($restriction >= $balance)) {
      $paid = "Paid";
      $cash = $balance;

      $update_account = "UPDATE account set amount = amount - '$total_amount' WHERE account_id = '$account'";
      mysqli_query($con, $update_account);

      $update_bookings = "UPDATE bookings set status = '$paid' where transaction = '$counter'"; //change counter sa db into -> 'transaction' :)
      mysqli_query($con, $update_bookings);

      $sql = "INSERT INTO payment_details(payment_id, total_amount, cash, payment_type, user_id, booking_sched, payment_date) VALUES (NULL, '$total_amount','$cash', '$payment_type', '$user_id', '$date_sched', CURRENT_TIMESTAMP());";

      mysqli_query($con, $sql);
      mysqli_error($con);


      // //getting the payment_id using $date_sched
       $payment= "SELECT * FROM payment_details where booking_sched LIKE '$get_Date'";
       $get_payment = mysqli_query($con, $payment);
       
       $row = mysqli_fetch_assoc($get_payment);
       $payment_id = $row['payment_id'];
      
      
       $update_booking = "SELECT * FROM bookings where date_sched LIKE '$get_Date'";
       $get_result = mysqli_query($con, $update_booking);
       $kaniemp = mysqli_fetch_assoc($get_result);
       $get_emp = $kaniemp['employee_id'];

       

	while ($row = mysqli_fetch_assoc($get_result)) 
	{
         $employee_id 	= $row['employee_id'];
         $service_id 	= $row['service_id'];
         $louy			= $row['transaction'];

         $get_price = "SELECT * FROM services where service_id = '$service_id'";
         $query = mysqli_query($con,$get_price);
         $price = 0;
         $type = "";

         while ($rows = mysqli_fetch_assoc($query)) {
           $price = $rows['service_price'];
         }         

         $rate = 0.30;
         $commission_rate = $price * $rate;
         $query_salary = "SELECT * FROM salary where employee_id = '$employee_id'";
         $salary_result = mysqli_query($con,$query_salary);
			
		$empsala = mysqli_fetch_assoc($salary_result);
		$empfbi = $empsala['employee_id'];
    	$test = 1;
    
	    if ($louy == $time_counter) 
	    {
	    	
	    mysqli_query($con, "INSERT INTO salary(salary_id, num_service_rendered, commission_rate, total_salary, employee_id, payment_id, day) VALUES (NULL,'$test','$rate','$commission_rate','$employee_id', '$payment_id', '$date_sched');");     
	    }

    }
      if(isset($_SESSION['date_sched'])) {
        $date_sched =  $_SESSION['date_sched'];
        unset($_SESSION['date_sched']);
      }
      // header("Location: \\Web_HairSalon\\customer\\book_now.php");

      if(isset($_SESSION['counter'])){
              unset($_SESSION['counter']);
            }
		$_SESSION['Paid Successfully'] = 1;
		header("Location: \\Web_HairSalon\\customer\\payment.php");
      	die;
		


 	} 
 	else {
      $_SESSION['Paid Successfully'] = 2;
      header("Location: \\Web_HairSalon\\customer\\payment.php");
      die;
    }

}


 ?>
