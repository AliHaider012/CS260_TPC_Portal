<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}
$user_id = $_SESSION["user_id"];

require 'database.php';

$name = $_POST["name"];
$dob = $_POST["dob"];
$timestamp = strtotime($dob);
$dob = date('Y-m-d', $timestamp);
$program = $_POST["program"];
$batch = $_POST["batch"];
$branch = $_POST["branch"];
$cpi = $_POST["cpi"];
$marks10 = $_POST["marks10"];
$marks12 = $_POST["marks12"];
$interest = $_POST["interest"];

$sql = "UPDATE Student SET name='$name', dob='$dob', program='$program', batch='$batch', branchcode='$branch', cpi='$cpi', ten_marks='$marks10', twelve_marks='$marks12', interest='$interest' WHERE roll_no='$user_id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data Updated Successfully');</script>";
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

$conn->close();
exit();
?>