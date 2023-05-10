<?php
// Start a new session
@session_start();
 
$_SESSION['logged_in'] = 'false';
// $_SESSION['NewUserSuccess']="";
$_SESSION['current_user_mail']='';

// User Login credentials
$Email = $_POST['Email'];
$Password = $_POST['Password'];
echo $Email;
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
echo $Email;

$query_txt = "SELECT * FROM `users` WHERE Email= '$Email'";

// Execute SQL statement
$result = mysqli_query($conn, $query_txt);

// Check if email address already exists in database
if (mysqli_num_rows($result) > 0) {
    $_SESSION['logged_in'] = 'true';
    $_SESSION['current_user_mail']=$Email;
    // $_SESSION['NewUserSuccess']="";
    echo "User Logged in";
    header("Location: ./index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css");
    $conn->close();
    die();
} 
else {
    $_SESSION['logged_in'] = 'false';
    
    header("Location: ./index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css");
    $conn->close();
    die();
}
// die();

//     $conn->close();
?>

