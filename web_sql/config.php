<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');

$host = "localhost"; // Your MySQL server hostname
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (leave it empty if there is no password)
$database = "sql"; // Name of your database

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
} 
// else {
//     echo "Database Connected";
//     // Your code for database operations goes here
// }
?>

