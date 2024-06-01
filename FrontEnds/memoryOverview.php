<?php 
session_start();
include "../phpOperations/OPEN_CONN.php";
if(isset($_GET['id'])){
    $tripID = $_GET['id'];
    $userEmail = $_SESSION['userEmail'];
    $sqlLoc = mysqli_query($conn, "select location from tbltrips where tripID = '$tripID'");
    $sqlDesc = mysqli_query($conn, "select description from tbltrips where tripID = '$tripID'");
    $sqlDateStart = mysqli_query($conn, "select dateStart from tbltrips where tripID = '$tripID'");
    $sqlDateEnd = mysqli_query($conn, "select dateEnd from tbltrips where tripID = '$tripID'");
    $sqlCoverImg = mysqli_query($conn, "select coverImg from tbltrips where tripID = '$tripID'");
    $tempLoc = mysqli_fetch_array($sqlLoc);
    $tempDesc = mysqli_fetch_array($sqlDesc);
    $tempDateStart = mysqli_fetch_array($sqlDateStart);
    $tempDateEnd = mysqli_fetch_array($sqlDateEnd);
    $tempCoverImg = mysqli_fetch_array($sqlCoverImg);
    $location = $tempLoc[0];
    $description = $tempDesc[0];
    $dateStart = $tempDateStart[0];
    $dateEnd = $tempDateEnd[0];
    $coverImg = $tempCoverImg[0];
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="memoryOverview.css?v=<?php echo time(); ?>">
    <title>Trip View</title>
</head>
<body>
    
    <h1 id="lblLocation">Trip to <?php echo $location ?></h1>
    <div class="containerDate">
        <div class="containerDate_element">
            <h1><?php echo $dateStart ?></h1>
            <h1 style="margin-left:40px;margin-right: 40px">to</h1>
            <h1><?php echo $dateEnd ?></h1>
        </div>
    </div>
    <div style="margin-top: 50px;"></div>
    <div id="coverImgDiv">
        <img src="<?php echo $coverImg ?>" alt="">
    </div>
    <div style="margin-top: 100px;"></div>
    <div class="descContainer">
        <p><?php echo $description ?></p>
    </div>
</body>
<script>
    document.getElementById("coverImgDiv").onclick = function(){
        document.location.href = "editCoverImg.php?id=<?php echo $tripID ?>"
    }
</script>
</html>