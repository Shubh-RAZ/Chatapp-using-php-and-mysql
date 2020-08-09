<?php 
    session_start();
    include("include/connection.php");

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

    <div class=" row cont ">

        <div class="left ">
            jjgufu
        </div>

        <div class="col-md-6 offset-md-3 col-sm-12 col-12 chatbox" id="scroll">
            <div class="row">
                <div class="col-xs-12 right-header">
                        <!-- my info -->

                        <?php
                            $user = $_SESSION['user_email'];
                            
                            $get_user = "select * from users where user_email='$user' ";
                            $run_user = mysqli_query($con , $get_user);
                            $row = mysqli_fetch_array($run_user);

                            $user_id = $row['user_id'];
                            $user_name = $row['user_name'];
                        ?>

                        <!-- others info -->

                        <?php 

                            if(isset($_GET['user_name'])){

                                global $con;
                                
                                $get_username = $_GET['user_name'];
                                $get_user = "select * from users where user_name = '$get_username' " ;
                                $run_user = mysqli_query($con , $get_user);
                                $row_user = mysqli_fetch_array($run_user);

                                $username = $row_user['user_name'];
                                $user_image = $row_user['user_image'];

                            }  

                        ?>
                            <div class="right-header-img">
                                <img src="<?php echo '$user_image' ; ?> "/>
                            </div>
                            <div class="right-header-detail">
                                <form method="post">
                                    <p><?php echo " &nbsp &nbsp $username" ; ?></p>                                    
                                </form>
                            </div>
                </div>
            </div>

            <div class="row chatarea">
                <div id="scrolling-to-bottom" class="col-12 right-header-contentChat">
                    <?php 
                        $update_msg = mysqli_query($con , "UPDATE users_chat SET msg_status='read' WHERE sender_username='$username' AND receiver_username = '$user_name'");

                        $sel_msg = "select * from users_chat where (sender_username='$user_name' AND receiver_username = '$username') OR(receiver_username= '$user_name' AND sender_username = '$username') ORDER by 1 ASC" ;
                        $query = mysqli_query($con , $sel_msg);
                        while($row=mysqli_fetch_array($query)){
                                            
                        $sender_username = $row['sender_username'];
                        $receiver_username = $row['receiver_username'];
                        $msg_content = $row['msg_content'];
                        $msg_date = $row['msg_date'];
                        $msg_id = $row['msg_id'];
                                        

                    ?>

                    <div class='chat'>
                        <?php 

                            if($user_name == $sender_username AND $username== $receiver_username){ 
                                echo "
                                    <div class=' chathead senders-chat-section'>
                                        <div class='rightside-right-chat'>
                                            <div class='datemsg'>
                                                <div class='time msgdate'>$msg_date</div>
                                                <div class='content msgdate'><span>$msg_content</span></div>
                                            </div> 
                                            <div class='deleted'>                                                          
                                                <form method='post'>
                                                    <input value='$msg_id' name='delete' />
                                                    <button name='del' type='submit'><i class='fa fa-trash-o del' aria-hidden='true' ></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                ";
                            }

                            
                                                   
                                                   

                            if($user_name == $receiver_username AND $username== $sender_username){
                                echo "
                                    <div class='chathead receivers-chat-section'>
                                        <div class='rightside-left-chat'>
                                            <div class='recdatemsg'>
                                                <div class='time msgdate'>$msg_date</div>
                                                <div class='reccont msgdate'><span>$msg_content</span></div>
                                            </div>
                                            <input value='$msg_id' name='delete' style = 'visibility:hidden'/>
                                        </div>
                                    </div>
                                ";
                            }                              
                                            
                        ?>
                    </div>
                        <?php 
                        } 
                        ?>
                                
                </div>
            </div>

            <div class="inputfield">
                <div class="right-chat-textbox">
                    <form method="post">
                        <input type="text" name="msg_content" placeholder="Type your message..." autocomplete="off">
                        <button class="btn" name="sub"><i class="fa fa-mars-stroke-h submit" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>

            <?php 
                if(isset($_POST['submit'])){

                $msg = htmlentities($_POST['msg_content']);


                if(strlen($msg)==0){
                    echo "
                        <div class='test'>
                            <strong>Type something</center></strong>
                        </div>
                        ";
                }

                else if(strlen($msg)>150){
                    echo "
                        <div class='test'>
                            <strong><center>Message too long use max 100 characters</center></strong>
                        </div>
                    ";
                }

                else{
                    $insert = "insert into users_chat(sender_username, receiver_username , msg_content , msg_status , msg_date) values('$user_name' ,'$username' , '$msg' ,'unread' , NOW())";

                    $run = mysqli_query($con , $insert);

                    echo "<script>window.open('my_messages.php?user_name=$username' , '_self')</script>";
                }
            }


            if(isset($_POST['del'])){
                $get_id = $_POST['delete'];
                $delete = "DELETE FROM users_chat WHERE msg_id = '$get_id' ";
                $res = mysqli_query($con , $delete) or die("Try again");
                echo "<script>window.open('my_messages.php?user_name=$username' , '_self')</script>";
            }
            ?>


                
        </div>

        
        <!-- <script>
            $('#scrolling-to-bottom').animate({
                scrollTop:$('#scrolling-to-bottom').get(0).scrollHeight},1000);
        </script> -->

        <script src="scrl1.js"></script>
        <script src="scrl2.js"></script>

        <!--<script type="text/javascript">
            $(document).ready(function(){
                var height =$(window).height();
                $('.right-header-contentChat').css('height',(height- 77) + 'px');
            })
        </script> --->

        <div class="right ">
            hchgvjhv
            
        </div>

    </div>

       
</body>
</html>

<?php } ?>