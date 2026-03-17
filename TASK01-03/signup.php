<?php

$conn = new mysqli("localhost","root","Hema123@","student_db");

if($conn->connect_error){
die("Connection failed");
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users (email,password)
VALUES ('$email','$password')";

if($conn->query($sql) === TRUE){
echo "Account Created Successfully<br>";
echo "<a href='login.html'>Login Now</a>";
}
else{
echo "Error: " . $conn->error;
}

$conn->close();

?>