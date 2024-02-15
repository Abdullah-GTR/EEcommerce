<?php 

$showalert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

  include 'partial/_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];

    $sql = "select * from users where username ='$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
      $showalert = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      header("location: wellcome.php");
    }
  else{
    $showerror = "Invalid Username and pas";
  }
}
//for know the user

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      body{
        display: block;
  margin-left: auto;
  margin-right: auto;
      }
      button{
  
  
  
      }
    </style>
  </head>
  <body>
    <?php 
    require 'partial/_nav.php'
    ?>


<?php
    if($showalert ){
    echo' 
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong>You are loged in.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      
    }
    else if($showerror ){
      echo' 
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>kam kar bhai sahi sy!</strong>'.$showerror.'.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        
      }

?>
    <div class="container">
        <h1 class="text-center">Login to Our Website </h1>

        <form action="/login2/login.php" method="post">
            <div class="form-group">
                <label for="username">UserName</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
                
            </div>
            <div class="form-group">
            <label for="password" class="form-label">Password</label>
<input type="password" name="password" class="form-control" id="password">
            </div>
            
            
            <button type="submit" class="btn btn-primary">Login Up</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

