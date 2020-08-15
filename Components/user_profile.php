
INFO:
<?php
 include("../include/connection.php");

 if(isset($_GET['u_id'])){

    $user_id =$_GET['u_id'];

    $select = "select * from users where user_id = '$user_id'" ;
    $run = mysqli_query($con , $select);
    $row= mysqli_fetch_array($run);

    $id = $row['user_id'];
    $image = $row['user_image'];
    $name = $row['user_name'];
    $country = $row['user_country'];
    $gender = $row['user_gender'];
    $status = $row['current_status'];
    $last_login = $row['user_last_login'];
    $register_date = $row['user_reg_date'];
    

    echo " 
        <div id='user_profile'>
            <img src='users/$image' width='150' height='150' /><br>
            <p><strong>Name : </strong> $name</p><br>
            <p><strong>Gender : </strong> $gender</p><br>
            <p><strong>Country : </strong> $country</p><br>
            <p><strong>Status : </strong> $status</p><br>
            <p><strong>Last login : </strong> $last_login</p><br>
            <p><strong>Member since : </strong> $register_date</p><br>
            <a href='messages.php?u_id=$id'><button class='btn btn-outline-info'>Send messages</button></a>
        </div>
    ";
 }

 else{
     echo "no info";
 }
?>