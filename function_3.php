<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scope of Variables</title>
</head>
<body>
    <?php
        $globalVar = "ខ្ញុំជា global variable asdlfsldfa !!!";

        function testScope() {
            $localVar = "ខ្ញុំជា local variable !!!";
            echo $localVar . "<br>"; // អាចចូលប្រើបាន
            
            // ដើម្បីចូលប្រើ global variable នៅក្នុង function
            global $globalVar;
            echo $globalVar . "<br>"; // អាចចូលប្រើបានបន្ទាប់ពីប្រកាស global
        }

        testScope();
        echo $globalVar . "<br>"; // អាចចូលប្រើបាន
        // echo $localVar; // កំហុស - $localVar មិនបានកំណត់នៅក្រៅ function
        ?>

        <?php
            // គណនា factorial របស់លេខមួយ
            function factorial($n) {
                if ($n <= 1) {
                    return 1;
                } else {
                    return $n * factorial($n - 1);
                }
            }

            echo factorial(10); // 10 * 9 * 8 * 7 * 6 * 5 * 4 * 3 * 2 * 1 = 3628800
        ?>
</body>
</html>