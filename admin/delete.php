<?php 
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$id=$_GET['employee_id'];
	$query = "DELETE FROM employee WHERE employee_id=$id"; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: managePayroll.php"); 
?>