<?php 
    session_start();
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


       
</body>
</html>

<?php } ?>