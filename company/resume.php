<?php
ini_set('display_errors', 1);
error_reporting(-1);

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

$roll_no = $_SESSION["roll_no"];
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
                <h1>Documents Verification</h1>
            </div>
            <div class="form-content">

                <div class="form-group">
                    <button onclick="showLink('resume')">Resume</button>
                    <p id="resume-link" style="display: none;"><a>View Resume</a></p>
                </div>

            </div>
        </div>
        <div class="form-panel two">
        </div>
    </div>

    <script src="https://apis.google.com/js/api.js"></script>
    <script src="drive.js"></script>
    <script type="text/javascript">
        function showLink(button_id) {
            var link_id = button_id + "-link";
            var link = document.getElementById(link_id);
            link.style.display = "block";

            // Generate link using drive.js
            
            var fileName = "<?php echo $roll_no; ?>_4";
            if (button_id === "resume") {
                const folderId = 'folderId';
                getDownloadUrl(folderId, fileName).then((downloadUrl) => {
                    const viewOnlyUrl = downloadUrl.replace("&export=download", "");
                    // console.log(viewOnlyUrl);
                    link.children[0].setAttribute("href", viewOnlyUrl);
                }).catch((err) => {
                    console.error(err);
                });
            }
        }
    </script>

</body>

</html>
