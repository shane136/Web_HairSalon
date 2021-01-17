<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

  $emp_id = $_POST['user_id'];
  $f_name	 = $_POST['f_name'];
  $l_name	 = $_POST['l_name'];
  $email	 = $_POST['email'];
  $address = $_POST['address'];
  $phone_number	 = $_POST['p_number'];
  $job_type			 = $_POST['job_type'];

  if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
  }

  $description = "Adding Employee Details of User Account ID:".$user_id;
  $sys_log = mysqli_query($con,"INSERT INTO sys_log VALUES(NULL, '$user_id', '$description', NOW())");


  $sql = mysqli_query($con, "INSERT INTO employee(employee_id, f_name, l_name, email, address, phone_number, user_id, job_type) VALUES(NULL, '$f_name', '$l_name', '$email', '$address', '$phone_number', '$emp_id', '$job_type');");

  mysqli_query($con, "UPDATE user_account SET status=1 WHERE user_id='$emp_id';");

  if ($sql)
  {
    ?>
    <script>
      alert('Account Details successfully Added.');
      window.location.href='manageEmployee.php';
    </script>
    <?php
  }
  else
  {
    echo "Invalid";
  }
?>

<!-- UPDATE `user_account` SET `user_id`=[value-1],`user_name`=[value-2],`user_password`=[value-3],`user_type`=[value-4],`date_created`=[value-5],`status`=[value-6] WHERE 1 -->
