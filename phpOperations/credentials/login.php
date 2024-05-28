<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "travelogger";
$conn = mysqli_connect($servername, $username, $password, $database);
if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["txtUsername"];
        $userPass = $_POST["txtPassword"];

        $sql = "Select * from users where userName='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num == 0) {
            echo '<script language="javascript">';
            echo 'alert("This user does not exist!")';
            //echo 'window.location.reload()';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/credential.php"';
            echo '</script>';
        } else {
            $sqlGetEmail = "Select userEmail from users where userName = '$username' AND userPassword = '$userPass'";
            $resultEmail = mysqli_query($conn, $sqlGetEmail);
            $rowRes = mysqli_fetch_array($resultEmail);
            $sql = "Select * from users where userName = '$username' AND userPassword = '$userPass'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num != 0) {
                $_SESSION['username'] = $username;
                $_SESSION['userEmail'] = $rowRes[0];

                header('Location: http://localhost/Travelogger/FrontEnds/mainPage.php');
            } else {
                echo '<script language="javascript">';
                echo 'alert("The information you entered is wrong!")';
                echo 'document.location.href = "http://localhost/Travelogger/credential.php"';
                echo '</script>';
            }
        }
    }
} else {
    die("Error" . mysqli_connect_error());
}
