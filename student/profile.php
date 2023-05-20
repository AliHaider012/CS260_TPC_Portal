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
$email = $row["email"];
$dob = $row["dob"];
$batch = $row["batch"];
$program = $row["program"];
$branch = $row["branchcode"];
$cpi = $row["cpi"];
$marks10 = $row["ten_marks"];
$marks12 = $row["twelve_marks"];
$interest = $row["interest"];
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
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $email; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">DOB</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $dob; ?>
                                            </h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Batch</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $batch; ?>
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
                                            <p class="m-b-10 f-w-600">Branch</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $branch; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">CPI</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $cpi; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">10th Marks</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $marks10; ?>
                                            </h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">12th Marks</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $marks12; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Interests</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $interest; ?>
                                            </h6>
                                        </div>
                                    </div><br>
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