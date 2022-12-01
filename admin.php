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
        $sql = "SELECT * FROM `profiles` WHERE profile_id = \"$profile_id\";";
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
            <h1>Admin Profile</h1>
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
            <a href=https://docs.google.com/spreadsheets/d/1RsYp0lhijPvCDGcKKTwpQUXf-3DnYO5zugFXKhKfFVw/edit#gid=0>Inventory</a>
            <br><br>
            <hr style="margin-left: 0px">
            <br>
            <a href=https://docs.google.com/spreadsheets/d/1DZ1idOCHZVBv5lmVg7m1fGqC-GKAzfz8uhBbppXkuN8/edit#gid=0>Users</a>
            <br><br>
            
            <!-- Written by Nathan Groeschel -->
            <?php
              // connect to db and query profile information
              $conn = getDB();
              // use view_profiles view
              $sql = "SELECT * FROM view_profiles";
              $res = $conn->query($sql);

              // begin profile table
              echo '<form action="admin.php" method="post">';
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
              echo "<th>" . "Is Emp?" . "</th>";
              echo "<th>" . "Is Adm?" . "</th>";
              echo "</tr>";
              echo '</thead>';
              echo '<tbody>';

              $uIDs = [];

              // iterate through each profile, determine account type, display in table
              while ($row = mysqli_fetch_array($res)) {
                // all admins must be employees
                $isEmp = false;
                $isAdmin = false;
                if ($row['user_type'] == 2) {
                    $isEmp = true;
                    $isAdmin = false;
                } elseif ($row['user_type'] == 3) {
                    $isEmp = true;
                    $isAdmin = true;
                }

                $empCheck = $row['profile_id'] . "-EMP";
                $admCheck = $row['profile_id'] . "-ADM";

                array_push($uIDs, $row['profile_id']);

                echo "<tr>";
                echo "<td>" . $row['profile_id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone_number'] . "</td>";
                if ($row['user_type'] == 2) {
                    echo "<td>" . '<input type="checkbox" id='. $empCheck . ' name='. $empCheck . " checked></td>";
                    echo "<td>" . '<input type="checkbox" id='. $admCheck . ' name='. $admCheck . "></td>";
                } elseif ($row['user_type'] == 3) {
                    echo "<td>" . '<input type="checkbox" id='. $empCheck . ' name='. $empCheck . " checked></td>";
                    echo "<td>" . '<input type="checkbox" id='. $admCheck . ' name='. $admCheck . " checked></td>";
                } else {
                    echo "<td>" . '<input type="checkbox" id='. $empCheck . ' name='. $empCheck . "></td>";
                    echo "<td>" . '<input type="checkbox" id='. $admCheck . ' name='. $admCheck . "></td>";
                }
                echo "</tr>";
              }

              // end profile table
              echo "</tbody></table></div>";
              echo '<button class="btn btn-primary btn-block" type="submit" name="update">Update</button>';
              echo '</form>';

              if (isset($_POST['update'])) {
                foreach ($uIDs as $id) {
                    if (isset($_POST[$id . '-ADM'])) {
                        # user is admin
                        print("here ");
                        $sql = "UPDATE profiles SET user_type=3 WHERE profile_id='$id'";
                        $conn->query($sql);
                    } elseif (isset($_POST[$id . '-EMP'])) {
                        # user is employee
                        print("there ");
                        $sql = "UPDATE profiles SET user_type=2 WHERE profile_id='$id'";
                        $conn->query($sql);
                    } else {
                        # user is customer
                        print("everywhere ");
                        $sql = "UPDATE profiles SET user_type=1 WHERE profile_id='$id'";
                        $conn->query($sql);
                    }
                }

                # clear post and refresh
                $_POST = array();
                header("Location: admin.php");
              }

              $conn->close();
            ?>
            <!-- End Code from Nathan Groeschel -->

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