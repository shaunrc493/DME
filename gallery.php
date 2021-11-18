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

    echo "<hr>";

    echo "<p><strong>" . $name . "</strong></p>";
    echo "<img src='photos/".$reference."'>";
    echo "<p>" . $desc . "</p>";
  }
} else {
  echo "There is nothing in the database yet";
}

 ?>
