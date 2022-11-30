<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/style_home.css" type="text/css" rel="stylesheet">

  <!-- Browser Tab title -->
  <title>Update Account</title>
</head>

<!-- Written by Nathan Groeschel -->
<body>
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


//gets username and password
$input_profile_id = $_SESSION['profile_id'];
// $usertype = 0;

echo $_SESSION['editor_id'];


$conn = getDB();
$sql = "SELECT * FROM `profiles` WHERE profile_id = \"$input_profile_id\";";
$result = $conn->query($sql); 
$result_row = $result->fetch_assoc();
echo "<h2><b> PHP Update Area </b></h1><hr><br>";

$new_profile_id = $result_row['profile_id'];
$new_first_name = $result_row['first_name'];
$new_last_name = $result_row['last_name'];
$new_username = $result_row['username'];
$new_password = $result_row['password'];
$new_email = $result_row['email'];
$new_phone_number = $result_row['phone_number'];
$new_user_type = $result_row['user_type'];

//echo $_SESSION['new_last_name'];
print_r($_SESSION);

?>

  <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #3EA055;">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class='navbar-nav mr-auto mt-2 mt-lg-0' style='padding-left: 30px;'>
        <li class='nav-item'>
          <a class='nav-link' href='profile.php'>Home</a>
        </li>
        <li class='nav-item active'>
          <a class='nav-link' href='update_account_front.php'>Edit Profile</a>
        </li>
      </ul>
      <button onclick='logout()' type='button' id='logoffBtn' class='nav-link my-2 my-lg-0'>Logout</button>
    </div>
  </nav>

  <div class="container  col-lg-4 col-lg-offset-4 text-center" style="padding-top: 50px; text-align: center;">
    <?php
    echo "<h2><b>Update Account</b></h1><hr><br>";
    ?>
    <form method="POST" action="update_account_back.php">
      <div class="form-group row">
        <?php echo "<label for=\"FirstName\" class=\"col-sm-4 col-form-label\">FirstName</label>"; ?>
        <div class="col-sm-8">
          <?php echo "<input type=\"text\" class=\"form-control\" id=\"FirstName\" name=\"FirstName\" placeholder=\"$new_first_name\">"; ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="LastName" class="col-sm-4 col-form-label">LastName</label>
        <div class="col-sm-8">
          <?php echo "<input type=\"text\" class=\"form-control\" id=\"LastName\" name=\"LastName\" placeholder=\"$new_last_name\">";?>
        </div>
      </div>
      <div class="form-group row">
        <label for="UserName" class="col-sm-4 col-form-label">UserName</label>
        <div class="col-sm-8">
          <?php echo "<input type=\"text\" class=\"form-control\" id=\"UserName\" name=\"UserName\" placeholder=\"$new_username\">";?>
        </div>
      </div>
      <div class="form-group row">
        <label for="Password" class="col-sm-4 col-form-label">Password</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
        </div>
      </div>
      <div class="form-group row">
        <label for="Confirm Password" class="col-sm-4 col-form-label">Confirm Password</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="Confirm_Password" name="Confirm_Password" placeholder="Confirm_Password">
        </div>
      </div>
      <div class="form-group row">
        <label for="Email" class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-8">
          <?php echo "<input type=\"text\" class=\"form-control\" id=\"Email\" name=\"Email\" placeholder=\"$new_email\">";?>
        </div>
      </div>
      <div class="form-group row">
        <label for="PhoneNumber" class="col-sm-4 col-form-label">Phone Number</label>
        <div class="col-sm-8">
          <?php echo "<input type=\"text\" class=\"form-control\" id=\"PhoneNumber\" name=\"PhoneNumber\" placeholder=\"$new_phone_number\">";?>
        </div>
      </div>
      <br>
      <div class="form-group row">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-success btn-lg btn-block">Update Account</button>
        </div>
      </div>
    </form>
    <br>
  </div>
  <script type="text/javascript">
  function logout(){
    location.href = "logout.php";
  }
  </script>
</body>
<!-- End Code from Nathan Groeschel -->

</html>