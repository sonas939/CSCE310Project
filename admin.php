<title>Build A Bread</title>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--
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
    -->

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
            
            <?php
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

              // connect to db and query profile information
              $conn = getDB();
              $sql = "SELECT profile_id, first_name, last_name, username, email, phone_number, user_type FROM profiles";
              $res = $conn->query($sql);

              // begin profile table
              echo '<div class="container table-responsive">';
              echo '<table class="table table-bordered">';
              echo '<thead>';
              echo "<tr>";
              echo "<th>" . "Profile ID" . "</th>";
              echo "<th>" . "First Name" . "</th>";
              echo "<th>" . "Last Name" . "</th>";
              echo "<th>" . "Username" . "</th>";
              echo "<th>" . "Email" . "</th>";
              echo "<th>" . "Phone Number" . "</th>";
              echo "</tr>";
              echo '</thead>';
              echo '<tbody>';

              // iterate through each profile, determine account type, display in table
              while ($row = mysqli_fetch_array($res)) {
                // all admins must be employees
                $isEmp = false;
                $isAdmin = false;
                if ($row['user_type'] == 1) {
                    $isEmp = true;
                    $isAdmin = false;
                } elseif ($row['user_type'] == 2) {
                    $isEmp = true;
                    $isAdmin = true;
                }

                echo "<tr>";
                echo "<td>" . $row['profile_id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone_number'] . "</td>";
                echo "</tr>";
              }

              // end profile table
              echo "</tbody></table></div>";

              $conn->close();
            ?>

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

</body>
</html>