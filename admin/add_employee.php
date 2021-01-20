<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

  if(isset($_POST['submit'])!="")
  {
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
    }
    $description = "Adding Employee User Account:".$username;
    $sys_log = mysqli_query($con,"INSERT INTO sys_log VALUES(NULL, '$user_id', '$description', NOW())");

    $sqluser = mysqli_query($con, "INSERT INTO user_account VALUES(NULL,'$username', '$password', 'Employee', CURRENT_TIMESTAMP(), 0);");

    if($sqluser)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='manageEmployee.php';
        </script>
      <?php
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='manageEmployee.php';
        </script>
      <?php
    }
  }

?>
