<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

  if(isset($_POST['submit'])!="")
  {
    $fname      = $_POST['fname'];
    $lname      = $_POST['lname'];
    $email      = $_POST['email'];
    $address    = $_POST['address'];
    $pnumber    = $_POST['pnumber'];
    $jobtype    = $_POST['jobtype'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $id         = $_POST['user_id'];

    $sqlue = mysqli_query($con, "UPDATE `employee` SET f_name='$fname', l_name='$lname', email='$email', address='$address', phone_number='$pnumber', job_type='$jobtype' WHERE user_id='$id';");
    $sqluser = mysqli_query($con, "UPDATE user_account SET user_name='$username', user_password='$password' WHERE user_id='$id';");

    if($sqluser&&$sqlue)
    {
      ?>
        <script>
            alert('Profile successfully updated.');
            window.location.href='empProfile.php';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='empProfile.php';
        </script>
      <?php 
    }
  }

?>  