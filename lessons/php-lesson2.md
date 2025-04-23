# មេរៀនទី ២: PHP Control Structures & Functions

## គោលបំណងមេរៀន
- យល់ដឹងពីរចនាសម្ព័ន្ធគ្រប់គ្រង (Control Structures) ក្នុង PHP រួមមាន conditional statements និង loops
- ចេះប្រើប្រាស់ conditional statements (if, else, switch) ក្នុងកម្មវិធី PHP
- ចេះប្រើប្រាស់ loops ដូចជា for, while, និង foreach ដើម្បីដំណើរការទិន្នន័យដដែលៗ
- យល់ដឹងពីរបៀបបង្កើត និងប្រើប្រាស់ functions ក្នុង PHP
- សាកល្បងប្រើប្រាស់ built-in functions របស់ PHP សម្រាប់កិច្ចការទូទៅ
- ចេះបង្កើត និងប្រើប្រាស់ user-defined functions ដើម្បីកាត់បន្ថយការសរសេរកូដដដែលៗ
- អនុវត្តជំនាញទាំងនេះដើម្បីបង្កើតកម្មវិធីគណនាលេខងាយៗ

## ១. ការប្រើប្រាស់ Conditional statements (if, else, switch)

Conditional statements អនុញ្ញាតឱ្យអ្នកប្រតិបត្តិកូដដោយផ្អែកលើលក្ខខណ្ឌជាក់លាក់។ PHP មាន conditional statements ដូចខាងក្រោម:

### if Statement

`if` statement ប្រតិបត្តិកូដប្រសិនបើលក្ខខណ្ឌមានតម្លៃ true:

```php
<?php
$score = 85;

if ($score >= 60) {
    echo "អ្នកបានជាប់!";
}
?>
```

### if...else Statement

`if...else` ប្រតិបត្តិកូដមួយប្រសិនបើលក្ខខណ្ឌជា true ហើយកូដផ្សេងទៀតប្រសិនបើលក្ខខណ្ឌជា false:

```php
<?php
$score = 55;

if ($score >= 60) {
    echo "អ្នកបានជាប់!";
} else {
    echo "អ្នកបានធ្លាក់។ សូមព្យាយាមម្តងទៀត។";
}
?>
```

### if...elseif...else Statement

`if...elseif...else` អនុញ្ញាតឱ្យអ្នកពិនិត្យលក្ខខណ្ឌច្រើនជាបន្តបន្ទាប់:

```php
<?php
$score = 85;

if ($score >= 90) {
    echo "ពិន្ទុរបស់អ្នក: A";
} elseif ($score >= 80) {
    echo "ពិន្ទុរបស់អ្នក: B";
} elseif ($score >= 70) {
    echo "ពិន្ទុរបស់អ្នក: C";
} elseif ($score >= 60) {
    echo "ពិន្ទុរបស់អ្នក: D";
} else {
    echo "ពិន្ទុរបស់អ្នក: F";
}
?>
```

### Nested if Statements

អ្នកអាចដាក់ if statements ក្នុង if statements ផ្សេងទៀត:

```php
<?php
$score = 85;
$attendance = 90;

if ($score >= 60) {
    echo "អ្នកបានជាប់ការប្រលង! ";
    
    if ($attendance >= 80) {
        echo "អ្នកក៏មានវត្តមានល្អផងដែរ!";
    } else {
        echo "ប៉ុន្តែអ្នកគួរតែកែលម្អវត្តមាន។";
    }
} else {
    echo "អ្នកបានធ្លាក់ការប្រលង។";
}
?>
```

### Ternary Operator

Ternary operator ផ្តល់នូវវិធីសាស្ត្រខ្លីនៃការសរសេរ if...else statement:

```php
<?php
$score = 85;

// ទម្រង់: (condition) ? (value if true) : (value if false)
$result = ($score >= 60) ? "ជាប់" : "ធ្លាក់";

echo "លទ្ធផល: $result";
?>
```

### switch Statement

