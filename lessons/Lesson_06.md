# មេរៀនទី ៦៖ ការរួមបញ្ចូល PHP និង MySQL (៣ ម៉ោង)

## គោលបំណងមេរៀន
1. យល់ដឹងពីរបៀបភ្ជាប់ PHP ទៅកាន់ MySQL ដើម្បីធ្វើអន្តរកម្មជាមួយ Database។
2. អាចអនុវត្តការបញ្ចូល ទាញយក កែប្រែ និងលុបទិន្នន័យ (CRUD) ក្នុង MySQL ដោយប្រើ PHP។
3. ស្វែងយល់ពីការប្រើ Prepared Statements ដើម្បីបង្កើនសុវត្ថិភាព។
4. រៀនគ្រប់គ្រង Transactions ដើម្បីធានាភាពត្រឹមត្រូវនៃទិន្នន័យ។
5. អនុវត្តជាក់ស្តែងក្នុងការបង្កើតគេហទំព័រដែលភ្ជាប់ជាមួយ Database។

---

## ១. ការតភ្ជាប់ PHP ទៅកាន់ MySQL

### ការពន្យល់
PHP ប្រើ extensions ដូចជា `mysqli` ឬ `PDO` ដើម្បីភ្ជាប់ទៅ MySQL។ ក្នុងមេរៀននេះ យើងនឹងប្រើ `mysqli` ដែលជាវិធីសាស្ត្រទូទៅ។

### Syntax
```php
// ភ្ជាប់ MySQL ដោយប្រើ mysqli
$conn = new mysqli("hostname", "username", "password", "database_name");

// ពិនិត្យការភ្ជាប់
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
```

### ឧទាហរណ៍
```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example_db";

// បង្កើតការភ្ជាប់
$conn = new mysqli($servername, $username, $password, $dbname);

// ពិនិត្យការភ្ជាប់
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";

// បិទការភ្ជាប់
$conn->close();
?>
```

### ការពន្យល់ឧទាហរណ៍
- `$conn = new mysqli(...)` បង្កើតការភ្ជាប់ទៅ MySQL server ដោយប្រើ hostname (`localhost`), username, password, និង database name។
- `connect_error` ពិនិត្យថាតើការភ្ជាប់ជោគជ័យឬអត់។ បើមានបញ្ហា `die()` បញ្ឈប់កម្មវិធី។
- `$conn->close()` បិទការភ្ជាប់បន្ទាប់ពីប្រើរួច ដើម្បីសន្សំធនធាន។

---

## ២. ការបញ្ចូល ទាញយក កែប្រែ និងលុបទិន្នន័យ (CRUD)

### ការពន្យល់
CRUD តំណាងឱ្យ Create, Read, Update, Delete ដែលជាប្រតិបត្តិការមូលដ្ឋានសម្រាប់គ្រប់គ្រងទិន្នន័យក្នុង Database។

### Syntax
```php
// Create (បញ្ចូល)
$sql = "INSERT INTO table_name (column1, column2) VALUES ('value1', 'value2')";
$conn->query($sql);

// Read (ទាញយក)
$sql = "SELECT column1, column2 FROM table_name WHERE condition";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    // ដំណើរការទិន្នន័យ
}

// Update (កែប្រែ)
$sql = "UPDATE table_name SET column1 = 'new_value' WHERE condition";
$conn->query($sql);

// Delete (លុប)
$sql = "DELETE FROM table_name WHERE condition";
$conn->query($sql);
```

### ឧទាហរណ៍
```php
<?php
$conn = new mysqli("localhost", "root", "", "example_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create
$sql = "INSERT INTO users (name, email) VALUES ('Sok', 'sok@example.com')";
$conn->query($sql);

// Read
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Email: " . $row['email'] . "<br>";
}

// Update
$sql = "UPDATE users SET email = 'sok.new@example.com' WHERE name = 'Sok'";
$conn->query($sql);

// Delete
$sql = "DELETE FROM users WHERE name = 'Sok'";
$conn->query($sql);

$conn->close();
?>
```

