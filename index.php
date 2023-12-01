<?php

require_once __DIR__ . '/config.php';

echo $DB_SERVER . "<br>";
echo $DB_PORT . "<br>";
echo $DB_USER . "<br>";
echo $DB_PASSWORD . "<br>";
echo $DB_NAME . "<br>";

// Create connection
//$conn = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME, $PORT)
//   or die("Connection failed: " . mysqli_connect_error());


// Create a connection
$conn = new mysqli($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo ("Hello world!");
