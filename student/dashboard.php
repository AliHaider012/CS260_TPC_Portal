<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}
$user_id = $_SESSION["user_id"];
require 'database.php';
$sql = "SELECT * FROM Student WHERE roll_no='$user_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$name = $row["name"];
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='nav.css'>
    <link rel='stylesheet' href='cards.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar">
        <div class="container">

            <div class="navbar-header">
                <img src="IITP.png" width="80px" draggable="false" style="vertical-align:middle;margin:15px 50px">
                <a href="dashboard.php">
                    <h4>Training & Placement Cell IITP</h4>
                </a>
            </div>

            <div class="navbar-menu" id="open-navbar1">
                <ul class="navbar-nav">
                    <li class="active"><a href="profile.php">Profile</a></li>
                    <li><a href="change_pswd.php">Change Password</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="signout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="ag-format-container">
        <div class="ag-courses_box">
            <div class="ag-courses_item">
                <a href="company_data.php" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Check Companies
                    </div>

                    <div class="ag-courses-item_date-box">
                        &nbsp Check
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a href="alumni_data.php" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Check Alumni Data
                    </div>

                    <div class="ag-courses-item_date-box">
                        &nbsp Check
                    </div>
                </a>
            </div>

        </div>
    </div>
    <script src='dashboard.js'></script>
</body>

</html>