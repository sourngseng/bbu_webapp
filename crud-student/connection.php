<?php
// // Connection Establishment
// $servername = "localhost";
    $username = "root";
    $password = "";
// $dbname = "bbu_crud";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";

// // Close connection
// $conn->close();



try {
    $conn = new PDO("mysql:host=localhost;dbname=bbu_crud", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>