<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_management";

// Create database and table
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);
$conn->select_db($dbname);

// Create students table
$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(15),
    photo BLOB,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $dob = $_POST['date_of_birth'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                
                $sql = "INSERT INTO students (first_name, last_name, date_of_birth, email, phone)
                        VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $first_name, $last_name, $dob, $email, $phone);
                $stmt->execute();
                break;
                
            case 'update':
                $id = $_POST['id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $dob = $_POST['date_of_birth'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                
                $sql = "UPDATE students SET first_name=?, last_name=?, date_of_birth=?, email=?, phone=?
                        WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $first_name, $last_name, $dob, $email, $phone, $id);
                $stmt->execute();
                break;
                
            case 'delete':
                $id = $_POST['id'];
                $sql = "DELETE FROM students WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                break;
        }
    }
}

// Fetch all students
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .form-container { margin-bottom: 20px; }
        .form-container input { margin: 5px; padding: 5px; }
        .action-btn { padding: 5px 10px; margin: 2px; }
    </style>
</head>
<body>
    <h2>Student Management System</h2>
    
    <!-- Add/Edit Student Form -->
    <div class="form-container" >
        <form method="post" id="student_form" action="students.php">
            <input type="hidden" name="id" id="student_id">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="date" name="date_of_birth" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone">
            <input type="hidden" name="action" id="form_action" value="add">
            <input type="submit" value="Add Student" id="submit_btn">
        </form>
    </div>
    
    <!-- Students List -->
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['date_of_birth']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td>
                <button class="action-btn" onclick="editStudent(
                    '<?php echo $row['id']; ?>',
                    '<?php echo $row['first_name']; ?>',
                    '<?php echo $row['last_name']; ?>',
                    '<?php echo $row['date_of_birth']; ?>',
                    '<?php echo $row['email']; ?>',
                    '<?php echo $row['phone']; ?>'
                )">Edit</button>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="action" value="delete">
                    <input type="submit" class="action-btn" value="Delete" 
                           onclick="return confirm('Are you sure?')">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <script>
        function editStudent(id, firstName, lastName, dob, email, phone) {
            document.getElementById('student_id').value = id;
            document.getElementsByName('first_name')[0].value = firstName;
            document.getElementsByName('last_name')[0].value = lastName;
            document.getElementsByName('date_of_birth')[0].value = dob;
            document.getElementsByName('email')[0].value = email;
            document.getElementsByName('phone')[0].value = phone;
            document.getElementById('form_action').value = 'update';
            document.getElementById('submit_btn').value = 'Update Student';
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>