`switch` statement ប្រើប្រាស់ដើម្បីធ្វើការប្រៀបធៀបតម្លៃជាមួយករណីជាច្រើន:

```php
<?php
$day = 3;

switch ($day) {
    case 1:
        echo "ថ្ងៃចន្ទ";
        break;
    case 2:
        echo "ថ្ងៃអង្គារ";
        break;
    case 3:
        echo "ថ្ងៃពុធ";
        break;
    case 4:
        echo "ថ្ងៃព្រហស្បតិ៍";
        break;
    case 5:
        echo "ថ្ងៃសុក្រ";
        break;
    case 6:
        echo "ថ្ងៃសៅរ៍";
        break;
    case 7:
        echo "ថ្ងៃអាទិត្យ";
        break;
    default:
        echo "ថ្ងៃមិនត្រឹមត្រូវ";
}
?>
```

ពាក្យបញ្ជា `break` ប្រើដើម្បីបញ្ឈប់ការប្រតិបត្តិបន្ទាប់ពីរកឃើញករណីដែលត្រូវគ្នា។ ប្រសិនបើគ្មាន `break` ទេ វានឹងបន្តប្រតិបត្តិករណីផ្សេងទៀតរហូតដល់ឃើញ `break` ឬដល់ចុងនៃ switch statement។

ករណី `default` នឹងត្រូវប្រតិបត្តិប្រសិនបើគ្មានករណីណាត្រូវគ្នា។

### ឧទាហរណ៍ជាក់ស្តែង: កម្មវិធីពិនិត្យអាយុសម្រាប់ការចូលកម្សាន្តមជ្ឈមណ្ឌល

```php
<?php
$age = 17;
$hasParent = true;

if ($age >= 18) {
    echo "អ្នកអាចចូលបានដោយសេរី!";
} elseif ($age >= 13 && $hasParent) {
    echo "អ្នកអាចចូលបានដោយមានការអមដំណើរពីឪពុកម្តាយ។";
} elseif ($age >= 13 && !$hasParent) {
    echo "អ្នកត្រូវការឪពុកម្តាយអមដំណើរ។";
} else {
    echo "សូមអភ័យទោស អ្នកមានអាយុក្មេងពេកដើម្បីចូល។";
}

// បង្ហាញតម្លៃសំបុត្រដោយប្រើ switch
$ticketType = "";

switch (true) {
    case ($age < 6):
        $ticketType = "ឥតគិតថ្លៃ";
        break;
    case ($age >= 6 && $age <= 12):
        $ticketType = "សំបុត្រកុមារ";
        break;
    case ($age >= 13 && $age <= 17):
        $ticketType = "សំបុត្រយុវវ័យ";
        break;
    case ($age >= 18 && $age <= 59):
        $ticketType = "សំបុត្រមនុស្សពេញវ័យ";
        break;
    default:
        $ticketType = "សំបុត្រជនចាស់ជរា";
}

echo "<br>ប្រភេទសំបុត្ររបស់អ្នក: $ticketType";
?>
```

## ២. Loops (for, while, foreach)

Loops អនុញ្ញាតឱ្យអ្នកប្រតិបត្តិកូដដដែលៗដោយផ្អែកលើលក្ខខណ្ឌ ឬចំនួនដង។ PHP មាន loop ប្រភេទផ្សេងៗគ្នា:

### for Loop

`for` loop ប្រើសម្រាប់ប្រតិបត្តិកូដចំនួនដងជាក់លាក់:

```php
<?php
// បង្ហាញលេខពី 1 ដល់ 5
for ($i = 1; $i <= 5; $i++) {
    echo "លេខ: $i <br>";
}
?>
```

`for` loop មានផ្នែកបី:
1. ការចាប់ផ្តើម: `$i = 1` (អនុវត្តម្តងនៅពេលចាប់ផ្តើម loop)
2. លក្ខខណ្ឌ: `$i <= 5` (ត្រួតពិនិត្យមុនពេលប្រតិបត្តិ loop នីមួយៗ)
3. ការធ្វើឱ្យទាន់សម័យ: `$i++` (អនុវត្តបន្ទាប់ពីប្រតិបត្តិ loop នីមួយៗ)

