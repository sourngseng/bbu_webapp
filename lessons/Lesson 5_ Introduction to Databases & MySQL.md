# មេរៀន 5៖ ការណែនាំអំពី Databases និង MySQL (៣ ម៉ោង)

## គោលបំណងមេរៀន

1. យល់ដឹងអំពីទិដ្ឋភាពទូទៅនៃ Databases និងសារៈសំខាន់របស់វាក្នុងការអភិវឌ្ឍកម្មវិធី។
2. អាចភ្ជាប់ និងប្រើប្រាស់ MySQL ជាមួយ PHP ដើម្បីធ្វើអន្តរកម្មជាមួយ Database។
3. រៀនបង្កើត និងគ្រប់គ្រង Database និង Tables ក្នុង MySQL។
4. ស្វែងយល់ពីការប្រើប្រាស់ SQL Queries មូលដ្ឋានសម្រាប់ការគ្រប់គ្រងទិន្នន័យ។
5. អនុវត្តជាក់ស្តែងក្នុងការបង្កើត Database សម្រាប់គម្រោងតូចមួយ។

---

## ១. ទិដ្ឋភាពទូទៅនៃ Databases

### ការពន្យល់

Database គឺជាប្រព័ន្ធសម្រាប់រក្សាទុក និងគ្រប់គ្រងទិន្នន័យប្រកបដោយរបៀប។ វាត្រូវបានប្រើក្នុងកម្មវិធីដើម្បីរក្សាទុកព័ត៌មានដូចជា ទិន្នន័យអ្នកប្រើ ឬផលិតផល។ MySQL គឺជា Relational Database Management System (RDBMS) ដែលប្រើ SQL (Structured Query Language) សម្រាប់ការគ្រប់គ្រងទិន្នន័យ។

### គោលគំនិតសំខាន់ៗ

- **Database**: ជាឃ្លាំងទិន្នន័យដែលមានតារាង (tables)។
- **Table**: ផ្ទុកទិន្នន័យក្នុងជួរដេក (rows) និងជួរឈរ (columns)។
- **Primary Key**: ជា column ដែលកំណត់អត្តសញ្ញាណតែមួយគត់សម្រាប់ជួរដេកនីមួយៗ។
- **SQL**: ភាសាសម្រាប់សួរសុំ និងកែប្រែទិន្នន័យ។

---

## ២. ការប្រើប្រាស់ MySQL ជាមួយ PHP

### ការពន្យល់

PHP អាចភ្ជាប់ជាមួយ MySQL ដើម្បីធ្វើអន្តរកម្មជាមួយ Database។ យើងប្រើ extension ដូចជា `mysqli` ឬ `PDO` ដើម្បីភ្ជាប់ និងគ្រប់គ្រងទិន្នន័យ។

### Syntax

```php
// ភ្ជាប់ MySQL ដោយប្រើ mysqli
$conn = new mysqli("localhost", "username", "password", "database_name");

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
$dbname = "test_db";

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
- `$conn->close()` បិទការភ្ជាប់បន្ទាប់ពីប្រើរួច។

---

## ៣. ការបង្កើត និងគ្រប់គ្រង Database

### ការពន្យល់

ក្នុង MySQL យើងអាចបង្កើត Database និង Tables ដោយប្រើ SQL Commands។ ការគ្រប់គ្រងរួមមានការបង្កើត កែប្រែ និងលុប។

### Syntax

```sql
-- បង្កើត Database
CREATE DATABASE database_name;

-- បង្កើត Table
CREATE TABLE table_name (
    column1 datatype PRIMARY KEY,
    column2 datatype,
    ...
);

-- លុប Database
DROP DATABASE database_name;

-- លុប Table
DROP TABLE table_name;
```

### ឧទាហរណ៍

```sql
-- បង្កើត Database
CREATE DATABASE school;

-- ប្រើ Database
USE school;

-- បង្កើត Table
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT
);
```

### ការពន្យល់ឧទាហរណ៍

- `CREATE DATABASE school` បង្កើត Database ឈ្មោះ "school"។
- `USE school` ជ្រើសរើស Database ដើម្បីប្រើ។
- `CREATE TABLE students` បង្កើត Table ឈ្មោះ "students" ដែលមាន columns:
  - `id`: លេខសម្គាល់តែមួយគត់ ដែលបង្កើតដោយស្វ័យប្រវត្តិ (`AUTO_INCREMENT`)។
  - `name`: ឈ្មោះសិស្ស (អក្សរអតិបរមា ១០០)។
  - `age`: អាយុសិស្ស (លេខ)។

---

## ៤. SQL Queries មូលដ្ឋាន

### ការពន្យល់

SQL Queries ត្រូវបានប្រើសម្រាប់ការគ្រប់គ្រងទិន្នន័យ ដូចជាការបញ្ចូល សួរសុំ កែប្រែ និងលុបទិន្នន័យ។

### មុខងារសំខាន់ៗ

- `INSERT INTO`: បញ្ចូលទិន្នន័យថ្មី។
- `SELECT`: សួរសុំទិន្នន័យ។
- `UPDATE`: កែប្រែទិន្នន័យ។
- `DELETE`: លុបទិន្នន័យ។

### Syntax

```sql
-- បញ្ចូលទិន្នន័យ
INSERT INTO table_name (column1, column2) VALUES (value1, value2);

