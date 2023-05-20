<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}
$user_id = $_SESSION["user_id"];

require 'database.php';
$sql = "SELECT * FROM alumni WHERE roll_no='$user_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$name = $row["name"];
$pass = $row["passout_year"];
$program = $row["program"];
$ctc = $row["ctc"];
$area = $row["area"];
// $pos = $row["position"];
$place = $row["place"];
$time = $row["working_tenure"];
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Profile</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="profile.css" rel="stylesheet">
</head>

<body>
    <header>
        <img src="IITP.png" width="75px" draggable="false" style="margin:20px 75px;">
        <a href="dashboard.php">
            <h3 style="color:black;margin:-75px 170px;">Training & Placement Cell IITP</h3>
        </a>
        <h1 style="margin:100px 160px"></h1>
    </header>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-10 col-md-12 container1">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-2 bg-c-lite-green user-profile">
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Name</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $name; ?>
                                            </h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Passout Year</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $pass; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Program</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $program; ?>
                                            </h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Current CTC</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $ctc; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Role</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $area; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Working Place</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $place; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Working Tenure</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $time; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button onclick="window.location.href='edit_profile.php'">Edit
                                                Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>