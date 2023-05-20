<?php
require 'database.php';

$name = $_POST["name"];
$cid = $_POST["cid"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM company WHERE email='$email'";
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

$sql = "INSERT INTO company (cid, name, email, password) VALUES ('$cid', '$name', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Signed Up Successfully');</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

$conn->close();
header("Location: login.html");
exit();
?>