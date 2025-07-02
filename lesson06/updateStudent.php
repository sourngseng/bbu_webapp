<?php
    // Include the configuration file
    include 'config.php';
    // Include the StudentManagement class
    include 'StudentManagement.php';
    // Create an instance of the StudentManagement class
    $objStu = new StudentManagement($conn);
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the student ID from the URL
        $id = $_POST['id'];
        // Get the form data
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        // $dob= $_POST['dob'];
        $address = $_POST['address'];

        // Call the updateStudent method
        $objStu->updateStudent($id, $firstName, $lastName,$email, $phone, $address);
        // Redirect to the student list page after updating
        header("Location: index.php");
        exit();
    }

    $student = $objStu->getStudentById($id);
    if ($student) {
        // Populate the form fields with the student data
        $firstName = $student['first_name'];
        $lastName = $student['last_name'];
        $email = $student['email'];
        $phone = $student['phone'];
        $address = $student['address'];
    } else {
        echo "<div class='alert alert-danger'>Student not found.</div>";
    }

?>

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
            Create Records of Students
        </div>
        <!-- Form Insert Student -->
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
         <div class="row">
            <div class="col-md-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $firstName; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $lastName; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
            </div>

         </div>
            <button type="submit" class="btn btn-primary mt-3">Update Student</button>
        </form>
    </div>
</body>
</html>
