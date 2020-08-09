<?php
    
    include("include/connection.php");

    if(isset($_POST['sign_up'])){
        $name=htmlentities(mysqli_real_escape_string($con , $_POST['u_name']));
        $pass=htmlentities(mysqli_real_escape_string($con , $_POST['u_pass']));
        $email=htmlentities(mysqli_real_escape_string($con , $_POST['u_email']));
        $country=htmlentities(mysqli_real_escape_string($con , $_POST['u_country']));
        $gender=htmlentities(mysqli_real_escape_string($con , $_POST['u_gender']));
        $birthday=htmlentities(mysqli_real_escape_string($con, $_POST['u_birthday']));
        $status="unverified";
        $posts="no";
        $ver_code= mt_rand();

        if($name==""){
            echo"<script>alert('we cannot verify your name')</script>";
        }
        if(strlen($pass)<8){
            echo"<script>alert('password should be atleast 8 charecters long.')</script>";
            exit();
        }

        $check_email = "select * from users where user_email = '$email' ";
        $run_email = mysqli_query($con , $check_email);

        $check = mysqli_num_rows($run_email);

        if($check==1){
            echo "<script>alert('Email already exist please try again!')</script>";
            echo "<script>window.open('signup.php' , _self)</script>";
            exit();
        }

        $insert = "insert into users (user_name ,user_pass,user_email,user_country,user_gender,user_birthday,user_image,user_reg_date,user_status,ver_code,posts) values('$name','$pass','$email','$country','$gender','$birthday','image.jpg',NOW(),'$status','$ver_code','$posts')";

        $query = mysqli_query($con,$insert);

        if($query){
            echo "<script>alert('Congratulations $name your account has been created ,please check your name for verification')</script>";
            echo "<script>window.open('signIn.php' , '_self' )</script>";
        }

        else{
            echo "<script>('Registration failed, try again!')</script>";
            echo "<script>window.open('signup.php' , '_self' )</script>";
        }

    }
?>