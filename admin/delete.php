<?php 
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$id=$_GET['employee_id'];

$product_query = "SELECT * from employee, user_account WHERE employee.user_id = user_account.user_id;";
$all_products = mysqli_query($con, $product_query);

	$query = "DELETE FROM employee WHERE employee_id=$id;"; //NAA pay delete error T.T
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: manageEmployee.php"); 
?>