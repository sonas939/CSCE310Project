<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


  <!-- Page Title -->
  <title>Add New Item</title>
</head>

<!-- Written by John Grimes -->
<body>

  <div class="container  col-lg-4 col-lg-offset-4 text-center" style="padding-top: 50px; text-align: center;">
    <?php
    echo "<h2><b>Add New Item</b></h1><hr><br>";
    ?>
    <!-- Mirrors create account form but it adds items to db -->
    <form method="POST" action="add_item_back.php">
      <div class="form-group row">
        <label for="Name" class="col-sm-4 col-form-label">Name</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="Name" name="Name" placeholder="Name" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="Description" class="col-sm-4 col-form-label">Description</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="Description" name="Description" placeholder="Description" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="Price" class="col-sm-4 col-form-label">Price</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="Price" name="Price" placeholder="Price" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="Quantity" class="col-sm-4 col-form-label">Quantity</label>
        <div class="col-sm-8">
          <input type="Quantity" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" required>
        </div>
      </div>
      <br>
      <div class="form-group row">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-success btn-lg btn-block">Add Item</button>
        </div>
      </div>
    </form>
    <br>
  </div>
</body>
<!-- End Code from John Grimes -->

</html>