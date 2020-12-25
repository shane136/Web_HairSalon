<?php

require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM BOOKINGS";
$RESULT = mysqli_query($con,$query);

// while($rows = mysqli_fetch_assoc($RESULT)){
//   echo "<br>";
//   echo $rows['date_sched'];
//    echo "<br>";
//   $tester = $rows['date_sched'];
//   echo "test";
//   echo "<br>";
//   echo $tester;
//   echo gettype($tester);
//   echo "<br>";
// }
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $counter = $_POST['counter'];
  $date_sched = $_POST['date_sched'];
  // echo "<br>";
  // echo "date_time";
  $get_update =  substr_replace($date_sched," ",10,1);
  $get_update = $get_update.":00";
  // echo "<br>";
  // echo "get_update";
  // echo $get_update;

  $test_sched = "SELECT * FROM bookings";
  $result = mysqli_query($con,$test_sched);
  $tester = 0;

  while ($rows = mysqli_fetch_assoc($result)) {
      $date = $rows['date_sched'];

      if($get_update == $date){
        $tester = $tester + 1;
      }

  }

  if ($tester == 0) {
    $sql = "UPDATE bookings set date_sched = '$date_sched' WHERE counter = '$counter'";
    mysqli_query($con,$sql);

    $_SESSION['date_sched'] = $date_sched;

    header("Location: \\Web_HairSalon\\customer\\payment.php");
    die;
  }

  else {
    header("Location: \\Web_HairSalon\\customer\\book_now.php");
    die;
  }

}
 ?>
