# មេរៀនទី៨៖ Advanced OOP & Namespaces

## គោលបំណងមេរៀន
បន្ទាប់ពីសិក្សាមេរៀននេះ សិស្សនឹងអាច៖
- យល់ និងប្រើ Interfaces និង Abstract Classes
- ស្គាល់ Magic Methods
- អនុវត្ត Namespaces
- អនុវត្ត Class Autoloading
- កែលម្អ OOP Project

## ១. Interfaces និង Abstract Classes

### Interfaces
```php
<?php
// Interface សម្រាប់ Payment Methods
interface PaymentMethod {
    public function processPayment($amount);
    public function refund($amount);
}

// Concrete Implementation
class CreditCardPayment implements PaymentMethod {
    public function processPayment($amount) {
        echo "Processing credit card payment of $amount";
        return true;
    }
    
    public function refund($amount) {
        echo "Refunding $amount to credit card";
        return true;
    }
}

class PayPalPayment implements PaymentMethod {
    public function processPayment($amount) {
        echo "Processing PayPal payment of $amount";
        return true;
    }
    
    public function refund($amount) {
        echo "Refunding $amount via PayPal";
        return true;
    }
}

// Polymorphic Usage
function makePayment(PaymentMethod $method, $amount) {
    $method->processPayment($amount);
}

$creditCard = new CreditCardPayment();
$paypal = new PayPalPayment();

makePayment($creditCard, 100);
makePayment($paypal, 200);
?>
```

### Abstract Classes
```php
<?php
// Abstract Base Class
abstract class DatabaseConnection {
    protected $connection;
    
    // Abstract method (must be implemented by child classes)
    abstract public function connect();
    
    // Concrete method
    public function disconnect() {
        echo "Disconnecting from database";
        $this->connection = null;
    }
    
    // Template method
    public function performQuery($query) {
        $this->connect();
        // Execute query logic
        $this->disconnect();
    }
}

// Concrete Implementation
class MySQLConnection extends DatabaseConnection {
    public function connect() {
        echo "Connecting to MySQL database";
        $this->connection = new PDO("mysql:host=localhost;dbname=testdb", "username", "password");
    }
}

class PostgreSQLConnection extends DatabaseConnection {
    public function connect() {
        echo "Connecting to PostgreSQL database";
        $this->connection = new PDO("pgsql:host=localhost;dbname=testdb", "username", "password");
    }
}
?>
```

## ២. Magic Methods

### Complete Magic Methods Example
```php
<?php
class MagicMethodDemo {
    private $data = [];
    
    // __construct() - Called when object is created
    public function __construct() {
        echo "Object created!";
    }
    
    // __set() - Called when writing to inaccessible properties
    public function __set($name, $value) {
        echo "Setting '$name' to '$value'";
        $this->data[$name] = $value;
    }
    
    // __get() - Called when reading inaccessible properties
    public function __get($name) {
        echo "Retrieving '$name'";
        return $this->data[$name] ?? null;
    }
    
    // __call() - Called when invoking inaccessible methods
    public function __call($method, $args) {
        echo "Calling non-existent method: $method";
    }
    
    // __toString() - Called when object is treated as a string
    public function __toString() {
        return "MagicMethodDemo Object";
    }
    
    // __invoke() - Called when script tries to call an object as a function
    public function __invoke($x) {
        echo "Object called as function with $x";
    }
}

$obj = new MagicMethodDemo();
$obj->name = "សុធា";  // __set()
echo $obj->name;      // __get()
$obj->unknownMethod();  // __call()
echo $obj;           // __toString()
$obj(42);            // __invoke()
?>
```

## ៣. Namespaces

### Namespace Implementation
```php
<?php
// File: UserManagement.php
namespace App\Users;

class User {
    public function createUser() {
        echo "User created in Users namespace";
    }
}

// File: ProductManagement.php
namespace App\Products;

class Product {
    public function createProduct() {
        echo "Product created in Products namespace";
    }
}

// Using namespaces
use App\Users\User;
use App\Products\Product;

$user = new User();
$product = new Product();

// Aliasing
use App\Users\User as AppUser;
?>
```

## ៤. Autoloading Classes

### Autoloader Implementation
```php
<?php
// Autoload function
function myAutoloader($className) {
    $className = str_replace("\\", "/", $className);
    $filepath = __DIR__ . "/" . $className . ".php";
    
    if (file_exists($filepath)) {
        require_once $filepath;
    }
}

// Register autoloader
spl_autoload_register('myAutoloader');

// Modern Composer-style Autoloading
// composer.json
// {
//     "autoload": {
//         "psr-4": {
//             "App\\": "src/"
//         }
//     }
// }
```

## ៥. Lab: Advanced OOP Project Improvement

### Enhanced Library Management System
```php
<?php
namespace App\Library;

// Interface for library items
interface LibraryItem {
    public function checkOut();
    public function returnItem();
    public function getDetails();
}

// Abstract base class
abstract class BaseItem implements LibraryItem {
    protected $title;
    protected $isCheckedOut = false;
    
    public function __construct($title) {
        $this->title = $title;
    }
    
    abstract public function getItemType();
    
    public function getDetails() {
        return [
            'title' => $this->title,
            'type' => $this->getItemType(),
            'status' => $this->isCheckedOut ? 'Checked Out' : 'Available'
        ];
    }
}

// Concrete implementations
class Book extends BaseItem {
    private $author;
    
    public function __construct($title, $author) {
        parent::__construct($title);
        $this->author = $author;
    }
    
    public function getItemType() {
        return 'Book';
    }
    
    public function checkOut() {
        if (!$this->isCheckedOut) {
            $this->isCheckedOut = true;
            return true;
        }
        return false;
    }
    
    public function returnItem() {
        $this->isCheckedOut = false;
    }
}

class LibraryManagementSystem {
    private $items = [];
    
    public function addItem(LibraryItem $item) {
        $this->items[] = $item;
    }
    
    public function listItems() {
        foreach ($this->items as $item) {
            print_r($item->getDetails());
        }
    }
}

// Usage
$library = new LibraryManagementSystem();
$book1 = new Book("ប្រវត្តិសាស្ត្រកម្ពុជា", "អ្នកនិពន្ធ A");
$book2 = new Book("វិទ្យាសាស្ត្រ", "អ្នកនិពន្ធ B");

$library->addItem($book1);
$library->addItem($book2);
$library->listItems();
?>
```

## Project សម្រាប់សិស្ស
1. បង្កើត Advanced E-commerce System
2. សាងសង់ Robust Task Management Application
3. អភិវឌ្ឍ Complex User Authentication System

## ធនធាន Learning
- PHP Namespaces Documentation
- Advanced PHP Programming Book
- Design Patterns in PHP
- PHP Best Practices Guide