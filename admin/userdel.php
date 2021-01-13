<?php 
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$id=$_GET['user_id'];
	$query = "DELETE FROM user_account WHERE user_id=$id"; 
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
	header("Location: manageEmployee.php"); 
?>