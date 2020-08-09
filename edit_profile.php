<?php
    session_start();
    include("include/connection.php");
    

        $user_id=htmlentities(mysqli_real_escape_string( $con , $_GET['u_id']));
        
        $get_user =  "select * from users where user_id='$user_id'";
        $run_user = mysqli_query( $con , $get_user);
        $row = mysqli_fetch_array($run_user);

        $user_name = $row['user_name'];
        $user_email = $row['user_email'];
        $user_gender = $row['user_gender'];
        $user_country = $row['user_country'];
        $user_bday = $row['user_birthday'];
        $user_pass = $row['user_pass'];

            
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit my Account</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">

</head>

<body>
        <form action="" method="post" enctype="multipart/form-data">

             <div class="form-group">
                <label>Profile pic</label>
                <input type="file"  class="form-control" name="u_image"  required> 
              </div>

              <div class="form-group">
                <label>Username</label>
                <input type="text"  class="form-control" name="u_name" value="<?php echo $user_name ?>" required> 
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="u_pass" value="<?php echo $user_pass ?>" autocomplete="off" required>
             </div>
 

              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="u_email" value="<?php echo $user_email ?>" autocomplete="off" required>
             </div>

             <div class="form-group " >
                <label>Country</label>
                    <select class="form-control" name="u_country" value="<?php echo $user_country ?>" required>
                        <option disabled="">Select a country</option>
                        <option>India</option>
                        <option>Pakistan</option>
                        <option>China</option>
                        <option>Nepal</option>
                        <option>Myanmar</option>
                        <option>Sri Lanka</option>
                    </select>
                 </div>

             <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="u_gender" value="<?php echo $user_gender ?>" required>
                    <option disabled="">Select your gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>others</option>
                </select>
            </div>

            <div class="form-group" >
                <label class="bday"><input type="date" name="u_birthday" value="<?php echo $user_bday ?>" required></label>
            </div>
            
            <div class="form-group">
                <button type="submit" name="update" class="btn btn-outline-warning">Update</button>
            </div>

            </form>

<?php

if(isset($_POST['update'])){
    $u_name = $_POST['u_name'];
    $u_email = $_POST['u_email'];
    $u_gender = $_POST['u_gender'];
    $u_country = $_POST['u_country'];
    $u_birthday = $_POST['u_birthday'];
    $u_pass = $_POST['u_pass'];
    $u_image = $FILES['u_image']['name'];
    $image_tmp = $FILES['u_image']['tmp_name'];

    move_uploaded_file($image_tmp , "users/u_image");

    $update = "update users set user_name='$u_name' ,user_pass='$u_pass',user_image = 'u_image',user_email='$u_email',user_country='$u_country',user_gender='$u_gender',user_birthday='$u_birthday' where user_id='$user_id' ";
    
    $run = mysqli_query($con , $update);

    if($run){
        echo "<script>alert('Your profile has been updated')</script>";
        echo "<script>window.open('setting.php' , '_self')</script>";
    }
}

?>

</body>

</html>