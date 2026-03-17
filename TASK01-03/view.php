<?php

$conn = new mysqli("localhost","root","Hema123@","student_db");

if($conn->connect_error){
die("Connection failed");
}

$sql = "SELECT * FROM students";

$result = $conn->query($sql);

echo "<h2>Student List</h2>";

echo "<table border='1' cellpadding='10'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>DOB</th>
<th>Department</th>
<th>Phone</th>
</tr>";

while($row = $result->fetch_assoc()){
echo "<tr>
<td>".$row["id"]."</td>
<td>".$row["name"]."</td>
<td>".$row["email"]."</td>
<td>".$row["dob"]."</td>
<td>".$row["department"]."</td>
<td>".$row["phone"]."</td>
</tr>";
}

echo "</table>";

$conn->close();

?>