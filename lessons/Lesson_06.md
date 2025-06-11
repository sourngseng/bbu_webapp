# មេរៀនទី៦៖ ការតភ្ជាប់ PHP ទៅកាន់ MySQL

## គោលបំណងមេរៀន
បន្ទាប់ពីសិក្សាមេរៀននេះ សិស្សនឹងអាច៖
- ធ្វើការតភ្ជាប់ PHP ទៅ MySQL
- អនុវត្តប្រតិបត្តិការ CRUD ពេញលេញ
- ប្រើ Prepared Statements សម្រាប់សុវត្ថិភាព
- គ្រប់គ្រង Database Transactions
- សាងសង់ Website ដែលមាន Database ជាមូលដ្ឋាន

## ១. ការតភ្ជាប់ PHP ទៅកាន់ MySQL

### mysqli Extension
```php
<?php
// Connection Establishment
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Close connection
$conn->close();
?>
```

### PDO Alternative
```php
<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=mydatabase", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
```

## ២. ប្រតិបត្តិការ CRUD (Create, Read, Update, Delete)

### Create (Insert) Operation
```php
<?php
// mysqli Method
function createStudent($conn, $name, $email, $age) {
    $sql = "INSERT INTO students (name, email, age) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $email, $age);
    
    return $stmt->execute();
}

// PDO Method
function createStudentPDO($conn, $name, $email, $age) {
    $sql = "INSERT INTO students (name, email, age) VALUES (:name, :email, :age)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    
    return $stmt->execute();
}
?>
```

### Read (Select) Operation
```php
<?php
// mysqli Method
function getStudents($conn) {
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);
    
    $students = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }
    return $students;
}

// PDO Method
function getStudentsPDO($conn) {
    $stmt = $conn->prepare("SELECT * FROM students");
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
```

### Update Operation
```php
<?php
// mysqli Method
function updateStudent($conn, $id, $name, $email) {
    $sql = "UPDATE students SET name = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $email, $id);
    
    return $stmt->execute();
}

// PDO Method
function updateStudentPDO($conn, $id, $name, $email) {
    $sql = "UPDATE students SET name = :name, email = :email WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);
    
    return $stmt->execute();
}
?>
```

### Delete Operation
```php
<?php
// mysqli Method
function deleteStudent($conn, $id) {
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    return $stmt->execute();
}

// PDO Method
function deleteStudentPDO($conn, $id) {
    $sql = "DELETE FROM students WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    
    return $stmt->execute();
}
?>
```

## ៣. Prepared Statements

### Security Benefits
```php
<?php
// Preventing SQL Injection
function secureLogin($conn, $username, $password) {
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}
?>
```

## ៤. Transaction Management

### Handling Multiple Operations
```php
<?php
function transferMoney($conn, $from_account, $to_account, $amount) {
    try {
        // Start transaction
        $conn->begin_transaction();
        
        // Withdraw from source account
        $sql1 = "UPDATE accounts SET balance = balance - ? WHERE id = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("di", $amount, $from_account);
        $stmt1->execute();
        
        // Deposit to destination account
        $sql2 = "UPDATE accounts SET balance = balance + ? WHERE id = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("di", $amount, $to_account);
        $stmt2->execute();
        
        // Commit transaction
        $conn->commit();
        return true;
    } catch (Exception $e) {
        // Rollback in case of error
        $conn->rollback();
        return false;
    }
}
?>
```

## ៥. Lab: Simple Database-driven Website

### student_management.php
```php
<?php
class StudentManagement {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function displayStudents() {
        $students = getStudents($this->conn);
        
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . $student['name'] . "</td>";
            echo "<td>" . $student['email'] . "</td>";
            echo "<td>" . $student['age'] . "</td>";
            echo "</tr>";
        }
    }
    
    public function addStudent($name, $email, $age) {
        return createStudent($this->conn, $name, $email, $age);
    }
}
?>
```

## Project សម្រាប់សិស្ស
1. បង្កើត Personal Blog System
2. សាងសង់ Online Library Management
3. អភិវឌ្ឍ E-commerce Product Catalog

## ធនធាន Learning
- PHP Official MySQL Documentation
- PDO Tutorial on PHP.net
- MySQL Performance Optimization
- Web Security Best Practices