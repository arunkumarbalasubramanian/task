<?php
$dbhost = "localhost";  // If MySQL is running on your local machine
$dbuser = "root";       // MySQL username (default is "root" in XAMPP)
$dbpass = "";           // MySQL password (usually empty by default in XAMPP)
$dbname = "task1";       // Name of your database

// Create a connection to the MySQL database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Could not connect to the database: " . mysqli_connect_error());
} 
// else {
//     echo "Success: Connected to the database!";
// }
?>