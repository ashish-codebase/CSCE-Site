<?php

// // SQL Login and server details:
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "internet_class";
include 'DB_Login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Output data of each row
$query_txt = "SELECT * FROM `users`";

// echo $query_txt;
$result = $conn->query($query_txt);
?>