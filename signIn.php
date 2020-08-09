<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="image/clock.png">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/signin.css">
    <link rel="stylesheet" href="CSS/clock.css">

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <title>Login to your account</title>


  </head>

  <body>


        <div class="row header">  
          <div class="col-4 left">
              <p>Chat App</p>
          </div>

          <div class="col-7 offset-1 right">
            <div class="row right">
              <div class=" col-4  nav">
                <span data-content="home"></span>home
              </div>         
              
              <div class="col-4 nav">
                <span data-content="contact us"></span>contact us
              </div>         
               
              <div class="col-4 nav">
                <span data-content="help & support"></span>help & support
              </div> 
            </div>
          </div>
        </div>

        <div class="row middle">
          <div class="analog col-6">

            <div class="clock">
              <img src="clock.png" alt="#">
              <div class="hour">
                <div class="hr" id="hr"></div>
              </div>

              <div class="minute">
                <div class="min" id="min"></div>
              </div>

              <div class="second">
                <div class="sec" id="sec"></div>
              </div>
            </div>

            <script src="clock.js"></script>

            
          </div>

          <div class="signin-form col-6">
              <form action="" method="post">
                <div class="form-header">
                  <h2>Sign In</h2>
                  <p>Login to ChatApp</p>
                </div>

                <div class="form-group">
                  <div class="icon">
                    <i class="fa fa-user email" aria-hidden="true"></i>
                    <input type="email" class="form-control" name="email" placeholder="abc@ServiceProvide.com" autocomplete="off" required>
                  </div>
              </div>

              <div class="form-group">
                  <div class="icon">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    <input type="password" class="form-control" name="pass" placeholder="Password" autocomplete="off" required>
                  </div>
              </div>

              <div class="small">Forgot Password? <a href="forgot_pass.php">Click Here</a></div>
                
              <div class="form-group">
                  <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="sign_in">Sign In</button>
              </div>

              <?php include("signin_user.php"); ?> 

              </form>

              <div class="text-center small" style=" color :black">
                  Dont have an account <a href="signup.php">Create one</a>
              </div>
              
          </div>
        </div>
  </body>

</html>