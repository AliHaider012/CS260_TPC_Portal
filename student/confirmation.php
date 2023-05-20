<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

require 'database.php';

$user_id = $_SESSION["user_id"];
$cid = $_SESSION["cid"];
$role = $_SESSION["role"];
$password = $_POST['password'];
$sql = "SELECT * FROM Student WHERE roll_no='$user_id'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$user_password = $row["password"];
if ($password != $user_password) {
  echo "Error: Invalid password";
  exit();
}

$sql = "INSERT INTO application (cid, roll_no, role) VALUES ('$cid', '$user_id', '$role')";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Applied Successfully');</script>";
    header("Location: dashboard.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

$conn->close();
exit();
?>