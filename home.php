<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['role'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/style.css">
        <title>Notes Web App | Home</title>
    </head>
    <body>
        <!-- Sidebar -->
        <div class="sidebar">
            <a class="active" href="home.php"> Home </a>
            <a href="profile.php"> Profile </a>
            <a href="#logout">Logout</a>
        </div>
        <!-- Page Content -->
        <div class="content">
            <h1>Hello, <?php echo $_SESSION['username']; ?> </h1>
            
            <div class="notecontent">
                <form class="noteform" action="create.php" method="post">
                    <div class="notecontainer">
                        <details>
                            
                            <summary>Add Note</summary>
                            <input type="text" placeholder="Title" name="title" required>
                            <input type="text" placeholder="Take a note ..." name="content" required>
                            <a class="createbutton" href="create.php">create</a>
                        </details>
                    </div>
                </form>
            </div>

        </div>

        <div class="overlay" id="logout">
            <div class="wrapper">
                <h2>Are you sure want to log out ?</h2>
                <a class="button" href="">Cancel</a>
                <a class="logoutbutton" href="logout.php">Log Out</a>
            </div>
        </div>

    </body>
    </html>

    <?php 
}else{
    header("Location: index.php");
    exit();
}
?>
