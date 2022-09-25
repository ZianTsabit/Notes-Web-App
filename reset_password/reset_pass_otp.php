<!-- Konfirmasi apakah OTP benar -->
<?php

session_start();

// Sebelumnya sudah request OTP 
if(
    isset($_SESSION['ID']) 
    && isset($_SESSION["RPUserName"])
    && isset($_SESSION["OTP"])
) {

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/styles/style.css">
        <title> Notes Web App | Reset Password </title>
    </head>
    <body>
        <form class=form action="check_otp.php" method="post">
            <?php if (isset($_GET['error'])) { ?>
              <p class="error"> <?php echo $_GET['error']; ?></p>
            <?php } ?>

            <div class="container">
              <label for="uname"><b>OTP</b></label>
              <input type="number" placeholder="Enter OTP" name="OTP" required>
          
              <button class=button type="submit">Submit OTP</button>
            </div>
        </form> 
    </body>
    </html>

<?php

} else {
    header("Location: send_otp.php");
    exit();
}

?>
