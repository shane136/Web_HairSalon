<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user_account WHERE user_name LIKE '$username' AND user_password
  LIKE '$password'";

  $result = mysqli_query($con, $sql);

  if($result && mysqli_num_rows($result)>0)
  {
    $user_data = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user_data['user_id'];
    $id = $user_data['user_id'];

    switch ($user_data['user_type']) {
      case 'Employee':
        $sql = mysqli_query($con, "SELECT * FROM user_account WHERE user_id = '$id';");
        $check = mysqli_fetch_assoc($sql);
        if($check['status']==1){
          header("Location: \\Web_HairSalon\\employee\\employee.php");
        }else{
          header("Location: \\Web_HairSalon\\employee\\confirmation.php");
        }
        break;
      case 'Customer':
          header("Location: \\Web_HairSalon\\customer\\index.php");
        break;
      case 'Admin':
        $user_id = $user_data['user_id'];
        $description = "Logged In";
        $sys_log = "INSERT INTO sys_log VALUES(NULL, '$user_id', '$description', NOW())";
        mysqli_query($con, $sys_log);

          header("Location: \\Web_HairSalon\\admin\\index.php");
        break;

    }

  }

  else {
    $_SESSION['ERROR 1'] = 1;
    header("Location: \\Web_HairSalon\\login.php");
    die;
      }
}


?>
