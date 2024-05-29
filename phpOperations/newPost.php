<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "travelogger";
$conn = mysqli_connect($servername, $username, $password, $database);
if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_SESSION['userEmail'];
        $location = $_POST["txtLocation"];
        $desc = $_POST["txtLongDescription"];
        $startDate = $_POST["dateStart"];
        $endDate = $_POST["dateEnd"];

        if ($location == "" || $startDate == null || $endDate == null || $desc == "") {
            echo '<script language="javascript">';
            echo 'alert("Please enter all the fields!")';
            echo '</script>';
        } else {
            $sql = "INSERT INTO `tbltrips` ( `location`,  
                `description`, `dateStart`, `dateEnd`, `user`, `coverImg`) VALUES ('$location',  
                '$desc', '$startDate', '$endDate', '$user', '../Images/noPhotoPost.jpeg')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script language="javascript">';
                echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/mainPage.php"';
                echo '</script>';
            }
        }
    } else {
        die("Error" . mysqli_connect_error());
    }
}
?>