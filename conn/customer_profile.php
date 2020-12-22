<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];
if($_SERVER["REQUEST_METHOD"] == "POST"){


  $fname = $_POST['fn'];
  $lname = $_POST['ln'];
  $contact_number = $_POST['contact_number'];
  $email = $_POST['email'];
  $address = $_POST['address'];


  $sql = "UPDATE customer set f_name = '$fname', l_name = '$lname', phone_number = '$contact_number'
  , email = '$email', address = '$address' where user_id = '$user_id'";
  mysqli_query($con,$sql);
  header("Location: \\Web_HairSalon\\customer\\profile_edit.php");
  die;
}

 ?>
