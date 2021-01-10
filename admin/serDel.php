<?php 
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$id=$_GET['service_id'];
	$query = "DELETE FROM services WHERE service_id=$id"; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: manageService.php"); 
?>