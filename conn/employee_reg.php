<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['p_number'];
    $user_type = "";

    $user_id = 0;
    if($_POST['user_type'] == ""){
      $user_type = "Customer";
      $query = "INSERT INTO user_account VALUES (NULL,'$username', '$password', '$user_type',CURRENT_TIMESTAMP())";
      mysqli_query($con,$query);

      $query_user = "SELECT * FROM user_account where user_name LIKE '$username' AND user_password LIKE '$password'";
      $result = mysqli_query($con, $query_user);


      while($rows = mysqli_fetch_assoc($result)){
        $user_id = $rows['user_id'];
      }

      $insert = "INSERT INTO customer VALUES (NULL,'$first_name','$last_name',' $email', '$address', '$phone', '$user_id')";
      mysqli_query($con,$insert);

      header("Location: \\Web_HairSalon\\Registration\\registration.html");
      die;
    }

    // else{
    //   $user_type = "Employee";
    //   $query = "INSERT INTO user_account VALUES (NULL,'$username', '$password', '$user_type',CURRENT_TIMESTAMP())";
    //   mysqli_query($con,$query);
    //
    //   $query_user = "SELECT * FROM user_account where user_name LIKE '$username' AND user_password LIKE '$password'";
    //   $result = mysqli_query($con, $query_user);
    //
    //
    //   while($rows = mysqli_fetch_assoc($result)){
    //     $user_id = $rows['user_id'];
    //   }
    //
    //   $insert = "INSERT INTO employee VALUES (NULL,'$first_name','$last_name',' $email', '$address', '$phone', '$user_id')";
    //   mysqli_query($con,$insert);
    //
    //   header("Location: \\Web_HairSalon\\Registration\\registration.html");
    //   die;
    }

?>
