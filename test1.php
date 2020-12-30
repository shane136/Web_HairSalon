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
          $get_month = "";
          $time_get = "";
          $last_part = "";

    //getting the month
    $get_month = substr($date_sched,0,10);

    //getting the time
    $time = substr($date_sched,11,2);
    $last_part = substr($date_sched,14,2);

    //test if time is past 12
    if ($time > 12) {
      $time = $time - 12;
      $time_get = $get_month. " ".(string)$time . ":".$last_part." PM";
    }

    elseif($time == 0){
      $time = 12;
      $temp = substr($date_sched,0,11);
      $shane = substr($date_sched,14,2); //ilisi lng ug var_name hahhaha
      $time_get = $temp. " ".$time. ":".$shane. " AM";

    }

    else {
      $temp = substr($date_sched,0,11);
      $time = substr($date_sched,12,4);
      $time_get = $temp." ".$time ." AM";
    }

    $pay_month = substr($payment_date,0,10);

    //converting payment date to AM and PM
    //getting the time
    //string manipulation
    $pay_time = substr($payment_date,11,2);
    $last_pay = substr($payment_date,14,2);

    //test if time is past 12
    if ($pay_time > 12) {
      $pay_time = $pay_time - 12;
      $pay_time_get = $pay_month." ".(string)$pay_time . ":".$last_pay." PM";

    }

    elseif($time == 0){ //why equals to 0? kay ang 12NN sa db kay 00:00
      $pay_time = 12;
      $temp = substr($payment_date,0,11);
      $paglinawan = substr($payment_date,14,2); //ilisi lng ug var_name hahha '$paglinawan'
      $time_get = $temp. " ".$pay_time. ":".$paglinawan. " AM";
      }
    else {
      $tem = substr($payment_date,0,11);
      $pay_time = substr($payment_date,12,4);
      $pay_time_get = $tem." ".$pay_time." AM";
    }

 ?>
<div class="border h-auto rounded p-3 d-flex flex-row text-center" style="background: #FFFF;">
  <p class="col m-2"><?php echo "$customer_name"; ?></p>
  <p class="col m-2"><?php echo "$time_get"; ?></p>
  <p class="col m-2"><?php echo "$payment_type"; ?></p>
  <p class="col m-2"><?php echo "$total"; ?></p>
  <p class="col m-2"><?php echo "$cash"; ?></p>
  <p class="col m-2"><?php echo "$pay_time_get"; ?></p>


</div>
<?php
  }
?>
</div>
</div>
