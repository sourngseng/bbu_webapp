# មេរៀនទី 1៖ ការណែនាំអំពី PHP និងមូលដ្ឋានគ្រឹះនៃការអភិវឌ្ឍន៍វេបសាយ

## គោលបំណងមេរៀន
នៅចុងបញ្ចប់នៃមេរៀននេះ សិស្សនឹងអាច៖
1. យល់ដឹងអំពីប្រព័ន្ធអេកូឡូស៊ី Laravel និងមូលហេតុដែលវាជាជម្រើសដ៏ល្អសម្រាប់ការអភិវឌ្ឍន៍វេបសាយ
2. រៀបចំបរិស្ថានអភិវឌ្ឍន៍ដោយជោគជ័យសម្រាប់ Laravel
3. យល់ដឹងអំពីគោលការណ៍នៃស្ថាបត្យកម្ម MVC
4. រំលឹកឡើងវិញនិងអនុវត្តវាក្យសម្ព័ន្ធនិងគោលការណ៍មូលដ្ឋាននៃ PHP
5. អនុវត្តគោលការណ៍ Object-Oriented ក្នុង PHP
6. យល់ដឹងនិងប្រើប្រាស់ namespaces និង autoloading
7. គ្រប់គ្រងទិន្នន័យក្នុង PHP ប្រកបដោយប្រសិទ្ធភាព
8. ប្រើប្រាស់ Composer ដើម្បីគ្រប់គ្រងការពឹងផ្អែករបស់គម្រោង

## ១. ការណែនាំអំពីវគ្គសិក្សា និងទិដ្ឋភាពទូទៅនៃប្រព័ន្ធអេកូឡូស៊ី Laravel

### អ្វីជា Laravel?
Laravel គឺជា PHP framework ដែលមានភាពពេញនិយមបំផុតសម្រាប់ការអភិវឌ្ឍន៍វេបសាយ។ វាត្រូវបានបង្កើតឡើងដោយ Taylor Otwell នៅឆ្នាំ 2011 ជាមួយនឹងគោលបំណងផ្ដល់ជូននូវដំណោះស្រាយដ៏អស្ចារ្យដើម្បីធ្វើឱ្យការអភិវឌ្ឍន៍កាន់តែងាយស្រួល និងរហ័ស។

### ហេតុអ្វីបានជាជ្រើសរើស Laravel?
1. **កូដស្អាត និងស៊ីមេទ្រី** - Laravel លើកទឹកចិត្តឱ្យមានកូដដែលអាចអានបាន និងការអនុវត្តល្អ
2. **ឧបករណ៍ពេញលេញ** - វាមានឧបករណ៍ជាច្រើនដែលបានបង្កើតសម្រាប់កិច្ចការធម្មតាដូចជាការផ្ទៀងផ្ទាត់អត្តសញ្ញាណ, caching, routing, និង migrations
3. **សហគមន៍សកម្ម** - Laravel មានសហគមន៍ដ៏ធំ និងសកម្ម ជាមួយនឹងកញ្ចប់ជាច្រើន និងធនធានរៀនសូត្រ
4. **ការធ្វើតេស្តងាយស្រួល** - Laravel ធ្វើឱ្យការសរសេរ unit និង feature tests មានភាពងាយស្រួលតាមរយៈ PHPUnit
5. **ឯកសារពេញលេញ** - វាមានឯកសារដែលត្រូវបានសរសេរយ៉ាងល្អ និងធនធានរៀនសូត្រ

### សមាសភាគសំខាន់នៃប្រព័ន្ធអេកូឡូស៊ី Laravel
1. **Laravel Framework** - ស្នូលនៃប្រព័ន្ធ
2. **Composer** - ឧបករណ៍គ្រប់គ្រងការពឹងផ្អែក
3. **Artisan** - CLI សម្រាប់ Laravel
4. **Blade** - ម៉ាស៊ីនគំរូដ៏មានអានុភាព
5. **Eloquent ORM** - ធ្វើឱ្យការប្រាស្រ័យទាក់ទងជាមួយមូលដ្ឋានទិន្នន័យមានភាពងាយស្រួល
6. **Laravel Mix** - API សម្រាប់ webpack ដើម្បីចងក្រងទ្រព្យសកម្ម
7. **Laravel Forge/Envoyer** - ឧបករណ៍ដាក់ពង្រាយ
8. **Laravel Nova** - ផ្ទាំងគ្រប់គ្រង
9. **Laravel Vapor** - ដំណោះស្រាយ serverless hosting

