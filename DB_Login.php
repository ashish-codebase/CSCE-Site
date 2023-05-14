<?php
// $database = new PDO('sqlite:./Data/WebsiteDatabase.db');
// $query = "SELECT * FROM 'users'";
// $result = $database->query($query);

// foreach ($result as $row) {
//    echo "Email: " . $row['Email'] . "<br>";
//    echo "FName: " . $row['FName'] . "<br>";
//    echo "LName: " . $row['LName'] . "<br><br>";
// }




// class credentials_localhost
// {
//     private $servername;
//     private $username;
//     private $password;
//     private $dbname;
//     public $connection_error=false;
//     public function __construct($servername = "localhost", $username = "root", $password = "", $dbname = "internet_class")
//     {
//         $this->servername = $servername;
//         $this->username = $username;
//         $this->password = $password;
//         $this->dbname = $dbname;
//     }

//     public function login()
//     {
//         $conn_local = new mysqli();
//         // Create connection
//         try {
//             $conn_local = mysqli_connect(hostname: $this->servername, username: $this->username, password: $this->password, database: $this->dbname);
//         } catch (Exception $e) {
//             // echo $e->getMessage();
//             $this->connection_error=true;
//         } finally {
//             // Return the connection
//             return $conn_local;
//         }
//     }
// }
// class credentials_live
// {
//     private $servername;
//     private $username;
//     private $password;
//     private $dbname;
//     public $connection_error=false;
//     public function __construct($servername = "localhost", $username = "id20717158_csce", $password = "Hanapajwa_101", $dbname = "id20717158_csce")
//     {
//         $this->servername = $servername;
//         $this->username = $username;
//         $this->password = $password;
//         $this->dbname = $dbname;
//     }


//     public function login()
//     {
//         $conn_live = new mysqli();
//         // Create connection
//         try {
//            $conn_live = mysqli_connect(hostname: $this->servername, username: $this->username, password: $this->password, database: $this->dbname);
//         } catch (Exception $e) {
//             // echo $e->getMessage();
//             $this->connection_error=true;
//         } finally {
//             // Return the connection
//             return $conn_live;
//         }
//     }
// }

// $local = new credentials_localhost();
// $conn_local =$local->login();

// $live = new credentials_live();
// $conn_live = $live->login();
// try{
//     @mysqli_select_db($conn_local,'internet_class');
// }
// catch (Exception $ex){
// }
// try{
//     @mysqli_select_db($conn_live,'id20717158_csce');
// }
// catch (Exception $ex){
// }


// if (!$local->connection_error) {
//     $conn = $conn_local;
// } elseif (!$live->connection_error) {
//     $conn = $conn_live;
// } else {
//     die("Connection failed: ");
// }
