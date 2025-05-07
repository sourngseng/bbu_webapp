<!DOCTYPE html>
<html>
<head>
    <title>ទំព័រ PHP ដំបូងរបស់ខ្ញុំ</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        } */
        .container {
            background-color: white;
            padding: 20px;
            /* border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1); */

            border-radius: 35px 35px 35px 35px;
            -webkit-border-radius: 35px 35px 35px 35px;
            -moz-border-radius: 35px 35px 35px 35px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #4285f4;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <?php include_once('includes/navbar.php'); ?>
    <div class="container mt-5 bg-secondary text-white  p-3">
        <h1>ទំព័រ PHP ដំបូងរបស់ខ្ញុំ</h1>
        
        <?php
            // កំណត់ព័ត៌មានផ្ទាល់ខ្លួន
            $name = "ឯកឧត្តម សេង ស៊ង់";
            $age = 28;
            $city = "សៀមរាប";
            $hobbies = ["ច្រៀង", "មើលកុណ", "ដើរលេង", "រៀនភាសា","ចូលខ្លឹបពេលសេដ"];
            $isStudent = true;
            
            // បង្ហាញព័ត៌មានផ្ទាល់ខ្លួន
            echo "<div class='info-item'><span class='label'>ឈ្មោះ៖</span> $name</div>";
            echo "<div class='info-item'><span class='label'>អាយុ៖</span> $age ឆ្នាំ</div>";
            echo "<div class='info-item'><span class='label'>ទីក្រុង៖</span> $city</div>";
            
            // បង្ហាញចំណង់ចំណូលចិត្ត
            echo "<div class='info-item'><span class='label'>ចំណង់ចំណូលចិត្ត៖</span> ";
            echo $hobbies[0] . ", " . $hobbies[1] . ", " . $hobbies[2] . ", " . $hobbies[3] . ", " . $hobbies[4];
            echo "</div>";
            
            // បង្ហាញស្ថានភាពនិស្សិត
            echo "<div class='info-item'><span class='label'>ជានិស្សិត៖</span> ";
            echo $isStudent ? "បាទ/ចាស" : "ទេ";
            echo "</div>";
            
            // បង្ហាញកាលបរិច្ឆេទ និងពេលវេលាបច្ចុប្បន្ន
            echo "<div class='info-item'><span class='label'>កាលបរិច្ឆេទ៖</span> " . date("Y-m-d") . "</div>";
            echo "<div class='info-item'><span class='label'>ពេលវេលា៖</span> " . date("H:i:s") . "</div>";
            
            // គណនាឆ្នាំកំណើត
            $birthYear = date("Y") - $age;
            echo "<div class='info-item'><span class='label'>ឆ្នាំកំណើតប្រហាក់ប្រហែល៖</span> $birthYear</div>";
        ?>
        
        <h2>ការគណនាងាយៗ</h2>
        <?php
            // ធ្វើការគណនាងាយៗ
            $num1 = 10;
            $num2 = 5;
            
            echo "<div class='info-item'><span class='label'>លេខទី១៖</span> $num1</div>";
            echo "<div class='info-item'><span class='label'>លេខទី២៖</span> $num2</div>";
            echo "<div class='info-item'><span class='label'>ផលបូក៖</span> " . ($num1 + $num2) . "</div>";
            echo "<div class='info-item'><span class='label'>ផលដក៖</span> " . ($num1 - $num2) . "</div>";
            echo "<div class='info-item'><span class='label'>ផលគុណ៖</span> " . ($num1 * $num2) . "</div>";
            echo "<div class='info-item'><span class='label'>ផលចែក៖</span> " . ($num1 / $num2) . "</div>";
        ?>
    </div>


    <div class="container-fluid mt-5 bg-secondary text-white  p-3">
        <h1>ទំព័រ PHP ដំបូងរបស់ខ្ញុំ</h1>
        
        <?php
            // កំណត់ព័ត៌មានផ្ទាល់ខ្លួន
            $name = "ឯកឧត្តម សេង ស៊ង់";
            $age = 28;
            $city = "សៀមរាប";
            $hobbies = ["ច្រៀង", "មើលកុណ", "ដើរលេង", "រៀនភាសា","ចូលខ្លឹបពេលសេដ"];
            $isStudent = true;
            
            // បង្ហាញព័ត៌មានផ្ទាល់ខ្លួន
            echo "<div class='info-item'><span class='label'>ឈ្មោះ៖</span> $name</div>";
            echo "<div class='info-item'><span class='label'>អាយុ៖</span> $age ឆ្នាំ</div>";
            echo "<div class='info-item'><span class='label'>ទីក្រុង៖</span> $city</div>";
            
            // បង្ហាញចំណង់ចំណូលចិត្ត
            echo "<div class='info-item'><span class='label'>ចំណង់ចំណូលចិត្ត៖</span> ";
            echo $hobbies[0] . ", " . $hobbies[1] . ", " . $hobbies[2] . ", " . $hobbies[3] . ", " . $hobbies[4];
            echo "</div>";
            
            // បង្ហាញស្ថានភាពនិស្សិត
            echo "<div class='info-item'><span class='label'>ជានិស្សិត៖</span> ";
            echo $isStudent ? "បាទ/ចាស" : "ទេ";
            echo "</div>";
            
            // បង្ហាញកាលបរិច្ឆេទ និងពេលវេលាបច្ចុប្បន្ន
            echo "<div class='info-item'><span class='label'>កាលបរិច្ឆេទ៖</span> " . date("Y-m-d") . "</div>";
            echo "<div class='info-item'><span class='label'>ពេលវេលា៖</span> " . date("H:i:s") . "</div>";
            
            // គណនាឆ្នាំកំណើត
            $birthYear = date("Y") - $age;
            echo "<div class='info-item'><span class='label'>ឆ្នាំកំណើតប្រហាក់ប្រហែល៖</span> $birthYear</div>";
        ?>
        
        <h2>ការគណនាងាយៗ</h2>
        <?php
            // ធ្វើការគណនាងាយៗ
            $num1 = 10;
            $num2 = 5;
            
            echo "<div class='info-item'><span class='label'>លេខទី១៖</span> $num1</div>";
            echo "<div class='info-item'><span class='label'>លេខទី២៖</span> $num2</div>";
            echo "<div class='info-item'><span class='label'>ផលបូក៖</span> " . ($num1 + $num2) . "</div>";
            echo "<div class='info-item'><span class='label'>ផលដក៖</span> " . ($num1 - $num2) . "</div>";
            echo "<div class='info-item'><span class='label'>ផលគុណ៖</span> " . ($num1 * $num2) . "</div>";
            echo "<div class='info-item'><span class='label'>ផលចែក៖</span> " . ($num1 / $num2) . "</div>";
        ?>
    </div>
</body>
</html>