## ២. ការរៀបចំបរិស្ថានអភិវឌ្ឍន៍ (XAMPP/WAMP, Composer, Laravel installer)

### ការដំឡើង Local Development Server

#### XAMPP (Cross-Platform)
1. ទាញយក XAMPP ពី [apachefriends.org](https://www.apachefriends.org/)
2. ដំណើរការ installer និងធ្វើតាមការណែនាំ
3. ចាប់ផ្តើមសេវា Apache និង MySQL ពីផ្ទាំងគ្រប់គ្រង XAMPP

#### WAMP (Windows)
1. ទាញយក WAMP ពី [wampserver.com](https://www.wampserver.com/)
2. ដំណើរការ installer និងធ្វើតាមការណែនាំ
3. ចាប់ផ្តើម WampServer

### ការដំឡើង Composer
Composer គឺជាឧបករណ៍គ្រប់គ្រងការពឹងផ្អែកសម្រាប់ PHP ដែលត្រូវការជាមុនដោយ Laravel។

#### Windows:
1. ទាញយកនិងដំណើរការ Composer-Setup.exe ពី [getcomposer.org](https://getcomposer.org/download/)
2. បញ្ជាក់ថា PHP ត្រូវបានរកឃើញក្នុងពេលដំឡើង

#### MacOS/Linux:
```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
```

### ការផ្ទៀងផ្ទាត់ការដំឡើង Composer:
ដើម្បីផ្ទៀងផ្ទាត់ថា Composer ត្រូវបានដំឡើងយ៉ាងត្រឹមត្រូវ សូមបញ្ចូលពាក្យបញ្ជាខាងក្រោមនេះក្នុង terminal ឬ command prompt:

```bash
composer --version
```

### ការដំឡើង Laravel Installer
Laravel Installer ធ្វើឱ្យការបង្កើតគម្រោង Laravel ថ្មីមានភាពងាយស្រួល។

```bash
composer global require laravel/installer
```

បន្ទាប់ពីដំឡើង សូមប្រាកដថាបានបន្ថែមផ្លូវ Composer global bin ទៅក្នុង PATH របស់អ្នក:

#### Windows:
បន្ថែម `%USERPROFILE%\AppData\Roaming\Composer\vendor\bin` ទៅក្នុងអថេរបរិស្ថាន PATH

#### MacOS/Linux:
បន្ថែមបន្ទាត់ខាងក្រោមទៅក្នុងឯកសារ .bashrc ឬ .zshrc របស់អ្នក:
```bash
export PATH="$PATH:$HOME/.composer/vendor/bin"
```

### ការបង្កើតគម្រោង Laravel ដំបូង
ប្រើ Laravel Installer ដើម្បីបង្កើតគម្រោងថ្មី:

```bash
laravel new first-project
```

ឬប្រើ Composer ផ្ទាល់:

```bash
composer create-project --prefer-dist laravel/laravel first-project
```

### ការដំណើរការគម្រោង Laravel
ចូលទៅក្នុងថតគម្រោង និងចាប់ផ្តើមម៉ាស៊ីនបម្រើអភិវឌ្ឍន៍ដែលបានបង្កើតក្នុង Laravel:

```bash
cd first-project
php artisan serve
```

ឥឡូវគម្រោងរបស់អ្នកគួរតែដំណើរការនៅលើ http://localhost:8000

## ៣. ការណែនាំអំពីស្ថាបត្យកម្ម MVC

MVC (Model-View-Controller) គឺជាគំរូស្ថាបត្យកម្មដែលប្រើដើម្បីបែងចែកកម្មវិធីជាបីសមាសភាគ:

### Model
- តំណាងឱ្យរចនាសម្ព័ន្ធទិន្នន័យរបស់កម្មវិធី
- គ្រប់គ្រងទិន្នន័យ លក្ខណៈ និងឥរិយាបថ
- ទំនាក់ទំនងជាមួយមូលដ្ឋានទិន្នន័យ
- ក្នុង Laravel, ម៉ូដែលគឺជាថ្នាក់ Eloquent ORM

**ឧទាហរណ៍នៃម៉ូដែល User (`app/Models/User.php`):**
```php
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
```

### View
- បង្ហាញព័ត៌មានដល់អ្នកប្រើប្រាស់
- បង្កើតចំណុចប្រទាក់អ្នកប្រើប្រាស់
- ក្នុង Laravel, ទិដ្ឋភាពភាគច្រើនជាឯកសារ Blade

**ឧទាហរណ៍នៃ View (`resources/views/welcome.blade.php`):**
```php
<!DOCTYPE html>
<html>
<head>
    <title>ទំព័រស្វាគមន៍</title>
</head>
<body>
    <h1>សូមស្វាគមន៍មកកាន់ Laravel!</h1>
    <p>ឈ្មោះរបស់អ្នកគឺ: {{ $name }}</p>
</body>
</html>
```

### Controller
- គ្រប់គ្រងសំណើរបស់អ្នកប្រើប្រាស់
- ទទួលយកធាតុចូលពីអ្នកប្រើប្រាស់
- ប្រាស្រ័យទាក់ទងជាមួយម៉ូដែលដើម្បីទាញយកឬធ្វើបច្ចុប្បន្នភាពទិន្នន័យ
- បង្កើតការឆ្លើយតបនិងបញ្ជូននូវទិន្នន័យទៅទិដ្ឋភាព

**ឧទាហរណ៍នៃ Controller (`app/Http/Controllers/UserController.php`):**
```php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }
}
```

### លំហូរ MVC ក្នុង Laravel
1. សំណើ HTTP ចូលដល់ Router
2. Router បញ្ជូនសំណើទៅ Controller ត្រឹមត្រូវ
3. Controller ប្រាស្រ័យទាក់ទងជាមួយម៉ូដែលដើម្បីទាញយកទិន្នន័យ
4. Controller បញ្ជូនទិន្នន័យទៅ View
5. View បង្ហាញទិន្នន័យដល់អ្នកប្រើប្រាស់

## ៤. ការរំលឹកឡើងវិញអំពីវាក្យសម្ព័ន្ធ និងគោលការណ៍មូលដ្ឋាននៃ PHP

### សញ្ញាសម្គាល់ PHP
កូដ PHP ត្រូវតែដាក់ក្នុងសញ្ញាសម្គាល់ `<?php ... ?>` ឬសម្រាប់បែបបង្ហាញ សញ្ញាសម្គាល់ `<?= ... ?>`

```php
<?php
    // កូដ PHP នៅទីនេះ
?>

<?= $variable ?> <!-- កាត់ខ្លីសម្រាប់ <?php echo $variable; ?> -->
```

### អថេរ
អថេរក្នុង PHP ចាប់ផ្តើមដោយសញ្ញា $:

```php
<?php
$string = "នេះជា string";
$integer = 42;
$float = 3.14;
$boolean = true;
$array = [1, 2, 3];
$null = null;

// ការប្រកាសអថេរជាប្រភេទក៏អាចធ្វើបានដែរ (PHP 7.4+)
string $typedString = "នេះមានប្រភេទ";
int $typedInteger = 42;
?>
```

### ប្រមាណវិធី

#### ប្រមាណវិធីគណិតវិទ្យា
```php
<?php
$a = 5;
$b = 2;

$sum = $a + $b;      // 7
$difference = $a - $b; // 3
$product = $a * $b;    // 10
$quotient = $a / $b;   // 2.5
$remainder = $a % $b;  // 1
$exponent = $a ** $b;  // 25 (5 ដក 2)
?>
```

#### ប្រមាណវិធីកំណត់
```php
<?php
$a = 5;
$a += 2;  // អាចសរសេរឡើងវិញជា $a = $a + 2 (ឥឡូវ $a = 7)
$a -= 1;  // អាចសរសេរឡើងវិញជា $a = $a - 1 (ឥឡូវ $a = 6)
$a *= 3;  // អាចសរសេរឡើងវិញជា $a = $a * 3 (ឥឡូវ $a = 18)
$a /= 2;  // អាចសរសេរឡើងវិញជា $a = $a / 2 (ឥឡូវ $a = 9)
?>
```

#### ប្រមាណវិធីប្រៀបធៀប
```php
<?php
$a = 5;
$b = 2;
$c = "5";

$equal = ($a == $c);          // true (តម្លៃស្មើគ្នា មិនមានការបង្ខំប្រភេទ)
$identical = ($a === $c);     // false (មិនមែនប្រភេទដូចគ្នា)
$notEqual = ($a != $b);       // true
$notIdentical = ($a !== $c);  // true
$greaterThan = ($a > $b);     // true
$lessThan = ($a < $b);        // false
$greaterOrEqual = ($a >= $b); // true
$lessOrEqual = ($a <= $b);    // false
?>
```

### រចនាសម្ព័ន្ធគ្រប់គ្រង

#### សេចក្តីថ្លែងការណ៍ if-else
```php
<?php
$age = 18;

if ($age < 13) {
    echo "កុមារ";
} elseif ($age < 18) {
    echo "វ័យជំទង់";
} else {
    echo "មនុស្សពេញវ័យ";
}

// syntax កាត់ខ្លី
$status = ($age >= 18) ? "មនុស្សពេញវ័យ" : "កុមារ";
?>
```

#### សេចក្តីថ្លែងការណ៍ switch
```php
<?php
$dayOfWeek = 1;

switch ($dayOfWeek) {
    case 1:
        echo "ថ្ងៃចន្ទ";
        break;
    case 2:
        echo "ថ្ងៃអង្គារ";
        break;
    case 3:
        echo "ថ្ងៃពុធ";
        break;
    default:
        echo "ថ្ងៃផ្សេងទៀត";
}
?>
```

#### រង្វង់ while
```php
<?php
$i = 1;

while ($i <= 5) {
    echo "លេខ: $i <br>";
    $i++;
}

// do-while រង្វង់
$j = 1;
do {
    echo "លេខ: $j <br>";
    $j++;
} while ($j <= 5);
?>
```

#### រង្វង់ for
```php
<?php
for ($i = 1; $i <= 5; $i++) {
    echo "លេខ: $i <br>";
}
?>
```

#### រង្វង់ foreach
```php
<?php
$fruits = ["ផ្លែប៉ោម", "ផ្លែចេក", "ផ្លែក្រូច"];

foreach ($fruits as $fruit) {
    echo "ផ្លែឈើ: $fruit <br>";
}

// ជាមួយសន្ទស្សន៍
foreach ($fruits as $index => $fruit) {
    echo "ផ្លែឈើទី $index: $fruit <br>";
}
?>
```

### arrays
```php
<?php
// Indexed array
$fruits = ["ផ្លែប៉ោម", "ផ្លែចេក", "ផ្លែក្រូច"];
echo $fruits[0];  // ផ្លែប៉ោម

// Associative array
$person = [
    "name" => "សុភា",
    "age" => 25,
    "city" => "ភ្នំពេញ"
];
echo $person["name"];  // សុភា

// Multidimensional array
$people = [
    ["name" => "សុភា", "age" => 25],
    ["name" => "ដារា", "age" => 30]
];
echo $people[1]["name"];  // ដារា

// វិធីសាស្ត្រ array ទូទៅ
$count = count($fruits);  // 3
array_push($fruits, "ផ្លែស្វាយ");  // បន្ថែមនៅចុងបញ្ចប់
$lastFruit = array_pop($fruits);  // យកចេញពីចុងបញ្ចប់
$firstFruit = array_shift($fruits);  // យកចេញពីដើម
array_unshift($fruits, "ផ្លែទំពាំងបាយជូរ");  // បន្ថែមនៅដើម
$exists = in_array("ផ្លែប៉ោម", $fruits);  // ឆែកថាធាតុមាននៅក្នុង array
$keys = array_keys($person);  // ទទួលបានគ្រប់ keys ពី associative array
?>
```

## ៥. ការសរសេរកម្មវិធីបែប Object-Oriented ក្នុង PHP

ការសរសេរកម្មវិធីបែប Object-Oriented (OOP) គឺជាគំរូដែលប្រើប្រាស់ "វត្ថុ" ដើម្បីតំណាងឱ្យទិន្នន័យនិងវិធីសាស្ត្រជាមួយគ្នា។

### Classes និង Objects
Class គឺជាគំរូឬផ្លូវសម្រាប់បង្កើតវត្ថុ ខណៈពេលដែលវត្ថុគឺជាអ៊ីនស្តង់នៃថ្នាក់។

```php
<?php
// និយមន័យថ្នាក់
class Car {
    // Properties (attributes)
    public $brand;
    public $color;
    
    // Constructor
    public function __construct($brand, $color) {
        $this->brand = $brand;
        $this->color = $color;
    }
    
    // Method
    public function getDescription() {
        return "នេះគឺជារថយន្ត {$this->color} {$this->brand}";
    }
}

// ការបង្កើតវត្ថុ
$myCar = new Car("Toyota", "កាហ្វេ");
echo $myCar->getDescription();  // "នេះគឺជារថយន្ត កាហ្វេ Toyota"
?>
```

### Access Modifiers
- **public**: អាចចូលប្រើបានពីកន្លែងណាមួយ
- **protected**: អាចចូលប្រើបានតែនៅក្នុងថ្នាក់និងថ្នាក់ចែករំលែកតែប៉ុណ្ណោះ
- **private**: អាចចូលប្រើបានតែនៅក្នុងថ្នាក់ដែលបានកំណត់បុ៉ណ្ណោះ

```php
<?php
class Account {
    private $accountNumber;
    protected $balance;
    public $accountType;
    
    public function __construct($accNumber, $balance, $type) {
        $this->accountNumber = $accNumber;
        $this->balance = $balance;
        $this->accountType = $type;
    }
    
    public function getAccountDetails() {
        return [
            'number' => $this->accountNumber,
            'balance' => $this->balance,
            'type' => $this->accountType
        ];
    }
}
?>
```

### Inheritance (ការសន្តតិកម្ម)
Inheritance អនុញ្ញាតឱ្យថ្នាក់មួយទទួលបានអាកប្បកិរិយានិងលក្ខណៈពិសេសពីថ្នាក់ផ្សេងទៀត។

```php
<?php
class SavingsAccount extends Account {
    private $interestRate;
    
    public function __construct($accNumber, $balance, $interestRate) {
        parent::__construct($accNumber, $balance, "Savings");
        $this->interestRate = $interestRate;
    }
    
    public function addInterest() {
        $interest = $this->balance * ($this->interestRate / 100);
        $this->balance += $interest;
        return $interest;
    }
}

$savings = new SavingsAccount("SA001", 1000, 2.5);
echo $savings->addInterest();  // 25
?>
```

### Interfaces
Interface កំណត់កិច្ចសន្យាដែលថ្នាក់ត្រូវតែអនុវត្ត។

```php
<?php
interface Payable {
    public function pay($amount);
    public function getBalance();
}

class Invoice implements Payable {
    private $amount;
    private $paid = 0;
    
    public function __construct($amount) {
        $this->amount = $amount;
    }
    
    public function pay($amount) {
        $this->paid += $amount;
    }
    
    public function getBalance() {
        return $this->amount - $this->paid;
    }
}
?>
```

### Abstract Classes
Abstract classes មិនអាចបង្កើតជាវត្ថុដោយផ្ទាល់ទេ ប៉ុន្តែអាចកើតឡើងពី។ ពួកគេអាចមានវិធីសាស្ត្រជារូបធាតុនិងអរូបិយ។

```php
<?php
abstract class Animal {
    protected $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    // វិធីសាស្ត្រជាក់ស្តែង
    public function getName() {
        return $this->name;
    }
    
    // វិធីសាស្ត្ររូបធាតុ (ត្រូវតែអនុវត្តក្នុងថ្នាក់កូន)
    abstract public function makeSound();
}

class Dog extends Animal {
    public function makeSound() {
        return "ឆ្កែព្រុស!";
    }
}

$dog = new Dog("Buddy");
echo $dog->getName();  // "Buddy"
echo $dog->makeSound();  // "ឆ្កែព្រុស!"
?>
```

### Static Methods and Properties
Static methods និង properties ប្រើជាមួយថ្នាក់ជំនួសឱ្យវត្ថុ។

```php
<?php
class MathHelper {
    public static $pi = 3.14159;
    
    public static function square($number) {
        return $number * $number;
    }
}

// ប្រើដោយមិនបង្កើតវត្ថុ
echo MathHelper::$pi;  // 3.14159
echo MathHelper::square(4);  // 16
?>
```

## ៦. ការយល់ដឹងអំពី namespaces និង autoloading

### Namespaces
Namespaces ជួយជៀសវាងការប៉ះទង្គិចឈ្មោះហើយរៀបចំកូដរបស់អ្នកឱ្យមានរចនាសម្ព័ន្ធល្អប្រសើរ។ ពួកវាដំណើរការដូចថតក្នុងប្រព័ន្ធឯកសារ។

```php
<?php
// ឯកសារ: App/Models/User.php
namespace App\Models;

class User {
    public function __construct() {
        echo "នេះគឺជាម៉ូឌែលអ្នកប្រើប្រាស់";
    }
}

// ឯកសារ: App/Controllers/UserController.php
namespace App\Controllers;

use App\Models\User;

class UserController {
    public function createUser() {
        $user = new User();
        return $user;
    }
}

// ការប្រើប្រាស់ពីកន្លែងណាមួយផ្សេងទៀត
use App\Controllers\UserController;

$controller = new UserController();
$controller->createUser();  // "នេះគឺជាម៉ូឌែលអ្នកប្រើប្រាស់"

// ឬប្រើឈ្មោះពេញលេញដោយមិនមាន use statement
$model = new \App\Models\User();
?>
```

### Autoloading
ការផ្ទុកដោយស្វ័យប្រវត្តិអនុញ្ញាតឱ្យ PHP ដាក់ថ្នាក់ដោយស្វ័យប្រវត្តិនៅពេលត្រូវការ ជំនួសឱ្យការប្រើ require ឬ include។ ក្នុង Laravel, នេះត្រូវបានគ្រប់គ្រងតាមរយៈ Composer។

#### PSR-4 Autoloading Standard
PSR-4 គឺជាស្តង់ដារដែលកំណត់របៀបដែល namespace ទាក់ទងនឹងផ្លូវឯកសារ។

**ឧទាហរណ៍នៃការកំណត់រចនាសម្ព័ន្ធ Composer (`composer.json`):**
```json
{
    "autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    }
}
```

ការកំណត់រចនាសម្ព័ន្ធនេះមានន័យថាលក្ខណៈណាមួយក្នុង namespace `App\` នឹងស្វែងរកក្នុងថត `app/`។ ឧទាហរណ៍ ថ្នាក់ `App\Models\User` នឹងត្រូវបានស្វែងរកនៅក្នុង `app/Models/User.php`។

បន្ទាប់ពីកែប្រែឯកសារ composer.json បើកបញ្ជាក្នុង terminal និងរត់:

```bash
composer dump-autoload
```

## ៧. ការគ្រប់គ្រងទិន្នន័យក្នុង PHP (arrays, forms)

### ការទាញយកទិន្នន័យពីទម្រង់បែបបទ
PHP ប្រើអថេរ superglobals `$_POST`, `$_GET`, និង `$_REQUEST` ដើម្បីចាប់យកទិន្នន័យដែលបានបញ្ជូនពីទម្រង់។

#### ការដោះស្រាយទម្រង់ POST
```php
<!-- contact_form.html -->
<form action="process.php" method="post">
    <input type="text" name="name" placeholder="ឈ្មោះរបស់អ្នក" />
    <input type="email" name="email" placeholder="អ៊ីមែលរបស់អ្នក" />
    <textarea name="message" placeholder="សារ"></textarea>
    <button type="submit">ផ្ញើ</button>
</form>

<!-- process.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // ធ្វើការផ្ទៀងផ្ទាត់
    if (empty($name) || empty($email) || empty($message)) {
        echo "សូមបំពេញគ្រប់វាលទាំងអស់";
    } else {
        // ដំណើរការទិន្នន័យទម្រង់
        echo "បានទទួលសារពី: $name ($email)";
        echo "សារ: $message";
    }
}
?>
```

#### ការដោះស្រាយទម្រង់ GET
```php
<!-- search_form.html -->
<form action="search.php" method="get">
    <input type="text" name="query" placeholder="ស្វែងរក..." />
    <button type="submit">ស្វែងរក</button>
</form>

<!-- search.php -->
<?php
if (isset($_GET["query"])) {
    $query = $_GET["query"];
    echo "លទ្ធផលស្វែងរកសម្រាប់: " . htmlspecialchars($query);
}
?>
```

### ការធ្វើឱ្យទិន្នន័យពីទម្រង់មានសុវត្ថិភាព
```php
<?php
// សំអាតទិន្នន័យពីទម្រង់
$name = trim($_POST["name"]);  // លុបចោលចន្លោះនៅដើមនិងចុង
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);  // សំអាតអ៊ីមែល

// ផ្ទៀងផ្ទាត់ទិន្នន័យ
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "អាសយដ្ឋានអ៊ីមែលមិនត្រឹមត្រូវ";
}

