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
    <link rel="stylesheet" href="mainPage.css?v=<?php echo time(); ?>">
    <title>Main</title>

</head>

<body>
    <div class="headContent">
        <div class="leftTop">
            <h1 id="lblWelcome">Welcome back, <b><?php echo $_SESSION['username']; ?></b></h1>
        </div>
        <div class="rightTop">
            <?php
            $username = $_SESSION['username'];
            $res = mysqli_query($conn, "select * from users where userName = '$username'");
            while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <img src="../<?php echo $row['file'] ?>" alt="" width="100%" height="100%" id="imgProfile">
            <?php } ?>
        </div>
    </div>

    <div id="openUpClickPfp">
        <div id="editProfileContainer">
            Edit profile
        </div>
        <div id="logOutContainer">
            Log out
        </div>
    </div>

    <div style="width:80%;height: 2px;background-color: black;margin-top: 50px;margin-left: 100px;padding-right: 100px">
    </div>
    <h1 id="lblYourLatestTravel">Your Travel <b>Highlights</b></h1>

    <div style="display:flex;margin-top: 70px;">
        <div class="card">
            <img src="../Images/greece1.jpeg" alt="pic" style="width:100%">
            <div class="container">
                <h3 style="text-align:center;"><b>Santorini, Greece</b></h3>
                <h4 style="text-align:center;"><b>14 July 2022</b></h4>
                <p style="text-align:center;">a beautiful visit to islands</p>
            </div>
        </div>

        <div class="card2">
            <img src="../Images/thai1.jpg" alt="pic" style="width:100%">
            <div class="container">
                <h3 style="text-align:center;"><b>Bangkok, Thailand</b></h3>
                <h4 style="text-align:center;"><b>29 Oct 2024</b></h4>
                <p style="text-align:center;">a visit to bangkok, thailand</p>
            </div>
        </div>

        <div class="card3">
            <img src="../Images/cam1.jpg" alt="pic" style="width:100%">
            <div class="container">
                <h3 style="text-align:center;"><b>Preah Vihear, Cambodia</b></h3>
                <h4 style="text-align:center;"><b>31 December 2023</b></h4>
                <p style="text-align:center;">a visit to the mountains</p>
            </div>
        </div>

        <div class="card4">
            <img src="../Images/china1.jpg" alt="pic" style="width:100%">
            <div class="container">
                <h3 style="text-align:center;"><b>Beijing, China</b></h3>
                <h4 style="text-align:center;"><b>27 April 2019</b></h4>
                <p style="text-align:center;">lovely temple visits</p>
            </div>
        </div>
    </div>  

    <div id="lblHightlight_container">
        <h2 id="lblViewMoreMemories"><b> < </b> view all your memories</h2>
        <h2 id="lblAddMemories">add a new memory<b> > </b></h2>
    </div>

    <div style="width:80%;height: 2px;background-color: black;margin-top: 50px;margin-left: 100px;padding-right: 100px">
    </div>

    <script>
        var pfpVar = 0
        document.getElementById("imgProfile").onclick = function () {
            if (pfpVar == 1) {
                pfpVar = 0
                //console.log(pfpVar)
                document.getElementById("openUpClickPfp").style.display = "none"
                document.getElementById("editProfileContainer").style.display = "none"
                document.getElementById("logOutContainer").style.display = "none"
            } else if (pfpVar == 0) {
                pfpVar = 1
                //console.log(pfpVar)
                document.getElementById("openUpClickPfp").style.display = "block"
                document.getElementById("editProfileContainer").style.display = "block"
                document.getElementById("logOutContainer").style.display = "block"
            }

            document.getElementById("editProfileContainer").onclick = function () {
                document.location.href = 'http://localhost/Travelogger/FrontEnds/userPage.php'
            }

            document.getElementById("logOutContainer").onclick = function () {
                document.location.href = 'http://localhost/Travelogger/credential.php'
            }
        }

        document.getElementById("lblAddMemories").onclick =function(){
                document.location.href = 'http://localhost/Travelogger/FrontEnds/addPost.php'
        }

        document.getElementById("lblViewMoreMemories").onclick =function(){
            document.location.href = 'http://localhost/Travelogger/FrontEnds/allMemories.php'
        }

    </script>
</body>

</html>