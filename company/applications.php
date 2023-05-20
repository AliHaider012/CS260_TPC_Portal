<?php
ini_set('display_errors', 1);
error_reporting(-1);
require 'database.php';
session_start();
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM application where cid='$user_id'";
$result = mysqli_query($conn, $sql);
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Alumni Data</title>
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
                            Student Data
                        </div>
                        <div class="card-body">

                            <div style="margin-bottom: 20px;">

                                <input type="text" id="filter0" placeholder="Filter By Roll No">
                                <input type="text" id="filter1" placeholder="Filter By Role">

                            </div>

                            <table id="filter" class="table">
                                <thead>
                                    <tr>
                                        <th>Roll No</th>
                                        <th>Role</th>
                                        <th>Profile</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr><td>" . $row['roll_no'] . "</td><td>" . $row['role'] . "</td><td><a href=\"profile.php\" onclick=\"event.preventDefault(); document.getElementById('roll_no').value='" . $row['roll_no'] . "'; document.getElementById('role').value='" . $row['role'] . "'; document.getElementById('form').submit();\">View</a></td></tr>";
                                    } ?>
                                    <form id="form" method="POST" action="profile.php">
                                        <input type="hidden" id="roll_no" name="roll_no" value="">
                                        <input type="hidden" id="role" name="role" value="">
                                    </form>
                                    <script>
                                        function submitForm(roll_no) {
                                            document.getElementById('roll_no').value = roll_no;
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

<?php mysqli_free_result($result);

mysqli_close($conn);
?>