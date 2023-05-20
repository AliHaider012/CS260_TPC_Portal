<?php
ini_set('display_errors', 1);
error_reporting(-1);
require 'database.php';

$sql = "SELECT * FROM alumni";
$result = mysqli_query($conn, $sql);
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE= edge'>
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
                            Alumni Data
                        </div>
                        <div class="card-body">

                            <div style="margin-bottom: 20px;">

                                <input type="text" id="filter0" placeholder="Filter By Roll No">
                                <input type="hidden" id="filter1" placeholder="Filter By Name">
                                <input type="hidden" id="filter2" placeholder="Filter By Email">
                                <input type="hidden" id="filter3" placeholder="Filter By Program">
                                <input type="hidden" id="filter4" placeholder="Filter By Batch">
                                <input type="hidden" id="filter5" placeholder="Filter By Branch">
                                <input type="text" id="filter6" placeholder="Filter By Company">
                                <input type="text" id="filter7" placeholder="Filter By Role">
                                <input type="hidden" id="filter8" placeholder="Filter By CTC">

                            </div>

                            <table id="filter" class="table">
                                <thead>
                                    <tr>
                                        <th>Roll No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Program</th>
                                        <th>Batch</th>
                                        <th>Branch</th>
                                        <th>Company</th>
                                        <th>Role</th>
                                        <th>Package</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr><td>" . $row['roll_no'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['program'] . "</td><td>" . $row['passout_year'] . "</td><td>" . $row['branchcode'] . "</td><td>" . $row['company'] . "</td><td>" . $row['area'] . "</td><td>" . $row['ctc'] . "</td></tr>";
                                    } ?>
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