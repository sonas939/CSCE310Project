<title>Stock Page</title>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: .9em;
            color: #000000;
            background-color: #FFFFFF;
            margin: 0;
            padding: 10px 20px 20px 20px;
        }

        samp {
            font-size: 1.3em;
        }

        a {
            color: #000000;
            background-color: #FFFFFF;
        }

        sup a {
            text-decoration: none;
        }

        hr {
            margin-left: 90px;
            height: 1px;
            color: #000000;
            background-color: #000000;
            border: none;
        }

        #logo {
            margin-bottom: 10px;
            margin-left: 28px;
        }

        .text {
            width: 80%;
            margin-left: 90px;
            line-height: 140%;
        }
    </style>
    -->

</head>
<body>
        <div style="border-style: solid; border-width: 2px; text-align: center">
        <!-- Written by John Grimes -->
        <div class = "container">
            <?php 
              include 'connection.php';

              if (isset($_POST['add_item'])) {
                // redirect to create account
                header("Location: /add_items.php");
            } 
            if (isset($_POST['remove_items'])) {
                // redirect to create account
                header("Location: /remove_items.php");
            } 
            if (isset($_POST['admin_back'])) {
                // redirect to create account
                header("Location: /admin.php");
            } 
            
                // connect to db and query all our items
                $sql = "SELECT * FROM `items`";
                $res = $conn->query($sql);

                // begin item table
                echo '<form method="post" action="items.php">';
                echo '<div class="container table-responsive">';
                echo '<table class="table table-bordered">';
                echo '<thead>';
                echo "<tr>";
                echo "<th>" . "Item ID" . "</th>";
                echo "<th>" . "Quantity" . "</th>";
                echo "<th>" . "Price (\$USD)" . "</th>";
                echo "<th>" . "Name" . "</th>";
                echo "<th>" . "Description" . "</th>";
                echo "</tr>";
                echo '</thead>';
                echo '<tbody>';

                $items = [];

                // iterate through each item and display it in a table
                while ($row = mysqli_fetch_array($res)) {

                    array_push($items, $row['item_id']);

                    if ($row['item_description'] != "No longer available"){
                        echo "<tr>";
                        echo "<td>" . $row['item_id'] . "</td>";
                        echo "<td>" . $row['item_inventory'] . "</td>";
                        echo "<td>" . $row['item_price'] . "</td>";
                        echo "<td>" . $row['item_name'] . "</td>";
                        echo "<td>" . $row['item_description'] . "</td>";
                        echo "</tr>";
                    }
                }
                
              if (isset($_POST['add_item'])) {
                // redirect to create account
                header("Location: /add_items.php");
            } 
            if (isset($_POST['remove_items'])) {
                // redirect to create account
                header("Location: /remove_items.php");
            } 
            if (isset($_POST['admin_back'])) {
                // redirect to create account
                header("Location: /admin.php");
            } 
            

                // end item table
                echo "</tbody></table></div>";

              // begin item table
              echo '<form method="post" action="items.php">';
              echo '<div class="container table-responsive">';
              echo '<table class="table table-bordered">';
              echo '<thead>';
              echo "<tr>";
              echo "<th>" . "Item ID" . "</th>";
              echo "<th>" . "Quantity" . "</th>";
              echo "<th>" . "Price (\$USD)" . "</th>";
              echo "<th>" . "Name" . "</th>";
              echo "<th>" . "Description" . "</th>";
              echo "</tr>";
              echo '</thead>';
              echo '<tbody>';

              $uIDs = [];

              // iterate through each item and display it in a table
              while ($row = mysqli_fetch_array($res)) {

                array_push($uIDs, $row['item_id']);

                if ($row['item_description'] == "No longer available")
                    ;
                else{
                    echo "<tr>";
                    echo "<td>" . $row['item_id'] . "</td>";
                    echo "<td>" . $row['item_inventory'] . "</td>";
                    echo "<td>" . $row['item_price'] . "</td>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['item_description'] . "</td>";
                    echo "</tr>";
                }
              }

              // end item table
              echo "</tbody></table></div>";

              $conn->close();
            ?>
            <form class = "form-signin" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " method = "post">
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                name = "add_item">Add Item</button> 
            </form>
            <form class = "form-signin" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " method = "post">
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                name = "remove_items">Remove Item</button> 
            </form>
            <form class = "form-signin" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " method = "post">
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                name = "admin_back">Return to Profile Page</button> 
            </form>
            <!-- End Code from John Grimes -->
        </div>
    </div>
</div>

</body>
</html>