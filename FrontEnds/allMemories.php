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
    <h1 style="text-align: center;font-size: 40px;margin-top: 60px;"> ALL TRIP MEMORIES </h1>
    <center>
        <div id="dividerLine"></div>
    </center>
    <?php 
        $userEmail = $_SESSION['userEmail'];
        $sql = mysqli_query($conn, "select * from tbltrips where user = '$userEmail' order by dateEnd desc");
        $num = mysqli_num_rows($sql);
        echo "<h3 id='lblTotalTrip'>Your total amount of trip : <b> $num </b> </h3>";
    ?>
    <center>
        <div id="dividerLine"></div>
    </center>
    <?php
    $userEmail = $_SESSION['userEmail'];
    $sql = mysqli_query($conn, "select * from tbltrips where user = '$userEmail' order by dateEnd desc");
    $rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    foreach ($rows as $data) {
        ?>
        <center>
            <div id="tripOverviewContainer">
                <div id="tripOverviewContainer_imgCont">
                    <img src="<?php echo $data['coverImg'] ?>" alt="pic" style="width:100%" id="imgCont">
                </div>
                <p style="display:none"><?php echo $data['tripID'] ?></p>
                <h3 style="text-align:center;" id="lblLocation"><b><?php echo $data['location'] ?></b></h3>
                <div id="lblTravelDates_Container">
                    <h3><b><?php echo $data['dateStart'] ?></b>
                    </h3>
                    <h3 style="margin-left: 30px;margin-right: 30px">to</h3>
                    <h3> <?php echo $data['dateEnd'] ?></h3>
                </div>
                <p id="lblDesc">
                    <?php echo $data['description'] ?>
                </p>
            </div>
        </center>
        <center>
            <div id="dividerLine"></div>
        </center>
    <?php } ?>
</body>

</html>