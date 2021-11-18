<?php

if (isset($_GET['error'])){
  if ($_GET['error'] == "mysqlerror"){
    echo "Some mysql error found";
  } elseif ($_GET['error'] == "password"){
    echo "passwords don't match";
  }
}

 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>IWT</title>
  </head>
  <body style="background-color:#ddd">

    <div class="container">
      <h1>Register</h1>

      <form action="registerProcess.php" method="POST">
        <div class="form-group">
          <label for="fullname">Full name</label>
          <input type="text" class="form-control" name="fullname" aria-describedby="fullname">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword2">Confirm Password</label>
          <input type="password" class="form-control" name="confirmpassword">
        </div>

        <button type="submit" class="btn btn-success">Register</button>
      </form>


    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>
