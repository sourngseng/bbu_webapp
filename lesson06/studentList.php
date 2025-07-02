<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Student List</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Student List</h2>
        <a href="addStudent.php" class="btn btn-primary mb-3">Add New Student</a>   
        <a href="index.php" class="btn btn-secondary mb-3">Back to Home</a>
    </div>
    <div class="container">
        <div class="alert alert-info" role="alert">
            This page displays a list of students. You can add, edit, or delete students from the list.
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the configuration file
                include 'config.php';
    
                // Include the StudentManagement class
                include 'StudentManagement.php';
    
                // Create an instance of the StudentManagement class
                $objStu = new StudentManagement($conn);
    
                // Display the list of students
                $objStu->displayStudents();
                // Close the database connection
                $conn = null;
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>

