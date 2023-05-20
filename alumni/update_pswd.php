<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}
$user_id = $_SESSION["user_id"];
$old_pswd = $_POST["old_password"];
$new_pswd = $_POST["new_password"];
$cnf_pswd = $_POST["cnf_password"];

require 'database.php';

$sql = "SELECT * FROM Student WHERE roll_no='$user_id'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$password = $row["password"];
if ($password != $old_pswd) {
    echo "<script>alert('Wrong Password Entered');</script>";
    exit();
}

if (strlen($new_pswd) < 8) {
    echo "<script>alert('Error: Password must be at least 8 characters long');</script>";
    exit();
} elseif (!preg_match("#[0-9]+#", $new_pswd)) {
    echo "<script>alert('Error: Password must contain at least one number');</script>";
    exit();
} elseif (!preg_match("#[a-zA-Z]+#", $new_pswd)) {
    echo "<script>alert('Error: Password must contain at least one letter');</script>";
    exit();
}

if ($new_pswd != $cnf_pswd) {
    echo "<script>alert('Password and Confirm Password Mismatch');</script>";
    exit();
}

$sql = "UPDATE Student SET password='$new_pswd' WHERE roll_no='$user_id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Password Updated Successfully');</script>";
    header("Location: dashboard.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

$conn->close();
exit();
?>