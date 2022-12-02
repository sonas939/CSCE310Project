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
                session_start();    
              function getDB() {
                $dbhost="localhost";
                $dbuser="root";
                $dbpass="root";
                $dbname="build_a_bread";
            
                // Create a DB connection
                $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error . "\n");
                }
                
                return $conn;
              }
              if (isset($_POST['back'])) {
                // redirect to create account
                header("Location: /items.php");
            } 

              // connect to db and query all our items
              $conn = getDB();
              $sql = "SELECT * FROM `items`";
              $res = $conn->query($sql);

              // begin item table
              echo '<form action="remove_items.php" method="post">';
              echo '<div class="container table-responsive">';
              echo '<table class="table table-bordered">';
              echo '<thead>';
              echo "<tr>";
              echo "<th>" . "Item ID" . "</th>";
              echo "<th>" . "Quantity" . "</th>";
              echo "<th>" . "Price (\$USD)" . "</th>";
              echo "<th>" . "Name" . "</th>";
              echo "<th>" . "Description" . "</th>";
              echo "<th>" . "Remove?" . "</th>";
              echo "</tr>";
              echo '</thead>';
              echo '<tbody>';

              $items = [];

              // iterate through all items and add a check for removal
              while ($row = mysqli_fetch_array($res)) {
                $delete = $row['item_id'] . "-DEL";

                array_push($items, $row['item_id']);

                if ($row['item_description'] != "No longer available"){
                
                    echo "<tr>";
                    echo "<td>" . $row['item_id'] . "</td>";
                    echo "<td>" . $row['item_inventory'] . "</td>";
                    echo "<td>" . $row['item_price'] . "</td>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['item_description'] . "</td>";
                    echo "<td>" . '<input type="checkbox" id='.$delete.' name='. $delete . "></td>";
                    echo "</tr>";
                }
              }

              // end item table
              echo "</tbody></table></div>";
              echo '<button class="btn btn-primary btn-block" type="submit" name="remove" value="remove">Remove</button>';
              echo '</form>';

              if (isset($_POST['remove'])) {
                foreach ($items as $item) {
                    if (isset($_POST[$item . '-DEL'])) {
                        # if item marked to be deleted
                        print("test ");
                        $sql = "UPDATE items SET item_description='No longer available' WHERE item_id = '$item'";
                        $conn->query($sql);
                    }
                }

                # clear post and refresh
                $_POST = array();
                header("Location: remove_items.php");
              }
              $conn->close();
            ?>
            <form class = "form-signin" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " method = "post">
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                name = "back">Return to Inventory</button> 
            </form>
            <!-- End Code from John Grimes -->
        </div>
    </div>
</div>

</body>
</html>