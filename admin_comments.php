<title>Build A Bread</title>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <?php
        session_start();

        include 'connection.php';

        // Written by Nathanael Goza
    ?>

        <div>
            <br>
            <a href=admin.php>Home</a>
            <br><br>
            <hr style="margin-left: 0px">
            <br>
            <!-- <a>Users</a> -->
            <!-- <br><br> -->
            
            <!-- Written by Nathan Groeschel -->
            <?php
              // use view_profiles view
              $sql = "SELECT * FROM comments";
              $res = $conn->query($sql);

              // begin profile table
              echo '<form action="admin.php" method="post">';
              echo '<div class="container table-responsive">';
              echo '<table class="table table-bordered">';
              echo '<thead>';
              echo "<tr>";
              echo "<th>" . "Comment ID" . "</th>";
              echo "<th>" . "Order ID" . "</th>";
              echo "<th>" . "Comment" . "</th>";
            //   echo "<th>" . "Censor" . "</th>";
              echo "</tr>";
              echo '</thead>';
              echo '<tbody>';

              $uIDs = [];

              // iterate through each profile, determine account type, display in table
              while ($row = mysqli_fetch_array($res)) {
                // all admins must be employees
                // $isAdmin = false;
            
                
                array_push($uIDs, $row['profile_id']);

                echo "<tr>";
                echo "<td>" . $row['comment_id'] . "</td>";
                echo "<td>" . $row['order_id'] . "</td>";
                echo "<td>" . $row['comment_field'] . "</td>";
                // echo "<td>" . '<input type="checkbox" id='. $isAdmin . ' name='. $isAdmin . "></td>";
                echo "</tr>";
              }
              $conn->close();
            ?>
        </div>

</body>
</html>