<?php

session_start();

function isStrSame($str1, $str2){
    return strcmp($str1, $str2) == 0;
}

if(
    isset($_SESSION['id']) 
    && isset($_SESSION["RPUserName"])
    && isset($_SESSION["OTP"])
    && isset($_POST["OTP"])
) {
    if (isStrSame($_SESSION["OTP"], $_POST["OTP"])){
        $_SESSION["AllowChangePassword"] = true;
        unset($_SESSION["OTP"]);
        header("Location: change_password.php");
        exit();
    } else {
        header("Location: reset_pass_otp.php?error=Incorrect OTP");
        exit();
    }

} else {
    header("Location: reset_pass_otp.php");
    exit();
}
?>
