<html lang="en">

<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="credential.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap?v=<?php echo time(); ?>" rel="stylesheet">
    <title>Log In</title>
</head>

<body>
    <div class="loginForm" style="display: block;">
        <form action="phpOperations\credentials\login.php" method="post">
            <h1 style="text-align: center; padding-top: 60px;">Sign In</h1>
            <div style="margin-top: 60px;">
                <input type="text" id="txtUsername" name="txtUsername" placeholder="Username...">
                <br>
                <div style="margin-top: 50px; width: 400px;display:flex;">
                    <div style="float: left; margin-left: 100px;">
                        <input type="password" id="txtPassword" name="txtPassword" placeholder="Password...">
                    </div>
                    <div style="padding-top: 9px;" id="imgEye">
                        <img src="eye.png" width="100%" height="100%" style="margin-left: 15px;" id="imgEyeContent">
                    </div>
                </div>
            </div>
            <div style="margin-top: 70px; text-align: center;">
                <button type="submit" id="btnSignIn">Sign In</button>
            </div>
            <div style="height: 1px; background-color: black; margin: 30px 50px 0px 50px;"></div>
            <div style="margin: 0 auto;width: 280px;">
                <p style="float: left;margin-top: 50px;">Don't have an account?</p>
                <p style="float: right; margin-top: 50px;color: blue;" id="lblRegisterNow">Register now</p>
            </div>
        </form>
    </div>
    <div class="regForm" style="display: none;">
        <form action="phpOperations\credentials\signUp.php" method="post">
            <h1 style="text-align: center; padding-top: 60px;">Create an Account</h1>
            <div style="margin-top: 60px;">
                <input type="text" id="reg_txtUsername" name="reg_txtUsername" placeholder="Create your username...">
                <br>
                <input type="text" id="reg_txtEmail" name="reg_txtEmail" placeholder="Enter your email...">
                <div style="margin-top: 24px; width: 400px;display:flex;">
                    <div style="float: left; margin-left: 100px;">
                        <input type="password" id="reg_txtPassword" name="reg_txtPassword"
                            placeholder="Choose Password...">
                    </div>
                    <div style="padding-top: 9px;" id="reg_imgEye">
                        <img src="eye.png" width="100%" height="100%" style="margin-left: 15px;" id="reg_imgEyeContent">
                    </div>
                </div>
            </div>
            <div style="margin-top: 50px; text-align: center;">
                <button type="submit" id="btnCreate">Create Account</button>
            </div>
            <p style="font-size: 13px; text-align: center;">*Succesful sign up will redirect back to Sign In page*</p>
            <div style="height: 1px; background-color: black; margin: 30px 50px 0px 50px;"></div>
            <div style="margin: 0 auto;width: 240px;">
                <p style="float: left;margin-top: 15px;">Already have an account?</p>
                <p style="float: right; margin-top: 15px;color: blue;" id="lblSignIn">Log In</p>
            </div>
        </form>
    </div>
    <script src="JS\login_page.js"></script>
</body>

</html>