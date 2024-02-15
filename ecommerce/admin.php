<?php
    include 'partial/_dbconnect.php';
    

    if (isset($_POST["submit"])) {
        
        
        
        
        
        
        
        $itemName = isset($_POST["itemname"]) ? $_POST["itemname"] : '';
        $description = isset($_POST["descrition"]) ? $_POST["descrition"] : '';
        $quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : '';
        $price = isset($_POST["price"]) ? $_POST["price"] : '';
        
        $filename = isset($_FILES["uploadimg"]["name"]) ? $_FILES["uploadimg"]["name"] : '';
        $tempname = isset($_FILES["uploadimg"]["tmp_name"]) ? $_FILES["uploadimg"]["tmp_name"] : '';
        $folder = "partial/$filename";
        //for show image name or folder --- echo $folder;
        move_uploaded_file($tempname, $folder);
        //for show image --- echo "<img src='$folder' width='100px' height='100px'  alt=''>";
        
        
        $sql = "INSERT INTO `item` (`itemname`, `description`, `quantity`, `price`, `image`) VALUES ( '$itemName', '$description', '$quantity', '$price', '$folder')";
        $result = mysqli_query($conn, $sql);
        
        // $query = "insert into tbl_img (img_source) values('$folder')";
        // $sql = mysqli_query($conn, $query);
        
        
        
        if ($result) {
            echo "Inserted successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    
        
        //Image Work End

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <style>
         
    </style>
    <link rel="stylesheet" href="admin.css">
</head>

 
       
    
  </style>
  <body>
    <?php 
    require 'partial/_nav.php'
    ?>
    


    <div class="container">
        <h1 class="text-center">Signup to Our Website </h1>
    <form method="post" enctype="multipart/form-data" class="red"> 
            <div class="form-group">
                <label for="itemname">Item Name</label>
                <input type="text" class="form-control" name="itemname" id="itemname" aria-describedby="emailHelp">
                
            </div>
            <div class="form-group">
                <label for="descrition" class="form-label">Descrition</label>
                <input type="text" name="descrition" class="form-control" id="descrition">
            </div>
            <div class="form-group">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="text" name="quantity" class="form-control" id="Quantity">
            </div>
            <div class="form-group">
                <label for="Price"  class="form-label">Price</label>
                <input type="text" name="price" class="form-control" id="Price">
                
            </div>
            <div>
                <br>
            <label for="image"  class="form-label">Image</label>
            <input type="file" name="uploadimg"> <br>
                
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" >Submit</button>

<br>
            
        </form>




        


    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>