<?php
    //script.php
    if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the input value from the form
        // $inputValue = $_POST['userName'] ?? '';
        // $inputValue = isset($_POST['userName']) ? $_POST['userName'] : '';
        //using get method
        $inputValue = $_GET['userName'] ?? '';
        
        // Process the input value (for example, you can save it to a database or display it)
        echo "You submitted: " . htmlspecialchars($inputValue);
        echo "<br/>You submitted: $inputValue";
    } else {
        echo "No data submitted.";
    }
?>