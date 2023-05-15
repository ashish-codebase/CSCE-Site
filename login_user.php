<?php
// Start a new session
@session_start();
 
$_SESSION['logged_in'] = 'false';

$_SESSION['current_user_mail']='';

// User Login credentials
$Email = $_POST['Email'];
$Password = $_POST['Password'];
echo $Email;

$database = new PDO('sqlite:./Data/WebsiteDatabase.db');

$query_txt = "SELECT * FROM `users` WHERE Email= '$Email'";
$statement = $database->query($query_txt);
$result = $statement->fetch(PDO::FETCH_ASSOC);
// $rowCount = $result['count'];
if(is_null($result)||$result==false)
{
    $_SESSION['logged_in'] = 'false';
    $_SESSION['current_user_mail']='';
    $_SESSION['NewUserSuccess'] = "User already exists.";

}
else{
    $_SESSION['logged_in'] = 'true';
    $_SESSION['current_user_mail']=$Email;
}

header("Location: ./index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css");