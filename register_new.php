<?php
@session_start();
// echo "register working";
// Start a new session
// if(session_status() === PHP_SESSION_NONE) 
// session_status() === PHP_SESSION_ACTIVE ?: session_start();
if (!isset($_SESSION['NewUserSuccess'])){
    $_SESSION['logged_in'] = 'false';
    $_SESSION['NewUserSuccess'] = '';
}

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
    $_SESSION['NewUserSuccess']="New User updated!";

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
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    header("Location: ./index.php?page_path=./pages/RegisterMain.php&page_css=./CSS/RegisterMain.css");

    // echo "Email address does not exist";
}


// // Prepare the statement
// $stmt = $conn->prepare($query_txt);

// // Bind the parameter
// $stmt->bind_param("s", $Email);

// // Execute the statement
// $stmt->execute();

// // Fetch the result
// $result = $stmt->get_result();

// // Check if any rows were returned
// if ($result->num_rows > 0) {
//     // Email address already exists in the database
//     echo "Email address already exists.";
// } else {
//     // Email address doesn't exist in the database
//     echo "Email address is available.";
// }



// echo $query_txt;
// $result = $conn->query($query_txt);

// $emailCount = mysqli_num_rows($result);

// echo "Total Email accouts in the database =" . $emailCount."<br><br>";
// if ($Email == "" || $Email == null || $Password=="" || $Password==null) {
//     echo "Email & Password cannot be empty.";
// }
// if ($result != null && $emailCount > 0) {
//     $row = mysqli_fetch_assoc($result);
//     echo "<p>Database email: " . $row["Email"] . "</p>";
//     echo "<p>Your entered email ID = " . $_POST['Email'] . "</p>";
// } else {
//     echo "Saving record for: " . $_POST["FName"] . " " . $_POST['LName'] . "&amp;<br><br>Email: " . $_POST["Email"] . "<br>";

//     //mysql_select_db("classcsce", $conn);
//     $sql = "INSERT INTO customers (Email , FName, LName, Phone, Password)
//         VALUES (
//         '$_POST[Email]',
//         '$_POST[FNname]',
//         '$_POST[LName]',
//         '$_POST[Phone]',
//         '$_POST[Password]'
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }

    $conn->close();
// }
?>