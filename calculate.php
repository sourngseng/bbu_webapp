<!DOCTYPE html>
<html>
<head>
    <title>កម្មវិធីគណនាលេខងាយៗ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .calculator {
            background-color: #f5f5f5;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="number"], select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9f7ef;
            border-radius: 4px;
            border-left: 5px solid #4CAF50;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h1>កម្មវិធីគណនាលេខងាយៗ</h1>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="num1">លេខទី១:</label>
                <input type="number" id="num1" name="num1" required step="any" value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="num2">លេខទី២:</label>
                <input type="number" id="num2" name="num2" required step="any" value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="operation">ជ្រើសរើសប្រមាណវិធី:</label>
                <select id="operation" name="operation">
                    <option value="add" <?php echo (isset($_POST['operation']) && $_POST['operation'] == 'add') ? 'selected' : ''; ?>>បូក (+)</option>
                    <option value="subtract" <?php echo (isset($_POST['operation']) && $_POST['operation'] == 'subtract') ? 'selected' : ''; ?>>ដក (-)</option>
                    <option value="multiply" <?php echo (isset($_POST['operation']) && $_POST['operation'] == 'multiply') ? 'selected' : ''; ?>>គុណ (×)</option>
                    <option value="divide" <?php echo (isset($_POST['operation']) && $_POST['operation'] == 'divide') ? 'selected' : ''; ?>>ចែក (÷)</option>
                    <option value="power" <?php echo (isset($_POST['operation']) && $_POST['operation'] == 'power') ? 'selected' : ''; ?>>ស្វ័យគុណ (^)</option>
                    <option value="modulus" <?php echo (isset($_POST['operation']) && $_POST['operation'] == 'modulus') ? 'selected' : ''; ?>>មូឌុល (%)</option>
                </select>
            </div>
            
            <button type="submit" name="calculate">គណនា</button>
        </form>
        
        <?php
        // កំណត់ functions សម្រាប់ប្រមាណវិធីផ្សេងៗ
        function add($a, $b) {
            return $a + $b;
        }
        
        function subtract($a, $b) {
            return $a - $b;
        }
        
        function multiply($a, $b) {
            return $a * $b;
        }
        
        function divide($a, $b) {
            if ($b == 0) {
                return "មិនអាចចែកនឹងលេខសូន្យបានទេ";
            }
            return $a / $b;
        }
        
        function power($a, $b) {
            return pow($a, $b);
        }
        
        function modulus($a, $b) {
            if ($b == 0) {
                return "មិនអាចរកមូឌុលនឹងលេខសូន្យបានទេ";
            }
            return $a % $b;
        }
        
        // ដំណើរការការគណនានៅពេលចុចប៊ូតុង
        if (isset($_POST['calculate'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];
            $result = 0;
            $operationSymbol = "";
            
            // ប្រើប្រាស់ switch statement ដើម្បីជ្រើសរើសប្រមាណវិធី
            switch ($operation) {
                case 'add':
                    $result = add($num1, $num2);
                    $operationSymbol = "+";
                    break;
                case 'subtract':
                    $result = subtract($num1, $num2);
                    $operationSymbol = "-";
                    break;
                case 'multiply':
                    $result = multiply($num1, $num2);
                    $operationSymbol = "×";
                    break;
                case 'divide':
                    $result = divide($num1, $num2);
                    $operationSymbol = "÷";
                    break;
                case 'power':
                    $result = power($num1, $num2);
                    $operationSymbol = "^";
                    break;
                case 'modulus':
                    $result = modulus($num1, $num2);
                    $operationSymbol = "%";
                    break;
                default:
                    $result = "ប្រមាណវិធីមិនត្រឹមត្រូវ";
            }
            
            // បង្ហាញលទ្ធផល
            echo '<div class="result">';
            echo "<h3>លទ្ធផល:</h3>";
            if (is_numeric($result)) {
                echo "$num1 $operationSymbol $num2 = $result";
            } else {
                echo $result; // បង្ហាញសារកំហុស
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>