<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){

$customer_id = $_POST['customer_id'];
$account_type = $_POST['account'];
$amount = $_POST['Amount'];

$restriction = 50000; //of input cash_amount
if(($amount < 100)) {

?>

	<script type="text/javascript">
    	alert('Error! Value must Above: 0 and Below: PHP50,000');
    	window.location.href = "/Web_HairSalon/customer/profile.php";
	</script>

<?php
}
else if ($amount >= $restriction) {

?>

	<script type="text/javascript">
    	alert('Error! Value must Above: 0 and Below: PHP50,000');
    	window.location.href = "/Web_HairSalon/customer/profile.php";
	</script>

<?php
}
else{
	$acc = "INSERT INTO account VALUES(NULL, '$account_type', '$amount', '$customer_id')";
	mysqli_query($con, $acc) or die(mysqli_error($con));
	header("Location:\\Web_HairSalon\\customer\\profile.php");
	die;
}
}

?>
