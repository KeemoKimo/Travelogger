var imgEye = document.getElementById("imgEyeContent")
var reg_imgEye = document.getElementById("reg_imgEyeContent")
var txtPass = document.getElementById("txtPassword")
var reg_txtPass = document.getElementById("reg_txtPassword")
var txtUsername = document.getElementById("txtUsername")
var reg_txtUsername = document.getElementById("reg_txtUsername")
var reg_txtEmail = document.getElementById("reg_txtEmail")
var btnSignIn = document.getElementById("btnSignIn")
var btnCreate = document.getElementById("btnCreate")
var lblReg = document.getElementById("lblRegisterNow")
var lblSignIn = document.getElementById("lblSignIn")
var loginForm = document.getElementsByClassName("loginForm")[0]
var regForm = document.getElementsByClassName("regForm")[0]
imgEye.onclick = function(){
    if(txtPass.type == "password"){
        imgEye.src = "file:///C:/xampp/htdocs/Travelogger/Images/EyeClose.png"
        txtPass.type = "text"
    }else{
        imgEye.src = "file:///C:/xampp/htdocs/Travelogger/Images/eye.png"
        txtPass.type = "password"
    }
}

reg_imgEye.onclick = function(){
    if(reg_txtPass.type == "password"){
        reg_imgEye.src = "file:///C:/xampp/htdocs/Travelogger/Images/EyeClose.png"
        reg_txtPass.type = "text"
    }else{
        reg_imgEye.src = "file:///C:/xampp/htdocs/Travelogger/Images/eye.png"
        reg_txtPass.type = "password"
    }
}

lblReg.onclick = function(){
    loginForm.style.display = "none"
    regForm.style.display = "block"
}

lblSignIn.onclick = function(){
    regForm.style.display = "none"
    loginForm.style.display = "block"
}

btnSignIn.onclick = function(){
    window.alert(txtUsername.value)
    window.alert(txtPass.value)
}

btnCreate.onclick = function(){
    window.alert(reg_txtUsername.value)
    window.alert(reg_txtEmail.value)
    window.alert(reg_txtPass.value)
}