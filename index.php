<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Notes Web App | Login</title>
</head>
<body>
    <form class=form action="login.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
          <<p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?>

        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
      
          <button class=button type="submit">Login</button>
          <p>Don't have an account? <a href="registration.php">Register Now</a></p>
          <p>Forgot Password? <a href="reset_password/reset_pass_page.php">Reset Password</a></p>
        </div>
    </form> 
</body>
</html>