### while Loop

`while` loop ប្រតិបត្តិកូដដរាបណាលក្ខខណ្ឌមានតម្លៃជា true:

```php
<?php
$i = 1;

// បង្ហាញលេខពី 1 ដល់ 5
while ($i <= 5) {
    echo "លេខ: $i <br>";
    $i++;
}
?>
```

### do...while Loop

`do...while` loop ដូច `while` loop ប៉ុន្តែលក្ខខណ្ឌត្រូវបានត្រួតពិនិត្យនៅចុងបញ្ចប់នៃ loop។ នេះធានាថា loop ត្រូវបានប្រតិបត្តិយ៉ាងហោចណាស់ម្តង:

```php
<?php
$i = 1;

// បង្ហាញលេខពី 1 ដល់ 5
do {
    echo "លេខ: $i <br>";
    $i++;
} while ($i <= 5);
?>
```

សូម្បីតែប្រសិនបើលក្ខខណ្ឌមិនពិតនៅពេលចាប់ផ្តើម loop ក៏អនុវត្តយ៉ាងហោចណាស់ម្តងដែរ:

```php
<?php
$i = 6;

// នឹងអនុវត្តម្តង ទោះបីជា $i > 5 ក៏ដោយ
do {
    echo "លេខ: $i <br>";
    $i++;
} while ($i <= 5);
?>
```

### foreach Loop

`foreach` loop ប្រើសម្រាប់ loop តាម arrays:

```php
<?php
$colors = ["ក្រហម", "ខៀវ", "បៃតង", "លឿង"];

// បង្ហាញធាតុទាំងអស់ក្នុង array
foreach ($colors as $color) {
    echo "ពណ៌: $color <br>";
}
?>
```

សម្រាប់ associative arrays អ្នកអាចទាញយកទាំង keys និង values:

```php
<?php
$person = [
    "name" => "សុខា",
    "age" => 25,
    "city" => "ភ្នំពេញ"
];

// បង្ហាញ keys និង values
foreach ($person as $key => $value) {
    echo "$key: $value <br>";
}
?>
```

### Break និង Continue

`break` ប្រើដើម្បីបញ្ឈប់ loop:

```php
<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 6) {
        break; // បញ្ឈប់ loop នៅពេល $i = 6
    }
    echo "លេខ: $i <br>";
}
?>
```

`continue` ប្រើដើម្បីរំលងការប្រតិបត្តិកូដដែលនៅសល់ក្នុង loop បច្ចុប្បន្ន ហើយបន្តទៅ iteration បន្ទាប់:

```php
<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 6) {
        continue; // រំលងនៅពេល $i = 6
    }
    echo "លេខ: $i <br>";
}
?>
```

### ឧទាហរណ៍ជាក់ស្តែង: បង្ហាញតារាងគុណ

```php
<?php
echo "<h2>តារាងគុណ</h2>";
echo "<table border='1'>";

// បង្កើតកំណត់
echo "<tr><th>&times;</th>";
for ($i = 1; $i <= 10; $i++) {
    echo "<th>$i</th>";
}
echo "</tr>";

// បង្កើតជួរដេក
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    echo "<th>$i</th>";
    
    // បង្កើតជួរឈរ
    for ($j = 1; $j <= 10; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }
    
    echo "</tr>";
}

echo "</table>";
?>
```

## ៣. Functions ក្នុង PHP

Functions ជួយអ្នកក្នុងការរៀបចំកូដជាប្លុកដែលអាចប្រើប្រាស់ឡើងវិញបាន។ វាធ្វើឱ្យកូដរបស់អ្នកកាន់តែមានរចនាសម្ព័ន្ធល្អ មានប្រសិទ្ធភាព និងងាយស្រួលថែទាំ។

### តើអ្វីជា Function?

