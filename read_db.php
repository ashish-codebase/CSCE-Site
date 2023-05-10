<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();

if($_SESSION['logged_in'] == 'false'){
    exit();
}

// SQL Login and server details:
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internet_class";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Output data of each row
// $query_txt = "SELECT * FROM `users` WHERE email='$_POST[email]'";
$query_txt = "SELECT * FROM `users`";

// echo $query_txt;
$result = $conn->query($query_txt);
?>