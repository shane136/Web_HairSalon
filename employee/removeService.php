<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

if (isset($_POST['remove'])){
	$id = $_POST['id'];
	mysqli_query($con, "UPDATE bookings SET status='remove' WHERE booking_id=$id;");
}
?>