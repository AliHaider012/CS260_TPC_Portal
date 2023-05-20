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
$roll_no = $_SESSION["roll_no"];
$role = $_SESSION["role"];
$year = date("Y");
$sql = "SELECT * FROM job WHERE cid='$user_id' and sector='$role'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$name = $row["name"];
$salary = $row["salary"];

$sql = "INSERT INTO hiring (roll_no, cid, salary, year, field) VALUES ('$roll_no', '$user_id', '$salary', '$year', '$role')";
if ($conn->query($sql) === TRUE) {
    $sql = "DELETE FROM application where roll_no='$roll_no' and cid='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Hired Successfully');</script>";
        header("Location: dashboard.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

$conn->close();
exit();
?>