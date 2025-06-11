<!DOCTYPE html>
<html>
<head>
    <title>String Manipulation Tool</title>
</head>
<body>
    <h2>String Manipulation Tool</h2>
    <form method="post">
        <label>Enter a string:</label><br>
        <input type="text" name="input_string"><br>
        <label>Word to replace (optional):</label><br>
        <input type="text" name="search_word"><br>
        <label>Replace with (optional):</label><br>
        <input type="text" name="replace_word"><br>
        <input type="submit" value="Process">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST["input_string"];
        $search = $_POST["search_word"];
        $replace = $_POST["replace_word"];

        // ១. ប្រវែង
        echo "<h3>Results:</h3>";
        echo "Length: " . strlen($input) . "<br>";

        // ២. អក្សរធំ និងតូច
        echo "Uppercase: " . strtoupper($input) . "<br>";
        echo "Lowercase: " . strtolower($input) . "<br>";

        // ៣. កាត់ ៥ តួអក្សរដំបូង
        echo "First 5 characters: " . substr($input, 0, 5) . "<br>";

        // ៤. ជំនួសពាក្យ
        if (!empty($search) && !empty($replace)) {
            echo "After replacement: " . str_replace($search, $replace, $input) . "<br>";
        }

        // ៥. ពិនិត្យអ៊ីមែល
        $pattern = "/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/";
        if (preg_match($pattern, $input, $matches)) {
            echo "Email found: " . $matches[0] . "<br>";
        } else {
            echo "No email found.<br>";
        }
    }
    ?>
</body>
</html>