### ការពន្យល់ឧទាហរណ៍
- **Create**: បញ្ចូលអ្នកប្រើថ្មី (Sok, sok@example.com) ទៅក្នុង Table `users`។
- **Read**: ទាញយកទិន្នន័យទាំងអស់ពី Table `users` ហើយបង្ហាញជា HTML។
- **Update**: កែប្រែអ៊ីមែលរបស់ Sok។
- **Delete**: លុបអ្នកប្រើ Sok ចេញពី Table។

---

## ៣. Prepared Statements

### ការពន្យល់
Prepared Statements ជួយការពារការវាយប្រហារ SQL Injection ដោយបំបែកទិន្នន័យ និង Query។ វាក៏បង្កើនប្រសិទ្ធភាពសម្រាប់ Queries ដែលប្រើច្រើនដង។

### Syntax
```php
// រៀបចំ Prepared Statement
$stmt = $conn->prepare("INSERT INTO table_name (column1, column2) VALUES (?, ?)");
$stmt->bind_param("ss", $value1, $value2); // s = string, i = integer
$stmt->execute();
$stmt->close();
```

### ឧទាហរណ៍
```php
<?php
$conn = new mysqli("localhost", "root", "", "example_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// រៀបចំ Prepared Statement
$stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);

// កំណត់តម្លៃ
$name = "Dara";
$email = "dara@example.com";
$stmt->execute();

echo "New user added!";

$stmt->close();
$conn->close();
?>
```

### ការពន្យល់ឧទាហរណ៍
- `$conn->prepare` រៀបចំ Query ដែលមាន placeholders (`?`)។
- `bind_param("ss", ...)` បញ្ជាក់ប្រភេទទិន្នន័យ (`s` សម្រាប់ string) និងភ្ជាប់តម្លៃ។
- `$stmt->execute()` ប្រតិបត្តិ Query ដោយប្រើទិន្នន័យដែលបានភ្ជាប់។
- វិធីនេះការពារការវាយប្រហារ SQL Injection ដោយសារទិន្នន័យមិនត្រូវបានបញ្ចូលផ្ទាល់ទៅក្នុង Query។

---

## ៤. Transaction Management

### ការពន្យល់
Transactions ធានាថាប្រតិបត្តិការជាច្រើនត្រូវបានប្រតិបត្តិទាំងស្រុង ឬមិនប្រតិបត្តិទាំងអស់។ វាសំខាន់សម្រាប់ភាពត្រឹមត្រូវនៃទិន្នន័យ។

### Syntax
```php
$conn->begin_transaction();
try {
    // ប្រតិបត្តិការ Queries
    $conn->query("SQL Query 1");
    $conn->query("SQL Query 2");
    $conn->commit(); // បញ្ជាក់ការផ្លាស់ប្តូរ
} catch (Exception $e) {
    $conn->rollback(); // បដិសេធការផ្លាស់ប្តូរ
    echo "Error: " . $e->getMessage();
}
```

### ឧទាហរណ៍
```php
<?php
$conn = new mysqli("localhost", "root", "", "example_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->begin_transaction();
try {
    $conn->query("INSERT INTO users (name, email) VALUES ('Vicheka', 'vicheka@example.com')");
    $conn->query("UPDATE users SET email = 'vicheka.new@example.com' WHERE name = 'Vicheka'");
    $conn->commit();
    echo "Transaction successful!";
} catch (Exception $e) {
    $conn->rollback();
    echo "Transaction failed: " . $e->getMessage();
}

$conn->close();
?>
```

### ការពន្យល់ឧទាហរណ៍
- `$conn->begin_transaction()` ចាប់ផ្តើម Transaction។
- Queries ពីរត្រូវបានប្រតិបត្តិ៖ បញ្ចូលអ្នកប្រើថ្មី និងកែប្រែអ៊ីមែល។
- `$conn->commit()` បញ្ជាក់ការផ្លាស់ប្តូរប្រសិនបើគ្មានបញ្ហា។
- បើមានបញ្ហា `$conn->rollback()` បដិសេធការផ្លាស់ប្តូរទាំងអស់។

---

## ៥. Lab: ការបង្កើត Simple Database-driven Website

