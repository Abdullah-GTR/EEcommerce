<?php 
 
require 'partial/_nav.php';

$showalert = false;
$showerror = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){

  include 'partial/_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  
  $existsql = "select * from users where username = '$username'";
  $result = mysqli_query($conn, $existsql);
  $existNum = mysqli_num_rows($result);
  if($existNum > 0){
    $exists = true;
    $showerror =  "User already exixt";
  }else{
    $exists = false;
    
    if(($password == $cpassword) && $exists == false){
      $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      if($result)
      {
        $showalert = true;
      }
    }
    else{
      $showerror = "passowrd not match";
    }
  }
}
  

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    


<?php
    if($showalert ){
    echo' 
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong>Your Acc is created.
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
        <h1 class="text-center">Signup to Our Website </h1>

        <form action="/login2/signup.php" method="post">
            <div class="form-group">
                <label for="username">UserName</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
                
            </div>
            <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
            <label for="cpassword"  class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
                <div id="emailHelp" class="form-text">Have you right the same Password?</div>
            </div>
            
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
    
    </from>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

