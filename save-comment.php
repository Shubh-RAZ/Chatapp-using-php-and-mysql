



	<?php

include "include/connection.php";
session_start();
$p_id = $_POST['p-id'];
$u_id = $_POST['u-id'];
$type = $_POST['t'];

if(isset($_POST['add-com-btn'])){
    $comment = $_POST['comment'];

    $sql1 = "insert into comments (user_id , post_id , comment,comment_date) values ('$u_id' , '$p_id' , '$comment' , NOW())";
    $result1 = mysqli_query($con , $sql1) or die("1 failed");
    if($result1){
        echo "<script>alert('comment added')</script>";
    }
    else{
        echo "try later!";
    }
}

echo "<script>window.open('feed.php?u_id=$u_id' , '_self' )</script>";
?>
