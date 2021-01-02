<?php 
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

  $id           = $_POST['id'];
  $deduction    = $_POST['deduction'];
  $overtime     = $_POST['overtime'];

  $sql = mysqli_query($con, "UPDATE employee SET deduction='$deduction', overtime='$overtime' WHERE employee_id='$id'");

  if ($sql)
  {
    ?>
    <script>
      alert('Account successfully updated.');
      window.location.href='managePayroll.php';
    </script>
    <?php 
  }
  else
  {
    echo "Invalid";
  }
?>