Function គឺជាប្លុកកូដដែលអនុវត្តកិច្ចការជាក់លាក់។ វាអាចទទួលយកទិន្នន័យ (parameters) ដំណើរការទិន្នន័យ និងត្រឡប់លទ្ធផលត្រឡប់មកវិញ។

### អត្ថប្រយោជន៍នៃការប្រើប្រាស់ Functions

- **ភាពអាចប្រើឡើងវិញបាន**: អ្នកអាចកំណត់កូដម្តង ហើយប្រើវាច្រើនដង
- **ភាពងាយស្រួលក្នុងការអាន**: Functions ធ្វើឱ្យកូដអាចអានបានច្បាស់ជាង
- **ភាពងាយស្រួលក្នុងការថែទាំ**: ប្រសិនបើអ្នកត្រូវផ្លាស់ប្តូរកូដ អ្នកធ្វើវានៅកន្លែងតែមួយ
- **ភាពច្បាស់លាស់**: Functions ផ្តល់នូវការរៀបចំដែលងាយយល់
- **Abstraction**: លាក់ភាពស្មុគស្មាញរបស់កូដ

## ៤. ការប្រើប្រាស់ Built-in PHP functions

PHP មាន built-in functions ជាច្រើន។ ទាំងនេះគឺជា functions ដែលបានកំណត់ជាមុនដែលអ្នកអាចប្រើដើម្បីអនុវត្តកិច្ចការទូទៅ។

### String Functions

```php
<?php
$text = "Hello, World!";

// រកប្រវែង string
echo strlen($text); // 13

// រាប់ចំនួនពាក្យ
echo str_word_count($text); // 2

// ប្រែក្លាយទៅជាអក្សរតូច
echo strtolower($text); // hello, world!

// ប្រែក្លាយទៅជាអក្សរធំ
echo strtoupper($text); // HELLO, WORLD!

// ប្តូរអក្សរ
echo str_replace("World", "PHP", $text); // Hello, PHP!

// កាត់ string
echo substr($text, 0, 5); // Hello

// ផ្គុំ array ឱ្យក្លាយជា string
$arr = ["Hello", "World", "PHP"];
echo implode(" ", $arr); // Hello World PHP

// បំបែក string ទៅជា array
$str = "Hello,World,PHP";
$arr = explode(",", $str);
print_r($arr); // Array ( [0] => Hello [1] => World [2] => PHP )
?>
```

### Numeric Functions

```php
<?php
// បង្គត់លេខឡើង
echo round(3.7); // 4

// បង្គត់លេខចុះ
echo floor(3.7); // 3

// បង្គត់លេខឡើង
echo ceil(3.3); // 4

// តម្លៃដាច់ខាត (តម្លៃវិជ្ជមាន)
echo abs(-15); // 15

// square root
echo sqrt(16); // 4

// លេខចៃដន្យ
echo rand(1, 10); // លេខចៃដន្យចន្លោះ 1 និង 10
?>
```

### Array Functions

```php
<?php
$fruits = ["Apple", "Banana", "Orange", "Mango"];

// ចំនួនធាតុក្នុង array
echo count($fruits); // 4

// ពិនិត្យថាតើធាតុមានក្នុង array ឬអត់
echo in_array("Apple", $fruits); // 1 (true)

// បន្ថែមធាតុទៅចុង array
array_push($fruits, "Grape");
print_r($fruits); // Array ( [0] => Apple [1] => Banana [2] => Orange [3] => Mango [4] => Grape )

// លុបធាតុចុងក្រោយនៃ array
$last = array_pop($fruits);
echo $last; // Grape

// តម្រៀប array
sort($fruits);
print_r($fruits); // Array ( [0] => Apple [1] => Banana [2] => Mango [3] => Orange )

// ត្រឡប់ array
$reversed = array_reverse($fruits);
print_r($reversed); // Array ( [0] => Orange [1] => Mango [2] => Banana [3] => Apple )

// បំប្លែង array ទៅជា string
echo implode(", ", $fruits); // Apple, Banana, Mango, Orange
?>
```

### Date និង Time Functions

