# មេរៀនទី៧៖ Object-Oriented Programming ក្នុង PHP

## គោលបំណងមេរៀន
បន្ទាប់ពីសិក្សាមេរៀននេះ សិស្សនឹងអាច៖
- យល់ពីមូលដ្ឋាន Object-Oriented Programming
- បង្កើត Classes និង Objects ក្នុង PHP
- ប្រើ Properties និង Methods
- អនុវត្ត Inheritance និង Polymorphism
- សាងសង់ Project OOP សាមញ្ញ

## ១. ការណែនាំអំពី Object-Oriented Programming (OOP)

### មូលធន OOP
- **Object**: ឧទាហរណ៍នៃ Class
- **Class**: ទម្រង់/ពុម្ពសម្រាប់បង្កើត Objects
- **Encapsulation**: ដាក់ទិន្នន័យ និងមុខងារក្នុង Object
- **Inheritance**: ការlifting properties/methods ពី Class មេ

### ឧទាហរណ៍ Basic Concept
```php
<?php
// Class តំណាងឲ្យ Student
class Student {
    // Properties (Attributes)
    public $name;
    public $age;
    
    // Constructor Method
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
    
    // Method
    public function introduce() {
        echo "ខ្ញុំឈ្មោះ {$this->name} អាយុ {$this->age} ឆ្នាំ";
    }
}

// Create Object
$student1 = new Student("សុធា", 20);
$student1->introduce();
?>
```

## ២. Classes និង Objects ក្នុង PHP

### Access Modifiers
```php
<?php
class Car {
    // Public - Access ពីខាងក្រៅ
    public $model;
    
    // Private - Access តែក្នុង Class
    private $serialNumber;
    
    // Protected - Access ក្នុង Class នេះ និង Class កូន
    protected $currentSpeed;
    
    public function __construct($model) {
        $this->model = $model;
        $this->serialNumber = uniqid();
    }
    
    // Getter method
    public function getSerialNumber() {
        return $this->serialNumber;
    }
}

$myCar = new Car("Toyota");
echo $myCar->model;  // Public property
// echo $myCar->serialNumber;  // Error - Private property
?>
```

## ៣. Properties និង Methods

### Complex Example
```php
<?php
class BankAccount {
    private $balance;
    private $accountNumber;
    
    public function __construct($initialBalance) {
        $this->balance = $initialBalance;
        $this->accountNumber = $this->generateAccountNumber();
    }
    
    private function generateAccountNumber() {
        return "ACC-" . rand(10000, 99999);
    }
    
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            return true;
        }
        return false;
    }
    
    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }
    
    public function getBalance() {
        return $this->balance;
    }
    
    public function getAccountNumber() {
        return $this->accountNumber;
    }
}

$account = new BankAccount(1000);
$account->deposit(500);
echo $account->getBalance();  // 1500
?>
```

## ៤. Inheritance និង Polymorphism

### Inheritance Example
```php
<?php
class Person {
    protected $name;
    protected $age;
    
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
    
    public function introduce() {
        echo "ខ្ញុំឈ្មោះ {$this->name}";
    }
}

class Student extends Person {
    private $studentId;
    
    public function __construct($name, $age, $studentId) {
        parent::__construct($name, $age);
        $this->studentId = $studentId;
    }
    
    // Overriding parent method
    public function introduce() {
        parent::introduce();
        echo " លេខសញ្ញាប័ណ្ឌ {$this->studentId}";
    }
}

$student = new Student("សុធា", 20, "ST001");
$student->introduce();
?>
```

### Polymorphism Example
```php
<?php
interface Shape {
    public function calculateArea();
}

class Rectangle implements Shape {
    private $width;
    private $height;
    
    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }
    
    public function calculateArea() {
        return $this->width * $this->height;
    }
}

class Circle implements Shape {
    private $radius;
    
    public function __construct($radius) {
        $this->radius = $radius;
    }
    
    public function calculateArea() {
        return pi() * $this->radius * $this->radius;
    }
}

function printArea(Shape $shape) {
    echo "ផ្ទៃ៖ " . $shape->calculateArea();
}

$rectangle = new Rectangle(5, 3);
$circle = new Circle(4);

printArea($rectangle);  // 15
printArea($circle);     // 50.27
?>
```

## ៥. Lab: Simple OOP Project

### Library Management System
```php
<?php
class Book {
    private $title;
    private $author;
    private $isAvailable;
    
    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
        $this->isAvailable = true;
    }
    
    public function borrowBook() {
        if ($this->isAvailable) {
            $this->isAvailable = false;
            return true;
        }
        return false;
    }
    
    public function returnBook() {
        $this->isAvailable = true;
    }
    
    public function getBookInfo() {
        $status = $this->isAvailable ? "Available" : "Borrowed";
        return "Title: {$this->title}, Author: {$this->author}, Status: {$status}";
    }
}

class Library {
    private $books = [];
    
    public function addBook(Book $book) {
        $this->books[] = $book;
    }
    
    public function listBooks() {
        foreach ($this->books as $book) {
            echo $book->getBookInfo() . "\n";
        }
    }
}

$library = new Library();
$book1 = new Book("ប្រវត្តិសាស្ត្រកម្ពុជា", "អ្នកនិពន្ធ A");
$book2 = new Book("វិទ្យាសាស្ត្រ", "អ្នកនិពន្ធ B");

$library->addBook($book1);
$library->addBook($book2);
$library->listBooks();
?>
```

## Project សម្រាប់សិស្ស
1. បង្កើត Student Management System
2. សាងសង់ Simple E-commerce Cart
3. អភិវឌ្ឍ Task Management Application

## ធនធាន Learning
- PHP Official OOP Documentation
- Design Patterns in PHP
- Clean Code: A Handbook of Agile Software Craftsmanship
- Object-Oriented Thought Process Book