<?php

session_start();

if (!isset($_SESSION['auth'])){
  header("location:login.php");
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
  <body style="background-image:linear-gradient(rgb(255,255,255), rgb(150,150,150))">

    <div class="container">
      <h1>Welcome, <?php echo $_SESSION['name']; ?></h1>

      <a href="logout.php" class="btn btn-danger" role="button">Logout</a>
    </div>

    <div class="container">
      <div class="row">

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "iwtdata";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM photos WHERE 1";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){

      while ($row = mysqli_fetch_assoc($result)){

        $reference = $row['reference'];
        $name = $row['name'];
        $desc = $row['description'];

            echo "<div class='col col-sm col-sm-2'>";

        echo "<p><strong>" . $name . "</strong></p>";
        echo "<a class='btn btn-info btn-lg' href='editphoto.php?ref=".$reference."' role='button'>Edit Photo</a>";

            echo "</div><div class='col col-sm col-sm-5'>";

        echo "<img src='photos/".$reference."' width='100%'>";

            echo "</div><div class='col col-sm col-sm-5'>";

        echo "<p>" . $desc . "</p>";

            echo "</div>";
      }
    } else {
      echo "There is nothing in the database yet";
    }

     ?>

       </div>
     </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>
