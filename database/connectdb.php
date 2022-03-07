<?php 
    require('./database/config.php');
    $conn = new mysqli(DB_CONNECTION, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }