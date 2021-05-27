<?php
session_start();
if (isset($_SESSION['id'])) {
  header("Location:/2nd_sprint/final_sprint/ScheduList(REVISED)");

}
?>
<!doctype html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/logIn.css">

    <!--ui SCRIPTS-->
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="logInCSS/owl.carousel.min.css">
    <link rel="stylesheet" href="logInCSS/bootstrap.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Log In Page</title>
  </head>
  <body>
    <div class="secondRow content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 order-md-2">
            <img class="pic" src="imgs/pic.png" alt="Image" class="img-fluid">
          </div>
          <div class="firstRow col-md-6 contents">
            <div class="row justify-content-center">
              <div class="formscon col-md-8">
                <div class="mb-4">
                  <center>
                    <img class="logo" src="imgs/logo2.png">
                    <img class="title" src="imgs/title.png">
                    <p class="mb-4 fst-italic">Where time is at the palm of your hand</p>
                    <h3><strong>Sign In</strong></h3>
                  </center>
                </div>

                <form id="signin">
                  <div class="form-group first">
                    <label class="forms" for="username">Username</label>
                    <input type="text" class="form-control" id="uid" required autofocus>
                  </div>
                  <div class="form-group last mb-4">
                    <label class="forms" for="password">Password</label>
                    <input type="password" class="form-control" id="pwd" required autofocus>
                  </div>
                  <!-- error  -->
                  <h4 id="error"></h4>

                  <!-- input instead of a (anchor tag) for ajax -->
                  <input type="submit" class="login btn btn-warning" value="Log In"></input>
                  <input type="button" class="sign btn btn-secondary" value="Sign Up" id="singuppage"></input>
                </form>
              </div><!--/formscon-->
            </div><!--/row justify-->
          </div><!--/firstRow col-md-->
        </div><!--/row-->
      </div><!--/container-->
    </div><!--/secondRow-->

    <!--animation JS-->
    <script src="logInJS/jquery-3.3.1.min.js"></script>
    <script src="logInJS/popper.min.js"></script>
    <script src="logInJS/bootstrap.min.js"></script>
    <script src="logInJS/main.js"></script>

    <!-- JS Scripts for ajax (jquery) -->
    <script src="js/signin.js"></script>


    <!--BOOTSTRAP SCRIPTS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  </body>
</html>
