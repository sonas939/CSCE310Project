<!DOCTYPE html>
<html>
<body>

  <!-- Written by Nathanael Goza -->
  <?php
  session_start();    //Connect to database

  include 'connection.php';

  //set variables from previous page
  $editor_id =  $_SESSION['editor_id'];

  $input_fname = $_POST["FirstName"];
  $input_lname = $_POST['LastName'];
  $input_uname= $_POST['UserName'];
  $input_pwd = $_POST['Password'];
  $input_cpwd = $_POST['Confirm_Password'];
  $input_email = $_POST['Email'];
  $input_phonenum = $_POST['PhoneNumber'];

  //Validation
  //Ensures that the username is not taken
  $sql = "SELECT * FROM `profiles` WHERE username = \"$input_uname\";";
  $results = $conn->query($sql);
  if($results->num_rows != 0){
    echo "Username already in use";
    $conn->close();
    echo 'Account Update Failed';
    header('Refresh: 2; URL = update_account_front.php');
  }
  
  //Makes sure that the passwords the user inputed matches 
  if($input_pwd != "" && $input_pwd != $input_cpwd){
    echo "Inputted Passwords Dont Match";
    $conn->close();
    echo 'Account Update Failed';
    header('Refresh: 2; URL = update_account_front.php');
  }

  //geting prexisting values:
  $sql = "SELECT * FROM `profiles` WHERE profile_id = \"$editor_id\";";
  $results = $conn->query($sql)->fetch_assoc();

  if($input_fname == ""){
    $input_fname = $results['first_name'];
  }
  if($input_lname == ""){
    $input_lname = $results['last_name'];
  }
  if($input_uname == ""){
    $input_uname = $results['username'];
  }
  if($input_pwd == ""){
    $input_pwd = $results['password'];
  }
  if($input_cpwd == ""){
    $input_cpwd = $results['password'];    
  }
  if($input_email == ""){
    $input_email = $results['email'];
  }
  if($input_phonenum == ""){
    $input_phonenum = $results['phone_number'];
  }

  echo $input_fname;
  echo $input_lname;
  echo $input_uname;
  echo $input_pwd;
  echo $input_cpwd;
  echo $input_email;
  echo $input_phonenum;

  // sql command to update the user profile
  $sql = "UPDATE profiles SET first_name = '$input_fname', last_name= '$input_lname', username = '$input_uname', password = '$input_pwd', email = '$input_email', phone_number = '$input_phonenum'  WHERE profile_id = '$editor_id'";
  if ($conn->query($sql) === TRUE) {
    // return to login page
    $conn->close();

    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] =='3'){  //if admin -> go to admin page
      header('Location: admin.php');
    }else if(isset($_SESSION['user_type'])){                            //if not admin -> go to employee and customer portal
      header("Location: profile.php");
    }else{                                                              //Error handling (if not admin or user go back to login)
      echo "<h2><b>usertype error</b></h1><hr><br>";   
      header('Refresh: 1; URL = logout.php');  
    }  } else {
    $conn->close();
  }
  ?>
  <!-- End Code from Nathanael Goza -->

</body>
</html>