<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "travelogger";
    $conn = mysqli_connect($servername,$username,$password,$database);
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
            <h1 id="lblWelcome">Welcome back, <?php echo $_SESSION['username']; ?></h1>
        </div>
        <div class="rightTop">
            <?php 
                $username = $_SESSION['username'];
                $res = mysqli_query($conn, "select * from users where userName = '$username'");
                while($row = mysqli_fetch_assoc($res)){
            ?>
            <img src="../<?php echo $row['file']?>" alt="" width="100%" height="100%" id="imgProfile">
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
    <script>
        var pfpVar = 0
        document.getElementById("imgProfile").onclick = function () {
            if(pfpVar == 1){
                pfpVar = 0
                //console.log(pfpVar)
                document.getElementById("openUpClickPfp").style.display = "none"
                document.getElementById("editProfileContainer").style.display = "none"
                document.getElementById("logOutContainer").style.display = "none"
            }else if(pfpVar == 0){
                pfpVar = 1
                //console.log(pfpVar)
                document.getElementById("openUpClickPfp").style.display = "block"
                document.getElementById("editProfileContainer").style.display = "block"
                document.getElementById("logOutContainer").style.display = "block"
            } 

            document.getElementById("editProfileContainer").onclick =function(){
                document.location.href = 'http://localhost/Travelogger/FrontEnds/userPage.php'
            }

            document.getElementById("logOutContainer").onclick =function(){
                document.location.href = 'http://localhost/Travelogger/credential.php'
            }
        }
        
    </script>
</body>

</html>