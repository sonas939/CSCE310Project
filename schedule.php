<title>Build A Bread</title>
<?php
session_start();
?>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
        <div style="height: 100%; border-style: solid; border-width: 2px; text-align: center">
            <br>
            
            <!-- Written by John Grimes -->
            <?php
            include 'connection.php';

            if (isset($_POST['profile_back'])) {
                // redirect to account profile page
                if ($_SESSION['user_type'] == 3) {
                    header("Location: /admin.php");
                }
                else{
                    header("Location: /profile.php");
                }
            } 

              // connect to database to get schedule view
              $sql = "SELECT * FROM `view_schedules`";
              /*CREATE VIEW `view_schedules` AS
                    SELECT A.order_id, B.start_time, B.end_time, A.order_status, A.profile_id
                    FROM `orders` A, `schedules` B
                    WHERE A.schedule_id = B.schedule_id;
            */
              $res = $conn->query($sql);

              // begin schedule table
              echo '<form action="schedule.php" method="post">';
              echo '<div class="container table-responsive">';
              echo '<table class="table table-bordered">';
              echo '<thead>';
              echo "<tr>";
              echo "<th>" . "Order ID" . "</th>";
              echo "<th>" . "Pickup Start Time" . "</th>";
              echo "<th>" . "Pickup End Time" . "</th>";
              echo "<th>" . "Status" . "</th>";
              if($_SESSION['user_type'] == 3 or $_SESSION['user_type'] == 2){
                echo "<th>" . "Fulfill?" . "</th>";
              }
              echo "<th>" . "Cancel?" . "</th>";
              echo "</tr>";
              echo '</thead>';
              echo '<tbody>';

              $schedule = [];

              // iterates through all schedule entries
              while ($row = mysqli_fetch_array($res)) {
                $cancel_order = $row['order_id'] . "-CANCEL";
                $fulfill_order = $row['order_id'] . "-FULFILL";

                array_push($schedule, $row['order_id']);

                if ($_SESSION['user_type'] == 3 or $_SESSION['user_type'] == 2 or $_SESSION['profile_id'] == $row['profile_id']) {
                    echo "<tr>";
                    echo "<td>" . $row['order_id'] . "</td>";
                    echo "<td>" . date("m/d/y g:i A", strtotime($row['start_time'])) . "</td>";
                    echo "<td>" . date("m/d/y g:i A", strtotime($row['end_time'])) . "</td>";
                    //prints the status of the order
                    if ($row['order_status'] == 1) {
                        echo "<td>" . 'In Progress' . "</td>";
                    } elseif ($row['order_status'] == 2) {
                        echo "<td>" . 'Fulfilled' . "</td>";
                    } else {
                        echo "<td>" . 'Canceled' . "</td>";
                    }

                    //if user is an admin/employee, lets them mark orders as canceled or fulfilled
                    if($_SESSION['user_type'] == 3 or $_SESSION['user_type'] == 2){
                        if ($row['order_status'] == 1) {
                            echo "<td>" . '<input type="checkbox" id=' . $fulfill_order . ' name=' . $fulfill_order . "></td>";
                            echo "<td>" . '<input type="checkbox" id=' . $cancel_order . ' name=' . $cancel_order . "></td>";
                        }
                        else{
                            echo "<td>" . 'N/A' . "</td>";
                            echo "<td>" . 'N/A' . "</td>";
                        }
                    }
                    //if user is a customer, lets them cancel their order
                    elseif($_SESSION['user_type'] == 1){
                        if ($row['order_status'] == 1) {
                            echo "<td>" . '<input type="checkbox" id=' . $cancel_order . ' name=' . $cancel_order . "></td>";
                        }
                        else{
                            echo "<td>" . 'N/A' . "</td>";
                        }
                    }
                    echo "</tr>";
                }
              }

              // end table
              echo "</tbody></table></div>";
              echo '<button class="btn btn-primary btn-block" type="submit" name="update" value="update">Update Order Status</button>';
              echo '</form>';

            if (isset($_POST['update'])) {
                foreach ($schedule as $order) {
                    if (isset($_POST[$order . '-CANCEL'])) {
                        # cancels a order
                        print("test ");
                        $sql = "UPDATE orders SET order_status=3 WHERE order_id = '$order'";
                        $conn->query($sql);
                    }
                    elseif (isset($_POST[$order . '-FULFILL'])) {
                        # marks an order as completed
                        print("test ");
                        $sql = "UPDATE orders SET order_status=2 WHERE order_id = '$order'";
                        $conn->query($sql);
                    }
                }
                $_POST = array();
                header("Location: schedule.php");
            }

              $conn->close();
            ?>
            <form class = "form-signin" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " method = "post">
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                name = "profile_back">Return to Profile Page</button> 
            </form>
            <!-- End Code from John Grimes -->
        </div>
    </div> 

</body>
</html>