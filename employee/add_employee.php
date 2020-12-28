<?php

require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

  if(isset($_POST['submit'])!="")
  {
    $username       = $_POST['username'];
    $password       = $_POST['password'];

    $sqluser = mysqli_query($con, "INSERT INTO user_account VALUES(NULL,'$username', '$password', 'Employee', CURRENT_TIMESTAMP());");

    $lname          = $_POST['l_name'];
    $fname          = $_POST['f_name'];
    $jobtype        = $_POST['jobtype'];
    $employeeType   = $_POST['employeeType'];

    $results = mysqli_query($con, "SELECT user_id FROM user_account ORDER BY user_id DESC LIMIT 1;");
    $metadata = mysqli_fetch_object($results);

    $sqlemp = mysqli_query($con, "INSERT into employee VALUES(NULL,'$fname','$lname', 'add email', 'add address', 'add phone#',$metadata,'$jobtype',0,'$employeeType');");

    if($sqlemp&$sqluser)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='managePayroll.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='managePayroll.php';
        </script>
      <?php 
    }
  }
?>