<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "travelogger";
$conn = mysqli_connect($servername, $username, $password, $database);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addPost.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <center>
        <div id="mainUploadDiv">
            <form action="../phpOperations/newPost.php" method="post" style="margin-top: -30px; padding-bottom: 60px;">
                <h1 id="lblUpload_mainUploadDiv">:+ upload a new memory +:</h1>
                <!-- <form action="" method="post" enctype="multipart/form-data" id="frmUpload">
                    <input type="file" name="image[]" id="btnUpload" accept=".jpg, .jpeg, .png" required multiple />
                    <label for="btnUpload" id="lblClick">Click here to select image</label>
                    <img src="../Images/addImg.png" alt="" id="imgAddImage">
                    <button type="submit" name="submit"
                        style="margin-left: 39px;width: 82px;border-radius: 0 10px 10px 0;border:none;"
                        id="btnConfirm">Confirm!</button>
                </form> -->
                <div id="locationContainer">
                    <div id="locationContainer_img">
                        <div style="display:flex;">
                            <img src="../Images/location.png" alt="" id="imgLocation">
                            <h4 style="font-size: 20px;">Location : </h4>
                        </div>
                    </div>
                    <div id="locationContainer_desc">
                        <input type="text" name="txtLocation" id="txtLocation" placeholder="format : areaName, countryName" required>
                    </div>
                </div>
                <div id="travelDateContainer">
                    <div id="travelDateContainer_img">
                        <div style="display:flex;">
                            <img src="../Images/calendar.png" alt="" id="imgCalendar">
                            <h4 style="font-size: 20px;">Travel Date : </h4>
                        </div>
                    </div>
                    <div id="travelDateContainer_desc">
                        <input type="date" name="dateStart" id="dateStart" required>
                        <p
                            style="margin-left: 30px;margin-right: 30px;font-weight: lighter;margin-top: 25px;font-size: 19px">
                            to </p>
                        <input type="date" name="dateEnd" id="dateEnd" required>
                    </div>
                </div>
                <div id="writeDescriptionContainer">
                    <textarea name="txtLongDescription" id="txtLongDescription"
                        placeholder="Enter a description for this memory..." required></textarea>
                </div>

                <input type="submit" name="cancel" value="< cancel memory" id="lblCancel">
                <input type="submit" name="submit" value="upload memory >" id="lblUpload">
            </form>
        </div>
    </center>
    <script>
        document.getElementById("lblCancel").onclick = function () {
            document.location.href = 'http://localhost/Travelogger/FrontEnds/mainPage.php'
        }
    </script>
</body>

</html>