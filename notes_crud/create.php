<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Notes Web App | Add New Notes</title>
</head>
<body>
<?php
        session_start();

        include "../db_conn.php";

        if (isset($_POST['title']) && isset($_POST['content'])){

            function validate($data){

            $data = trim($data);

            $data = stripslashes($data);

            $data = htmlspecialchars($data);

            return $data;

            }

            $title = validate($_POST['title']);

            $content = validate($_POST['content']);

            $user_id = $_SESSION['id'];
            
            $t = time();

            $published_at = date('Y-m-d H:i:s',$t);

            if (empty($title) && empty($content)) {

                header("Location: create.php?error=Title or Content is required");

                exit();

            }else{

                $sql = "INSERT INTO notes VALUES ($user_id, NULL, '$published_at', '$title', '$content')";

                $result = mysqli_query($conn, $sql);
                
                if ($result) {

                    echo "<div class='form'><h3>Your notes added successfully.</h3><br/><p class='link'><a href='../home.php'>OK</a></p></div>";
                    
                }else{
                    
                    echo "<div class='form'><h3>You are failed to add notes.</h3><br/><p class='link'><a href='../home.php'>OK</a></p></div>";
                    
                }

            }

        }else{ ?>
            <form class=form action="" method="post">   
                    <div class="container">
                    <label ><b>Title</b></label>
                    <input type="text" placeholder="Enter notes title" name="title" required>  
            
                    <label ><b>Content</b></label></br>
                    <textarea class="form-control" name="content" placeholder="Take a notes" rows="3" required></textarea>
      
                    <button class=button type="submit">Add Notes</button>
                </div>
        </form> 
<?php
        } 
?>
    
</body>
</html>