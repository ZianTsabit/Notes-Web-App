<?php
    
    // DB Lokal Alif
    // mysql --user=note_web_app --password=Password123+ --database=notes_app_db

    $sname = "localhost";
    $uname = "root";
    $password = "";

    $db_name = "notes_app_db";

    $conn = mysqli_connect($sname, $uname, $password, $db_name);

    if(!$conn){
        echo "Connection Failed";
    }

?>
