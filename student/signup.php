<?php
require 'database.php';

$name = $_POST["name"];
$roll_no = $_POST["roll_no"];
$email = $_POST["email"];
$password = $_POST["password"];
$package = 0;

if (!preg_match('/^[a-zA-Z0-9._-]+@iitp.ac.in/', $email)) {
    echo "<script>alert('Error: Invalid email');</script>";
    exit();
}

$sql = "SELECT * FROM Student WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<script>alert('Error: Email already exists');</script>";
    exit();
}

if (strlen($password) < 8) {
    echo "<script>alert('Error: Password must be at least 8 characters long');</script>";
    exit();
} elseif (!preg_match("#[0-9]+#", $password)) {
    echo "<script>alert('Error: Password must contain at least one number');</script>";
    exit();
} elseif (!preg_match("#[a-zA-Z]+#", $password)) {
    echo "<script>alert('Error: Password must contain at least one letter');</script>";
    exit();
}

$sql = "INSERT INTO Student (roll_no, name, email, package, password) VALUES ('$roll_no', '$name', '$email', '$package', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Signed Up Successfully');</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

header("Location: login.html");
$conn->close();
exit();
?>