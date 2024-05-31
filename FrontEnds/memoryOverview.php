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
    <title>Document</title>
</head>
<body>
    Trip ID :  <?php echo $tripID?><br>
    Location : <?php echo $location?> <br>
    Start Date : <?php echo $dateStart ?><br>
    End Date : <?php echo $dateEnd ?><br>
    Description : <?php echo $description ?><br>
    Cover Image : <br><img src="<?php echo $coverImg?>" alt=""><br>
</body>
</html>