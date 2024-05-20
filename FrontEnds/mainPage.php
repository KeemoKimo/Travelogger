<?php
    session_start();
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
            <img src="../Images/ronaldo.jpeg" alt="" width="100%" height="100%" id="imgProfile">
        </div>
    </div>
    <script>
        document.getElementById("imgProfile").onclick = function () {
            document.location.href = 'http://localhost/Travelogger/FrontEnds/userPage.php';
        }
    </script>
</body>

</html>