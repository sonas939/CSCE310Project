<?php
    session_start();
    require_once("connection.php");
    require_once("component.php");

    if (isset($_POST['remove'])) {
        if ($_GET['action'] == 'remove') {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['product_id'] == $_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }

    if (isset($_POST['checkout'])) {
        //make sure there are items in the cart. If not alert
        if (isset($_SESSION['cart'])) {
            $count  = count($_SESSION['cart']);
            if ($count == 0) {
                echo "<script>alert('There are no items in your cart!')</script>";
                echo "<script>window.location='cart.php'</script>";
            }
        } else {
            echo "<script>alert('There are no items in your cart!')</script>";
            echo "<script>window.location='cart.php'</script>";
        }

        $profile_id = $_SESSION['profile_id'];
        $comment_field = $_REQUEST['comment'];
        
        //error checking for date
        $date = $_REQUEST['date'];
        $s_time = $_REQUEST['start-time'];
        $e_time = $_REQUEST['end-time'];

        if (!strlen(trim($date)) && validateDate($date)) {
            echo "<script>alert('Please enter a Valid Pick-Up Date!')</script>";
            echo "<script>window.location='cart.php'</script>";
        }

        if (!strlen(trim($s_time)) && isTimeValid($s_time)) {
            echo "<script>alert('Please enter a Valid Start Time!')</script>";
            echo "<script>window.location='cart.php'</script>";
        }

        if (!strlen(trim($e_time) && isTimeValid($e_time))) {
            echo "<script>alert('Please enter a Valid End Time!')</script>";
            echo "<script>window.location='cart.php'</script>";
        }

        //add schedule to table
        $full_start_time = $date . ' ' . date("H:i", strtotime($s_time));
        $full_end_time = $date . ' ' . date("H:i", strtotime($e_time));
        //add schedule to table 

        $sql = "INSERT INTO Schedules(start_time, end_time) VALUES ('$full_start_time', '$full_end_time')";
        if ($conn->query($sql) === FALSE) {
            echo "Failed to Check-Out";
        }

        //get last inserted schedule_id
        $sql = "SELECT schedule_id FROM Schedules ORDER BY schedule_id DESC LIMIT 1";
        $result = $conn->query($sql)->fetch_assoc();
        $schedule_id = $result['schedule_id'];

        //get total for order table
        $total = 0;
        $product_id = array_column($_SESSION['cart'],'product_id'); 
        $sql = "SELECT * FROM `Items`"; 
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            foreach($product_id as $id) {
                if($row['item_id'] == $id) {
                    $total = $total + $row['item_price'];
                }
            }
        }

        //add order to table
        $sql = "INSERT INTO Orders(price_total, schedule_id, profile_id, order_status) VALUES ('$total', '$schedule_id', '$profile_id', '1')";
        $conn->query($sql);

        //get last inserted order_id
        $sql = "SELECT order_id FROM Orders ORDER BY order_id DESC LIMIT 1";
        $result = $conn->query($sql)->fetch_assoc();
        $order_id = $result['order_id'];

        //add comments to database if there are comments
        if (strlen(trim($comment_field))) {
            $sql = "INSERT INTO Comments(comment_id, order_id, comment_field) VALUES (UUID(), '$order_id', '$comment_field')";
            $conn->query($sql);
        }

        //product_id defined above for total. adding each item to orderline
        foreach($product_id as $id) {
            //get item name using index
            $sql = "SELECT item_name FROM `Items` USE INDEX (index_items_id) WHERE item_id = \"$id\";";
            $result = $conn->query($sql)->fetch_assoc();
            $item_name = $result['item_name'];
            $index = array_search($id,$product_id);
            $quantity = $_SESSION['cart'][$index]['quantity'];
            $sql = "INSERT INTO Order_Lines(item_id, order_id, item_name, quantity_ordered) VALUES ('$id', '$order_id', '$item_name', '$quantity')";            
            $conn->query($sql);
        }

        //clear session
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
                        $totalQuantity = 0;
                        if (isset($_SESSION['cart'])) {
                            $product_id = array_column($_SESSION['cart'],'product_id'); 
                            $sql = "SELECT * FROM `Items`"; 
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                foreach($product_id as $id) {
                                    if($row['item_id'] == $id) {
                                    $index = array_search($id,$product_id);
                                    $quantity = $_SESSION['cart'][$index]['quantity'];
                                    cartElement($row['item_name'],$row['item_price'],$row['item_description'],$id,$quantity);
                                    $total = $total + $row['item_price']*$quantity;
                                    $totalQuantity = $totalQuantity + $quantity;
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
                    <h6>Enter your desired pick-up time. Can only pick-up during hours of operation (Every day 7AM-7PM)</h6>
                    <hr>
                    <textarea class="form-control" rows="1" name="date" placeholder="Enter Pick-Up date (YYYY-MM-DD)"></textarea>
                    <textarea class="form-control" rows="1" name="start-time" placeholder="Enter Pick-up Start Window (##:## AM or ##:## PM)"></textarea>
                    <textarea class="form-control" rows="1" name="end-time" placeholder="Enter Pick-up End Window (##:## AM or ##:## PM)"></textarea>
                    </div>
    
                    <div class="form-group">
                    <h6>Enter any commments or special requests.</h6>
                    <hr>
                    <textarea class="form-control" rows="5" name="comment"></textarea>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-warning mx-2" name="checkout">Check Out</button>
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
                            echo "<h6>Total ($totalQuantity items)</h6>";
                        ?>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>