-- សួរសុំទិន្នន័យ
SELECT column1, column2 FROM table_name WHERE condition;

-- កែប្រែទិន្នន័យ
UPDATE table_name SET column1 = value1 WHERE condition;

-- លុបទិន្នន័យ
DELETE FROM table_name WHERE condition;
```

### ឧទាហរណ៍

```sql
-- បញ្ចូលទិន្នន័យ
INSERT INTO students (name, age) VALUES ('Sok', 20);

-- សួរសុំទិន្នន័យ
SELECT * FROM students WHERE age > 18;

-- កែប្រែទិន្នន័យ
UPDATE students SET age = 21 WHERE name = 'Sok';

-- លុបទិន្នន័យ
DELETE FROM students WHERE id = 1;
```

### ការពន្យល់ឧទាហរណ៍

- `INSERT INTO` បញ្ចូលទិន្នន័យសិស្សថ្មី (Sok, អាយុ ២០)។
- `SELECT *` សួរសុំទិន្នន័យសិស្សដែលមានអាយុលើសពី ១៨ ឆ្នាំ។
- `UPDATE` កែប្រែអាយុរបស់ Sok ទៅ ២១។
- `DELETE` លុបសិស្សដែលមាន `id = 1`។

---

## ៥. Lab: ការបង្កើត Database សម្រាប់ Project

### កិច្ចការអនុវត្ត

សិស្សត្រូវបង្កើតកម្មវិធី PHP ដែលភ្ជាប់ទៅ MySQL ដើម្បីគ្រប់គ្រង Database សម្រាប់គម្រោងតូចមួយ។ គម្រោងនេះជា "Student Management System" ដែលមាន៖

1. បង្កើត Database និង Table សម្រាប់រក្សាទុកព័ត៌មានសិស្ស។
2. បញ្ចូលទិន្នន័យសិស្សថ្មី។
3. បង្ហាញបញ្ជីសិស្សទាំងអស់។
4. អនុញ្ញាតឱ្យកែប្រែ និងលុបសិស្ស។

### កូដគំរូ

```php
<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
</head>
<body>
    <h2>Student Management System</h2>
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name"><br>
        <label>Age:</label><br>
        <input type="number" name="age"><br>
        <input type="submit" name="add" value="Add Student">
    </form>

    <h3>Student List</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "school";

        // ភ្ជាប់ Database
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // បញ្ចូលទិន្នន័យ
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $sql = "INSERT INTO students (name, age) VALUES ('$name', $age)";
            $conn->query($sql);
        }

        // លុបទិន្នន័យ
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $sql = "DELETE FROM students WHERE id = $id";
            $conn->query($sql);
        }

        // សួរសុំទិន្នន័យ
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td><a href='?delete=" . $row['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
```

### ការពន្យល់កូដ

- **ទម្រង់បញ្ចូល**: អ្នកប្រើបញ្ចូលឈ្មោះ និងអាយុរបស់សិស្សតាម `<form>`។
- **ការភ្ជាប់ Database**: ប្រើ `mysqli` ដើម្បីភ្ជាប់ទៅ Database "school"។
- **បញ្ចូលទិន្នន័យ**: នៅពេលចុច "Add Student" ទិន្នន័យត្រូវបញ្ចូលទៅក្នុង Table `students`។
- **បង្ហាញទិន្នន័យ**: ប្រើ `SELECT *` ដើម្បីទាញទិន្នន័យសិស្សទាំងអស់ ហើយបង្ហាញក្នុង `<table>`។
- **លុបទិន្នន័យ**: ប្រើ `<a>` link ដើម្បីលុបសិស្សដោយផ្អែកលើ `id`។

### ការណែនាំសម្រាប់សិស្ស

- ត្រូវបង្កើត Database និង Table ដោយប្រើ MySQL (ឧទាហរណ៍៖ ប្រើ phpMyAdmin ឬ MySQL command line) មុននឹងសាកល្បងកូដ។
- សាកល្បងបន្ថែមមុខងារកែប្រែ (UPDATE) ដោយបន្ថែមទម្រង់មួយផ្សេងទៀត។
- ពិនិត្យសុវត្ថិភាពដោយប្រើ `mysqli_real_escape_string` ដើម្បីការពារការវាយប្រហារ SQL Injection។

---

## សេចក្តីសន្និដ្ឋាន

មេរៀននេះបានណែនាំអំពី Databases និង MySQL ដោយផ្តោតលើការភ្ជាប់ជាមួយ PHP ការបង្កើត Database និង Tables និងការប្រើ SQL Queries មូលដ្ឋាន។ តាមរយៈ Lab សិស្សបានអនុវត្តជាក់ស្តែងក្នុងការបង្កើត Student Management System ដែលជួយពង្រឹងចំណេះដឹងអំពី Database។