<?php

$conn = new mysqli("localhost","root","Hema123@","student_db");

if ($conn->connect_error) {
die("Connection failed");
}

$conn->autocommit(FALSE);

$user_id = 1;
$merchant_id = 1;
$amount = 1000;

try {

$deduct = "UPDATE user_accounts 
SET balance = balance - $amount 
WHERE user_id = $user_id";

$conn->query($deduct);

$add = "UPDATE merchant_accounts 
SET balance = balance + $amount 
WHERE merchant_id = $merchant_id";

$conn->query($add);

$conn->commit();

echo "<h2>Payment Successful</h2>";
echo "₹$amount transferred successfully.";

}

catch(Exception $e){

$conn->rollback();

echo "<h2>Payment Failed</h2>";
echo "Transaction rolled back.";

}

$conn->close();

?>