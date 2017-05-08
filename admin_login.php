<?php
include 'connection.php';

  $id=$_POST["user_id"];
  $passw=$_POST["password"];
 




$sql = "SELECT * From admin where email='$id' and password='$passw'";
$result = $conn->query($sql);
$numrow=mysqli_num_rows($result);
if ($numrow == 1) {
    session_start();
  	$_SESSION["id"] = $id;
  	$_SESSION["type"] = 'admin';
  	header('Location:admin_home.php');
} else {
    header('login.php?msg=Invalid Credential');
}