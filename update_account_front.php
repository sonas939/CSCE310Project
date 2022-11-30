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
// $input_uname= $_GET['username'];
// $input_pwd = $_GET['password'];
// $usertype = 0;

echo $_SESSION['profile_id'];


// $conn = getDB();
// $sql = "SELECT * FROM `profiles` WHERE username = \"$input_uname\" AND password = \"$input_pwd\";";
// $result = $conn->query($sql); 

echo "<h2><b> PHP Update Area </b></h1><hr><br>";

// if($result->num_rows == 1){

//   $_SESSION['user_type'] = (string)$result->fetch_assoc()['user_type'];
//   $_SESSION['profile_id'] = $result->fetch_assoc()['profile_id'];

//   echo $_SESSION['user_type']; 
//   echo $_SESSION['profile_id']; 

//   if(isset($_SESSION['user_type']) && $_SESSION['user_type'] =='3'){  //if admin
//     $conn->close();
//     header("Location: admin.php");
//   }else if(isset($_SESSION['user_type'])){                            //employee and customer portal
//     $conn->close();
//     header("Location: profile.php");
//   }else{
//     $conn->close();
//     echo "<h2><b>usertype error</b></h1><hr><br>";   
//     header('Refresh: 1; URL = logout.php');  
//   }
// }
// if($result->num_rows == 0){                                             // LOG IN FAILED
//   $conn->close();
//   echo "<h2><b>FAILED LOG IN</b></h1><hr><br>";   
//   header('Refresh: 1; URL = logout.php');

// }

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
        <label for="FirstName" class="col-sm-4 col-form-label">FirstName</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="FirstName" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="LastName" class="col-sm-4 col-form-label">LastName</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="LastName" name="LastName" placeholder="LastName" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="UserName" class="col-sm-4 col-form-label">UserName</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="UserName" name="UserName" placeholder="UserName" required>
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
          <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="PhoneNumber" class="col-sm-4 col-form-label">Phone Number</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="PhoneNumber" required>
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