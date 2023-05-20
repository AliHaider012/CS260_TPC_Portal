<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}
$user_id = $_SESSION["user_id"];
?>

<html>

<head>
    <link href='https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css' rel='stylesheet'
        type='text/css'>
    <link href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/css/bootstrap-switch.css' rel='stylesheet'
        type='text/css'>
    <link href='https://davidstutz.github.io/bootstrap-multiselect/css/bootstrap-multiselect.css' rel='stylesheet'
        type='text/css'>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js' type='text/javascript'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js'
        type='text/javascript'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/js/bootstrap-switch.min.js'
        type='text/javascript'></script>
    <script src='https://davidstutz.github.io/bootstrap-multiselect/js/bootstrap-multiselect.js'
        type='text/javascript'></script>
</head>

<body>
    <header>
        <img src="IITP.png" width="100px" draggable="false" style="vertical-align:middle;margin:15px 50px">
        <h1 style="margin:-85px 160px">Training & Placement Cell IITP</h1>
        <h1 style="margin:135px 160px"></h1>
    </header>
    <div class='container'>
        <div class='panel panel-primary dialog-panel'>
            <div class='panel-heading'>
                <h5>Add Job Profile</h5>
            </div>
            <div class='panel-body'>
                <form action="add_job.php" method="post" class='form-horizontal' role='form'>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_equipment'>Program</label>
                        <div class='col-md-8'>
                            <div class='col-md-3'>
                                <div class='form-group internal'>
                                    <select class='form-control' name='program' type='text'>
                                        <option>B.Tech</option>
                                        <option>M.Tech</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Min. 10th Marks</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='marks10' step="0.1" placeholder='10th Marks'
                                        type='number' required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Min. 12th Marks</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='marks12' step="0.1" placeholder='12th Marks'
                                        type='number' required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Min. CPI</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='cpi' step="0.01" placeholder='CPI' type='number'
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Role</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='role' placeholder='Role' type='text'
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Package</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='package' placeholder='Package' type='text'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_equipment'>Mode of Interview</label>
                        <div class='col-md-8'>
                            <div class='col-md-3'>
                                <div class='form-group internal'>
                                    <select class='form-control' name='mode' type='text'>
                                        <option>Online</option>
                                        <option>Offline</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class='col-md-offset-4 col-md-3'>
                            <button class='btn-lg btn-primary' type='submit' id='submit'>Submit</button>
                        </div>
                        <div class='col-md-3'>
                            <a href='dashboard.php' class='btn-lg btn-danger' style='float:right'>Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src='edit_profile.js'></script>
</body>

</html>