<?php
ini_set('display_errors', 1);
error_reporting(-1);
require 'database.php';

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION["user_id"];
$cid = $_POST["cid"];
$role = $_POST["role"];
$_SESSION["cid"] = $cid;
$_SESSION["role"] = $role;
echo "<script>console.log('$cid' );</script>";
echo "<script>console.log('$role' );</script>";
$sql = "SELECT name FROM company WHERE cid='$cid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name = $row["name"];
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Application Form</title>
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
                <h1>Application: <?php echo $name ?></h1>
            </div>
            <div class="form-content">
                <form action="confirmation.php" method="post">
                    <div class="form-group">
                        <label for="password">Confirm Password to Apply</label>
                        <input type="password" id="password" name="password" required="required" />
                    </div>
                    <div class="form-group">
                        <button type="submit">Apply</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="form-panel two">
        </div>
    </div>

</body>

</html>

<?php mysqli_free_result($result);

mysqli_close($conn);
?>