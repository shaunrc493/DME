<?php

//print_r($_POST);

$inputName = $_POST['fullname'];
$inputEmail = $_POST['email'];
$inputPass = $_POST['password'];
$inputConfirm = $_POST['confirmpassword'];

if ($inputPass != $inputConfirm){
  header("location:register.php?error=password");
} else {


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

$hashedPassword = password_hash($inputPass, PASSWORD_ARGON2I);

$sql = "INSERT INTO users (user_name, user_email, user_password)
VALUES ('". $inputName ."','". $inputEmail ."','". $hashedPassword ."')";

if (mysqli_query($conn, $sql)) {

  session_start();

  $_SESSION['auth'] = "1";
  $_SESSION['email'] = $inputEmail;
  $_SESSION['name'] = $inputName;

  header("location:dashboard.php");

} else {

  header("location:register.php?error=mysqlerror");

}

mysqli_close($conn);
}
?>
