<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Notes Web App | Registration</title>
</head>
<body>
<?php
        session_start();

        include "db_conn.php";

        if (isset($_POST['emailaddress']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password'])){

            function validate($data){

            $data = trim($data);

            $data = stripslashes($data);

            $data = htmlspecialchars($data);

            return $data;

            }

            $emailaddress = validate($_POST['emailaddress']);

            $firstname = validate($_POST['firstname']);

            $lastname = validate($_POST['lastname']);

            $username = validate($_POST['username']);

            $pass = validate($_POST['password']);

            if (empty($emailaddress)) {

                header("Location: index.php?error=Email Address is required");

                exit();

            }else if(empty($firstname)){

                header("Location: index.php?error=First Name is required");

                exit();

            }else if(empty($lastname)){

                header("Location: index.php?error=Last Name is required");

                exit();
            
            }else if (empty($username)) {

                header("Location: index.php?error=User Name is required");

                exit();

            }else if(empty($pass)){

                header("Location: index.php?error=Password is required");

                exit();

            }else{

                $sql = "INSERT INTO users VALUES (NULL,'User', '$firstname', '$lastname', '$username','$emailaddress','$pass')";

                $result = mysqli_query($conn, $sql);

                if ($result) {

                    echo "<div class='form'><h3>You are registered successfully.</h3><br/><p class='link'>Click here to <a href='login.php'>Login</a></p></div>";
                    
                
                }else{
                    
                    echo "<div class='form'><h3>You are register failed.</h3><br/><p class='link'>Click here to <a href='registration.php'>registration</a> again.</p></div>";
                    
                }

            }

        }else{ ?>

            <form class=form action="" method="post">   
                    <div class="container">
                    <label ><b>Email</b></label>
                    <input type="text" placeholder="Enter Email Address" name="emailaddress" required>  
            
                    <label ><b>Firstname</b></label>
                    <input type="text" placeholder="Enter First Name" name="firstname" required>
      
                    <label ><b>Lastname</b></label>
                    <input type="text" placeholder="Enter Last Name" name="lastname" required>

                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter User Name" name="username" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>
      
                    <input type="submit" name="submit" value="Register">
                    <p>Already have an account?<a href="index.php">Login here</a></p>
                </div>
        </form> 
<?php
        } 
?>
    
</body>
</html>