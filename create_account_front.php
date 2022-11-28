<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/style_home.css" type="text/css" rel="stylesheet">

  <!-- Browser Tab title -->
  <title>Create Account</title>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #3EA055;">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class='navbar-nav mr-auto mt-2 mt-lg-0' style='padding-left: 30px;'>
        <li class='nav-item'>
          <a class='nav-link' href='profile.php'>Home</a>
        </li>
        <li class='nav-item active'>
          <a class='nav-link' href='create_account_front.php'>Edit Profile</a>
        </li>
      </ul>
      <button onclick='logout()' type='button' id='logoffBtn' class='nav-link my-2 my-lg-0'>Logout</button>
    </div>
  </nav>

  <?php
  session_start();
  $uname = $_SESSION['username'];
  // Function to create a sql connection.
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

  // create a connection
  $conn = getDB();

  // Sql query to authenticate the user
  $sql = "SELECT profile_id, first_name, last_name, username, password, email, phone_number
          FROM profiles
          WHERE username= '$uname'";
  if (!$result = $conn->query($sql)) {
    die('There was an error running the query [' . $conn->error . ']\n');
  }

  /* convert the select return result into array type */
  $return_arr = array();
  while($row = $result->fetch_assoc()){
    array_push($return_arr, $row);
  }

  /* convert the array type to json format and read out*/
  $json_str = json_encode($return_arr);
  $json_a = json_decode($json_str, true);
  $id = $json_a[0]['profile_id'];
  $f_name = $json_a[0]['first_name'];
  $l_name = $json_a[0]['last_name'];
  $u_name = $json_a[0]['username'];
  $pwd = $json_a[0]['password'];
  $email = $json_a[0]['email'];
  $phone_num = $json_a[0]['phone_number'];
  ?>

  <div class="container  col-lg-4 col-lg-offset-4 text-center" style="padding-top: 50px; text-align: center;">
    <?php
    session_start();
    $name=$_SESSION["username"];
    echo "<h2><b>$name's Profile Edit</b></h1><hr><br>";
    ?>
    <form action="create_account_back.php" method="post">
      <div class="form-group row">
        <label for="FirstName" class="col-sm-4 col-form-label">FirstName</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="FirstName" required <?php echo "value=$FirstName";?> >
        </div>
      </div>
      <div class="form-group row">
        <label for="LastName" class="col-sm-4 col-form-label">LastName</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="LastName" name="LastName" placeholder="LastName" required <?php echo "value=$LastName";?> >
        </div>
      </div>
      <div class="form-group row">
        <label for="UserName" class="col-sm-4 col-form-label">UserName</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="UserName" name="UserName" placeholder="UserName" required <?php echo "value=$UserName";?> >
        </div>
      </div>
      <div class="form-group row">
        <label for="Password" class="col-sm-4 col-form-label">Password</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="Email" class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" required <?php echo "value=$Email";?>>
        </div>
      </div>
      <div class="form-group row">
        <label for="PhoneNumber" class="col-sm-4 col-form-label">Phone Number</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="PhoneNumber" required <?php echo "value=$PhoneNumber";?>>
        </div>
      </div>
      <br>
      <div class="form-group row">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-success btn-lg btn-block">Create Account</button>
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
</html>