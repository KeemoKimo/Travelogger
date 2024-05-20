<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "travelogger";
$conn = mysqli_connect($servername, $username, $password, $database);
if (isset($_POST['submit'])) {

    $username = $_SESSION['username'];
    $file_name = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $folder = '../userPFP/' . $file_name;

    $query = mysqli_query($conn, "UPDATE users SET file = 'userPFP/$file_name' WHERE userName = '$username'");

    if (move_uploaded_file($temp_name, $folder)) {
        echo '<script language="javascript">';
        echo 'alert("User Profile Updated successfully!")';
        echo '</script>';
    } else {
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
    <h1 id="lblEdit">Edit profile</h1>
    <br><br><br>
    <?php
    $username = $_SESSION['username'];
    $res = mysqli_query($conn, "select * from users where userName = '$username'");
    while ($row = mysqli_fetch_assoc($res)) {
        ?>
        <img src="../<?php echo $row['file'] ?>" alt="" id="imgProfile">
    <?php } ?>
    <br><br><br><br>
    <div id="formDiv">
        <form method="POST" enctype="multipart/form-data">
            <label for="file-upload" class="custom-file-upload">
                Edit Profile Picture
            </label>
            <input id="file-upload" type="file" name="image" accept="image/*" />
            <br>
            <button type="submit" name="submit" id="btnSubmit">Submit</button>
        </form>
    </div>

    <div id="previewPopUp">
        <div id="previewContent">
            <?php
            $username = $_SESSION['username'];
            $res = mysqli_query($conn, "select * from users where userName = '$username'");
            while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <img src="../<?php echo $row['file'] ?>" alt="" id="divPreviewImg">
            <?php } ?>
        </div>
    </div>

    <script>
        document.getElementById("file-upload").onchange = function () {
            const [file] = document.getElementById("file-upload").files
            document.getElementById("btnSubmit").style.display = "inline-block";
            document.getElementById("imgProfile").src = URL.createObjectURL(file)
        }

        document.getElementById("imgProfile").onclick = function () {
            document.getElementById("previewPopUp").style.display = "block"
        }

        window.onclick = function (event) {
            if (event.target == document.getElementById("previewPopUp")) {
                document.getElementById("previewPopUp").style.display = "none"
            }
        }

    </script>
</body>

</html>