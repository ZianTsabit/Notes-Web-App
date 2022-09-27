<?php
    session_start();
    
    include("../db_conn.php");

    $id = $_GET["id"];

    $sql = "DELETE FROM notes WHERE Notes_ID=$id";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $result = mysqli_query($conn, $sql);
                
        if ($result) {

            echo "<div class='form'><h3>Your notes deleted successfully.</h3><br/><p class='link'><a href='../home.php'>OK</a></p></div>";
                    
        }else{
                    
            echo "<div class='form'><h3>You are failed to delete notes.</h3><br/><p class='link'><a href='../home.php'>OK</a></p></div>";
                    
        }

    } else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Notes Web App | Delete Notes</title>
</head>
<body>
<div>
        <div>
            <div>
                <div>
                    <h1>Are you sure you want to delete this note?</h5>
                        <div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=$id"; ?>" method="post">
                                <div>
                                    <button class="button" type="submit">Yes</button>
                                    <a class="logoutbutton" href="../home.php">No</a>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    }
?>