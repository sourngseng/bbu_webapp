# មេរៀនទី ៤៖ ការធ្វើការជាមួយ Arrays និង Strings ក្នុង PHP (៣ ម៉ោង)

## គោលបំណងមេរៀន
1. យល់ដឹងអំពីប្រភេទនៃ Arrays និងរបៀបប្រើប្រាស់ក្នុង PHP។
2. អាចគ្រប់គ្រង និងដំណើរការ Arrays ដោយប្រើមុខងារផ្សេងៗ។
3. ស្វែងយល់ពីការរៀបចំ និងកែប្រែ Strings ដោយប្រើមុខងារសំខាន់ៗក្នុង PHP។
4. យល់ពីការប្រើប្រាស់ Regular Expressions សម្រាប់ការស្វែងរក និងកែប្រែ Strings។
5. អនុវត្តជាក់ស្តែងក្នុងការបង្កើត String Manipulation Tool ដើម្បីអនុវត្តចំណេះដឹង។

---

## ១. ប្រភេទ Arrays ក្នុង PHP

### ការពន្យល់
Array គឺជាប្រភេទទិន្នន័យមួយក្នុង PHP ដែលអាចផ្ទុកទិន្នន័យច្រើនក្នុងអថេរតែមួយ។ មានបីប្រភេទសំខាន់៖
- **Indexed Array**: ប្រើលេខជា key (index)។
- **Associative Array**: ប្រើ string ឬឈ្មោះជា key។
- **Multidimensional Array**: Array ដែលមាន Array ផ្សេងទៀតនៅខាងក្នុង។

### Syntax
```php
// Indexed Array
$array = array("value1", "value2", "value3");
// ឬ
$array = ["value1", "value2", "value3"];

// Associative Array
$assoc_array = array("key1" => "value1", "key2" => "value2");
// ឬ
$assoc_array = ["key1" => "value1", "key2" => "value2"];

// Multidimensional Array
$multi_array = array(
    array("value1", "value2"),
    array("value3", "value4")
);
```

### ឧទាហរណ៍
```php
<?php
// Indexed Array
$fruits = ["Apple", "Banana", "Orange"];
echo $fruits[1]; // លទ្ធផល: Banana

// Associative Array
$student = ["name" => "Sok", "age" => 20];
echo $student["name"]; // លទ្ធផល: Sok

// Multidimensional Array
$classes = [
    ["Sok", "Srey"],
    ["Dara", "Vicheka"]
];
echo $classes[1][0]; // លទ្ធផល: Dara
?>
```

### ការពន្យល់ឧទាហរណ៍
- **Indexed Array**: យើងបង្កើត array `$fruits` ដែលផ្ទុកឈ្មោះផ្លែឈើ។ យើងចូលទៅ index `1` ដើម្បីបង្ហាញ "Banana"។
- **Associative Array**: `$student` ប្រើ key ជា string (`name`, `age`) ដើម្បីផ្ទុកទិន្នន័យ។ យើងប្រើ `$student["name"]` ដើម្បីបង្ហាញ "Sok"។
- **Multidimensional Array**: `$classes` ជា array ពីរវិមាត្រ។ `$classes[1][0]` ចង្អុលទៅ array ទីពីរ និង element ទីមួយ គឺ "Dara"។

---

## ២. ការគ្រប់គ្រង និងដំណើរការ Arrays

### ការពន្យល់
PHP ផ្តល់មុខងារជាច្រើនសម្រាប់គ្រប់គ្រង Arrays ដូចជា បន្ថែម លុប តម្រៀប និងស្វែងរកទិន្នន័យ។

### មុខងារសំខាន់ៗ
- `array_push($array, $value)`: បន្ថែម element ទៅចុង array។
- `array_pop($array)`: លុប element ចុងក្រោយ។
- `sort($array)`: តម្រៀប array តាមលំដាប់។
- `array_merge($array1, $array2)`: បញ្ចូល array ពីរទៅជាមួយ។
- `in_array($value, $array)`: ពិនិត្យមើលថាតើ value មានក្នុង array ឬអត់។

