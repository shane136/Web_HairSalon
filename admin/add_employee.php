<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

  if(isset($_POST['submit'])!="")
  {
    $username       = $_POST['username'];
    $password       = $_POST['password'];

    $sqluser = mysqli_query($con, "INSERT INTO user_account VALUES(NULL,'$username', '$password', 'Employee', CURRENT_TIMESTAMP());");

    if($sqluser)
    {
      $results = mysqli_query($con, "SELECT user_id FROM user_account ORDER BY user_id DESC LIMIT 1;");
      $idid = mysqli_fetch_field($results);
      $usid = $idid['user_id'];
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='add_details.php?pass=$usid';
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