<?php
$host = "localhost";
$db_name = "department";
$username = "root";
  
try {
    session_start();
    $conn = new mysqli($host, $username, "", $db_name);

}
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>