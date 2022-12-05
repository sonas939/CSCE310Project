<title>Build A Bread</title>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <?php
        session_start();

        include 'connection.php';    //Connects to the database

        // Written by Nathanael Goza
    ?>

    <div>
    <br>
    <a href=admin.php>Home</a>
    <br><br>
    <hr style="margin-left: 0px">
    <br>

    <?php
        
        $sql = "SELECT * FROM comments";
        $res = $conn->query($sql);

        // begin comment table (just the titles of the table)
        echo '<form action="admin_comments.php" method="post">';
        echo '<div class="container table-responsive">';
        echo '<table class="table table-bordered">';
        echo '<thead>';
        echo "<tr>";
        echo "<th>" . "Comment ID" . "</th>";
        echo "<th>" . "Order ID" . "</th>";
        echo "<th>" . "Comment" . "</th>";
        echo "<th>" . "Censor" . "</th>";
        echo "</tr>";
        echo '</thead>';
        echo '<tbody>';


        $uIDs = [];     //list to be filled with comment ids

        // iterate through each comment list and display in table
        while ($row = mysqli_fetch_array($res)) {

            $delete_check = $row['comment_id'] . "-del";            
            array_push($uIDs, $row['comment_id']);

            echo "<tr>";
            echo "<td>" . $row['comment_id'] . "</td>";
            echo "<td>" . $row['order_id'] . "</td>";
            echo "<td>" . $row['comment_field'] . "</td>";
            echo "<td>" . '<input type="checkbox" id='. $delete_check . ' name='. $delete_check . "></td>";
            echo "</tr>";


            }
            echo "</tbody></table></div>";
            echo '<button class="btn btn-primary btn-block" type="submit" id="updateCom" name="updateCom">Update</button>';
            echo '</form>';

            if (isset($_POST['updateCom'])) {
                foreach ($uIDs as $id) {
                    if (isset($_POST[$id . '-del'])) {
                        // # Post is marked and needs to be censored
                        $sql = "UPDATE comments SET comment_field='This comment has been deemed unsafe by an admin' WHERE comment_id='$id'";
                        $conn->query($sql);
                    } 
                }                        
                # clear post and refresh
                $_POST = array();
                header('Location: admin_comments.php');

            }

        $conn->close();
        ?>
    </div>

</body>
</html>