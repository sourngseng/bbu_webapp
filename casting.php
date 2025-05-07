<?php
    $stringNumber = "42";
    var_dump($stringNumber); // បង្ហាញតម្លៃ និងប្រភេទ
    $number = (int)$stringNumber; // ប្លែងពី string ទៅ integer
    
    var_dump($number); // បង្ហាញតម្លៃ និងប្រភេទ
    $floatNumber = 3.14;
    $intNumber = (int)$floatNumber; // ប្លែងពី float ទៅ integer
    
    $numericValue = 123;
    $stringValue = (string)$numericValue; // ប្លែងពី integer ទៅ string
?>