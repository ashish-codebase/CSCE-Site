<?php
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
// foreach($result as $row)
// {
//     print $row['email'] . nl2br("\n\r");
// }

// $emailCount = mysqli_num_rows($result);
// echo "Email matches found in the database =" . $emailCount."<br><br>";
// if ($_POST['email'] == "" || $_POST['email'] == null) {
//     echo "Email cannot be empty.";
// }
// if ($result != null && $emailCount > 0) {
//     $row = mysqli_fetch_assoc($result);
//     echo "<p>Database email: " . $row["Email"] . "</p>";
//     echo "<p>Your entered email ID = " . $_POST['email'] . "</p>";
// } else {
//     echo "Saving record for: " . $_POST["fname"] . " " . $_POST['lname'] . "&amp;<br><br>Email: " . $_POST["email"] . "<br>";

//     //mysql_select_db("classcsce", $conn);
//     $sql = "INSERT INTO customers (Email , FName, LName, PhoneNo, Address)
//         VALUES (
//         '$_POST[email]',
//         '$_POST[fname]',
//         '$_POST[lname]',
//         '$_POST[phone]',
//         '$_POST[address]'
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }

//     $conn->close();
// }
?>