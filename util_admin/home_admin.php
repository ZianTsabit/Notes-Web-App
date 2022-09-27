<?php

session_start();

// Connect ke database
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/db_conn.php";
include_once($path);

// String comparison
function isStrSame($str1, $str2)
{
    return strcmp($str1, $str2) == 0;
}

if (
    isset($_SESSION['id'])
    && isset($_SESSION['username'])
    && isset($_SESSION['role'])
    && isStrSame($_SESSION['role'], "Admin")
) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/styles/style.css">
        <title>Notes Web App | Home</title>
    </head>

    <body>
        <!-- Sidebar -->
        <div class="sidebar">
            <a class="active" href="/home.php"> Home </a>
            <a href="profile.php"> Profile </a>
            <a href="#logout">Logout</a>
        </div>
        <!-- Page Content -->
        <div class="content">
            <h1>Hello, <?php echo $_SESSION['role']; ?> <?php echo $_SESSION['username']; ?> </h1>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Total Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $idx = 1;
                    // $query2 = "SELECT CONCAT(FirstName, ' ', LastName) as 'Full Name', UserName FROM users LIMIT 0, 10;";
                    $query =   "SELECT UserName, CONCAT(FirstName, ' ', LastName) as 'Full Name', COUNT(Notes_ID) as 'Total Notes' " 
                                . "FROM notes INNER JOIN users ON notes.User_ID = users.ID "
                                . "WHERE Role = 'User' "
                                . "GROUP BY User_ID "
                                . "LIMIT 10, 10;";
                    $result = mysqli_query($conn, $query);
                    while ($row =  $result->fetch_row()) {
                    ?>
                        <tr>
                            <td><?php echo $idx++; ?></td>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <div class="overlay" id="logout">
            <div class="wrapper">
                <h2>Are you sure want to log out ?</h2>
                <a class="button" href="">Cancel</a>
                <a class="logoutbutton" href="/logout.php">Log Out</a>
            </div>
        </div>
    </body>
    <html>

<?php

} else {

    header("Location: /home.php");
    exit();
}

?>