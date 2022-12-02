<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $db = "build_a_bread";

    $conn = @new mysqli(
        $dbhost,
        $dbuser,
        $dbpass,
        $db
    );
        
    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error . "\n");
    }
?>