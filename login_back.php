<!DOCTYPE html>
<html>
<body>

  <!-- Written by Nathan Groeschel and Nathanael Goza -->
  <?php
//    echo "<h2><b>Create Account</b></h1><hr><br>";
    //header("Location: profile.php");
//    echo "<h2><b> WE INCreate Account</b></h1><hr><br>";

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



  $input_uname= $_GET['username'];
  $input_pwd = $_GET['password'];
  $usertype = 0;




  $conn = getDB();
//  $sql = "SELECT * FROM `profiles` WHERE username = \"nathan\" AND password = \"12345\";";
  $sql = "SELECT * FROM `profiles` WHERE username = \"$input_uname\" AND password = \"$input_pwd\";";
  $result = $conn->query($sql);
  if(true){
    
    echo "<h2><b> WE INCreate Account</b></h1><hr><br>";
  }
  if($result->num_rows != 0){
    
    echo "<h2><b> NOT Zero</b></h1><hr><br>";
    echo "<h2><b> $input_uname</b></h1><hr><br>";
    echo "<h2><b> $input_pwd</b></h1><hr><br>";
  }
  if($result->num_rows == 0){
    
    echo "<h2><b> ZERO</b></h1><hr><br>";
    echo "<h2><b> $input_uname</b></h1><hr><br>";
    echo "<h2><b> $input_pwd</b></h1><hr><br>";
    
  }

  // if ($result->num_rows == 1) {  // login successful
  //   echo 'Nice ';
  // }
  // else{  // failed login go back to start
  //   // return to login page
  //   $conn->close();
  //   echo 'Log In Failed';
  //   header("Location: index.php");
  // } 
  ?>
  <!-- End Code from Nathan Groeschel -->

</body>
</html>