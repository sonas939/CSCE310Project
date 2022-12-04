<!DOCTYPE html>
<html>
<body>

  <!-- Written by Nathanael Goza -->
  <?php
  session_start();

  include 'connection.php';

  $editor_id =  $_SESSION['editor_id'];

  $input_fname = $_POST["FirstName"];
  $input_lname = $_POST['LastName'];
  $input_uname= $_POST['UserName'];
  $input_pwd = $_POST['Password'];
  $input_cpwd = $_POST['Confirm_Password'];
  $input_email = $_POST['Email'];
  $input_phonenum = $_POST['PhoneNumber'];
  //$usertype = 0;

  //Validation

  //uname
  $sql = "SELECT * FROM `profiles` WHERE username = \"$input_uname\";";
  $results = $conn->query($sql);
  if($results->num_rows != 0){
    echo "Username already in use";
    $conn->close();
    echo 'Account Update Failed';
    header('Refresh: 2; URL = update_account_front.php');
  }
  
  //password
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


  // $sql = "INSERT INTO profiles(profile_id, first_name, last_name, username, password, email, phone_number, user_type)
  //         VALUES (UUID(), '$input_fname', '$input_lname', '$input_uname', '$input_pwd', '$input_email', $input_phonenum, $usertype)";
  $sql = "UPDATE profiles SET first_name = '$input_fname', last_name= '$input_lname', username = '$input_uname', password = '$input_pwd', email = '$input_email', phone_number = '$input_phonenum'  WHERE profile_id = '$editor_id'";
  if ($conn->query($sql) === TRUE) {
    // return to login page
    $conn->close();

    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] =='3'){  //if admin
      header('Location: admin.php');
    }else if(isset($_SESSION['user_type'])){                            //employee and customer portal
      header("Location: profile.php");
    }else{
      echo "<h2><b>usertype error</b></h1><hr><br>";   
      header('Refresh: 1; URL = logout.php');  
    }  } else {
    $conn->close();
    echo 'Account Update Failed';
    //header("Location: update_account_front.php");
  }
  ?>
  <!-- End Code from Nathanael Goza -->

</body>
</html>