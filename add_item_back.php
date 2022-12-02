<!DOCTYPE html>
<html>
<body>

  <!-- Written by John Grimes -->
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

  $input_name = $_POST['Name'];
  $input_description = $_POST['Description'];
  $input_price= $_POST['Price'];
  $input_quantity = $_POST['Quantity'];

  $conn = getDB();


  $sql = "INSERT INTO items(item_id, item_inventory, item_price, item_name, item_description)
          VALUES (UUID(), '$input_quantity', '$input_price', '$input_name', '$input_description')";

  if ($conn->query($sql) === TRUE) {
    // return to item page
    $conn->close();
    header("Location: items.php");
  } else {
    $conn->close();
    echo 'Failed to add item';
    header("Location: add_items.php");
  }
  ?>
  <!-- End Code from John Grimes -->

</body>
</html>