<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

  if(isset($_POST['submit'])!="")
  {
    $username       = $_POST['username'];
    $password       = $_POST['password'];

    $sqluser = mysqli_query($con, "INSERT INTO user_account VALUES(NULL,'$username', '$password', 'Employee', CURRENT_TIMESTAMP());");

    if($sqluser)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='managePayroll.php?page=1';
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