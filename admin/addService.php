<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

$name = $_POST['service_name'];
$price = $_POST['service_price'];
$type = $_POST['type_id'];

if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}

$description = "Adding Service Details to Service Type:".$type;
$sys_log = mysqli_query($con,"INSERT INTO sys_log VALUES(NULL, '$user_id', '$description', NOW())");

  $sql = mysqli_query($con, "INSERT INTO services(service_id, service_name, service_price, type_id) VALUES (NULL,'$name',$price,$type);");

  if ($sql)
  {
    ?>
    <script>
      alert('New Service successfully Added.');
      window.location.href='manageService.php';
    </script>
    <?php
  }
  else
  {
    echo "Invalid";
  }
?>
