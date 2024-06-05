<?php

session_start();
include ("../phpOperations/OPEN_CONN.php");
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

    <h2 id="lblAdvancedSearch">Advanced Searching</h2>
 
    <center>
        <div id="dividerLine"></div>
    </center>
    <?php
    $userEmail = $_SESSION['userEmail'];
    $sql = mysqli_query($conn, "select * from tbltrips where user = '$userEmail' order by dateEnd desc");
    $num = mysqli_num_rows($sql);
    if ($num > 0) {
        while ($result = mysqli_fetch_array($sql)) {
            echo '<center>
                    <a href="memoryOverview.php?id=' . $result["tripID"] . '" id="aFull">
                        <div class="insideContainer"> 
                            <div class="insideContainer_imgCont">   
                                <img src="'.$result['coverImg'].'" width="100%">
                            </div>   
                            <p style="display:none">'.$result['tripID'].'</p>
                            <h3 style="text-align:center;" id="lblLocation"><b>'.$result['location'].'</b></h3>
                            <div id="lblTravelDates_Container">
                                <h3><b>'.$result['dateStart'].'</b>
                                </h3>
                                <h3 style="margin-left: 30px;margin-right: 30px">to</h3>
                                <h3><b>'.$result['dateEnd'].'</b></h3>
                            </div>
                            <p id="lblDesc">
                                '.$result['description'].'
                            </p>
                        </div>
                    </a>
                </center>
                <center>
                    <div id="dividerLine"></div>
                </center>
                ';
            echo "</br>";

        }
    }
    ?>

    <script>
        document.getElementById("lblAdvancedSearch").onclick = function () {
            document.location.href = 'http://localhost/Travelogger/FrontEnds/advancedSearch.php'
        }
    </script>
</body>
</html>