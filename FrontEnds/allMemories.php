<?php

session_start();
include ("../phpOperations/OPEN_CONN.php");
// $userEmail = $_SESSION['userEmail'];
// $sql = mysqli_query($conn, "select * from tbltrips where user = '$userEmail'");
// $rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);
// foreach ($rows as $data) {
//     print_r($data['coverImg']);
// }

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="allMemories.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <h1>Hello <?php echo $_SESSION['userEmail'] ?></h1>
    <h1>All Your Trips, Total : , Trip ID: </h1>
    <?php
    $userEmail = $_SESSION['userEmail'];
    $sql = mysqli_query($conn, "select * from tbltrips where user = '$userEmail' order by dateEnd desc");
    $rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    foreach ($rows as $data) {
        ?>
        <div class="card">
            <img src="<?php echo $data['coverImg'] ?>" alt="pic" style="width:100%">
            <div class="container">
                <h3 style="text-align:center;"><b><?php echo $data['location'] ?></b></h3>
                <h4 style="text-align:center;"><b><?php echo $data['dateStart'] ?> - <?php echo $data['dateEnd'] ?></b>
                </h4>
            </div>
        </div>
        <center>
            <div id="dividerLine"></div>
        </center>
    <?php } ?>
</body>

</html>