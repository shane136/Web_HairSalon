<?php
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$id=$_GET['book_id'];

	if(isset($_SESSION['user_id'])){
	  $user_id = $_SESSION['user_id'];
	}

	$query = "DELETE FROM bookings WHERE booking_id=$id";
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	header("Location: books.php");
?>
