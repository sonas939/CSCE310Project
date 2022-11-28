<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $db = "build-a-bread";
    $dbport = 8000;
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
?>