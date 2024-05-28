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
            <h1 id="lblUpload_mainUploadDiv">:+ upload a new memory +:</h1>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                Select Image Files to Upload:
                <input type="file" name="files[]" multiple>
                <br>
                <input type="submit" name="submit" value="UPLOAD">
            </form>
            <div id="imgContainer">
                <div id="imgContainer_images">
                    <img src="../Images/emptyImage.jpg" alt="" id="img_1">
                    <img src="../Images/emptyImage.jpg" alt="" id="img_2">
                    <img src="../Images/emptyImage.jpg" alt="" id="img_3">
                </div>
                <div id="moreImgContainer">
                    <h1>+</h1>
                </div>
            </div>
            <div id="locationContainer">
                <div id="locationContainer_img">
                    <div style="display:flex;">
                        <img src="../Images/location.png" alt="" id="imgLocation">
                        <h4 style="font-size: 20px;">Location : </h4>
                    </div>
                </div>
                <div id="locationContainer_desc">
                    <input type="text" id="txtLocation" placeholder="format : areaName, countryName">
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
                    <input type="date" id="dateStart">
                    <p
                        style="margin-left: 30px;margin-right: 30px;font-weight: lighter;margin-top: 25px;font-size: 19px">
                        to </p>
                    <input type="date" id="dateEnd">
                </div>
            </div>
            <div id="writeDescriptionContainer">
                <textarea name="txtLongDescription" id="txtLongDescription"
                    placeholder="Enter a description for this memory..."></textarea>
            </div>
            <div id="lblHightlight_container">
                <h2 id="lblCancel"><b>
                        < </b> cancel memory</h2>
                <h2 id="lblUpload">upload memory<b> > </b></h2>
            </div>
        </div>
    </center>
    <script>
        document.getElementById("lblCancel").onclick = function () {
            document.location.href = 'http://localhost/Travelogger/FrontEnds/mainPage.php'
        }
    </script>
</body>

</html>