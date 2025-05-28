<?php
// User Definition

// កំណត់ function
function sayHello($name = "មិត្តភក្តិ") {
    echo "សួស្តី, $name!<br>";
}

// កំណត់ function
function sayGoodbye($name) {
    echo "លាហើយ, $name!<br>";
}

// ហៅ function
sayHello(); // បង្ហាញ: សួស្តី, មិត្តភក្តិ!
sayGoodbye("John"); // បង្ហាញ: លាហើយ, John!

sayHello("សុខា"); // បង្ហាញ: សួស្តី, សុខា!
sayGoodbye("សុខា"); // បង្ហាញ: លាហើយ, សុខា!
?>