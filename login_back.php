<!DOCTYPE html>
<html>
<body>

  <!-- Written by Nathanael Goza and Nathan Groeschel -->
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
  $input_uname= $_GET['username'];
  $input_pwd = $_GET['password'];
  $usertype = 0;




  $conn = getDB();
  $sql = "SELECT * FROM `profiles` WHERE username = \"$input_uname\" AND password = \"$input_pwd\";";
  $result = $conn->query($sql); 
  echo "<h2><b> Log In Limbo </b></h1><hr><br>";

  if($result->num_rows == 1){
    $result_row = $result->fetch_assoc();
    $_SESSION['profile_id'] = $result_row['profile_id'];
    $_SESSION['user_type'] = $result_row['user_type'];

    print_r($_SESSION);
    
    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] =='3'){  //if admin
      $conn->close();
      header('Location: admin.php');
    }else if(isset($_SESSION['user_type'])){                            //employee and customer portal
      $conn->close();
      header("Location: profile.php");
    }else{
      $conn->close();
      echo "<h2><b>usertype error</b></h1><hr><br>";   
      header('Refresh: 1; URL = logout.php');  
    }
  }
  if($result->num_rows == 0){                                             // LOG IN FAILED
    $conn->close();
    echo "<h2><b>FAILED LOG IN</b></h1><hr><br>";   
    header('Refresh: 1; URL = logout.php');

  }

  ?>
  <!-- End Code from Nathanael Goza -->

</body>
</html>