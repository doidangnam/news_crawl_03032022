<?php 
    require('./config.php');
    $connected = mysqli_connect(DB_CONNECTION, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if (!$connected) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";