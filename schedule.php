<title>Build A Bread</title>
<?php
session_start();
?>
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
        <div style="height: 100%; border-style: solid; border-width: 2px; text-align: center">
            <br>
            
            <!-- Written by John Grimes -->
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
            if (isset($_POST['admin_back'])) {
                // redirect to create account
                header("Location: /admin.php");
            } 

              // connect to database to get schedule view
              $conn = getDB();
              $sql = "SELECT * FROM `view_schedules`";
              /*CREATE VIEW `view_schedules` AS
	                SELECT A.order_id, start_time, end_time, A.order_status, A.profile_id
		            FROM `orders` A, `schedules` B
		            WHERE A.order_id = B.order_id
            */
              $res = $conn->query($sql);

              // begin schedule table
              echo '<form method="post" action="schedule.php">';
              echo '<div class="container table-responsive">';
              echo '<table class="table table-bordered">';
              echo '<thead>';
              echo "<tr>";
              echo "<th>" . "Order ID" . "</th>";
              echo "<th>" . "Pickup Start Time" . "</th>";
              echo "<th>" . "Pickup End Time" . "</th>";
              echo "<th>" . "Status" . "</th>";
              echo "</tr>";
              echo '</thead>';
              echo '<tbody>';

              $schedule = [];

              // iterate through each profile, determine account type, display in table
              while ($row = mysqli_fetch_array($res)) {
                // all admins must be employees

                array_push($schedule, $row['order_id']);
                if ($_SESSION['user_type'] == 3 or $_SESSION['user_type'] == 2 or $_SESSION['profile_id'] == $row['profile_id']) {
                    echo "<tr>";
                    echo "<td>" . $row['order_id'] . "</td>";
                    echo "<td>" . date("m/d/y g:i A", strtotime($row['start_time'])) . "</td>";
                    echo "<td>" . date("m/d/y g:i A", strtotime($row['end_time'])) . "</td>";
                    if ($row['order_status'] == 1) {
                        echo "<td>" . 'In Progress' . "</td>";
                    } elseif ($row['order_status'] == 2) {
                        echo "<td>" . 'Fulfilled' . "</td>";
                    } else {
                        echo "<td>" . 'Canceled' . "</td>";
                    }
                    echo "</tr>";
                }
              }

              // end profile table
              echo "</tbody></table></div>";


              $conn->close();
            ?>
            <form class = "form-signin" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " method = "post">
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                name = "admin_back">Return to Profile Page</button> 
            </form>
            <!-- End Code from John Grimes -->
        </div>
    </div> 

</body>
</html>