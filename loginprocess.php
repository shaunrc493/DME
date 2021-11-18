<?php

//print_r($_POST);

$inEmail = $_POST['email'];
$inPass = $_POST['password'];

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

$sql = "SELECT * FROM users WHERE user_email = '" . $inEmail . "'  ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){

  while($row = mysqli_fetch_assoc($result)){
    //print_r($row);

    //if ($inPass === $row['user_password']){
    if (password_verify($inPass, $row['user_password'])){
      
      session_start();
      $_SESSION['id'] = $row['user_id'];
      $_SESSION['name'] = $row['user_name'];
      $_SESSION['email'] = $row['user_email'];
      $_SESSION['auth'] = $row['user_auth'];


      if ($row['user_auth'] == 1){
        header("location:dashboard.php");
      } elseif ($row['user_auth'] == 2){
        header("location:photographers.php");
      } elseif ($row['user_auth'] == 3){
        header("location:admin.php");
      } else {
        header("location:logout.php");
      }

    } else {
      header("location:login.php");
    }
  }

} else {
  echo "no results";
}

mysqli_close($conn);

 ?>
