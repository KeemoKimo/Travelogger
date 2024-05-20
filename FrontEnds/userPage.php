<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "travelogger";
$conn = mysqli_connect($servername, $username, $password, $database);
if(isset($_POST['submit'])){
    $username = $_SESSION['username'];
    $file_name = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $folder = '../userPFP/'.$file_name;
    
    $query = mysqli_query($conn, "UPDATE users SET file = 'userPFP/$file_name' WHERE userName = '$username'");
    
    if(move_uploaded_file($temp_name, $folder)){
        echo '<script language="javascript">';
        echo 'alert("User Profile Updated successfully!")';
        echo '</script>';
    }else{
        echo '<script language="javascript">';
        echo 'alert("User Profile Updated Failed!")';
        echo '</script>';
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userPage.css">
    <title>Edit Profile</title>
</head>

<body>
    <h1>Edit profile <?php echo $_SESSION['username'] ?></h1>
    <?php
        $username = $_SESSION['username'];
        echo '<script language="javascript">';
        echo "alert('$username')";
        echo '</script>';
        $res = mysqli_query($conn, "select * from users where userName = '$username'");
        while ($row = mysqli_fetch_assoc($res)) {
     ?>
            <img src="../<?php echo $row['file'] ?>" alt="" id="imgProfile">
    <?php } ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>