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


  //gets username and password
  $input_uname= $_GET['username'];
  $input_pwd = $_GET['password'];
  $usertype = 0;




  $conn = getDB();
  $sql = "SELECT * FROM `profiles` WHERE username = \"$input_uname\" AND password = \"$input_pwd\";";
  $result = $conn->query($sql); 

  echo "<h2><b> Log In Limbo </b></h1><hr><br>";

  if($result->num_rows == 1){

    $_SESSION['user_type'] = (string)$result->fetch_assoc()['user_type'];
    $_SESSION['profile_id'] = $result->fetch_assoc()['profile_id'];

    echo $_SESSION['user_type']; 
    echo $_SESSION['profile_id']; 

    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] =='3'){  //if admin
      $conn->close();
      header("Location: admin.php");
    }else if(isset($_SESSION['user_type'])){                            //employee and customer portal
      $conn->close();
      header("Location: profile.php");
    }else{
      $conn->close();
      echo "<h2><b>usertype error</b></h1><hr><br>";   
      header('Refresh: 1; URL = logout.php');  
    }
  
  }
  if($result->num_rows == 0){
    $conn->close();
    echo "<h2><b>FAILED LOG IN</b></h1><hr><br>";   
    header('Refresh: 1; URL = logout.php');

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