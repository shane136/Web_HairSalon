<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

if (isset($_POST['complete'])){
	$id = $_POST['id'];
	mysqli_query($con, "UPDATE bookings SET status='complete' WHERE booking_id=$id;");
}
?>