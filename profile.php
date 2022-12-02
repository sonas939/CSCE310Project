<title>Build A Bread</title>

<style type="text/css">
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: .9em;
        color: #000000;
        background-color: #FFFFFF;
        margin: 0;
        padding: 10px 20px 20px 20px;
    }

    samp {
        font-size: 1.3em;
    }

    a {
        color: #000000;
        background-color: #FFFFFF;
    }

    sup a {
        text-decoration: none;
    }

    hr {
        margin-left: 90px;
        height: 1px;
        color: #000000;
        background-color: #000000;
        border: none;
    }

    #logo {
        margin-bottom: 10px;
        margin-left: 28px;
    }

    .text {
        width: 80%;
        margin-left: 90px;
        line-height: 140%;
    }
</style>

</head>

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
         
        $profile_id = $_SESSION["profile_id"];

        $conn = getDB();
        $sql = "SELECT * FROM `profiles` USE INDEX (index_profile_id) WHERE profile_id = \"$profile_id\";";
        $results = $conn->query($sql)->fetch_assoc();
        $input_fname = $results['first_name'];
        $input_lname = $results['last_name'];
        $input_uname = $results['username'];
        $input_pwd = $results['password'];
        $input_email = $results['email'];
        $input_phonenum = $results['phone_number'];

        if (isset($_POST['edit_account'])) {
            // redirect to create account
            header("Location: /update_account_front.php");
        }         
    ?>
    <div style="width: 100%;">
        <div style="width: 50%; height: 100%; float: left; border-style: solid; border-width: 2px; text-align: center"> 
            <h1>Profile</h1>
            <?php echo "<h2>User Name: $input_uname</h2>"; ?>
            <h2>Password: <?php echo $input_pwd; ?> </h2>
            <h2>Name: <?php echo $input_fname; ?> <?php echo $input_lname; ?> </h2>
            <h2>Email: <?php echo $input_email; ?> </h2>
            <h2>Phone Number: <?php echo $input_phonenum; ?> </h2>
            <!-- Edit and Create accounts: -->
            <form class = "form-signin" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " method = "post">
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                name = "edit_account">Edit Account</button> 
            </form>
            <a href = "logout.php" tite = "Logout">Log Out</a>
        </div>
        <div style="margin-left: 50%; height: 100%; border-style: solid; border-width: 2px; text-align: center"> 
            <br>
            <a href=https://www.grubhub.com/restaurant/houston-street-subs-233-houston-street-college-station/2432016>Order Now</a>
            <br><br>
            <hr style="margin-left: 0px">
            <h1>Order History</h1>
            <a href=https://www.grubhub.com/restaurant/houston-street-subs-233-houston-street-college-station/2432016>View Order 1</a><br>
            <a href=https://www.grubhub.com/restaurant/houston-street-subs-233-houston-street-college-station/2432016>View Order 2</a><br>
            <a href=https://www.grubhub.com/restaurant/houston-street-subs-233-houston-street-college-station/2432016>View Order 3</a><br>
        </div>
        

    </div>


    

<?php
  // establish connection to SQL database
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = "build_a_bread";
  $db_port = 8889;

  $mysqli = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }

  echo 'Success: A proper connection to MySQL was made.';

  $mysqli->close();
?>

</body>
</html>