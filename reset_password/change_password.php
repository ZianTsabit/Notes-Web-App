<?php

session_start();
// include "db_conn.php";
// Include Database
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/db_conn.php";
include_once($path);

if(
    isset($_SESSION['ID']) 
    && isset($_SESSION["RPUserName"])
    && isset($_SESSION["AllowChangePassword"])
) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    function isStrSame($str1, $str2){
        return strcmp($str1, $str2) == 0;
    }

    if (isStrSame($_POST["new_password"], $_POST["new_password_confirm"])){
        $new_password = validate($_POST["new_password"]);
        if (empty($new_password)){
            header("Location: change_pass_page.php?error=Invalid New Password");
            exit();
        } else {
            $user_id = $_SESSION["ID"];
            $query = "UPDATE users "
            . "SET Password = '$new_password' "
            . "WHERE ID = $user_id;";
            
            $result = mysqli_query($conn, $query);

            if ($result) { // Success
                session_unset();
                session_destroy();
                header("Location: /home.php");
                exit();
            } else {
                header("Location: change_pass_page.php?error=Update Error");
                exit();
            }

        }

    } else {
        header("Location: change_pass_page.php?error=New Password Mismatch");
        exit();
    }

} else {
    header("Location: change_pass_page.php");
    exit();
}

?>
