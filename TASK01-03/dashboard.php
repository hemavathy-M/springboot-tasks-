<?php

$conn = new mysqli("localhost","root","Hema123@","student_db");

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$department = "";
$sort = "";

if(isset($_GET['department'])){
$department = $_GET['department'];
}

if(isset($_GET['sort'])){
$sort = $_GET['sort'];
}

$query = "SELECT * FROM students";

if($department != ""){
$query .= " WHERE department='$department'";
}

if($sort == "name"){
$query .= " ORDER BY name ASC";
}
elseif($sort == "dob"){
$query .= " ORDER BY dob ASC";
}

$result = $conn->query($query);

?>

<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>

<style>

body{
font-family: Arial;
background:#f4f4f4;
padding:20px;
}

table{
border-collapse: collapse;
width:100%;
background:white;
}

th,td{
padding:10px;
border:1px solid #ccc;
text-align:center;
}

h2{
text-align:center;
}

.controls{
margin-bottom:20px;
}

</style>

</head>

<body>

<h2>Student Dashboard</h2>

<div class="controls">

<form method="GET">

Filter Department:

<select name="department">

<option value="">All</option>
<option value="CSE">CSE</option>
<option value="IT">IT</option>
<option value="ECE">ECE</option>
<option value="EEE">EEE</option>

</select>

Sort By:

<select name="sort">

<option value="">None</option>
<option value="name">Name</option>
<option value="dob">DOB</option>

</select>

<button type="submit">Apply</button>

</form>

</div>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>DOB</th>
<th>Department</th>
<th>Phone</th>
</tr>

<?php

while($row = $result->fetch_assoc()){

echo "<tr>
<td>".$row['id']."</td>
<td>".$row['name']."</td>
<td>".$row['email']."</td>
<td>".$row['dob']."</td>
<td>".$row['department']."</td>
<td>".$row['phone']."</td>
</tr>";

}

?>

</table>

<br><br>

<h3>Students Count by Department</h3>

<table>

<tr>
<th>Department</th>
<th>Total Students</th>
</tr>

<?php

$count_query = "SELECT department, COUNT(*) as total FROM students GROUP BY department";

$count_result = $conn->query($count_query);

while($row = $count_result->fetch_assoc()){

echo "<tr>
<td>".$row['department']."</td>
<td>".$row['total']."</td>
</tr>";

}

?>

</table>

</body>
</html>