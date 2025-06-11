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
    photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);

// Define upload directory (relative to project root)
$upload_dir = __DIR__ . '/students/';
$upload_relative_dir = './students/';

// Create students directory if it doesn't exist
if (!is_dir($upload_dir)) {
    if (!mkdir($upload_dir, 0777, true)) {
        die("Failed to create directory: $upload_dir");
    }
}

// Ensure directory is writable
if (!is_writable($upload_dir)) {
    chmod($upload_dir, 0777);
}

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
                $photo_path = null;

                if (!empty($_FILES['photo']['tmp_name']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                    $photo_name = uniqid() . '_' . basename($_FILES['photo']['name']);
                    $photo_path = $upload_relative_dir . $photo_name;
                    $photo_full_path = $upload_dir . $photo_name;

                    if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photo_full_path)) {
                        die("Failed to move uploaded file to $photo_full_path");
                    }
                }

                $sql = "INSERT INTO students (first_name, last_name, date_of_birth, email, phone, photo)
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssss", $first_name, $last_name, $dob, $email, $phone, $photo_path);
                $stmt->execute();
                break;

            case 'update':
                $id = $_POST['id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $dob = $_POST['date_of_birth'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $photo_path = $_POST['existing_photo'];

                if (!empty($_FILES['photo']['tmp_name']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                    // Delete old photo if exists
                    if ($photo_path && file_exists(__DIR__ . '/' . $photo_path)) {
                        unlink(__DIR__ . '/' . $photo_path);
                    }
                    $photo_name = uniqid() . '_' . basename($_FILES['photo']['name']);
                    $photo_path = $upload_relative_dir . $photo_name;
                    $photo_full_path = $upload_dir . $photo_name;

                    if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photo_full_path)) {
                        die("Failed to move uploaded file to $photo_full_path");
                    }
                }

                $sql = "UPDATE students SET first_name=?, last_name=?, date_of_birth=?, email=?, phone=?, photo=?
                        WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssi", $first_name, $last_name, $dob, $email, $phone, $photo_path, $id);
                $stmt->execute();
                break;

            case 'delete':
                $id = $_POST['id'];
                // Get photo path before deletion
                $sql = "SELECT photo FROM students WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                if ($row['photo'] && file_exists(__DIR__ . '/' . $row['photo'])) {
                    unlink(__DIR__ . '/' . $row['photo']);
                }

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .student-photo { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; }
        .preview-container { position: relative; width: 100px; height: 100px; margin-bottom: 10px; }
        .preview-img { width: 100%; height: 100%; object-fit: cover; border-radius: 10px; }
        .preview-container input { position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Student Management System</h2>
        
        <!-- Add/Edit Student Form -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="student_id">
                    <input type="hidden" name="existing_photo" id="existing_photo">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Photo</label>
                            <div class="preview-container">
                                <img src="./students/default.jpg" class="preview-img" id="photo_preview">
                                <input type="file" name="photo" accept="image/*" onchange="previewImage(event)">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="action" id="form_action" value="add">
                    <button type="submit" class="btn btn-primary" id="submit_btn">Add Student</button>
                </form>
            </div>
        </div>
        
        <!-- Students List -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td>
                                <img src="<?php echo $row['photo'] ?: './students/default.jpg'; ?>" 
                                     class="student-photo" alt="Student Photo">
                            </td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['date_of_birth']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="editStudent(
                                    '<?php echo $row['id']; ?>',
                                    '<?php echo $row['first_name']; ?>',
                                    '<?php echo $row['last_name']; ?>',
                                    '<?php echo $row['date_of_birth']; ?>',
                                    '<?php echo $row['email']; ?>',
                                    '<?php echo $row['phone']; ?>',
                                    '<?php echo $row['photo']; ?>'
                                )">Edit</button>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(event) {
            const preview = document.getElementById('photo_preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        function editStudent(id, firstName, lastName, dob, email, phone, photo) {
            document.getElementById('student_id').value = id;
            document.getElementsByName('first_name')[0].value = firstName;
            document.getElementsByName('last_name')[0].value = lastName;
            document.getElementsByName('date_of_birth')[0].value = dob;
            document.getElementsByName('email')[0].value = email;
            document.getElementsByName('phone')[0].value = phone;
            document.getElementById('existing_photo').value = photo || '';
            document.getElementById('photo_preview').src = photo || './students/default.jpg';
            document.getElementById('form_action').value = 'update';
            document.getElementById('submit_btn').textContent = 'Update Student';

            // Reset to default image on double click
            const previewContainer = document.querySelector('.preview-container');
            previewContainer.ondblclick = function() {
                document.getElementById('photo_preview').src = './students/default.jpg';
                document.getElementsByName('photo')[0].value = '';
            };
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>