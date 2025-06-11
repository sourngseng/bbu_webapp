<?php
    // Indexed Array
    $fruits = ["Apple", 
                "Banana", 
                "Orange"
              ];
    echo $fruits[2]; // លទ្ធផល: Orange
    echo "<br>";
    // Associative Array
    $student = [
        "id"=>"001",
        "name" => "Sok", 
        "age" => 20,
        "address" => "Phnom Penh"
    ];
    echo $student["name"]." is ".$student["age"]." years old."; // លទ្ធផល: Sok is 20 years old.
    echo "<br>";
    // Multidimensional Array
    $classes = [
        ["id"=>"001", "name"=>"Sok", "age"=>20],
        ["id"=>"002", "name"=>"Srey", "age"=>22],
        ["id"=>"003", "name"=>"Dara", "age"=>21]
    ];
    echo $classes[1]["name"]." is ".$classes[1]["age"]." years old."; // លទ្ធផល: Srey is 22 years old.
?>