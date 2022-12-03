<title>Build A Bread</title>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

        $conn = getDB();

        // Written by Nathan Groeschel
        // hard-coded comment_id, needs to be replaced
        $comment_id = "3de9daac-735d-11ed-ac6a-d8cb8ab82c65";
        
        $sql = "SELECT comment_field FROM comments WHERE comment_id=\"$comment_id\";";
        $res = $conn->query($sql);
        
        // get current comment value
        if ($row = $res->fetch_assoc()) {
            $current = $row['comment_field'];
        } else {
            $current = "";
        }

        // comment form
        echo '<form action="comments.php" method="post">';
        echo '<div class="form-group">';
        echo '<textarea class="form-control" rows="5" id="comment" name="comment">' . $current . '</textarea>';
        echo '<button class="btn btn-primary btn-block" type="submit" id="submit" name="submit">Add Comment</button>';
        echo '</div>';
        echo '</form>';

        // update comment in database
        if (isset($_POST['submit'])) {
            $comment = $_POST['comment'];

            /* 
             * add comment to database
             * $sql = "INSERT INTO comments(comment_id, order_id, comment_field)
             *         VALUES (UUID(), '$order_id', '$comment')";
             */

            // update comment in database
            $sql = "UPDATE comments SET comment_field='$comment' WHERE comment_id='$comment_id'";

            $conn->query($sql);
            $conn->close();

            header("Location: comments.php");
        }
        // End Code from Nathan Groeschel
    ?>
</body>