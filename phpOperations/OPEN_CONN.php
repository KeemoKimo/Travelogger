<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "travelogger";
    $conn = mysqli_connect($servername,$username,$password,$database);
    if($conn){
        // echo "success";
    }else {
        die("Error". mysqli_connect_error());
    }