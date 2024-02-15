<?php
    include "partial/_dbconnect.php";
    echo "<br><br><br>";
   
    $filename = isset($_FILES["uploadfiles"]["name"]) ? $_FILES["uploadfiles"]["name"] : '';
    $tempname = isset($_FILES["uploadfiles"]["tmp_name"]) ? $_FILES["uploadfiles"]["tmp_name"] : '';
    //print_r($files);
    
    $folder = "partial/$filename";
    echo $folder;
    move_uploaded_file($tempname, $folder);
    echo "<img src='$folder' width='100px' height='100px'  alt=''>";

    //query time
    $query = "insert into tbl_img (img_source) values('$folder')";
    $sql = mysqli_query($conn, $query);

    if($query){
        echo"inserted";
    }else{
        echo"not inserted";
    }





?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="image.css">
</head>
<body>

    <form action="image.php" method="post" enctype="multipart/form-data"> 
        <label for="">images</label>
        <input type="file" name="uploadfiles"> <br>
        <input type="submit" value="Upload File" name="submit">
    </form>



    <img src="partial/.Poster.jpeg" width="100px" height="100px"  alt="">


    <div class="listproduct">
            <div class="item">
                <img src="partial/123.jpg" alt="image" name="image">                
                <h2>name</h2>
                <div class="price">$200</div>
                <button class="add" name="addtocart">Add to Cart</button>

            </div>
        </div>









</body>
</html>
