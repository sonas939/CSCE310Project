<!DOCTYPE html>
<html>
<body>

  <!-- Written by John Grimes -->
  <?php
  session_start();

  include 'connection.php';

  $input_name = $_POST['Name'];
  $input_description = $_POST['Description'];
  $input_price= $_POST['Price'];
  $input_quantity = $_POST['Quantity'];

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