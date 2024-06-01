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

    <div id="lineDivider">
    </div>
    <h1 id="lblYourLatestTravel">Your Travel <b>Highlights</b></h1>

    <center>
        <div style="display:flex;margin-top: 70px;" class="divContainer">
            <?php
            $userEmail = $_SESSION['userEmail'];
            $sql = mysqli_query($conn, "select * from tbltrips where user = '$userEmail' order by dateEnd desc LIMIT 4");
            $num = mysqli_num_rows($sql);
            if ($num > 0) {
                while ($result = mysqli_fetch_array($sql)) {
                    echo '<center>
                                <a href="memoryOverview.php?id=' . $result["tripID"] . '" id="aSmall">
                                    <div class="insideContainer"> 
                                        <div class="insideContainer_imgCont">   
                                            <img src="' . $result['coverImg'] . '" width="100%">
                                        </div>   
                                        <h3 style="text-align:center;" id="lblLocation"><b>' . $result['location'] . '</b></h3>
                                        <p id="lblDesc">
                                            ' . $result['description'] . '
                                        </p>
                                    </div>
                                </a>
                        </center>
                        <center>
                            <div id="dividerLine"></div>
                        </center>';
                    echo "</br>";

                }
            }
            ?>
        </div>
    </center>
    <div id="lblHightlight_container">
        <h2 id="lblViewMoreMemories"><b>
                < </b> view all your memories</h2>
        <h2 id="lblAddMemories">add a new memory<b> > </b></h2>
    </div>

    <div id="lineDivider"></div>

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

        document.getElementById("lblAddMemories").onclick = function () {
            document.location.href = 'http://localhost/Travelogger/FrontEnds/addPost.php'
        }

        document.getElementById("lblViewMoreMemories").onclick = function () {
            document.location.href = 'http://localhost/Travelogger/FrontEnds/allMemories.php'
        }

    </script>
</body>

</html>