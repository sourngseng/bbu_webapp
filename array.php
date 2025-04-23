<?php
    // Indexed array
    $fruits = array("Apple", "Banana", "Orange");
    // ឬ ទម្រង់សរសេរថ្មី:
    $fruits = ["Apple", "Banana", "Orange"];
    
    // echo $fruits[0]; // Apple
    
    // Associative array (key-value)
    $person = [
        "name" => "Bopha",
        "age" => 30,
        "city" => "Phnom Penh"
    ];
    
    // echo $person["name"]; // Bopha

    // Multidimensional array
    $people = [
        [
            "name" => "Bopha",
            "age" => 30,
            "city" => "Phnom Penh"
        ],
        [
            "name" => "Sophea",
            "age" => 25,
            "city" => "Siem Reap"
        ]
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Result Index Array</h1>
    <p>First fruit: <?php echo $fruits[0]; ?></p>
    <p>Second fruit: <?php echo $fruits[1]; ?></p>
    <p>Third fruit: <?php echo $fruits[2]; ?></p>


    <h1>Result Associative Array</h1>
    <p>Name: <span><?php echo $person["name"]; ?></span></p>
    <p>Age: <span><?php echo $person["age"]; ?></span></p>
    <p>City: <span><?php echo $person["city"]; ?></span></p>

    <h1>Result Multidimensional Array</h1>
    <p>Name: <span><?php echo $people[0]["name"]; ?></span></p>
    <p>Age: <span><?php echo $people[0]["age"]; ?></span></p>
    <p>City: <span><?php echo $people[0]["city"]; ?></span></p>

    <p>Name: <span><?php echo $people[1]["name"]; ?></span></p>
    <p>Age: <span><?php echo $people[1]["age"]; ?></span></p>
    <p>City: <span><?php echo $people[1]["city"]; ?></span></p>
    
    <h1>Result Multidimensional Array Loop</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>City</th>
        </tr>
        <?php foreach ($people as $person): ?>
            <tr>
                <td><?php echo $person["name"]; ?></td>
                <td><?php echo $person["age"]; ?></td>
                <td><?php echo $person["city"]; ?></td>
            </tr>
        <?php endforeach; ?>
</body>
</html>