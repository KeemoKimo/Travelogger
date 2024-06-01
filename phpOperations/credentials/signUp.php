<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "travelogger";
$conn = mysqli_connect($servername, $username, $password, $database);
if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["reg_txtUsername"];
        $userEmail = $_POST["reg_txtEmail"];
        $userPass = $_POST["reg_txtPassword"];
        $userImg = "userPFP/empty.png";

        $sql = "Select * from users where userName='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num == 0) {
            if ($username == "" || $userEmail == "" || $userPass == "") {
                echo '<script language="javascript">';
                echo 'alert("Please enter all the fields!")';
                echo '</script>';
                echo '<script language="javascript">';
                echo 'document.location.href = "http://localhost/Travelogger/credential.php"';
                echo '</script>';
            } else {
                $sql = "INSERT INTO `users` ( `userName`,  
                `userEmail`, `userPassword`, `file`) VALUES ('$username',  
                '$userEmail', '$userPass', '$userImg')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<script language="javascript">';
                    echo 'alert("User created successfully!")';
                    echo '</script>';
                    echo '<script language="javascript">';
                    echo 'document.location.href = "http://localhost/Travelogger/credential.php"';
                    echo '</script>';
                }
            }
        } else {
            echo '<script language="javascript">';
            echo 'alert("Credential already exists!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/credential.php"';
            echo '</script>';
        }
    }
} else {
    die("Error" . mysqli_connect_error());
}
