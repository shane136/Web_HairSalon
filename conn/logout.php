<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
if(isset($_SESSION['user_id'])){

	$user_id = $_SESSION['user_id'];
	unset($_SESSION['user_id']);
}
$description = "Logged Out";
$sys_log = "INSERT INTO sys_log VALUES(NULL, '$user_id', '$description', NOW())";
mysqli_query($con, $sys_log);

?>

<script type="text/javascript">
	alert('You Are Logged Out!');
	window.location.href = "/Web_HairSalon/login.php";
</script>
