<?php

require "db_conn.php";

?>

<!DOCTYPE html>
<html>
<head>
     <title>feladat2</title>
     <link rel="stylesheet" type="text/css" href="style.css">          
</head>
<body>
    <form action="check.php" method="post">
        <h2>Login</h2>

        <?php if(isset($_GET['success'])){ ?>
             <p class="success"><?php echo $_GET['success'] ?></p>
        <?php } ?>

        <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error'] ?></p>
        <?php } ?>

        <label>User Name</label>
        <input type="text" name="uname" placeholder="User_name"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button><br>
        <a class="ca" href="logout.php">Logout</a>
    </form> 
</body>
</html>
