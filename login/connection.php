<?php
    $host = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'githublogin';

    $conn = new mysqli($host, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    ?>