<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

$user_id = $_SESSION['user_id'];

$get_type = "SELECT * FROM user_account WHERE user_id LIKE '$user_id'";
$result = mysqli_query($con, $get_type);

while($row = mysqli_fetch_assoc($result)){
	$user_type = $row['user_type'];
}

if($user_type == "Admin"){

	$description = "Logged Out";
	$sys_log = "INSERT INTO sys_log VALUES(NULL, '$user_id', '$description', NOW())";
	mysqli_query($con, $sys_log);
}
?>

<script type="text/javascript">
	alert('You Are Logged Out!');
	window.location.href = "/Web_HairSalon/login.php";
</script>
