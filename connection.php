<?php
// setting the login variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stream";

// attempt to connect to the database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    #echo "Connection successful";
    }
catch(PDOException $e)
    {
    // return an error message if neccesary
    echo "Connection failed: " . $e->getMessage();
    }
?>