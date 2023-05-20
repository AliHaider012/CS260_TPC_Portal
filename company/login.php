<?php
require 'database.php';

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM company WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
  echo "Error: Email does not exist";
  exit();
}

$row = $result->fetch_assoc();
$user_password = $row["password"];
if ($password != $user_password) {
  echo "Error: Invalid password";
  exit();
}

session_start();
$_SESSION["user_id"] = $row["cid"];
header("Location: dashboard.php");
$conn->close();
exit();
?>