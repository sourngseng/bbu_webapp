<?php
// Accessing GET data
if (isset($_GET['query'])) {
  $query = $_GET['query'];
  echo "Search query: " . htmlspecialchars($query);
}

// Accessing POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "<br>Username: " . htmlspecialchars($username);
    echo "<br>Email: " . htmlspecialchars($email);
    echo "<br>Password: " . htmlspecialchars($password);
}
?>