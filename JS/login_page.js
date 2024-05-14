var imgEye = document.getElementById("imgEyeContent")
var txtPass = document.getElementById("txtPassword")
imgEye.onclick = function(){
    if(txtPass.type == "password"){
        imgEye.src = "file:///C:/xampp/htdocs/Travelogger/Images/EyeClose.png"
        txtPass.type = "text"
    }else{
        imgEye.src = "file:///C:/xampp/htdocs/Travelogger/Images/eye.png"
        txtPass.type = "password"
    }
}