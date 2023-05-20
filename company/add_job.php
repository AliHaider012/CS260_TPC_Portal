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
$sql = "SELECT name FROM Company WHERE cid='$user_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$name = $row["name"];
$program = $_POST["program"];
$role = $_POST["role"];
$cpi = $_POST["cpi"];
$marks10 = $_POST["marks10"];
$marks12 = $_POST["marks12"];
$package = $_POST["package"];
$mode = $_POST["mode"];

$sql = "INSERT INTO job VALUES('$user_id', '$name', '$marks10', '$marks12', '$role', '$package', '$mode', '$program')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    echo '<script type="text/javascript"> window. onload = function () { alert("Job Added"); } </script>'; 
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
    $conn->close();
}
?>