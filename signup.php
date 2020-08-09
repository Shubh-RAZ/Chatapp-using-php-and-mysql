<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/sign_up.css">

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <title>Login to your account</title>


  </head>

  <body>

      <div class="row header">  
          <div class="left col-4">
              <p>Chat App</p>
          </div>

          <div class="right col-7 offset-1 ">
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
          <div class="col-6 content">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium rerum consequuntur nemo ut explicabo a dolores, molestiae aperiam omnis impedit, maxime cupiditate! Maxime et illum fugit earum cum velit expedita, sunt aliquam facere natus quaerat reiciendis debitis eligendi sit similique nulla dolores enim commodi officiis consequuntur delectus animi corrupti? Vel.</p>
          </div>
          <div class="col-6 signup-form">
            <div class="form">
                <form action="" method="post">
                  <div class="form-header">
                    <h2>Sign Up</h2>
                    <p>Login to ChatApp</p>
                  </div>


                  <div class="form-group username">
                    <label>Username </label>
                    <input type="text"  class="form-control" name="u_name" placeholder="Example : Jack" required> 
                  </div>

                  <div class="form-group password">
                    <label>Password</label>
                    <input type="password" class="form-control" name="u_pass" placeholder="Password" autocomplete="off" required>
                </div>
    

                  <div class="form-group email">
                    <label>Email</label>
                    <input type="email" class="form-control" name="u_email" placeholder="abc@ServiceProvide.com" autocomplete="off" required>
                </div>

                <div class="form-group country">
                    <label>Country</label>
                        <select class="form-control" name="u_country" required>
                            <option disabled="">Select a country</option>
                            <option>India</option>
                            <option>Pakistan</option>
                            <option>China</option>
                            <option>Nepal</option>
                            <option>Myanmar</option>
                            <option>Sri Lanka</option>
                        </select>
                    </div>

                <div class="form-group gender">
                    <label>Gender</label>
                    <select class="form-control" name="u_gender" required>
                        <option disabled="">Select your gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>others</option>
                    </select>
                </div>

                <div class="form-group" >
                <label class="bday"><input type="date" name="u_birthday" required></label>
                </div>

                
                <div class="form-group" >
                    <label class="checkbox-inline"><input type="checkbox" required>      I accept the <a href="#">Terms of use</a> &amp; <a>Privacy Policy</a></label>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="sign_up">Sign Up</button>
                </div>

                <?php
                    include("signup_user.php"); 
                  ?>

                </form>
            </div>

              <div class="text-center small">
                Already have an account ?<br/><a href="signIn.php">sign in</a>
              </div>
          </div>
        </div>
  </body>

</html>