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
    <div style="width: 100%;">
        <div style="width: 50%; height: 100%; float: left; border-style: solid; border-width: 2px; text-align: center"> 
            <h1>Admin Profile</h1>
            <h2>User Name: ExampleAdmin <a href=>Edit</a></h2>
            <h2>Password: ******** <a href=>Edit</a></h2>
            <h2>Name: Matt Smith <a href=>Edit</a></h2>
            <h2>Email: myadmin@buildabread.com <a href=>Edit</a></h2>
            <h2>Phone Number: 999-846-6459 <a href=>Edit</a></h2>
        </div>
        <div style="margin-left: 50%; height: 100%; border-style: solid; border-width: 2px; text-align: center">
            <br>
            <a href=https://docs.google.com/spreadsheets/d/1RsYp0lhijPvCDGcKKTwpQUXf-3DnYO5zugFXKhKfFVw/edit#gid=0>Inventory</a>
            <br><br>
            <hr style="margin-left: 0px">
            <br>
            <a href=https://docs.google.com/spreadsheets/d/1DZ1idOCHZVBv5lmVg7m1fGqC-GKAzfz8uhBbppXkuN8/edit#gid=0>Users</a>
            <br><br>
            <hr style="margin-left: 0px">
            <br>
            <a href=https://calendar.google.com/calendar>Schedule</a>
            <br><br>
            <hr style="margin-left: 0px">
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
  $db_db = 'information_schema';
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