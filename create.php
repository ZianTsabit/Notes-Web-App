<?php
sesion_start();
include "db_conn.php";

if (isset($_POST['title']) && isset($_POST['content'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $title = validate($_POST['title']);

    $content = validate($_POST['content']);

    if (empty($title) && empty($content)) {

        header("Location: create.php?error=title and content is empty");

        exit();

    }else{

        $sql = "INSERT INTO notes VALUES (NULL,'User', '$firstname', '$lastname', '$username','$emailaddress','$pass')";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['UserName'] === $username && $row['Password'] === $pass) {

                echo "Logged in!";

                $_SESSION['username'] = $row['UserName'];

                $_SESSION['name'] = $row['FirstName'];
                
                $_SESSION['role'] = $row['Role'];

                $_SESSION['id'] = $row['ID'];

                header("Location: home.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}