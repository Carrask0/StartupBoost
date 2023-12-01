<?php

require_once __DIR__ . '/config.php';

echo $DB_SERVER . "<br>";
echo $DB_PORT . "<br>";
echo $DB_USER . "<br>";
echo $DB_PASSWORD . "<br>";
echo $DB_NAME . "<br>";

// Create connection
$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME)
    or die("Connection failed: " . mysqli_connect_error());


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
