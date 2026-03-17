<?php

$conn = new mysqli("localhost","root","Hema123@","student_db");

if ($conn->connect_error) {
die("Connection failed");
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$result = $conn->query($sql);

if($result->num_rows > 0){

header("Location: welcome.php");

}
else{

echo "<h3 style='color:red'>Invalid Email or Password</h3>";
echo "<a href='login.html'>Try Again</a>";

}

$conn->close();

?>