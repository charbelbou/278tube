<?php

  $host = "localhost"; /* Host name */
  $user = "root"; /* User */
  $password = ""; /* Password */
  $dbname = "TUBEDB"; /* Database name */

  $con = mysqli_connect($host, $user, $password,$dbname);
  // Check connection
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

  $id = $_GET['id'];
  $query = "UPDATE videos
  SET likes = likes - 1 
  WHERE id= $id";

  session_start();
  $userid=$_SESSION["id"];
  $sql="DELETE FROM `likes` WHERE userid=$userid AND videoid=$id";




mysqli_query($con,$query);
mysqli_query($con,$sql);

$query2 = "SELECT Likes FROM videos WHERE id ='$id' ";

$test = mysqli_query($con,$query2);

$row = mysqli_fetch_assoc($test);
$Likes = $row['Likes'];

echo $Likes;
?>