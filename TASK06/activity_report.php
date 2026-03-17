<?php

$conn = new mysqli("localhost","root","Hema123@","student_db");

if($conn->connect_error){
die("Connection failed");
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Daily Activity Report</title>

<style>

body{
font-family:Arial;
background:#f4f4f4;
padding:20px;
}

table{
border-collapse:collapse;
width:50%;
background:white;
}

th,td{
border:1px solid #ccc;
padding:10px;
text-align:center;
}

</style>

</head>

<body>

<h2>Daily Activity Report</h2>

<table>

<tr>
<th>Date</th>
<th>Total Actions</th>
</tr>

<?php

$sql="SELECT * FROM daily_activity_report";

$result=$conn->query($sql);

while($row=$result->fetch_assoc()){

echo "<tr>
<td>".$row['activity_date']."</td>
<td>".$row['total_actions']."</td>
</tr>";

}

?>

</table>

</body>
</html>