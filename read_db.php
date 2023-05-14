<?php
// This include connects to either localhost or liver server
// And returns the $conn variable for further code execution.
include 'DB_Login.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Output data of each row
$query_txt = "SELECT * FROM `users`";

// echo $query_txt;
$result = $conn->query($query_txt);
?>