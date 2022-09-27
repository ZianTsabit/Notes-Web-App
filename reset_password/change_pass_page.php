<!-- Ganti Password -->
<?php

session_start();

// Sebelumnya sudah request OTP 
if(
    isset($_SESSION['ID']) 
    && isset($_SESSION["RPUserName"])
    && isset($_SESSION["AllowChangePassword"])
) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title> Notes Web App | Reset Password </title>
</head>
<body>
    <form class=form action="change_password.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <div class="container">
          <label for="uname"><b>New Password</b></label>
          <input type="password" placeholder="Enter New Password" name="new_password" required>

          <label for="uname"><b>Confirm New Password</b></label>
          <input type="password" placeholder="Enter New Password Again" name="new_password_confirm" required>
      
          <button class=button type="submit">Reset Password</button>
        </div>
    </form> 
</body>
</html>

<?php

} else {
    header("Location: check_otp.php");
    exit();

}

?>
