<?php
include "partial/_dbconnect.php";
$sql = "select * from item";
session_start();
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$data = mysqli_fetch_assoc($result);

if($count != 0){
    echo"<br><br>table has record";
  }else{
    echo"<br><br><br>Not has some record";
}
session_start();

$sqlgetuser = "SELECT sno FROM users WHERE username = '{$_SESSION['username']}'";
$getuser = $conn->query($sqlgetuser);
$data = mysqli_fetch_assoc($getuser);

if ($getuser) {
    if ($data) {
        echo "Sno: " . $data['sno'];
        echo "username: " . $_SESSION['username'];
         
        $number = $data['sno'];

        $cartsql = "SELECT * FROM cart where userid = '$number'";

        $cartresult = mysqli_query($conn, $cartsql);
        $cartdata = mysqli_fetch_assoc($cartresult);
        $cartresult = mysqli_query($conn, $cartsql);

if (!$cartresult) {
    echo "Cart query failed: " . mysqli_error($conn);
} else {
    // Rest of your code
    
    
    
    // $cartdata = mysqli_fetch_assoc($cartresult);
    
    // if ($cartdata) {
    //     echo "Quantity ye he: " . $cartdata['quantity'];
    // } else {
    //     echo "No data found in cart.";
    // }
}
        
    } else {
        echo "No data found.";
    }
} else {
    echo "User query failed: " . mysqli_error($conn);
}

if(isset($_POST['checkout'])){
    header ("Location: checkout.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Add to Cart</title>
    <link rel="stylesheet" href="addtocart.css">
</head>
<body>
    <h1>Wellcome <?php echo $_SESSION['username']?></h1>


    <div class="container">
        <h1 class="text-center">Add to Cart</h1>

        <main methode="POST">
        
        <form action="" method="post">
        <?php
        $totalPrice = 0;
        $itemNumber = 1;
        while ($cartdata = mysqli_fetch_assoc($cartresult)) {
            $totalPrice += $cartdata['price'];
            
        ?>
        <div class="listproduct">
            <div class="item">
                
            <h4><?php echo "<br>Item Number $itemNumber: <br><br>"?></h4>
                <h4><?php echo "Item Name: ".$cartdata['itemname']?></h4>
                <h4><?php echo "Descrisption: ".$cartdata['description'] ?></h4>
                <h4 class="price"><?php echo "$ ".$cartdata['price']?></h4>  


            </div>
        </div>
        </form>
        <?php
        $itemNumber++;
        }
        echo "<h4>Total Price: $totalPrice</h4>";
        $_SESSION['totalPrice'] = $totalPrice;
        ?>
        <button class="add" name="checkout">Check Out</button>
    </main>
    </div>
    
    </from>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
