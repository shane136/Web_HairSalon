<?php
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$id=$_GET['user_id'];
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
	}
	$description = "Deleting Employee User Account ID:".$id;
	$sys_log = mysqli_query($con,"INSERT INTO sys_log VALUES(NULL, '$user_id', '$description', NOW())");

	$query = "DELETE FROM user_account WHERE user_id=$id";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
	header("Location: manageEmployee.php");
?>
