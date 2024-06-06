<?php
session_start();
include ("../phpOperations/OPEN_CONN.php");
$userEmail = $_SESSION['userEmail'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Search</title>
    <link rel="stylesheet" href="advancedSearch.css?v=<?php echo time(); ?>">
</head>

<body>
    <h1 id="mainTopText"><b>Advanced </b>Trip Searching</h1>
    <center>
        <div id="formDiv">
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="txtSearch" id="txtSearch" placeholder="Search Trips...">
                <button type="submit" id="btnSearch" name="btnSearch">Search</button>
            </form>
        </div>
        <div id="formDivFilter">
            <form method="POST" enctype="multipart/form-data">
                <input type="radio" name="radioFilter" id="sortLatestEndDate" value="sortLatestEndDate" required>
                <label for="sortLatestEndDate">Sort By Latest End Date</label>
                <input type="radio" name="radioFilter" id="sortLatestStartDate" value="sortLatestStartDate" required>
                <label for="sortLatestStartDate">Sort By Latest Start Date</label>
                <input type="radio" name="radioFilter" id="sortEarliestEndDate" value="sortEarliestEndDate" required>
                <label for="sortEarliestEndDate">Sort By Earliest End Date</label>
                <input type="radio" name="radioFilter" id="sortEarliestStartDate" value="sortEarliestStartDate"
                    required>
                <label for="sortEarliestStartDate">Sort By Earliest Start Date</label>
                <button type="submit" id="btnFilter" name="btnFilter">Sort</button>
            </form>
        </div>
    </center>
    <div id="lblHightlight_container">
        <h2 id="lblViewMoreMemories"><b>
                < </b> view all your memories</h2>
        <h2 id="lblMainPage">Home Page<b> > </b></h2>
    </div>
    <center>
        <div id="dividerLine"></div>
    </center>
    <?php
    if (isset($_POST['btnSearch'])) {
        $searchRes = $_POST['txtSearch'];
        $sql = "SELECT * FROM tbltrips WHERE user = '$userEmail' AND location like '%$searchRes%'";
        $finaleSQL = mysqli_query($conn, $sql);
        if ($finaleSQL) {
            while ($result = mysqli_fetch_array($finaleSQL)) {
                echo '<center>
                        <a href="memoryOverview.php?id=' . $result["tripID"] . '" id="aFull">
                            <div class="insideContainer"> 
                                <div class="insideContainer_imgCont">   
                                    <img src="' . $result['coverImg'] . '" width="100%">
                                </div>   
                                <p style="display:none">' . $result['tripID'] . '</p>
                                <h3 style="text-align:center;" id="lblLocation"><b>' . $result['location'] . '</b></h3>
                                <div id="lblTravelDates_Container">
                                    <h3><b>' . $result['dateStart'] . '</b>
                                    </h3>
                                    <h3 style="margin-left: 30px;margin-right: 30px">to</h3>
                                    <h3><b>' . $result['dateEnd'] . '</b></h3>
                                </div>
                                <p id="lblDesc">
                                    ' . $result['description'] . '
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
    } else if (isset($_POST['btnFilter'])) {
        $radio = $_POST["radioFilter"];
        $sqlMain = "SELECT * FROM tbltrips WHERE user = '$userEmail'";
        if ($radio == 'sortLatestEndDate') {
            $sqlMain = "SELECT * FROM tbltrips WHERE user = '$userEmail' ORDER BY dateEnd desc";
        } else if ($radio == 'sortLatestStartDate') {
            $sqlMain = "SELECT * FROM tbltrips WHERE user = '$userEmail' ORDER BY dateStart desc";
        } else if ($radio == 'sortEarliestEndDate') {
            $sqlMain = "SELECT * FROM tbltrips WHERE user = '$userEmail' ORDER BY dateEnd asc";
        } else if ($radio == 'sortEarliestStartDate') {
            $sqlMain = "SELECT * FROM tbltrips WHERE user = '$userEmail' ORDER BY dateStart asc";
        }
        $finaleSQL = mysqli_query($conn, $sqlMain);
        if ($finaleSQL) {
            while ($result = mysqli_fetch_array($finaleSQL)) {
                echo '<center>
                        <a href="memoryOverview.php?id=' . $result["tripID"] . '" id="aFull">
                            <div class="insideContainer"> 
                                <div class="insideContainer_imgCont">   
                                    <img src="' . $result['coverImg'] . '" width="100%">
                                </div>   
                                <p style="display:none">' . $result['tripID'] . '</p>
                                <h3 style="text-align:center;" id="lblLocation"><b>' . $result['location'] . '</b></h3>
                                <div id="lblTravelDates_Container">
                                    <h3><b>' . $result['dateStart'] . '</b>
                                    </h3>
                                    <h3 style="margin-left: 30px;margin-right: 30px">to</h3>
                                    <h3><b>' . $result['dateEnd'] . '</b></h3>
                                </div>
                                <p id="lblDesc">
                                    ' . $result['description'] . '
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
    }

    ?>
    <script>
        document.getElementById("lblMainPage").onclick = function () {
            document.location.href = 'http://localhost/Travelogger/FrontEnds/mainPage.php'
        }

        document.getElementById("lblViewMoreMemories").onclick = function () {
            document.location.href = 'http://localhost/Travelogger/FrontEnds/allMemories.php'
        }
    </script>
    
<?php include ("footer.php"); ?>