<?php
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
if (isset($_POST['cancel'])) {
	$id=$_POST['id'];

	if ($clicke == '') {		
		$clicke = $_POST['user_id'];
		$sql = mysqli_query($con, "SELECT * FROM customer WHERE user_id=$clicke;");
		$rows = mysqli_fetch_assoc($sql);

		mysqli_query($con, "UPDATE bookings SET notify_status=0 WHERE booking_id=$id;");

		$username='';
		$book='';
		$sched='';
		$sername='';
		$status='';
		$id='';
		
	}else{
		mysqli_error($con);
	}

}

		//mysqli_query($con, "UPDATE bookings SET notify_status=0 WHERE booking_id=$id;") or mysqli_error($con);
?>