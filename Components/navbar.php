<?php
    session_start();
    include("../include/connection.php");
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HOME</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">

</head>

<body>
                <?php

                    $user = $_SESSION['user_email'];
                    $get_user = "select * from users where user_email='$user'";
                    $run_user = mysqli_query($con , $get_user);
                    $row = mysqli_fetch_array($run_user);

                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $_SESSION['user_id']=$user_id;


                    $sel_msg = "select * from users_chat where receiver_username ='$user_name' AND msg_status='unread'";
                    $run_msg = mysqli_query($con , $sel_msg);
                    $count_msg = mysqli_num_rows($run_msg);




                    $user_posts = "select * from posts where user_id = '$user_id'";
                    $run_posts = mysqli_query($con , $user_posts);
                    $posts = mysqli_num_rows($run_posts);

              

                        echo "
                        
                            <div class='header'>
                           
                            <ul id='menu-bar'>
                                <p class='topic_display col-sm-3 offset-sm-1'><a href='add-post.php?u_id=$user_id'>Add post</a></p>
                                <p class='topic_display col-sm-3 offset-sm-1'><a href='feed.php?u_id=$user_id'>Feed</a></p>
                                <p class='topic_display col-sm-3 offset-sm-1'><a href='home.php?u_id=$user_id'>Messeges($count_msg)</a></p>
                                <p class='topic_display col-sm-3 offset-sm-1'><a href='my_post.php?u_id=$user_id'>My Post($posts)</a></p>
                                <p class='topic_display col-sm-3 offset-sm-1'><a href='../include/find_friends.php?u_id=$user_id'>Discover</a></p>
                                <p class='topic_display col-sm-3 offset-sm-1'><a href='setting.php?u_id=$user_id'>Setting</a></p>
                                <p class='topic_display col-sm-3 offset-sm-1' name='link'><a href='../include/friend_requests.php?usr_id=$user_id'>Friend Request</a></p>
                                
                            </ul>
                        </div>
                        "
                    ?>
</body>

</html>