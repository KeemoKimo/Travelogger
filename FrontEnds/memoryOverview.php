<?php
session_start();
include "../phpOperations/OPEN_CONN.php";
if (isset($_GET['id'])) {
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

    if (isset($_POST['submit'])) {

        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $folder = '../Images/' . $file_name;

        $query = mysqli_query($conn, "UPDATE tbltrips SET coverImg = '../Images/$file_name' WHERE tripID = '$tripID'");

        if (move_uploaded_file($temp_name, $folder)) {
            echo '<script language="javascript">';
            echo 'alert("Cover Image Updated successfully!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/mainPage.php"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Cover Image Updated Failed!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/mainPage.php"';
            echo '</script>';
        }
    }else if(isset($_POST['btnUpdateDesc'])){
        $newDesc = $_POST['txtNewDesc'];
        $query = mysqli_query($conn, "UPDATE tbltrips SET description = '$newDesc' WHERE tripID = '$tripID'");
        if($query){
            echo '<script language="javascript">';
            echo 'alert("Description Updated successfully!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/mainPage.php"';
            echo '</script>';
        }else {
            echo '<script language="javascript">';
            echo 'alert("Description Updated Failed!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/mainPage.php"';
            echo '</script>';
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="memoryOverview.css?v=<?php echo time(); ?>">
    <title>Trip View</title>
</head>

<body>

    <h1 id="lblLocation">your trip to <b><?php echo $location ?></b></h1>
    <div class="containerDate">
        <div class="containerDate_element">
            <h1><?php echo $dateStart ?></h1>
            <h1 style="margin-left:40px;margin-right: 40px">to</h1>
            <h1><?php echo $dateEnd ?></h1>
        </div>
    </div>

    <div style="margin-top: 50px;"></div>
    <div id="coverImgDiv">
        <img src="<?php echo $coverImg ?>" alt="" id="mainCoverImg">
    </div>
    <img src="../Images/editImage.png" alt="" id="editImage">
    <div style="margin-top: 60px;"></div>
    <div class="formDiv">
        <form method="POST" enctype="multipart/form-data">
            <label for="file-upload" id="custom-file-upload">
                Edit cover picture
            </label>
            <input id="file-upload" type="file" name="image" accept="image/*" />
            <br>
            <button type="submit" name="submit" id="btnSubmit">Submit</button>
        </form>
    </div>
    <div style="margin-top: 60px;"></div>
    <div id="descContainer">
        <p><?php echo $description ?></p>
        <div style="margin-top: 50px;"></div>
        <div class="editDescCont">
            <img src="../Images/editImage.png" alt="" width="40px" height="40px">
            <h2>Edit Description</h2>
        </div>
    </div>

    <div id="editPopUp">
        <div id="editPopUp_content">
            <h1 style="text-align : center;padding-top: 50px">Edit Description</h1>
            <form method="POST">
                <center>
                    <textarea name="txtNewDesc" id="txtNewDesc">
                    <?php echo $description ?>
                </textarea>
                    <div id="btnUpdate_container">
                        <button type="submit" id="btnUpdateDesc" name="btnUpdateDesc">Update</button>
                    </div>
                </center>
            </form>
        </div>
    </div>
</body>
<script>

    document.getElementById("file-upload").onchange = function () {
        const [file] = document.getElementById("file-upload").files
        document.getElementById("btnSubmit").style.display = "inline-block"
        document.getElementById("mainCoverImg").src = URL.createObjectURL(file)
    }

    document.getElementById("coverImgDiv").onmouseover = function () {
        document.getElementById("editImage").style.display = "block"
    }

    document.getElementById("coverImgDiv").onmouseleave = function () {
        document.getElementById("editImage").style.display = "none"
    }

    document.getElementById("coverImgDiv").onclick = function () {
        document.getElementById("custom-file-upload").style.display = "block"
    }

    document.getElementById("descContainer").onclick = function () {
        document.getElementById("editPopUp").style.display = "block"
    }

    window.onclick = function (event) {
        if (event.target == document.getElementById("editPopUp")) {
            document.getElementById("editPopUp").style.display = "none"
        }
    }
</script>

</html>