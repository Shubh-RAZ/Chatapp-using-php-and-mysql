<?php
 include("include/connection.php");

 $select = "select * from users";
 $users = mysqli_query($con , $select);
 while($row=mysqli_fetch_array($users)){

   

     $user_id=$row['user_id'];
     $user_name=$row['user_name'];
     $user_image=$row['user_image'];


     if($_GET['u_id']!=$user_id){

     echo "
        <div>
            <a href='user_profile.php?u_id=$user_id'>
            <img src='users/$user_image' width='100' height='100' /> 
            </a>
            <h4>$user_name</h4>
        </div>

     ";
     }
 }
?>