```php
<?php
// បង្ហាញកាលបរិច្ឆេទបច្ចុប្បន្ន
echo date("Y-m-d"); // e.g., 2023-07-10

// បង្ហាញពេលវេលាបច្ចុប្បន្ន
echo date("H:i:s"); // e.g., 15:30:45

// បង្ហាញកាលបរិច្ឆេទនិងពេលវេលាបច្ចុប្បន្ន
echo date("Y-m-d H:i:s"); // e.g., 2023-07-10 15:30:45

// បង្ហាញថ្ងៃនៃសប្តាហ៍
echo date("l"); // e.g., Monday

// ទាញយកពេលវេលា Unix timestamp
echo time(); // e.g., 1689013845

// បង្កើតកាលបរិច្ឆេទជាក់លាក់
echo mktime(14, 30, 0, 7, 10, 2023); // បង្កើត timestamp សម្រាប់ July 10, 2023 14:30:00

// គណនាចន្លោះពេល
$date1 = strtotime("2023-07-01");
$date2 = strtotime("2023-07-10");
$diff = $date2 - $date1;
echo "ចន្លោះពេល: " . ($diff / 86400) . " ថ្ងៃ"; // 9 ថ្ងៃ (86400 វិនាទីក្នុងមួយថ្ងៃ)
?>
```

### File System Functions

```php
<?php
// អានឯកសារ
$content = file_get_contents("example.txt");
echo $content;

// សរសេរទៅក្នុងឯកសារ
file_put_contents("example.txt", "Hello, this is a test!");

// ពិនិត្យថាតើឯកសារមានឬអត់
if (file_exists("example.txt")) {
    echo "ឯកសារមាន!";
}

// ទាញយកទំហំឯកសារ
echo filesize("example.txt"); // e.g., 22 bytes

// ចម្លងឯកសារ
copy("example.txt", "example_backup.txt");

// ផ្លាស់ទីឯកសារ
rename("example.txt", "new_example.txt");

// លុបឯកសារ
unlink("new_example.txt");
?>
```

## ៥. ការបង្កើត Functions ផ្ទាល់ខ្លួន

អ្នកអាចបង្កើត functions ផ្ទាល់ខ្លួនបានដោយប្រើពាក្យគន្លឹះ `function`:

### Basic Function

```php
<?php
// កំណត់ function
function sayHello() {
    echo "សួស្តី!";
}

// ហៅ function
sayHello(); // បង្ហាញ: សួស្តី!
?>
```

### Functions ជាមួយ Parameters

```php
<?php
// function ជាមួយ parameter មួយ
function greet($name) {
    echo "សួស្តី, $name!";
}

greet("សុខា"); // បង្ហាញ: សួស្តី, សុខា!

// function ជាមួយ parameters ច្រើន
function add($a, $b) {
    $sum = $a + $b;
    echo "$a + $b = $sum";
}

add(5, 3); // បង្ហាញ: 5 + 3 = 8
?>
```

### Functions ជាមួយ Default Parameters

```php
<?php
function greet($name = "ភ្ញៀវ") {
    echo "សួស្តី, $name!";
}

greet(); // បង្ហាញ: សួស្តី, ភ្ញៀវ!
greet("សុខា"); // បង្ហាញ: សួស្តី, សុខា!
?>
```

### Functions ជាមួយ Return Values

```php
<?php
function add($a, $b) {
    return $a + $b;
}

$result = add(5, 3);
echo "លទ្ធផល: $result"; // បង្ហាញ: លទ្ធផល: 8

// function ដែលត្រឡប់ results ច្រើន
function getMinMax($numbers) {
    return [
        'min' => min($numbers),
        'max' => max($numbers)
    ];
}

$numbers = [5, 10, 15, 20, 25];
$result = getMinMax($numbers);
echo "តម្លៃអប្បបរមា: " . $result['min'] . ", តម្លៃអតិបរមា: " . $result['max'];
// បង្ហាញ: តម្លៃអប្បបរមា: 5, តម្លៃអតិបរមា: 25
?>
```

