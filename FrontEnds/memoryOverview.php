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
    } else if (isset($_POST['btnUpdateDesc'])) {
        $newDesc = $_POST['txtNewDesc'];
        $query = mysqli_query($conn, "UPDATE tbltrips SET description = '$newDesc' WHERE tripID = '$tripID'");
        if ($query) {
            echo '<script language="javascript">';
            echo 'alert("Description Updated successfully!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/mainPage.php"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Description Updated Failed!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/mainPage.php"';
            echo '</script>';
        }
    } else if (isset($_POST['btnUpdateDate'])) {
        $newStartDate = $_POST['dateStart'];
        $newEndDate = $_POST['dateEnd'];
        $query = mysqli_query($conn, "UPDATE tbltrips SET 
        dateStart = '$newStartDate', dateEnd = '$newEndDate' WHERE tripID = '$tripID'");
        if ($query) {
            echo '<script language="javascript">';
            echo 'alert("Travel Date Updated successfully!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/mainPage.php"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Travel Date Updated Failed!")';
            echo '</script>';
            echo '<script language="javascript">';
            echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/mainPage.php"';
            echo '</script>';
        }
    } else if (isset($_POST['btnAddImage'])) {
        $imageDesc = $_POST['txtDesc_newImg'];
        $file_name = $_FILES['newPic_file']['name'];
        $temp_name = $_FILES['newPic_file']['tmp_name'];
        $folder = '../uploads/' . $file_name;
        $imgDate = $_POST['pickDate'];

        $sqlCount = mysqli_query($conn, "SELECT * FROM tripimagesdesc WHERE tripID = '$tripID'");
        $sqlCount_num = mysqli_num_rows($sqlCount);

        if ($sqlCount_num <= 20) {
            $sql = "INSERT INTO `tripimagesdesc` ( `tripID`,  
            `imageName`, `imgDate`, `imgDesc`) VALUES ('$tripID',  
            'uploads/$file_name', '$imgDate', '$imageDesc')";
            $result = mysqli_query($conn, $sql);

            if (move_uploaded_file($temp_name, $folder)) {
                echo '<script language="javascript">';
                echo 'alert("Image Added Successfully!")';
                echo '</script>';
                echo '<script language="javascript">';
                echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/allMemories.php"';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("Image Added Failed!")';
                echo '</script>';
                echo '<script language="javascript">';
                echo 'document.location.href = "http://localhost/Travelogger/FrontEnds/allMemories.php"';
                echo '</script>';
            }
        } else {
            echo '<script language="javascript">';
            echo 'alert("You already have the max amount of image added!")';
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
            <img src="../Images/editImage.png" alt="" id="editDate">
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
        <div id="editDescCont">
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

    <center>
        <div id="editTravelDates">
            <div id="editTravelDates_content">
                <h1 style="text-align : center;padding-top: 50px;padding-bottom: 20px;">Edit Travel Dates</h1>
                <form method="POST">
                    <center>
                        <div id="editTravelDates_content_dates">
                            <h2>Start Date</h2>
                            <input type="date" name="dateStart" id="dateStart" value="<?php echo $dateStart ?>">
                            <h2 style="padding-top:20px;">End Date</h2>
                            <input type="date" name="dateEnd" id="dateEnd" value="<?php echo $dateEnd ?>">
                        </div>
                        <div id="btnUpdateDate_container">
                            <button type="submit" id="btnUpdateDate" name="btnUpdateDate">Update</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </center>

    <center>
        <div id="addNewImgForm">
            <div id="addNewImgForm_content">
                <form method="POST" id="addNewImgForm_content_frm" enctype="multipart/form-data">
                    <center>
                        <div id="toHideElement">
                            <img src="../Images/emptyImage.jpg" alt="" id="newImagePic">
                            <h2 style="font-weight: lighter">Date</h2>
                            <input type="date" alt="" id="pickDate" name="pickDate" required>
                            <br>
                            <input type="text" id="txtDesc_newImg" name="txtDesc_newImg"
                                placeholder="Enter a brief description" required>
                        </div>
                        <label for="newImg_upload" class="newPicFileUpload">
                            Select Image
                        </label>
                        <input type="file" name="newPic_file" id="newImg_upload" accept="image/*" />
                        <br>
                        <button type="submit" id="btnAddImage" name="btnAddImage">Submit</button>
                    </center>
                </form>
            </div>
        </div>
    </center>

    <div style="margin-top: 100px;"></div>
    <h1 id="lblImages">Memory <b>Images</b></h1>
    <div style="margin-top: 100px;"></div>

    <?php
    $sql = mysqli_query($conn, "select * from tripimagesdesc where tripID = '$tripID' order by imgDate desc");
    $num = mysqli_num_rows($sql);
    if ($num > 0) {
        while ($result = mysqli_fetch_array($sql)) {
            echo '<center>
                        <a href="editPostImage.php?id=' . $result["imgID"] . '" id="aFull">
                            <div class="insideContainer"> 
                                <div class="insideContainer_imgCont">   
                                    <img src="../' . $result['imageName'] . '" width="100%">
                                </div>   
                                <div class="insideContainer_details">   
                                    <h2 id="lblImages_Date"><b>' . $result['imgDate'] . '</b>
                                    </h2>
                                    <div class="insideContainer_details_containerP">   
                                        <p id="imageDescription">' . $result["imgDesc"] . '</p>
                                    </div> 
                                </div>   
                            </div>
                        </a>
                    </center> 
                    <div style="margin-top: 40px;"></div>
                    ';
            echo "</br>";
        }
    }
    ?>

    <div id="uploadImageEmptyDiv">
        <img src="../Images/uploadFile.png" alt="" id="imgUpload">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM tripimagesdesc WHERE tripID = '$tripID'");
        $rowCount = mysqli_num_rows($sql);
        ?>
        <h2 style="margin-top: 65px;">Add new Image (<?php echo 20 - $rowCount ?> left)</h2>
    </div>

</body>
<script>

    document.getElementById("newImg_upload").onchange = function () {
        document.getElementById("toHideElement").style.display = "block"
        document.getElementById("pickDate").style.display = "block"
        document.getElementById("txtDesc_newImg").style.display = "block"
        const [file] = document.getElementById("newImg_upload").files
        document.getElementById("btnAddImage").style.display = "inline-block"
        document.getElementById("newImagePic").src = URL.createObjectURL(file)
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

    document.getElementById("editDescCont").onclick = function () {
        document.getElementById("editPopUp").style.display = "block"
    }

    document.getElementById("editDate").onclick = function () {
        document.getElementById("editTravelDates").style.display = "block"
    }

    document.getElementById("uploadImageEmptyDiv").onclick = function () {
        document.getElementById("addNewImgForm").style.display = "block"
    }

    document.getElementById("file-upload").onchange = function () {
        const [file] = document.getElementById("file-upload").files
        document.getElementById("btnSubmit").style.display = "inline-block";
        document.getElementById("imgProfile").src = URL.createObjectURL(file)
    }

    window.onclick = function (event) {
        if (event.target == document.getElementById("editPopUp")) {
            document.getElementById("editPopUp").style.display = "none"
        }
        else if (event.target == document.getElementById("editTravelDates")) {
            document.getElementById("editTravelDates").style.display = "none"
        }
        else if (event.target == document.getElementById("addNewImgForm")) {
            document.getElementById("addNewImgForm").style.display = "none"
        }
    }
</script>

</html>