<?php
@session_start();
$_SESSION['logged_in'] = 'false';
$_SESSION['NewUserSuccess']="";
$_SESSION['current_user_mail']='';

// User Login credentials
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$FName=$_POST['FName'];
$LName=$_POST['LName'];
$Phone=$_POST['Phone'];

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
    $_SESSION['NewUserSuccess']="User alreayd exists";
    header("Location: ./index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css");
    exit();
} else {
    
    $sql = "INSERT INTO users (Email , FName, LName, Phone, Password)
        VALUES (
        '$_POST[Email]',
        '$_POST[FName]',
        '$_POST[LName]',
        '$_POST[Phone]',
        '$_POST[Password]'
        )";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $_SESSION['NewUserSuccess']="New User updated!";
    $_SESSION['logged_in'] = 'true';
    $_SESSION['current_user_mail']=$Email;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: ./index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css");
    exit();
}
    $conn->close();
