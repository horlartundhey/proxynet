<?php
// Database configuration
// $dbHost     = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName     = "portfolio";

$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "fingerti_portf";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>