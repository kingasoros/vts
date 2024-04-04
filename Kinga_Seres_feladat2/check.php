<?php

session_start();
include "db_conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset ($_POST['uname']) && isset ($_POST['password'])){
    
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if(empty($uname)){
        header("Location:index.php?error=User Name is required.");
        exit();
    } else if(empty($pass)){
        header("Location:index.php?error=Password is required.");
        exit();
    } else {

        $sql="SELECT * FROM task2_users WHERE username = '$uname'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['password'])){
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                header("Location:index.php?success=Üdvözöljük név oldalunkon!<br> <a href=\"failures.php\">Show email failures</a>");
                exit();  
            } else {
                header("Location:index.php?error=Something wrong!");
                exit();
            }  
        } else {
            $uname_sql = mysqli_real_escape_string($conn, $uname);
            $pass_sql = mysqli_real_escape_string($conn, $pass); 

            $hashed_password = password_hash($pass_sql, PASSWORD_DEFAULT);

            $sql2 = "INSERT INTO task2_login_failure (username, password) VALUES ('$uname_sql', '$hashed_password')";

            if(mysqli_query($conn, $sql2)){
                $email="kingasoros@gmail.com";
                $subject="Error";
                $message="Újabb sikertelen bejelentkezés!";

                $mail = new PHPMailer(true);

                try {
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                    $mail->isSMTP();                                            
                    $mail->Host = 'mail.gt.stud.vts.su.ac.rs';                    
                    $mail->SMTPAuth = true;                                   
                    $mail->Username = 'gt';                     
                    $mail->Password = 'Z37CtWKv0E6M0XM';                               
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;                                    

                    $mail->setFrom('gt@gt.stud.vts.su.ac.rs', 'Mailer');
                    $mail->addAddress($email, 'User');  

                    $mail->isHTML(true);                                    
                    $mail->Subject = $subject;                      
                    $mail->Body = $message;                            

                    $mail->send();
                    header("Location:index.php?error=Invalid user!");
                    exit();
                } catch (Exception $e) {
                    header("Location:index.php?error=Something is wrong.");
                    exit();
                }
            } else {
                echo "Hiba történt az adatok beszúrásakor: " . mysqli_error($conn);
            }
        }
    }
} else {
    header("Location:index.php");
    exit();
}

