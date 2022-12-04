<?php
    //start session
    session_start();

    require_once('connection.php');
    require_once('component.php');

    if (isset($_POST['add'])) {
        if(isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'], "product_id");

            if(in_array($_POST['product_id'], $item_array_id)){
                echo "<script>alert('Product is already added in the cart!')</script>";
                echo "<script>window.location = 'index.php'</script>";
            } else {
               $count = count($_SESSION['cart']);
               $item_array = array(
                    'product_id'=> $_POST['product_id']
                );
                $_SESSION['cart'][$count] = $item_array;
            }
        } else {
            //create new array if session has not be set
            $item_array = array(
                'product_id'=> $_POST['product_id']
            );

            //create new session variable
            $_SESSION['cart'][0] = $item_array;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once("header.php");?>
    <div class="container">
        <div class="row text-center py-5">
            <?php
                $sql = "SELECT * FROM `Items`"; 
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['item_name'],$row['item_description'],$row['item_price'],$row['item_id']);
                }
            ?>
        </div>
    </div>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>