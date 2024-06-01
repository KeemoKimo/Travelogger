<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "travelogger";
$conn = mysqli_connect($servername, $username, $password, $database);
$tripID = $_GET['id'];
$sqlCoverImg = mysqli_query($conn, "select coverImg from tbltrips where tripID = '$tripID'");
$tempCoverImg = mysqli_fetch_array($sqlCoverImg);
$coverImg = $tempCoverImg[0];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cover Image</title>
</head>
<body>
    <h1>Hello trip <?php echo $tripID ?></h1>
    <img src="<?php echo $coverImg?>" alt="">
</body>
</html>