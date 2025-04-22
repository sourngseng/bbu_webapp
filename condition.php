<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions</title>
</head>
<body>
    <h1>if statement</h1>
    <?php
        $x = 14; // global scope
        if ($x > 5) {
            echo "<p>អថេរ x មានតម្លៃធំជាង 5</p>";
            echo "<p>អថេរ x មានតម្លៃ $x</p>";
        }     
    ?>

    <h1>if else statement</h1>
    <?php
        $x = 4; // global scope
        if ($x > 5) {
            echo "<p>អថេរ x មានតម្លៃធំជាង 5</p>";
            echo "<p>អថេរ x មានតម្លៃ $x</p>";
        } else {
            echo "<p>អថេរ x មានតម្លៃតិចជាង 5</p>";
            echo "<p>អថេរ x មានតម្លៃ $x</p>";
        }
    ?>

    <h1>if elseif Statement</h1>
    <?php 
        $x = 15; // global scope
        if ($x > 5) {
            echo "<p>អថេរ x មានតម្លៃធំជាង 5</p>";
            echo "<p>អថេរ x មានតម្លៃ $x</p>";
        } elseif ($x == 5) {
            echo "<p>អថេរ x មានតម្លៃស្មើនឹង 5</p>";
            echo "<p>អថេរ x មានតម្លៃ $x</p>";
        } else {
            echo "<p>អថេរ x មានតម្លៃតិចជាង 5</p>";
            echo "<p>អថេរ x មានតម្លៃ $x</p>";
        }    

        $a= 10; // global scope
        $b= 20; // global scope
        if ($a < 10) $b = "Hello"; // single line if statement
        if ($a < 10) { $b = "Hello"; } // multi line if statement
        if ($a < 10) { $b = "Hello"; } else { $b = "Goodbye"; } // multi line if else statement
    ?>

    <h1>Ternary Operator</h1>
    <?php
    $a = 19;

    $b = $a < 10 ? "Hello" : "Good Bye";
    
    echo $b; // Output: Hello
    echo "<p>អថេរ a មានតម្លៃ $a</p>";    
    ?>
</body>
</html>