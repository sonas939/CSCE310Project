<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Past Orders</title>
    <?php 
        session_start(); 
        require_once("connection.php");
        require_once("header.php");
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <?php
        $sql = "SELECT * FROM `view_orders`";
        $res = $conn->query($sql);

        // begin order table
        echo '<div class="container table-responsive">';
        echo '<table class="table table-bordered">';
        echo '<thead>';
        echo "<tr>";
        echo "<th>" . "Order ID" . "</th>";
        echo "<th>" . "Order Total" . "</th>";
        echo "<th>" . "Item Name" . "</th>";
        echo "<th>" . "Quantity Ordered" . "</th>";
        echo "</tr>";
        echo '</thead>';
        echo '<tbody>';

        // iterates through all schedule entries
        while ($row = mysqli_fetch_array($res)) {
            if ($_SESSION['profile_id'] == $row['profile_id']) {
                    echo "<tr>";
                    if ($row['order_status'] == 2) {
                        echo "<td>" . $row['order_id'] . "</td>";
                        echo "<td>" . $row['price_total'] . "</td>";
                        echo "<td>" . $row['item_name'] . "</td>";
                        echo "<td>" . $row['quantity_ordered'] . "</td>";
                    }
            } 
            echo "</tr>";
        }
        echo "</tbody></table></div>";
    ?>
</body>
</html>