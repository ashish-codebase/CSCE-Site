<?php
$lifetime=600; //Number of seconds cookie stays active after last visit.
// @session_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
setcookie(session_name(),session_id(),time()+$lifetime);

$_SESSION['logged_in'] = 'false';
$_SESSION['NewUserSuccess'] = "";
$_SESSION['current_user_mail'] = '';

// User Login credentials
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$FName = $_POST['FName'];
$LName = $_POST['LName'];
$Phone = $_POST['Phone'];

echo $Email;

// Read data from local DB file

$database = new PDO('sqlite:./Data/WebsiteDatabase.db');
$query_txt = "SELECT * FROM `users` WHERE Email= '$Email'";
$statement = $database->query($query_txt);
// Execute SQL statement
$result = $statement->fetch(PDO::FETCH_ASSOC);

// Check if email address already exists in database
if (!$result) {
    $insert_qery = "INSERT INTO users (Email , FName, LName, Phone, Password)
        VALUES (
        '$_POST[Email]',
        '$_POST[FName]',
        '$_POST[LName]',
        '$_POST[Phone]',
        '$_POST[Password]'
        )";
    $statement = $database->prepare($insert_qery);
    $success = $statement->execute();
    if ($success) {
        echo "New record created successfully";
        $_SESSION['NewUserSuccess'] = "New User updated!";
        $_SESSION['logged_in'] = 'true';
        $_SESSION['current_user_mail'] = $Email;
    }
} else {
    // echo "Error: Couldn't write to the database";
    $_SESSION['logged_in'] = 'false';
    $_SESSION['current_user_mail']=$Email;
    $_SESSION["NewUserSuccess"] = "Account already exists";
}
echo "<script type='text/javascript'> document.location = './index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css'</script>";
// exit();