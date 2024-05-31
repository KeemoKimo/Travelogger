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
        $num = mysqli_num_rows($sql);
        if($num > 0){
            while($result = mysqli_fetch_array($sql)){
                echo "hello " .$result["location"] ." , " .$result['tripID'];
                echo "<a href='memoryOverview.php?id=".$result['tripID']."'>No</a>";
                echo "</br>";
            }
        }
    ?>
    <?php
    $userEmail = $_SESSION['userEmail'];
    $sql = mysqli_query($conn, "select * from tbltrips where user = '$userEmail' order by dateEnd desc");
    $rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    $num = mysqli_num_rows($sql);
    for($x = 0; $x < $num ; $x++){
        ?>
        <!-- <center>
            <div class="tripOverviewContainer">
                <div id="tripOverviewContainer_imgCont">
                    <?php $_SESSION['coverImg'] = $rows[$x]['coverImg']; ?>
                    <img src="<?php echo $rows[$x]['coverImg'] ?>" alt="pic" style="width:100%" id="imgCont">
                </div>
                <p style="display:none"><?php echo $rows[$x]['tripID'] ?></p>
                <?php $_SESSION['location'] = $rows[$x]['location']; ?>
                <h3 style="text-align:center;" id="lblLocation"><b><?php echo $rows[$x]['location'] ?></b></h3>
                <div id="lblTravelDates_Container">
                    <?php $_SESSION['dateStart'] = $rows[$x]['dateStart']; ?>
                    <h3><b><?php echo $rows[$x]['dateStart'] ?></b>
                    </h3>
                    <h3 style="margin-left: 30px;margin-right: 30px">to</h3>
                    <?php $_SESSION['dateEnd'] = $rows[$x]['dateEnd']; ?>
                    <h3> <?php echo $rows[$x]['dateEnd'] ?></h3>
                </div>
                <p id="lblDesc">
                    <?php $_SESSION['description'] = $rows[$x]['description']; ?>
                    <?php echo $rows[$x]['description'] ?>
                </p>
            </div>
        </center> -->

        <center>
            <div id="dividerLine"></div>
        </center>
    <?php
        // echo '<script language="javascript">';
        // echo 'document.getElementsByClassName("tripOverviewContainer").onclick =function(){';
        // echo "console.log($rows[$x]['location'])";
        // echo "}";
        // echo '</script>';
    } ?>
</body>

<!-- <script>
    document.getElementById("tripOverviewContainer").onclick =function(){

    }
    document.getElementsByClassName
</script> -->

</html>