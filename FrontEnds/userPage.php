<?php 
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userPage.css">
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit profile <?php echo $_SESSION['username']?></h1>
</body>
</html>