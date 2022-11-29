<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <?php
        include 'connection.php';
    ?>
    <?php     
        require 'navbar.php' ;
    ?>

    <div class="container my-3 mb-5">
        <div class="col-lg-2 text-center bg-light my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">     
        <h2 class="text-center">Menu</h2>
        </div>
        <div class="row">
        <?php 
            $sql = "SELECT * FROM `Items`"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $name = $row['item_name'];
                $price = $row['item_price'];
                $desc = $row['item_description'];
                echo '<div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title">'.$name.'</h5>
                        <h6 class="card-subtitle mb-2 text-muted">'.$price.'</h6>
                        <p class="card-text">'.$desc.'</p>
                        </div>
                    </div>';
                }
        ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </body>
</html>
