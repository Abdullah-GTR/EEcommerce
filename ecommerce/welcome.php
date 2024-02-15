<?php
include "partial/_dbconnect.php";
//error_reporting(0);
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: wellcome.php");
  exit;
}

// $sql = "select * from item";
// $result = mysqli_query($conn, $sql);
// $count = mysqli_num_rows($result);
// $data = mysqli_fetch_assoc($result);
// //echo $data['itemname'];


// //echo $count;

// if($count != 0){
//   echo"<br><br>table has record";
// }else{
//   echo"<br><br><br>Not has some record";
// }


?>




