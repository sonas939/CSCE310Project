<!DOCTYPE html>
<html>
<body>

  <!-- Written by Nathanael Goza -->
  <?php

  session_start();

  include 'connection.php';

  //gets username and password
  $input_uname= $_GET['username'];
  $input_pwd = $_GET['password'];
  $usertype = 0;

  // sql query to get all accounts that match username and password
  $sql = "SELECT * FROM `view_login` WHERE username = \"$input_uname\" AND password = \"$input_pwd\";";
  $result = $conn->query($sql); 
  echo "<h2><b> Log In Limbo </b></h1><hr><br>";

  // if only 1 result pops up then the request is valid - stores profile_id and editor_type as session variables
  if($result->num_rows == 1){
    $result_row = $result->fetch_assoc();
    $_SESSION['profile_id'] = $result_row['profile_id'];  
    $_SESSION['user_type'] = $result_row['user_type'];

    print_r($_SESSION);

    //send the user to the correct landing page (user or admin depeninding on user_type)
    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] =='3'){  //if admin
      $conn->close();
      header('Location: admin.php');
    }else if(isset($_SESSION['user_type'])){                            //employee and customer portal
      $conn->close();
      header("Location: order.php");
    }else{
      $conn->close();
      echo "<h2><b>usertype error</b></h1><hr><br>";   
      header('Refresh: 1; URL = logout.php');  
    }
  }
  if($result->num_rows == 0){                                           // LOG IN FAILED - Return to index
    $conn->close();
    echo "<h2><b>FAILED LOG IN</b></h1><hr><br>";   
    header('Refresh: 1; URL = logout.php');
  }

  ?>
  <!-- End Code from Nathanael Goza -->

</body>
</html>