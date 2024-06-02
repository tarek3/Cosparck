<?php
// Include the configuration file to get the connection information
$config = require 'config.php';

// Connect to the MySQL database using the retrieved configuration
$conn = new mysqli(
    $config['server'], 
    $config['username'], 
    $config['password'], 
    $config['database']
);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Successfully connected to the database.";
}

// You can use the $conn variable to execute queries and interact with the database
?>