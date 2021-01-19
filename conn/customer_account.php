<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){

$customer_id = $_POST['customer_id'];
$account_type = $_POST['account'];
$amount = $_POST['Amount'];

$acc = "INSERT INTO account VALUES(NULL, '$account_type', '$amount', '$customer_id')";
mysqli_query($con, $acc);

header("Location:\\Web_HairSalon\\customer\\profile.php");
die;
}

?>
