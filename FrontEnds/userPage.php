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
} else if (isset($_POST['btnUpdate'])) {
    $newUsername = $_POST['txtChangeName'];
    $username = $_SESSION['username'];
    $sql = "Select * from users where userName='$newUsername'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        $newSQL = mysqli_query($conn, "UPDATE users SET userName = '$newUsername' WHERE userName = '$username'");
        if ($newSQL) {
            echo '<script language="javascript">';
            echo 'alert("Username changed successfully! Please Login again!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/credential.php"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updating Failed! Please try again later!")';
            echo '</script>';
        }
    } else {
        echo '<script language="javascript">';
        echo 'alert("Username already taken! Please select a new one!")';
        echo '</script>';
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="userPage.css">
    <title>Edit Profile</title>
</head>

<body>
    <style>
        #editNameWrapper {
            text-align: center;
        }

        #editNameDiv {
            display: inline-block;
        }

        #imgEdit {
            cursor: pointer;
        }

        #editPopUp {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(20, 18, 18, 0.4);
            /* Black w/ opacity */
        }

        #editPopUp_content {
            width: 500px;
            height: 600px;
            background-color: white;
            margin-left: 37%;
            margin-top: 8%;
        }

        #txtChangeName {
            width: 250px;
            height: 40px;
            border-radius: 5px;
            margin: 30px 0px 0px 125px;
            padding-left: 15px;
        }

        #btnUpdate {
            width: 150px;
            padding: 10px;
            background-color: green;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            display: none;
        }

        #btnUpdate:hover {
            transition: 1s;
            opacity: 90%;
        }

        #btnUpdate_container {
            text-align: center;
        }
    </style>
    <h1 id="lblEdit">Edit profile</h1>
    <br><br><br>
    <?php
    $username = $_SESSION['username'];
    $res = mysqli_query($conn, "select * from users where userName = '$username'");
    while ($row = mysqli_fetch_assoc($res)) {
        ?>
        <img src="../<?php echo $row['file'] ?>" alt="" id="imgProfile">
    <?php } ?>
    <div id="editNameWrapper">
        <div id="editNameDiv">
            <h2 id="lblUsername" style="text-align : center;margin-top: 50px;float:left;">Username :
                <?php echo $_SESSION['username'] ?>
            </h2>
            <img src="../Images/editName.png" alt="" id="imgEdit" width="40px" height="40px"
                style="float=right;margin-left: 20px;margin-top: 46px;">
        </div>
    </div>
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

    <div id="editPopUp">
        <div id="editPopUp_content">
            <h1 style="text-align : center;padding-top: 80px">Update username</h1>
            <h3 style="text-align : center;padding-top: 80px">CURRENT NAME : <?php echo $_SESSION['username']; ?></h3>
            <form method="POST">
                <input type="text" id="txtChangeName" name="txtChangeName" placeholder="Enter new name...">
                <br><br><br>
                <div id="btnUpdate_container">
                    <button type="submit" id="btnUpdate" name="btnUpdate">Update</button>
                </div>
            </form>
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

        document.getElementById("imgEdit").onclick = function () {
            document.getElementById("editPopUp").style.display = "block";
        }

        document.getElementById("txtChangeName").onkeypress = function () {
            document.getElementById("btnUpdate").style.display = "inline-block"
        }

        window.onclick = function (event) {
            if (event.target == document.getElementById("editPopUp")) {
                document.getElementById("editPopUp").style.display = "none"
            }
            else if (event.target == document.getElementById("previewPopUp")) {
                document.getElementById("previewPopUp").style.display = "none"
            }
        }

    </script>
</body>

</html>