### Variable Scope ក្នុង Functions

Variables នៅក្នុង function មាន local scope ដែលមានន័យថាវាអាចចូលប្រើបានតែនៅក្នុង function ប៉ុណ្ណោះ:

```php
<?php
$globalVar = "ខ្ញុំជា global variable";

function testScope() {
    $localVar = "ខ្ញុំជា local variable";
    echo $localVar . "<br>"; // អាចចូលប្រើបាន
    
    // ដើម្បីចូលប្រើ global variable នៅក្នុង function
    global $globalVar;
    echo $globalVar . "<br>"; // អាចចូលប្រើបានបន្ទាប់ពីប្រកាស global
}

testScope();
echo $globalVar . "<br>"; // អាចចូលប្រើបាន
// echo $localVar; // កំហុស - $localVar មិនបានកំណត់នៅក្រៅ function
?>
```

### Recursive Functions

Recursive function គឺជា function ដែលហៅខ្លួនវា:

```php
<?php
// គណនា factorial របស់លេខមួយ
function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

echo factorial(5); // 5 * 4 * 3 * 2 * 1 = 120
?>
```

### Anonymous Functions (Closures)

Anonymous functions គឺជា functions ដែលគ្មានឈ្មោះ:

```php
<?php
// រក្សាទុក anonymous function ក្នុងអថេរមួយ
$greet = function($name) {
    return "សួស្តី, $name!";
};

echo $greet("សុខា"); // បង្ហាញ: សួស្តី, សុខា!

// ប្រើជាមួយ array functions
$numbers = [1, 2, 3, 4, 5];
$squared = array_map(function($n) {
    return $n * $n;
}, $numbers);

print_r($squared); // Array ( [0] => 1 [1] => 4 [2] => 9 [3] => 16 [4] => 25 )
?>
```

### ឧទាហរណ៍ជាក់ស្តែង: ការបង្កើត Functions ដើម្បីគណនាពន្ធ

```php
<?php
// ពន្ធទំនិញនៅកម្ពុជា (VAT 10%)
function calculateVAT($price) {
    $vatRate = 0.1; // 10%
    $vatAmount = $price * $vatRate;
    return $vatAmount;
}

// គណនាតម្លៃតែមួយរួមពន្ធ
function calculatePriceWithVAT($price) {
    $vatAmount = calculateVAT($price);
    $totalPrice = $price + $vatAmount;
    return $totalPrice;
}

// គណនាតម្លៃសរុបសម្រាប់ទំនិញច្រើន
function calculateTotalPrice($items) {
    $subtotal = 0;
    
    foreach ($items as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    
    $vatAmount = calculateVAT($subtotal);
    $totalPrice = $subtotal + $vatAmount;
    
    return [
        'subtotal' => $subtotal,
        'vat' => $vatAmount,
        'total' => $totalPrice
    ];
}

// ឧទាហរណ៍៖ ការគណនាតម្លៃទំនិញ
$price = 100;
echo "តម្លៃដើម: $price<br>";
echo "ពន្ធអាករ: " . calculateVAT($price) . "<br>";
echo "តម្លៃរួមពន្ធ: " . calculatePriceWithVAT($price) . "<br>";

// ឧទាហរណ៍៖ ការគណនាវិក័យប័ត្រ
$shoppingCart = [
    ['name' => 'ទូរស័ព្ទដៃ', 'price' => 200, 'quantity' => 1],
    ['name' => 'កាស', 'price' => 50, 'quantity' => 2],
    ['name' => 'ប៊ិច', 'price' => 2, 'quantity' => 5]
];

$result = calculateTotalPrice($shoppingCart);
echo "<h3>លម្អិតវិក័យប័ត្រ</h3>";
echo "តម្លៃទំនិញសរុប: $" . $result['subtotal'] . "<br>";
echo "ពន្ធអាករ: $" . $result['vat'] . "<br>";
echo "តម្លៃសរុប: $" . $result['total'];
?>
```

