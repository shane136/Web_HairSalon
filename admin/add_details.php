<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

if (isset($_POST['usid'])) {	

    $lname          = $_POST['l_name'];
    $fname          = $_POST['f_name'];
    $jobtype        = $_POST['jobtype'];
    $employeeType   = $_POST['employeeType'];

	$sqlemp = mysqli_query($con, "INSERT into employee VALUES(NULL,'$fname','$lname', 'add email', 'add address', 'add phone#',$usid,'$jobtype',1,'$employeeType');");
}
?>