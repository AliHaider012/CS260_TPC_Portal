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
    <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js'
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
                <h5>Profile Edit</h5>
            </div>
            <div class='panel-body'>
                <form action="alum_update_data.php" method="post" class='form-horizontal' role='form'>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Name</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='name' placeholder='Name' type='text' required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_checkin'>Passout Year</label>
                        <div class='col-md-8'>
                            <div class='col-md-3'>
                                <div class='form-group internal input-group'>
                                    <input class='form-control' name='pass' placeholder='Passout Year' type='text' required>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Current CTC</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='ctc' placeholder='CTC' type='number' required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Area</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='area' placeholder='Area' type='text' required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Company</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='company' placeholder='Company' type='text' required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Current Position</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='pos' placeholder='Working Position' type='text'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Current City</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='place' placeholder='City' type='text'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Working Tenure</label>
                        <div class='col-md-8'>
                            <div class='col-md-3 indent-small'>
                                <div class='form-group internal'>
                                    <input class='form-control' name='time' placeholder='Working Tenure' type='text'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class='col-md-offset-4 col-md-3'>
                            <button class='btn-lg btn-primary' type='submit' id='submit'>Submit</button>
                        </div>
                        <div class='col-md-3'>
                            <button class='btn-lg btn-danger' style='float:right' type='submit' id='cancel'>Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src='edit_profile.js'></script>
</body>

</html>