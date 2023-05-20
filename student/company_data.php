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
$sql = "SELECT * FROM Student WHERE roll_no='$user_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$cpi = $row["cpi"];
$marks10 = $row["ten_marks"];
$marks12 = $row["twelve_marks"];
$program = $row["program"];

// $sql = "SELECT * FROM Company";
$sql = "SELECT * FROM job WHERE minimum_10marks<='$marks10' and minimum_12marks<='$marks12' and minimum_cpi<='$cpi' and program='$program'";
$result = $conn->query($sql);

?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Company Data</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='nav.css'>
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

        </div>
    </nav>
    <main class="py-4">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Company Data
                        </div>
                        <div class="card-body">

                            <div style="margin-bottom: 20px;">

                                <input type="text" id="filter0" placeholder="Filter By Roll No">
                                <input type="text" id="filter1" placeholder="Filter By Name">
                                <input type="text" id="filter2" placeholder="Filter By Email">

                            </div>

                            <table id="filter" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Base CTC</th>
                                        <th>Mode of Interview</th>
                                        <th>Apply</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr><td>" . $row['name'] . "</td><td>" . $row['sector'] . "</td><td>" . $row['salary'] . "</td><td>" . $row['interview_type'] . "</td><td><a href=\"apply.php\" onclick=\"event.preventDefault(); document.getElementById('cid').value='" . $row['cid'] . "'; document.getElementById('role').value='" . $row['sector'] . "'; document.getElementById('form').submit();\">View</a></td></tr>";
                                    } ?>
                                    <form id="form" method="POST" action="apply.php">
                                        <input type="hidden" id="cid" name="cid" value="">
                                        <input type="hidden" id="role" name="role" value="">
                                    </form>
                                    <script>
                                        function submitForm(cid) {
                                            document.getElementById('cid').value = cid;
                                            document.getElementById('role').value = role;
                                            document.getElementById('form').submit();
                                        }
                                    </script>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src='table.js' defer></script>
</body>

</html>

<?php
mysqli_free_result($result);

mysqli_close($conn);
?>