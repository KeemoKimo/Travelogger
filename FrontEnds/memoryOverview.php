<?php 
session_start();
if(isset($_GET['id'])){
    echo $_GET['id'];
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hello world <?php echo $_GET['id'] ?>
</body>
</html>