// បង្ការការវាយប្រហារ XSS
$message = htmlspecialchars($_POST["message"]);
?>
```

### ការគ្រប់គ្រង Arrays ជាមួយទិន្នន័យស្មុគស្មាញ
```php
<?php
// Associative arrays ដ៏ស្មុគស្មាញ
$student = [
    "name" => "សុភា",
    "grades" => [
        "math" => 85,
        "science" => 92,
        "history" => 78
    ],
    "activities" => ["football", "chess", "reading"]
];

// ការចូលប្រើទិន្នន័យ Array
echo $student["name"];  // សុភា
echo $student["grades"]["math"];  // 85
echo $student["activities"][0];  // football

// Array ការគណនា
$average = array_sum($student["grades"]) / count($student["grades"]);
echo "ពិន្ទុមធ្យម: $average";  // ពិន្ទុមធ្យម: 85

// ការវិភាគ arrays ស្មុគស្មាញ
function analyzeStudent($student) {
    $highestGrade = max($student["grades"]);
    $lowestGrade = min($student["grades"]);
    $bestSubject = array_search($highestGrade, $student["grades"]);
    
    return [
        "average" => array_sum($student["grades"]) / count($student["grades"]),
        "highest" => [
            "subject" => $bestSubject,
            "grade" => $highestGrade
        ],
        "lowest" => [
            "subject" => array_search($lowestGrade, $student["grades"]),
            "grade" => $lowestGrade
        ]
    ];
}

