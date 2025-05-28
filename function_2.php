<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
        }
        p {
            margin-bottom: 10px;
        }
        h2 {
            color: #2980b9;
        }
        span.fail {
            font-weight: bold;
            color: #e74c3c;
        }
        span.pass {
            font-weight: bold;
            color: #2ecc71;
        }
    </style>
</head>
<body>
    <?php
        // កំណត់ function
        function sayHello($name = "Honey") {
            echo "សួស្តី, $name!<br>";
        }

        // កំណត់ function
        function sayGoodbye($name) {
            echo "លាហើយ, $name!<br>";
        }

        // កំណត់ function
        function personInfo($name, $age, $gender = "NA",$address = "NA") {
            echo "ឈ្មោះ: $name, អាយុ: $age, ភេទ: $gender, អាសយដ្ឋាន: $address<br>";
            
        }   

        // function with return
        function add($a, $b) {
            return $a + $b;
        }

        // calculate grade of student with 3 subjects
        function calculateGrade($subject1, $subject2, $subject3) {
            $total = $subject1 + $subject2 + $subject3;
            $average = $total / 3;
            $grade= "";
            if ($average >= 90) {
                $grade = "A";
            } elseif ($average >= 80) {
                $grade = "B";
            } elseif ($average >= 70) {
                $grade = "C";
            } elseif ($average >= 60) {
                $grade = "D";
            } else {
                $grade = "F";
            }           
            return $grade;
        }
    
    ?>

    <h1>Function Example</h1>
    <p>Function with default parameter:</p>
        <?php
            sayHello(); // បង្ហាញ: សួស្តី, Bopha!
        ?>
    <p>Function without default parameter:</p>
    <?php
        sayGoodbye("John"); // បង្ហាញ: លាហើយ, John!
    ?>
    <p>Function with multiple parameters:</p>
    <?php
        personInfo("សុខា", 25); // បង្ហាញ: ឈ្មោះ: សុខា, អាយុ: 25
        echo "<br>";
        personInfo("មេតា", 25, "ស្រី", "កំពត"); // បង្ហាញ: ឈ្មោះ: មេតា, អាយុ: 25, ភេទ: ស្រី, អាសយដ្ឋាន: កំពត

    ?>

    <p>Function with return:</p>
    <?php
        $result = add(51, 10);
        echo "ផលបូក: $result<br>"; // បង្ហាញ: 15
    ?>
    <p>Function with return:</p>
    <?php
        $grade = calculateGrade(90, 90, 95);        
    ?>
    <h2>Grade: <span class="pass"><?php echo $grade; ?></span></h2>
    <h2>Grade: <span class="fail"><?php echo calculateGrade(50, 30, 25); ?></span></h2>
</body>
</html>