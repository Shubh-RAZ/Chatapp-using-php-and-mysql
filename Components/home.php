<!DOCTYPE html>
<html lang="en">
<head>
   
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/home.css">


     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
        
        <?php
            include("../include/connection.php");

            $users = "select * from users" ;

            $run_users = mysqli_query($con , $users);

            $user_id = $_GET['u_id'];

            $get_user = "select * from users where user_id='$user_id' ";

            $run_user = mysqli_query($con , $get_user);
            $row = mysqli_fetch_array($run_user);
            $receiver_name = $row['user_name'];

            
               echo "<div class='row container'>";

                    while($row = mysqli_fetch_array($run_users)){

                        $user_id = $row['user_id'];
                        $friend_name = $row['user_name'];
                        $user_image = $row['user_image'];
                        $last_login = $row['user_last_login'];
                        $login = $row['current_status'];

                        $sel_msg = "select * from users_chat where receiver_username ='$receiver_name' AND msg_status='unread'";
                        $run_msg = mysqli_query($con , $sel_msg);
                        $total = mysqli_num_rows($run_msg);


                     if($_GET['u_id']!=$user_id){

                            echo"  
                                <div class='col-sm-3 cont' >
                                    <div class='friends'>
                                        <div class='friends-image'>
                                            <img src='images/new.jpg'>
                                        </div>
                            ";

                                        echo " <div class='content'> ";

                                            echo " 
                                                <p><a href='my_messages.php?user_name=$friend_name'>$friend_name</a></p>
                                            ";

                                                if($total>0){
                                                    echo  " <p>$total new messsages</p>
                                                    ";
                                                }

                                                if($login == 'offline'){
                                                    echo " <p><small>$last_login</small></p>
                                                    ";
                                                }
                                                
                                                if($login == 'online' ){
                                                    echo" <i class='fa fa-circle-o on9' aria-hidden ='true'></i><span> Online</span>
                                                    ";
                                                }
                                                else{
                                                    echo "<span><i class='fa fa-circle off9' aria-hidden = 'true'>Offline</i></span>
                                                    ";
                                                }
                                        echo " </div>";
                                    
                                    echo" </div>";       
                                       
                                echo " </div>";
                        
            
                        }
               
                    }

                echo "</div>";
           
        ?>
    
</body>
</html>