<?php
    session_start();

    include("../include/connection.php");
    

      
    $email=htmlentities(mysqli_real_escape_string($con , $_GET['u_email']));
    $update_status = mysqli_query($con , "UPDATE users SET current_status='offline'  WHERE user_email='$email'" );
    $update_status = mysqli_query($con , "UPDATE users SET user_last_login=NOW()  WHERE user_email='$email'" );

    session_destroy();

    echo "<script>window.open('signIn.php' , '_self')</script>";


   
?>