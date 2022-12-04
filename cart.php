<?php
    session_start();
    require_once("connection.php");
    require_once("component.php");

    if (isset($_POST['remove'])) {
        if ($_GET['action'] == 'remove') {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['product_id'] == $_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                    echo "<script>alert('Product has been Removed!')</script>";
                    echo "<script>window.location='cart.php'</script>";
                }
            }
        }
    }

    if (isset($_POST['checkout'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            unset($_SESSION['cart'][$key]);
        }
        echo "<script>alert('You have checked-out!')</script>";
        echo "<script>window.location='order.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <?php require_once("header.php"); ?>
    
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>
                    <?php
                        $total=0;
                        if (isset($_SESSION['cart'])) {
                            $product_id = array_column($_SESSION['cart'],'product_id'); 
                            $sql = "SELECT * FROM `Items`"; 
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                foreach($product_id as $id) {
                                    if($row['item_id'] == $id) {
                                    cartElement($row['item_name'],$row['item_price'],$row['item_description'],$id);
                                    $total = $total + $row['item_price'];
                                    }
                                }
                            }
                        } else {
                            echo "<h5>Cart is Empty</h5>";
                        }                       
                    ?>
                </div>
                <form action="cart.php" method="post">
                    <div class="form-group">
                    <h6>Enter any commments or special requests.</h6>
                    <hr>
                    <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                    </div>
                </form>
            </div>
            <div class="col-md-3 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Total ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                    </div>
                </div>
                <div class="cart-checkout">
                    <form action="cart.php" method="post">
                        <button type="submit" class="btn btn-warning mx-2" name="checkout">Check Out</button>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </div>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>