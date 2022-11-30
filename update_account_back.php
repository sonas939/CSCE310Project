<!DOCTYPE html>
<html>
<body>

  <!-- Written by Nathan Groeschel -->
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

  $input_fname = $_POST["FirstName"];
  $input_lname = $_POST['LastName'];
  $input_uname= $_POST['UserName'];
  $input_pwd = $_POST['Password'];
  $input_email = $_POST['Email'];
  $input_phonenum = $_POST['PhoneNumber'];
  $usertype = 0;

  $conn = getDB();

  $sql = "INSERT INTO profiles(profile_id, first_name, last_name, username, password, email, phone_number, user_type)
          VALUES (UUID(), '$input_fname', '$input_lname', '$input_uname', '$input_pwd', '$input_email', $input_phonenum, $usertype)";

  if ($conn->query($sql) === TRUE) {
    // return to login page
    $conn->close();
    header("Location: index.php");
  } else {
    $conn->close();
    echo 'Account Creation Failed';
    header("Location: create_account_front.php");
  }
  ?>
  <!-- End Code from Nathan Groeschel -->

</body>
</html>