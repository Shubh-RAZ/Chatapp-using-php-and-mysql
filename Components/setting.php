<?php
    session_start();
    include("../include/connection.php");
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>setting</title>

         <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    </head>

    <body>
    <div class="user_timeline">
            <div id="user_details">

                    <?php

                    $user = $_GET['u_id'];
                    $get_user = "select * from users where user_id='$user'";
                    $run_user = mysqli_query($con , $get_user);
                    $row = mysqli_fetch_array($run_user);

                    $user_id = $row['user_id'];
                    $user_email = $row['user_email'];
                    $user_status= $row['current_status'];
                    $user_name = $row['user_name'];
                    $user_country = $row['user_country'];
                    $user_gender = $row['user_gender'];
                    $user_image = $row['user_image'];
                    $user_reg_date = $row['user_reg_date'];
                    $user_last_login = $row['user_last_login'];

                    $user_posts = "select * from posts where user_id = '$user_id'";
                    $run_posts = mysqli_query($con , $user_posts);
                    $posts = mysqli_num_rows($run_posts);
                    
                    echo "
                            <center>
                            <img src='users/$user_image' width='200' height='200'/>
                            <div id='user_mention'>
                                <p>NAME : $user_name</p>
                                <p>$user_status</p>
                                <p>COUNTRY : $user_country</p>
                                <p>LAST LOGIN : $user_last_login</p>
                                <p>MEMBER SINCE : $user_reg_date</p>
                                <p><a href='my_post.php?u_id=$user_id'>My Post($posts)</a></p>
                                <p><a href='edit_profile.php?u_id=$user_id'>Edit My Account</a></p>
                                <form action='' method='post'>
                                <p><button type='submit' class='btn btn-outline-info' name='logout_btn'><a href='logout.php?u_email=$user_email'>Logout</a></button></p>
                                </form>
                            </div>
                        ";
                    ?>
                    
                </div>
            </div>
        
    </body>
</html>