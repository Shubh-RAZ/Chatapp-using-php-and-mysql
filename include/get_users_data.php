<?php
    include("include/connection.php");

    $users = "select * from users" ;

    $run_users = mysqli_query($con , $users);

?>

<?php
    while($row = mysqli_fetch_array($run_users)){

        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_image = $row['user_image'];
        $login = $row['current_status'];

        if($_GET['user_name']!=$user_name){



        echo
         "
            <li>
                    <div class='chat-left-img'>
                        <img src='$user_image'>
                    </div>

                    <div class='chat-left-details'>
                        <p><a href='my_messages.php?user_name=$user_name'>$user_name</a></p>";

                        if($login == 'online' ){
                            echo "<span><i class='fa fa-circle' aria-hidden ='true'>Online</i></span>";

                        }
                        else{
                        echo  "<span><i class='fa fa-circle' aria-hidden = 'true'>Offline</i></span>";
                    
                        }
                        "
                    </div>
            </li>
         ";

                }
            
            }       
    
?>