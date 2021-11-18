<?php

/*print_r($_POST);
print_r($_FILES);*/


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iwtdata";

$photoRef = uniqid(rand(), false);
$photoName = $_POST['imageName'];
$photoDesc = $_POST['imageDesc'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO photos (reference, name, description) VALUES ('".$photoRef."','".$photoName."','".$photoDesc."')";

if (mysqli_query($conn, $sql)){
  //new record
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


$allowed = array("jpg", "jpeg", "png");
$temp = explode(".", $_FILES['newImage']['name']);
$extension = end($temp);

if (in_array($extension, $allowed)){

  if ($_FILES['newImage']['error'] > 0){

    $this->errors[] = "Return code: " . $_FILES['newImage']['error'] . "<br>";

  } else {

    move_uploaded_file($_FILES['newImage']['tmp_name'], "photos/".$photoRef);

  }

} else {
  echo "Failed to upload photo";
}


 ?>