$analysis = analyzeStudent($student);
echo "មុខវិជ្ជាពូកែបំផុត: " . $analysis["highest"]["subject"];
?>
```

## ៨. ការណែនាំអំពីឧបករណ៍គ្រប់គ្រងកញ្ចប់ Composer

Composer គឺជាឧបករណ៍គ្រប់គ្រងការពឹងផ្អែកសម្រាប់ PHP ដែលអនុញ្ញាតឱ្យអ្នកកំណត់និងគ្រប់គ្រងបណ្ណាល័យផ្សេងៗដែលគម្រោងរបស់អ្នកត្រូវការ។

### មុខងារសំខាន់របស់ Composer
1. **ការគ្រប់គ្រងការពឹងផ្អែក**: ដំឡើង និងធ្វើបច្ចុប្បន្នភាពបណ្ណាល័យដែលត្រូវការ
2. **Autoloading**: ផ្តល់ការផ្ទុកដោយស្វ័យប្រវត្តិសម្រាប់ថ្នាក់
3. **ការគ្រប់គ្រងកំណែ**: ជួយបញ្ជាក់កំណែជាក់លាក់នៃការពឹងផ្អែក
4. **ម៉ាស៊ីនស្គ្រីប**: អនុវត្តស្គ្រីបដើម្បីជួយក្នុងការអភិវឌ្ឍន៍

### ឯកសារ composer.json
ឯកសារនេះកំណត់រាល់ការពឹងផ្អែករបស់គម្រោង:

```json
{
    "name": "myproject/app",
    "description": "My Laravel Project",
    "type": "project",
    "require": {
        "php": "^7.4|^8.0",
        "laravel/framework": "^8.0",
        "guzzlehttp/guzzle": "^7.0"
    },
    "require-dev": {
        "phpunit/phpunit": "^9.0",
        "mockery/mockery": "^1.4"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    },
    "scripts": {
        "test": "phpunit"
    }
}
```

### ពាក្យបញ្ជា Composer ទូទៅ

#### ការដំឡើងការពឹងផ្អែក
```bash
# ដំឡើងគ្រប់ការពឹងផ្អែកដែលបានកំណត់ក្នុង composer.json
composer install

