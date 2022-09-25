<!-- Mengambil email user -->

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
    <form class=form action="send_otp.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required>
      
          <button class=button type="submit">Reset Password</button>
        </div>
    </form> 
</body>
</html>