## ៦. Lab: ការបង្កើត Simple Calculator ដោយប្រើ PHP functions

ក្នុង Lab នេះ យើងនឹងបង្កើតកម្មវិធីគណនាលេខធម្មតា (Simple Calculator) ដោយប្រើ PHP functions។

### គោលបំណងនៃ Lab
- អនុវត្តការប្រើប្រាស់ if-else statements និង switch statements
- អនុវត្តការបង្កើត និងហៅប្រើ functions ផ្ទាល់ខ្លួន
- អនុវត្តការប្រើប្រាស់ HTML forms ជាមួយ PHP

### ជំហានទី ១: បង្កើតឯកសារ HTML Form

បង្កើតឯកសារ `calculator.php` ជាមួយ HTML form និង កូដ PHP:

```php
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
```

### ជំហានទី ២: ដំណើរការកម្មវិធី

1. រក្សាទុកឯកសារនៅក្នុងថត htdocs (XAMPP) ឬ www (WAMP)
2. បើក Browser ហើយចូលទៅកាន់ http://localhost/calculator.php
3. សាកល្បងប្រើកម្មវិធីគណនាដោយបញ្ចូលលេខ និងជ្រើសរើសប្រមាណវិធីផ្សេងៗ

### ជំហានទី ៣: ការពង្រីកកម្មវិធី

បន្ថែមមុខងារដូចខាងក្រោមទៅកាន់កម្មវិធីគណនា:

1. បន្ថែមពណ៌ផ្សេងៗទៅលើលទ្ធផលដោយផ្អែកលើតម្លៃលទ្ធផល:
   - លទ្ធផលវិជ្ជមាន: ពណ៌បៃតង
   - លទ្ធផលអវិជ្ជមាន: ពណ៌ក្រហម
   - លទ្ធផលសូន្យ: ពណ៌ខៀវ

2. បន្ថែមប្រមាណវិធីថ្មីដូចជា:
   - គណនាឫសការ៉េ (Square Root)
   - គណនា Factorial
   - គណនា sin, cos, tan

## គម្រោងសិក្សាបន្ថែម

បន្ទាប់ពីបានសិក្សាពី PHP Control Structures និង Functions យើងនឹងរៀបចំគម្រោងផ្ទាល់ខ្លួនមួយចំនួនដើម្បីអនុវត្តចំណេះដឹង:

### គម្រោងទី១: កម្មវិធីគ្រប់គ្រងសិស្ស

បង្កើតកម្មវិធីគ្រប់គ្រងសិស្សសាមញ្ញមួយដោយប្រើ PHP Control Structures និង Functions:

1. បង្កើតទម្រង់សម្រាប់បញ្ចូលព័ត៌មានសិស្ស (ឈ្មោះ, អាយុ, ពិន្ទុវិញ្ញាសាច្រើន)
2. បង្កើត functions ដើម្បី:
   - គណនាពិន្ទុមធ្យមរបស់សិស្សម្នាក់ៗ
   - កំណត់ពិន្ទុអក្សរ (A, B, C, D, F) ដោយផ្អែកលើពិន្ទុមធ្យម
   - បង្ហាញព័ត៌មានសិស្សទាំងអស់ជាទម្រង់តារាង
   - រកសិស្សដែលមានពិន្ទុខ្ពស់បំផុត និងទាបបំផុត
3. ប្រើ loops ដើម្បីដំណើរការសិស្សច្រើននាក់
4. ប្រើ conditional statements ដើម្បីបង្ហាញពណ៌ផ្សេងៗគ្នាតាមពិន្ទុ

### គម្រោងទី២: កម្មវិធីគ្រប់គ្រងសារពើភណ្ឌទំនិញ

បង្កើតកម្មវិធីគ្រប់គ្រងសារពើភណ្ឌទំនិញសាមញ្ញដោយប្រើ PHP Control Structures និង Functions:

