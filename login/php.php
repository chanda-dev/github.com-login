<?php
// process.php

if (isset($_POST)) {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate and sanitize the data (e.g., trim, escape, etc.)

    // Create a MySQL connection
   

    // Insert user data into the 'users' table
    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "User saved successfully!";
    } else {
        echo "Error saving user: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