### កិច្ចការអនុវត្ត
សិស្សត្រូវបង្កើតគេហទំព័រសាមញ្ញដែលភ្ជាប់ជាមួយ MySQL សម្រាប់គ្រប់គ្រង "Product List"។ គេហទំព័រនេះត្រូវមានមុខងារដូចខាងក្រោម៖
1. បញ្ចូលផលិតផលថ្មី (ឈ្មោះ និងតម្លៃ)។
2. បង្ហាញបញ្ជីផលិតផលទាំងអស់។
3. កែប្រែ និងលុបផលិតផល។
4. ប្រើ Prepared Statements ដើម្បីធានាសុវត្ថិភាព។

### កូដគំរូ
```php
<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Product Management</h2>
    <form method="post">
        <label>Product Name:</label><br>
        <input type="text" name="name"><br>
        <label>Price:</label><br>
        <input type="number" name="price" step="0.01"><br>
        <input type="submit" name="add" value="Add Product">
    </form>

    <h3>Product List</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "example_db");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // បញ្ចូលផលិតផល
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stmt = $conn->prepare("INSERT INTO products (name, price) VALUES (?, ?)");
            $stmt->bind_param("sd", $name, $price);
            $stmt->execute();
            $stmt->close();
        }

        // លុបផលិតផល
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }

        // កែប្រែផលិតផល
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stmt = $conn->prepare("UPDATE products SET name = ?, price = ? WHERE id = ?");
            $stmt->bind_param("sdi", $name, $price, $id);
            $stmt->execute();
            $stmt->close();
        }

        // បង្ហាញផលិតផល
        $result = $conn->query("SELECT * FROM products");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>$" . $row['price'] . "</td>";
            echo "<td>";
            echo "<form method='post' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<input type='text' name='name' value='" . $row['name'] . "' size='10'>";
            echo "<input type='number' name='price' value='" . $row['price'] . "' size='5' step='0.01'>";
            echo "<input type='submit' name='update' value='Update'>";
            echo "</form>";
            echo " | <a href='?delete=" . $row['id'] . "'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
```

### ការរៀបចំ Database
មុននឹងដំណើរការកូដ ត្រូវបង្កើត Database និង Table ដូចខាងក្រោម៖
```sql
CREATE DATABASE example_db;
USE example_db;
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10,2)
);
```

### ការពន្យល់កូដ
- **ទម្រង់បញ្ចូល**: អ្នកប្រើបញ្ចូលឈ្មោះ និងតម្លៃផលិតផលតាម `<form>`។
- **បញ្ចូលផលិតផល**: ប្រើ Prepared Statement ដើម្បីបញ្ចូលផលិតផលថ្មីទៅក្នុង Table `products`។
- **បង្ហាញផលិតផល**: ទាញទិន្នន័យទាំងអស់ពី Table `products` ហើយបង្ហាញក្នុង `<table>`។
- **កែប្រែ និងលុប**: នីមួយជួរមានទម្រង់សម្រាប់កែប្រែ (UPDATE) និង link សម្រាប់លុប (DELETE) ដោយប្រើ Prepared Statements។
- **សុវត្ថិភាព**: ប្រើ Prepared Statements សម្រាប់គ្រប់ Query ដើម្បីការពារការវាយប្រហារ SQL Injection។

### ការណែនាំសម្រាប់សិស្ស
- សាកល្បងបន្ថែមមុខងារស្វែងរកផលិតផលដោយឈ្មោះ។
- បន្ថែមការផ្ទៀងផ្ទាត់ទិន្នន័យ (validation) ដើម្បីធានាថាឈ្មោះ និងតម្លៃមិនទទេ។
- ពិចារណាបន្ថែម CSS ឬ Bootstrap ដើម្បីធ្វើឱ្យគេហទំព័រកាន់តែស្រស់ស្អាត។

---

## សេចក្តីសន្និដ្ឋាន
មេរៀននេះបានគ្របដណ្តប់លើការភ្ជាប់ PHP ទៅ MySQL ការ�អនុវត្ត CRUD ការប្រើ Prepared Statements និង Transaction Management។ តាមរយៈ Lab សិស្សបានបង្កើតគេហទំព័រសាមញ្ញដែលភ្ជាប់ជាមួយ Database ដើម្បីគ្រប់គ្រងផលិតផល ដែលជួយពង្រឹងចំណេះដឹងអំពីការរួមបញ្ចូល PHP និង MySQL។