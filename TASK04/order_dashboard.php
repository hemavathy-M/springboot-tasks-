<?php

$conn = new mysqli("localhost","root","Hema123@","student_db");

if ($conn->connect_error) {
die("Connection failed");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Order Management</title>

<style>

body{
font-family:Arial;
background:#f4f4f4;
padding:20px;
}

table{
border-collapse:collapse;
width:100%;
background:white;
}

th,td{
border:1px solid #ccc;
padding:10px;
text-align:center;
}

h2{
text-align:center;
}

</style>

</head>

<body>

<h2>Customer Order History</h2>

<table>

<tr>
<th>Customer</th>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
<th>Order Date</th>
</tr>

<?php

$sql = "SELECT customers.customer_name, products.product_name, products.price,
orders.quantity, (products.price*orders.quantity) AS total, orders.order_date
FROM orders
JOIN customers ON orders.customer_id = customers.customer_id
JOIN products ON orders.product_id = products.product_id
ORDER BY orders.order_date DESC";

$result = $conn->query($sql);

while($row=$result->fetch_assoc()){

echo "<tr>
<td>".$row['customer_name']."</td>
<td>".$row['product_name']."</td>
<td>".$row['price']."</td>
<td>".$row['quantity']."</td>
<td>".$row['total']."</td>
<td>".$row['order_date']."</td>
</tr>";

}

?>

</table>

<br><br>

<h2>Highest Value Order</h2>

<?php

$highest = "SELECT MAX(products.price*orders.quantity) AS highest_order
FROM orders
JOIN products ON orders.product_id = products.product_id";

$res = $conn->query($highest);
$row = $res->fetch_assoc();

echo "Highest Order Value: ₹".$row['highest_order'];

?>

<br><br>

<h2>Most Active Customer</h2>

<?php

$active = "SELECT customer_name
FROM customers
WHERE customer_id = (
SELECT customer_id
FROM orders
GROUP BY customer_id
ORDER BY COUNT(order_id) DESC
LIMIT 1
)";

$res2 = $conn->query($active);
$row2 = $res2->fetch_assoc();

echo "Most Active Customer: ".$row2['customer_name'];

?>

</body>
</html>