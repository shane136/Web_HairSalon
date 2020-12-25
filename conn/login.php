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

    switch ($user_data['user_type']) {
      case 'Employee':
          header("Location: \\Web_HairSalon\\employee\\index.php");
        break;
      case 'Customer':
          header("Location: \\Web_HairSalon\\customer\\index.php");
        break;
      case 'Admin':
          header("Location: \\Web_HairSalon\\employee\\index.php");
        break;
    }





  }
  else {
    header("Location: \\Web_HairSalon\\login.php");
    die;
      }
}

?>
