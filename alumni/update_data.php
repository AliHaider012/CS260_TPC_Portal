<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: alum_login_page.html");
    exit();
}
$user_id = $_SESSION["user_id"];

require 'database.php';

$name = $_POST["name"];
$pass = $_POST["pass"];
$program = $_POST["program"];
$ctc = $_POST["ctc"];
$area = $_POST["area"];
$position = $_POST["position"];
$place = $_POST["place"];
$time = $_POST["time"];

$sql = "UPDATE alumni SET name='$name', passout_year='$pass', program='$program', ctc='$ctc', area='$area', position='$position', place='$place', working_tenure='$time' WHERE roll_no='$user_id'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: profile.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
    $conn->close();
}
?>