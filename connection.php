<?php
    // Written by Sona Shah
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
        
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error . "\n");
    }
?>