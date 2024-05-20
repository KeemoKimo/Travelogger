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
    <link rel="stylesheet" href="mainPage.css">
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
                echo '<script language="javascript">';
                echo "alert('$username')";
                echo '</script>';
                $res = mysqli_query($conn, "select * from users where userName = '$username'");
                while($row = mysqli_fetch_assoc($res)){
            ?>
            <img src="../<?php echo $row['file']?>" alt="" width="100%" height="100%" id="imgProfile">
            <?php } ?>
        </div>
    </div>
    <script>
        document.getElementById("imgProfile").onclick = function () {
            document.location.href = 'http://localhost/Travelogger/FrontEnds/userPage.php';
        }
    </script>
</body>

</html>