# ដំឡើងការពឹងផ្អែកជាក់លាក់មួយ
composer require guzzlehttp/guzzle

# ដំឡើងការពឹងផ្អែកអភិវឌ្ឍន៍
composer require --dev phpunit/phpunit
```

#### ការអាប់ដេតការពឹងផ្អែក
```bash
# ធ្វើបច្ចុប្បន្នភាពគ្រប់កញ្ចប់
composer update

# ធ្វើបច្ចុប្បន្នភាពកញ្ចប់ជាក់លាក់
composer update laravel/framework
```

#### ការបង្កើតឯកសារ autoloader
```bash
composer dump-autoload
```

#### ការបង្កើតគម្រោងថ្មី
```bash
composer create-project laravel/laravel my-project
```

### ការប្រើប្រាស់បណ្ណាល័យដែលបានដំឡើងដោយ Composer
```php
<?php
// ដាក់បញ្ចូល autoloader
require_once 'vendor/autoload.php';

// ប្រើកញ្ចប់ដែលបានដំឡើង
use GuzzleHttp\Client;

$client = new Client();
$response = $client->get('https://api.example.com/data');
$data = json_decode($response->getBody());

echo $data->title;
?>
```

### សេចក្តីសន្និដ្ឋាន
នៅក្នុងមេរៀននេះ យើងបានរៀនអំពីមូលដ្ឋានគ្រឹះនៃ PHP និងពីរបៀបដែលវាត្រូវបានប្រើប្រាស់ក្នុង Laravel Framework។ យើងបានពិនិត្យមើលការរៀបចំបរិស្ថានអភិវឌ្ឍន៍ ស្ថាបត្យកម្ម MVC មូលដ្ឋានគ្រឹះនៃ PHP ការសរសេរកម្មវិធីបែប Object-Oriented namespaces និង autoloading ការគ្រប់គ្រងទិន្នន័យ និងការគ្រប់គ្រងកញ្ចប់ជាមួយ Composer។

ចំណេះដឹងទាំងនេះគឺជាមូលដ្ឋានគ្រឹះសំខាន់សម្រាប់ការអភិវឌ្ឍន៍ Laravel ដែលយើងនឹងស្វែងយល់បន្ថែមនៅក្នុងវគ្គបន្ទាប់។ នៅពេលដែលយើងបន្តទៅមុខ យើងនឹងរៀនអំពីរបៀបប្រើប្រាស់មូលដ្ឋានគ្រឹះទាំងនេះដើម្បីបង្កើតកម្មវិធីវេបដែលមានប្រសិទ្ធភាព និងងាយថែទាំជាមួយ Laravel។