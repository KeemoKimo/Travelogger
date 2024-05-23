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
            <h1 id="lblUpload_mainUploadDiv">>+ upload a new memory +<</h1>
                    <div id="imgContainer">
                        <div id="imgContainer_images">
                            <img src="../Images/cam1.jpg" alt="" id="img_1">
                            <img src="../Images/china1.jpg" alt="" id="img_2">
                            <img src="../Images/thai1.jpg" alt="" id="img_3">
                        </div>
                        <div id="moreImgContainer">
                            <h1>1</h1>
                        </div>
                    </div>
            <h1>Hello world </h1>
        </div>
    </center>
</body>

</html>