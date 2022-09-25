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
            <h1>Hello, <?php echo $_SESSION['role']; ?> <?php echo $_SESSION['username']; ?> </h1>
        
        <?php
            if ($_SESSION['role'] === 'User') {
            
                include "db_conn.php";
                $user_id = $_SESSION['id'];
                $sql = "SELECT * FROM notes WHERE User_ID=$user_id";
                $result = mysqli_query($conn, $sql);
        ?>
            <div>
            <div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result->num_rows > 0) {
                                $i = 0;
                                while($row = $result->fetch_assoc()) {
                                    $i++;
                                    $id = $row["Notes_ID"];
                                    $title = $row["Title"];
                                    $content = $row["Content"];
                                    echo "
                                        <tr>
                                            <th scope='row'>$i</th>
                                            <td>$title</td>
                                            <td>$content</td>
                                            <td>
                                                <a class='btn btn-secondary' href='notes_crud/read.php?id=$id'>Read</a> 
                                                <a class='btn btn-secondary' href='notes_crud/update.php?id=$id'>Edit</a> 
                                                <a class='btn btn-danger' href='notes_crud/delete.php?id=$id'>Delete</a>
                                            </td>
                                        </tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <a href="notes_crud/create.php">Add a new note</a>
            </div>
            </div>
            </div>
        <?php
            } else if ($_SESSION['role'] === 'Admin'){




            }
        ?>
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
