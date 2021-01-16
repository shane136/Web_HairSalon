<?php
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$id=$_GET['employee_id'];

$product_query = "SELECT * from employee WHERE employee_id = $id;";
$all_products = mysqli_query($con, $product_query);
$user_id = mysqli_fetch_assoc($all_products);
$user = $user_id['user_id'];

	$query = "DELETE FROM employee WHERE user_id in (SELECT user_id FROM user_account WHERE user_id = $user);";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
	header("Location: manageEmployee.php");
?>
