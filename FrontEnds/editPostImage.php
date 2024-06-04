<?php
    session_start();
    include("../phpOperations/OPEN_CONN.php");
    if(isset($_GET['id'])){
        $imgID = $_GET['id'];
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
    hello , this is imgID <?php echo $imgID ?>
</body>
</html>