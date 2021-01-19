<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
$customer_id = "";
$account_id = $_POST['account_id'];
$amount = $_POST['Amount'];

$acc = "UPDATE account SET amount = amount + '$amount' WHERE account_id = '$account_id'";
mysqli_query($con, $acc);

header("Location:\\Web_HairSalon\\customer\\profile.php");
die;
}

?>
