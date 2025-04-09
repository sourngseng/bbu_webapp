<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
</head>
<body>
    <h1>សិក្សាស្វែងយល់ពីអថេ(Variables)</h1>
    <?php 
        // Defining variables
        $name = "John Doe";
        $age = 30;
        $address = "123 Main St, Cityville, Country";
        $phone = "123-456-7890";

        $Name="សុខ សុវណ្ណ";
        $Age=25;
        $Address="ភូមិ ស្រែសមុទ្រ ស្រុក កំពង់សោម ខេត្ត កំពង់ស្ពឺ";
        $Phone="012-345-678";  
        
        $firstName = "John";
        $FirstName= "John"; // Case-sensitive variable name
        $first_name = "John"; // Case-sensitive variable name

        $lastName = "Doe";
        $fullName = $firstName . " " . $lastName; // Concatenation of strings
        $age = 30;

        var_dump($name); // Display the type and value of the variable $name
        echo "<br>";
    ?>
    a-z,A-Z,0-9,underscore(_), dollar sign($) 
    <h2>ព័ត៌មានសិស្ស</h2>
    <p>ឈ្មោះ : <span><?php echo $name; ?></span></p>
    <p>ឈ្មោះ : <span><?php echo $Name; ?></span></p>

    <?php
        $name=34; // Reassigning a new value to the variable $name
        echo "<p>ឈ្មោះ : <span>$name</span></p>"; // This will output 34
        var_dump($name); // Display the type and value of the variable $name
        echo "<br>";
        $_name = "John"; // Invalid variable name (starts with a number)
        $name = "John"; // Invalid variable name (contains a hyphen)
    ?>
</body>
</html>