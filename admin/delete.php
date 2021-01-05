<?php 
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$id=$_GET['employee_id'];

$product_query = "SELECT * from employee, user_account WHERE employee.user_id = user_account.user_id;";
$all_products = mysqli_query($con, $product_query);
$user_id = mysqli_fetch_assoc($all_products);
$user = $user_id['user_id'];

	$query = "UPDATE user_account SET status = 0 WHERE user_id = '$user';";
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: manageEmployee.php"); 
?>
