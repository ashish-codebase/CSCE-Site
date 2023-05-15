<?php
// Start a new session
$lifetime=600; //Number of seconds cookie stays active after last visit.
@session_start();
setcookie(session_name(),session_id(),time()+$lifetime);
 
$_SESSION['logged_in'] = 'false';

$_SESSION['current_user_mail']='';

// User Login credentials
$Email = $_POST['Email'];
$Password = $_POST['Password'];


// Read data from local DB file
$database = new PDO('sqlite:./Data/WebsiteDatabase.db');

$query_txt = "SELECT * FROM `users` WHERE Email= '$Email'";
$statement = $database->query($query_txt);
$result = $statement->fetch(PDO::FETCH_ASSOC);
// $rowCount = $result['count'];
if(is_null($result)||$result==false)
{
    $_SESSION['logged_in'] = 'false';
    $_SESSION['current_user_mail']='';
    $_SESSION['NewUserSuccess'] = "User not found.";

}
else{
    $_SESSION['logged_in'] = 'true';
    $_SESSION['current_user_mail']=$Email;
    $_SESSION['NewUserSuccess'] = "You are logged in as ".$Email;
}

// header("Location: ./index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css");
echo "<script type='text/javascript'> document.location = './index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css'</script>";
exit();