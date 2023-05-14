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

$database = new PDO('sqlite:./Data/WebsiteDatabase.db');

$query_txt = "SELECT * FROM `users` WHERE Email= '$Email'";
$statement = $database->query($query_txt);
$result = $statement->fetch(PDO::FETCH_ASSOC);
$rowCount = $result['count'];
if($rowCount>0)
{
    $_SESSION['logged_in'] = 'true';
    $_SESSION['current_user_mail']=$Email;
    $result = $database->query($query_txt);

    foreach ($result as $row) {
    echo "Email: " . $row['Email'] . "<br>";
    echo "FName: " . $row['FName'] . "<br>";
    echo "LName: " . $row['LName'] . "<br><br>";
    }
}
else{
    $_SESSION['logged_in'] = 'false';
    $_SESSION['current_user_mail']='';
}

header("Location: ./index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css");

// Execute SQL statement
// $result = mysqli_query($conn, $query_txt);

// // Check if email address already exists in database
// if (mysqli_num_rows($result) > 0) {
//     $_SESSION['logged_in'] = 'true';
//     $_SESSION['current_user_mail']=$Email;
//     // $_SESSION['NewUserSuccess']="";
//     echo "User Logged in";
//     header("Location: ./index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css");
//     $conn->close();
//     die();
// } 
// else {
    
    
//     header("Location: ./index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css");
//     $conn->close();
//     die();
// }
// die();

//     $conn->close();
