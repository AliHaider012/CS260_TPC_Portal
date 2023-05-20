<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION["user_id"];
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Change Password</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='apply.css'>
</head>

<body>
    <header>
        <img src="IITP.png" width="100px" draggable="false" style="vertical-align:middle;margin:15px 50px">
        <h1 style="margin:-85px 160px">Training & Placement Cell IITP</h1>
        <h1 style="margin:135px 160px"></h1>
    </header>

    <div class="form">
        <div class="form-toggle"></div>
        <div class="form-panel one">
            <div class="form-header">
                <h1>Change Password</h1>
            </div>
            <div class="form-content">
                <form action="update_pswd.php" method="post">
                <div class="form-group">
                        <label for="password">Old Password</label>
                        <input type="password" id="old_password" name="old_password" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="new_password" name="new_password" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" id="cnf_password" name="cnf_password" required="required" />
                    </div>
                    <div class="form-group">
                        <button type="submit">Change</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="form-panel two">
        </div>
    </div>

</body>

</html>