1. បង្កើតទម្រង់សម្រាប់បញ្ចូលព័ត៌មានទំនិញ (ឈ្មោះ, តម្លៃ, ចំនួនក្នុងស្តុក)
2. បង្កើត functions ដើម្បី:
   - បន្ថែមទំនិញថ្មី
   - ធ្វើបច្ចុប្បន្នភាពចំនួនទំនិញក្នុងស្តុក
   - គណនាតម្លៃសរុបនៃទំនិញទាំងអស់ក្នុងស្តុក
   - ពិនិត្យមើលទំនិញដែលជិតអស់ស្តុក (តិចជាង 5 ឯកតា)
3. ប្រើ loops ដើម្បីដំណើរការទំនិញទាំងអស់
4. ប្រើ conditional statements ដើម្បីបង្ហាញពណ៌ផ្សេងៗគ្នាតាមស្ថានភាពស្តុក

### គម្រោងទី៣: ហ្គេមទាយលេខ

បង្កើតហ្គេមទាយលេខសាមញ្ញដោយប្រើ PHP Control Structures និង Functions:

1. បង្កើតហ្គេមដែលបង្កើតលេខចៃដន្យរវាង 1 និង 100
2. អនុញ្ញាតឱ្យអ្នកប្រើទាយលេខ
3. បង្កើត functions ដើម្បី:
   - ត្រួតពិនិត្យថាតើការទាយត្រឹមត្រូវឬអត់
   - ផ្តល់ព័ត៌មានថាតើលេខទាយធំពេក ឬតូចពេក
   - រាប់ចំនួនការទាយ
   - កំណត់ពិន្ទុដោយផ្អែកលើចំនួនការទាយ
4. ប្រើ conditional statements ដើម្បីពិនិត្យការទាយ
5. ប្រើ loops ដើម្បីអនុញ្ញាតឱ្យទាយច្រើនដង

## សេចក្តីសន្និដ្ឋាន

នៅក្នុងមេរៀនទី២នេះ យើងបានសិក្សាអំពី Control Structures និង Functions ក្នុង PHP។ យើងបានរៀនពីរបៀបប្រើប្រាស់ if, else, switch statements ដើម្បីគ្រប់គ្រងលំហូរនៃកម្មវិធី និងរបៀបប្រើប្រាស់ loops ដូចជា for, while, និង foreach ដើម្បីប្រតិបត្តិកូដដដែលៗ។

យើងក៏បានស្វែងយល់ពីរបៀបបង្កើត និងប្រើប្រាស់ functions ក្នុង PHP ដើម្បីរៀបចំកូដជាប្លុកដែលអាចប្រើឡើងវិញបាន ហើយបានប្រើប្រាស់ built-in functions ដែលមានស្រាប់ក្នុង PHP។ ជាចុងក្រោយ យើងបានបង្កើតកម្មវិធីគណនាលេខធម្មតា ដោយអនុវត្តចំណេះដឹងទាំងនេះ។

នៅមេរៀនបន្ទាប់ យើងនឹងសិក្សាអំពី HTML Forms និង PHP ដែលនឹងអនុញ្ញាតឱ្យយើងបង្កើតទម្រង់ប្រមូលទិន្នន័យ និងដំណើរការជាមួយ PHP។

## ឯកសារយោង

1. ឯកសារផ្លូវការរបស់ PHP - Control Structures: [https://www.php.net/manual/en/language.control-structures.php](https://www.php.net/manual/en/language.control-structures.php)
2. ឯកសារផ្លូវការរបស់ PHP - Functions: [https://www.php.net/manual/en/language.functions.php](https://www.php.net/manual/en/language.functions.php)
3. W3Schools PHP Tutorial - Conditionals: [https://www.w3schools.com/php/php_if_else.asp](https://www.w3schools.com/php/php_if_else.asp)
4. W3Schools PHP Tutorial - Loops: [https://www.w3schools.com/php/php_looping.asp](https://www.w3schools.com/php/php_looping.asp)
5. W3Schools PHP Tutorial - Functions: [https://www.w3schools.com/php/php_functions.asp](https://www.w3schools.com/php/php_functions.asp)