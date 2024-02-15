<?php
include "partial/_dbconnect.php";
session_start();

$image = "";

$sql = "SELECT * FROM item";
$total = $conn->query($sql);

$sqlgetuser = "SELECT sno FROM users WHERE username = '{$_SESSION['username']}'";
$getuser = $conn->query($sqlgetuser);

if ($getuser) {
    $data = mysqli_fetch_assoc($getuser);
    if (!$data) {
        echo "No data found.";
    }
} else {
    echo "Query failed: " . mysqli_error($conn);
}
echo "User ka serial number: " . $data['sno'];




$addtocart = isset($_POST["addtocart"]) ? $_POST["addtocart"] : '';

if (isset($_POST['addtocart'])) {
    $itemName = isset($_POST["itemname1"]) ? $_POST["itemname1"] : '';
    $description = isset($_POST["description1"]) ? $_POST["description1"] : '';
    $quantity = isset($_POST["quantity1"]) ? $_POST["quantity1"] : '';
    $price = isset($_POST["price1"]) ? $_POST["price1"] : '';

    $filename = isset($_FILES["uploadimg"]["name"]) ? $_FILES["uploadimg"]["name"] : '';
    $tempname = isset($_FILES["uploadimg"]["tmp_name"]) ? $_FILES["uploadimg"]["tmp_name"] : '';
    $folder = "partial/$filename";
    
    move_uploaded_file($tempname, $folder);
    

    $cartsql = "INSERT INTO `cart` (`itemname`, `description`, `price`, `quantity`, `image`, `userid`) 
                VALUES ('$itemName', '$description', '$price', '$quantity', '$folder', '" . $data['sno'] . "')";
    $cartresult = mysqli_query($conn, $cartsql);

    if ($cartresult) {
        echo "<br>Inserted successfully ";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="123.css">
</head>

<body>
    <?php
    require 'partial/_nav.php';
    ?>
    <h1>Welcome <?php echo $_SESSION['username'] ?> Habibi</h1>
    <h1>welcome to all</h1>

    <main method="POST">
        <?php
        while ($data = mysqli_fetch_assoc($total)) {
            // Display the image path for each product
            //echo "This is the final image path: " . $data['image'];
            
        ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="listproduct">
                    <div class="item">
                        <img src="<?php echo $data['image'] ?>" alt="image" name="image">
                        <h2><?php echo $data['itemname'] ?></h2>
                        <h2><?php echo $data['description'] ?></h2>
                        <div class="price"><?php echo $data['price'] ?></div>
                        <input type="hidden" class="" name="itemname1" value="<?php echo $data['itemname'] ?>">
                        <input type="hidden" class="" name="description1" value="<?php echo $data['description'] ?>">
                        <input type="hidden" class="" name="quantity1" value="<?php echo $data['quantity'] ?>">
                        <input type="hidden" class="" name="price1" value="<?php echo $data['price'] ?>">
                        <button class="add" name="addtocart">Add to Cart</button>
                    </div>
                </div>
            </form>
        <?php
        }
        
        
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>

<?PHP
?>
