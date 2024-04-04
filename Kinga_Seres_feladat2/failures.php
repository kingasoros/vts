<?php
 
require "db_conn.php";
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>feladat2</title>
    <link rel="stylesheet" type="text/css" href="style.css">          
</head>
<body>
<div class="box">
    <?php

    $sql3 = "SELECT username, password, date_time FROM task2_login_failure ORDER BY date_time DESC";
    $result3 = $conn->query($sql3);
    if ($result3->num_rows > 0) {
        while($row = $result3->fetch_assoc()) {

            echo $row["username"]. "<br>";
            echo $row["password"] . "<br>";
            echo $row["date_time"] ."<br><br><br>";
            
        }
    }else{
        header("Location:index.php?error=Something happened");
        exit();
    }
    ?>
</div>
<a class="ca link" href="logout.php">Logout</a><br>
<a class="ca link" href="index.php">Back</a>

</body>
</html>