<?php
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$id=$_GET['service_id'];

	if(isset($_SESSION['user_id'])){
	  $user_id = $_SESSION['user_id'];
	}

	$description = "Deleting Service ID:".$id;
	$sys_log = mysqli_query($con,"INSERT INTO sys_log VALUES(NULL, '$user_id', '$description', NOW())");


	$query = "DELETE FROM services WHERE service_id=$id";
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: manageService.php");
?>
