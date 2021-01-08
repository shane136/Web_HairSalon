<?php 
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
  
  if (isset($_POST['submit'])!="") {
  
    $total_salary   = $_POST['totalsalary'];
    $employee_id    = $_POST['empl_id'];

    $sql = mysqli_query($con, "INSERT INTO payroll_record(payroll_id, total_salary, payroll_date, employee_id) VALUES(NULL, $total_salary, CURRENT_TIMESTAMP(), $employee_id);");

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