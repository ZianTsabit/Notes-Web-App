<?php

session_start();
// include "db_conn.php";
// Include Database
// $path = $_SERVER['DOCUMENT_ROOT'];
$path = "../db_conn.php";
include_once($path);

function validate($data){
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function GenerateOTP($digits){
      
    $num = "9623874501";
    $result = "";

    for ($i = 1; $i <= $digits; $i++) {
      $result .= substr($num, (rand() % (strlen($num))), 1);
    }

    return $result;
}

function SendOTPMail($email){
    $header = "From: Notes Web App <malifpy.sendmail@gmail.com>";
    $subject = "Reset Password Request";
    $_SESSION["OTP"] = GenerateOTP(6);
    $message = "Your OTP is %s";
    $message = sprintf($message, $_SESSION["OTP"]);

    mail($email, $subject, $message, $header);
}

// SendOTPMail("malifputrayasa@gmail.com");

// Check adanya username di POST request
if (isset($_POST['username'])){


    $username = validate($_POST['username']);

    if (empty($username)) {

        header("Location: reset_pass_page.php?error=User Name Invalid");
        exit();

    } else {
        
        $query = "SELECT * FROM users WHERE UserName='$username' ";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            $email = $row["EmailAddress"];

            $_SESSION["ID"] = $row["ID"]; // Reset Password User Name
            $_SESSION["RPUserName"] = $username; // Reset Password User Name
            SendOTPMail($email);

            header("Location: reset_pass_otp.php");
            exit();

        } else {
            header("Location: reset_pass_page.php?error=User do not exist");
            exit();
        }
    }
} else {
    header("Location: reset_pass_page.php");
    exit();
}

?>
