<?php
session_start();
if (isset($_SESSION['id'])) {
  header("Location: /Main/Schedulist");
}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/signUp.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container">

      <div class="row">

        <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <center><img class="signup" src="imgs/title2.png"></center>
            <div id="ui">

              <form class="form-group" id="register">
                <div class="row">
                  <div class="col-lg-4">
                    <label>First Name:</label>
                    <input type="text" id="fname" class="form-control" placeholder="Enter your first name">
                  </div>

                  <div class="col-lg-4">
                    <label>Last Name:</label>
                    <input type="text" id="lname" class="form-control" placeholder="Enter your last name">
                  </div>

                  <div class="col-lg-4">
                    <label>Username:</label>
                    <input type="text" id="uid" class="form-control" placeholder="Enter your username">
                  </div>
                </div><br>

                <label>E-mail</label>
                <input type="email" id="email" class="form-control" placeholder="Enter your email"><br>

                <div class="row">
                  <div class="col-lg-6">
                    <label>Password:</label>
                    <input type="password" id="pword" class="form-control" placeholder="Enter your password">
                  </div>

                  <div class="col-lg-6">
                    <label>Retype Password:</label>
                    <input type="password" id="repword" class="form-control" placeholder="Retype your password">
                  </div>
                </div>
                <br>
<!-- Error -->
<h4 id="error"></h4>
                <input type="submit" value="Sign Up" class="btn btn-primary">
                <a type="button" class="btn btn-secondary" href="logIn">Back</a>
              </form>

            </div><!--/ui-->
          </div><!--col-lg-6-->
        <div class="col-lg-3"></div>
      </div><!--/row-->
    </div><!--/container-->

    <!-- JS Scripts for ajax (jquery) -->
    <script src="logInJS/jquery-3.3.1.min.js"></script>
    <script src="js/signup.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  </body>
</html>
