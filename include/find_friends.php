<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","","mychat") or die('connection failed');
    if(!isset($_SESSION['user_email'])){
        echo "<script>window.open('signIn.php' , '_self')</script>";
    }

else{ ?>
<!DOCTYPE html>
<html>
<head>

    <title>Messages</title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="carousel.css">
    <link rel="stylesheet" href="CSS/my_messages.css">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body>

        <?php 
            global $u_id;
            $u_id=$_GET['u_id'];
            echo"$u_id";
         ?>

        <div class="row">
            <div class="col-md-6 search-box">
                <form class="search-form" action="">
                    <input type="text" placeholder="Enter your friends name" name="search_querry">
                    <button class="btn" type="submit" name="search">search</button>
                    <input value="<?php echo $u_id ;?>" name="u_id" style="visibility:hidden"/>
                </form>
            </div>
        </div>

        <?php 
           
            global $conn;
    
            if(isset($_GET['search'])){
                $name=htmlentities($_GET['search_querry']);
                $sel="select * from users where user_name like '%$name%' ";
            
          
            $querry=mysqli_query($conn,$sel);
    
            while($row=mysqli_fetch_array($querry)){
    
                $user_name=$row['user_name'];
                $user_country=$row['user_country'];
                $user_gender=$row['user_gender'];
                $user_id=$row['user_id'];
                echo"
                    <div class='details'>
                        <div class='name'>$user_name</div>
                        <div class='country'>$user_country</div>
                        <div class='gender'>$user_gender</div>
                    </div>
    
                    <div class=buttons>
                        <form method='post'>
                            <button type='submit' name='add-as-friend'>Add as Friend</button>
                            <button type='submit' name='chat-head'>Message</button>
                        </form>
                    </div>
                ";
    
                if(isset($_POST['chat-head'])){
    
                    echo"
                        <script>window.open('my_messages.php?user_name=$user_name','_self')</script>
                    ";
    
                }
    
                if(isset($_POST['add-as-friend'])){
                    $us_id=$_GET['u_id'];
                    $select="select * from users where user_id='$us_id'";
                    $que=mysqli_query($conn,$select);
                    $fetch=mysqli_fetch_array($que);
                    $owner_user_name=$fetch['user_name'];
    
    
                    $insert="insert into $user_name (friends_id,friend_requests,status) values ('$us_id','$owner_user_name','NOT ACCEPTED')";
    
                    $ins=mysqli_query($conn,$insert) or die('friend request failed');
    
                }
            }
    
        }
    
        
        ?>
       
</body>
</html>

<?php } ?>