### ឧទាហរណ៍
```php
<?php
$fruits = ["Apple", "Banana"];
array_push($fruits, "Orange"); // បន្ថែម Orange
print_r($fruits); // លទ្ធផល: [Apple, Banana, Orange]

array_pop($fruits); // លុប Orange
print_r($fruits); // លទ្ធផល: [Apple, Banana]

sort($fruits); // តម្រៀប
print_r($fruits); // លទ្ធផល: [Apple, Banana]

$more_fruits = ["Mango", "Grape"];
$all_fruits = array_merge($fruits, $more_fruits);
print_r($all_fruits); // លទ្ធផល: [Apple, Banana, Mango, Grape]

if (in_array("Apple", $all_fruits)) {
    echo "Apple is found!"; // លទ្ធផល: Apple is found!
}
?>
```

### ការពន្យល់ឧទាហរណ៍
- `array_push` បន្ថែម "Orange" ទៅចុង `$fruits`។
- `array_pop` លុប "Orange" ចេញ។
- `sort` រៀបចំ `$fruits` តាមលំដាប់អក្សរ។
- `array_merge` បញ្ចូល `$fruits` និង `$more_fruits` ទៅជា array ថ្មី។
- `in_array` ពិនិត្យថា "Apple" មានក្នុង `$all_fruits` ឬអត់។

---

## ៣. String Manipulation ក្នុង PHP

### ការពន្យល់
String គឺជាខ្សែអក្សរដែលអាចកែប្រែបានដោយប្រើមុខងារជាច្រើនក្នុង PHP។

### មុខងារសំខាន់ៗ
- `strlen($string)`: រាប់ប្រវែង string។
- `strtoupper($string)`: ប្តូរជាអក្សរធំ។
- `strtolower($string)`: ប្តូរជាអក្សរតូច។
- `substr($string, $start, $length)`: កាត់យកផ្នែកនៃ string។
- `str_replace($search, $replace, $string)`: ជំនួសអក្សរមួយចំនួន។

### ឧទាហរណ៍
```php
<?php
$text = "Hello, PHP!";
echo strlen($text); // លទ្ធផល: 11
echo strtoupper($text); // លទ្ធផល: HELLO, PHP!
echo strtolower($text); // លទ្ធផល: hello, php!
echo substr($text, 0, 5); // លទ្ធផល: Hello
echo str_replace("PHP", "World", $text); // លទ្ធផល: Hello, World!
?>
```

### ការពន្យល់ឧទាហរណ៍
- `strlen` រាប់ចំនួនតួអក្សរក្នុង `$text` (រួមទាំងដកឃ្លា និងសញ្ញា)។
- `strtoupper` និង `strtolower` ប្តូរទម្រង់អក្សរ។
- `substr` កាត់យកអក្សរចាប់ពី index 0 ដល់ 5។
- `str_replace` ជំនួស "PHP" ដោយ "World"។

---

## ៤. Regular Expressions

### ការពន្យល់
Regular Expressions (Regex) ជាឧបករណ៍សម្រាប់ស្វែងរក និងកែប្រែ string ដោយផ្អែកលើលំនាំ (pattern)។ ក្នុង PHP ប្រើមុខងារ `preg_match` និង `preg_replace`។

### មុខងារសំខាន់ៗ
- `preg_match($pattern, $string)`: ពិនិត្យថាតើ string ត្រូវនឹង pattern ឬអត់។
- `preg_replace($pattern, $replacement, $string)`: ជំនួស string ដែលត្រូវនឹង pattern។

### ឧទាហរណ៍
```php
<?php
$text = "My email is example@domain.com";
$pattern = "/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/";

// ពិនិត្យអ៊ីមែល
if (preg_match($pattern, $text, $matches)) {
    echo "Email found: " . $matches[0]; // លទ្ធផល: example@domain.com
}

// ជំនួសអ៊ីមែល
$new_text = preg_replace($pattern, "hidden@domain.com", $text);
echo $new_text; // លទ្ធផល: My email is hidden@domain.com
?>
```

### ការពន្យល់ឧទាហរណ៍
- `$pattern` កំណត់លំនាំអ៊ីមែល (អក្សរ, លេខ, @, ដូមេន, និង extension)។
- `preg_match` ស្វែងរកអ៊ីមែលនៅក្នុង `$text` ហើយរក្សាទុកក្នុង `$matches`។
- `preg_replace` ជំនួសអ៊ីមែលដើមដោយ "hidden@domain.com"។

