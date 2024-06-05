<?php
session_start();
include ("../phpOperations/OPEN_CONN.php");
if (isset($_GET['id'])) {
    $imgID = $_GET['id'];
    $sqlGetImage = mysqli_query($conn, "SELECT imageName FROM tripimagesdesc WHERE imgID = '$imgID'");
    $sqlGetDesc = mysqli_query($conn, "SELECT imgDesc FROM tripimagesdesc WHERE imgID = '$imgID'");
    $sqlGetDate = mysqli_query($conn, "SELECT imgDate FROM tripimagesdesc WHERE imgID = '$imgID'");
    $imagePath = "../" . mysqli_fetch_array($sqlGetImage)[0];
    $description = mysqli_fetch_array($sqlGetDesc)[0];
    $date = mysqli_fetch_array($sqlGetDate)[0];

    if (isset($_POST['btnUpdate'])) {
        $newDesc = $_POST['txtDesc'];
        $query = mysqli_query($conn, "UPDATE tripimagesdesc SET 
        imgDesc = '$newDesc' WHERE imgID = '$imgID'");
        if ($query) {
            echo '<script language="javascript">';
            echo 'alert("Description Updated Successfully!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/allMemories.php"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Description Updated Failed!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/allMemories.php"';
            echo '</script>';
        }
    } else if (isset($_POST['btnChange'])) {
        $newDate = $_POST['imgDate'];
        $query = mysqli_query($conn, "UPDATE tripimagesdesc SET 
        imgDate = '$newDate' WHERE imgID = '$imgID'");
        if ($query) {
            echo '<script language="javascript">';
            echo 'alert("Date Updated Successfully!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/allMemories.php"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Date Updated Failed!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/allMemories.php"';
            echo '</script>';
        }
    } else if (isset($_POST['btnDelete'])) {
        $query = mysqli_query($conn, "DELETE from tripimagesdesc WHERE imgID = '$imgID'");
        if ($query) {
            echo '<script language="javascript">';
            echo 'alert("Image Deleted Successfully!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/allMemories.php"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Image Deleted Failed!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/allMemories.php"';
            echo '</script>';
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editPostImage.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <center>
        <img src="<?php echo $imagePath ?>" alt="" id="imgDisplay">
        <form method="POST" enctype="multipart/form-data">
            <div id="container_editDesc">
                <input type="text" id="txtDesc" name="txtDesc" value="<?php echo $description ?>">
                <button type="submit" id="btnUpdate" name="btnUpdate">Update</button>
            </div>
            <div id="container_editDate">
                <input type="date" id="imgDate" name="imgDate" value="<?php echo $date ?>">
                <button type="submit" id="btnChange" name="btnChange">Change</button>
            </div>
            <button type="submit" id="btnDelete" name="btnDelete">Delete Photo</button>
        </form>
    </center>
    <div id="lblHightlight_container">
        <h2 id="lblViewMoreMemories"><b>
                < </b> view all your memories</h2>
        <h2 id="lblMainPage">Home Page<b> > </b></h2>
    </div>
    <script>
        document.getElementById("lblMainPage").onclick = function () {
            document.location.href = 'http://localhost/Travelogger/FrontEnds/mainPage.php'
        }

        document.getElementById("lblViewMoreMemories").onclick = function () {
            document.location.href = 'http://localhost/Travelogger/FrontEnds/allMemories.php'
        }
    </script>
</body>

</html>