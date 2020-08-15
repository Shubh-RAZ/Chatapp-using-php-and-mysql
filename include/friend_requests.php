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

    <title>Friend Requests</title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="carousel.css">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body>
        <?php
            $userss_id=$_SESSION['user_id'];
            $sel="select * from users where user_id='$userss_id'";
            $query=mysqli_query($conn,$sel);
            $fetch=mysqli_fetch_array($query);
            $user_name=$fetch['user_name'];

            $select="select * from $user_name";
            $qu=mysqli_query($conn,$select);


            while($row=mysqli_fetch_array($qu)){

                $name=$row['friend_requests'];
                $id=$row['friends_id'];
                echo"

                    <form>
                        <div class='det'>$name</div>
                        <button name='accept_$id' type='submit'>Accept</button>
                        <button name='reject_$id' type='submit'>Reject</button>
                    </form>
                    
                ";

            }

            while($row=mysqli_fetch_array($qu)){
                $idd=$row['friends_id'];
                $acpt="'accept_'.'$idd'";
                
                if(isset($_GET[$acpt])){
                    echo "$acpt";
                  
                    $s="update $user_name set status='ACCEPTED'  where friends_id='$idd'";
                    $q=mysqli_query($conn,$s) or die('updating failed');
                }
            }
            

            

        ?>
</body>
</html>

<?php } ?>