---

## ៥. Lab: ការបង្កើត String Manipulation Tool

### កិច្ចការអនុវត្ត
សិស្សត្រូវបង្កើតកម្មវិធី PHP ដែលអនុញ្ញាតឱ្យអ្នកប្រើបញ្ចូល string មួយ ហើយអនុវត្តសកម្មភាពដូចខាងក្រោម៖
1. បង្ហាញប្រវែង string។
2. ប្តូរ string ទៅជាអក្សរធំ និងអក្សរតូច។
3. កាត់យកផ្នែកដំបូងនៃ string (៥ តួអក្សរដំបូង)។
4. ជំនួសពាក្យជាក់លាក់មួយ។
5. ពិនិត្យថាតើ string មានអ៊ីមែលឬអត់ ដោយប្រើ regex។

### កូដគំរូ
```php
<!DOCTYPE html>
<html>
<head>
    <title>String Manipulation Tool</title>
</head>
<body>
    <h2>String Manipulation Tool</h2>
    <form method="post">
        <label>Enter a string:</label><br>
        <input type="text" name="input_string"><br>
        <label>Word to replace (optional):</label><br>
        <input type="text" name="search_word"><br>
        <label>Replace with (optional):</label><br>
        <input type="text" name="replace_word"><br>
        <input type="submit" value="Process">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST["input_string"];
        $search = $_POST["search_word"];
        $replace = $_POST["replace_word"];

        // ១. ប្រវែង
        echo "<h3>Results:</h3>";
        echo "Length: " . strlen($input) . "<br>";

        // ២. អក្សរធំ និងតូច
        echo "Uppercase: " . strtoupper($input) . "<br>";
        echo "Lowercase: " . strtolower($input) . "<br>";

        // ៣. កាត់ ៥ តួអក្សរដំបូង
        echo "First 5 characters: " . substr($input, 0, 5) . "<br>";

        // ៤. ជំនួសពាក្យ
        if (!empty($search) && !empty($replace)) {
            echo "After replacement: " . str_replace($search, $replace, $input) . "<br>";
        }

        // ៥. ពិនិត្យអ៊ីមែល
        $pattern = "/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/";
        if (preg_match($pattern, $input, $matches)) {
            echo "Email found: " . $matches[0] . "<br>";
        } else {
            echo "No email found.<br>";
        }
    }
    ?>
</body>
</html>
```

### ការពន្យល់កូដ
- **ទម្រង់បញ្ចូល**: អ្នកប្រើបញ្ចូល string និងពាក្យសម្រាប់ជំនួស (បើមាន) តាមរយៈ `<form>`។
- **ដំណើរការ**:
  - ប្រើ `strlen` ដើម្បីរាប់ប្រវែង string។
  - ប្រើ `strtoupper` និង `strtolower` ដើម្បីប្តូរទម្រង់អក្សរ។
  - ប្រើ `substr` ដើម្បីកាត់ ៥ តួអក្សរដំបូង។
  - ប្រើ `str_replace` ដើម្បីជំនួសពាក្យបើមានការបញ្ចូល។
  - ប្រើ `preg_match` ដើម្បីស្វែងរកអ៊ីមែល។
- **លទ្ធផល**: បង្ហាញលទ្ធផលទាំងអស់នៅក្នុងទំព័រ។

### ការណែនាំសម្រាប់សិស្ស
- សាកល្បងបញ្ចូល string ផ្សេងៗ ដូចជាអ៊ីមែល ឬឃ្លាវែង។
- ព្យាយាមបន្ថែមមុខងារបន្ថែម ដូចជាការរាប់ពាក្យ ឬការបញ្ច្រាស string។

---

## សេចក្តីសន្និដ្ឋាន
មេរៀននេះបានគ្របដណ្តប់លើការប្រើប្រាស់ Arrays និង Strings ក្នុង PHP រួមទាំងការគ្រប់គ្រង Arrays ការកែប្រែ Strings និងការប្រើ Regular Expressions។ តាមរយៈ Lab សិស្សអាចអនុវត្តចំណេះដឹងជាក់ស្តែងដើម្បីបង្កើតឧបករណ៍ String Manipulation។