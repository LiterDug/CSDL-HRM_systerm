<?php
//server hostname
$host = "localhost"; 
//username for database access
$user = "root"; 
//password for the user
$pass = "";

try {
    // Create a PDO object to connect to the MySQL database, specifying the server, database name, username, and password
    $con = new PDO("mysql:host=$host;dbname=hrm", $user, $pass);
    // Set the error mode for the connection to throw exceptions when an error occurs
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Catch and handle the exception if the connection fails, displaying an error message
    echo 'Connection Failed:' . $e->getMessage();
}
?>