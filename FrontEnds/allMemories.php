<?php

session_start();
include ("../phpOperations/OPEN_CONN.php");
// $userEmail = $_SESSION['userEmail'];
// $sql = mysqli_query($conn, "select * from tbltrips where user = '$userEmail'");
// $rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);
// foreach ($rows as $data) {
//     print_r($data['coverImg']);
// }

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hello <?php echo $_SESSION['userEmail'] ?></h1>
    <?php
    $userEmail = $_SESSION['userEmail'];
    $sql = mysqli_query($conn, "select * from tbltrips where user = '$userEmail'");
    $rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    foreach ($rows as $data) {
        ?>
        <img src="<?php echo $data['coverImg'] ?>" alt="" id="divPreviewImg">
    <?php } ?>
</body>

</html>