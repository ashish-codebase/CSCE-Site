<?php
// SQL Login and server details:

class credentials_localhost {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "internet_class";
    function login (){
        // Create connection
        $conn = new mysqli( hostname: $this->servername, username: $this->username , password: $this->password, database: $this->dbname);
        return $conn;
        }
}
class credentials_live {
    private $servername = "localhost";
    private $username = "id20717158_csce";
    private $password = "Hanapajwa_101";
    private $dbname = "id20717158_csce";
    function login():mysqli {
        // Create connection
        $conn = new mysqli( hostname: $this->servername, username: $this->username , password: $this->password, database: $this->dbname);
        return $conn;
        }
}


$temp = new credentials_localhost();
$conn_local = $temp->login();

$temp = new credentials_live();
$conn_live = $temp->login();


$conn = new mysqli();

if (!$conn_local->connect_error) {
    $conn = $conn_local;
}
elseif (!$conn_live->connect_error){
    $conn = $conn_live;
}
else{
    die("Connection failed: " . $conn->connect_error);
}

