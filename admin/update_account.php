<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

  $sql = "";
  if (isset($_POST['submit'])!="") {

    $total_salary   = $_POST['totalsalary'];
    $employee_id    = $_POST['empl_id'];

    if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
    }

    if($total_salary > 0){


    $description = "Adding Salary of Employee ID:".$employee_id;
    $sys_log = mysqli_query($con,"INSERT INTO sys_log VALUES(NULL, '$user_id', '$description', NOW())");


    $sql = mysqli_query($con, "INSERT INTO payroll_record(payroll_id, total_salary, payroll_date, employee_id) VALUES(NULL, $total_salary, CURRENT_TIMESTAMP(), $employee_id);");
    }
    if($sql)
    {
      ?>
        <script>
            alert('Payroll have been successfully added.');
            window.location.href='managePayroll.php';
        </script>
      <?php
    }
    else
    {
      ?>
        <script>
            alert('Invalid at Payroll');
            window.location.href='managePayroll.php';
        </script>
      <?php
    }
  }
?>
