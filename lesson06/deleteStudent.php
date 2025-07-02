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
    <?php
    // Include the configuration file
    include 'config.php';
    // Include the StudentManagement class
    include 'StudentManagement.php';
    // Create an instance of the StudentManagement class
    $objStu = new StudentManagement($conn);
    // Get the student ID from the URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id= $_POST['id'];
        // Call the deleteStudent method
        $objStu->deleteStudent($id);
        // Redirect to the student list page after deleting
        header("Location: index.php");
        exit();
    }

    ?>

    <div class="container">
       
        <h2 class="mt-5 mb-4 text-center">Delete Student</h2>
        <div class="alert alert-warning text-center" role="alert">
            <strong>Student ID:</strong> <?php echo htmlspecialchars($id); ?>
        </div>
        <!-- Confirmation message -->
        <div class="alert alert-danger text-center" role="alert">
            <strong>Warning!</strong> This action cannot be undone.
        </div>
        <!-- Confirmation form -->
        <div class="text-center mb-4">
        </div>
        <div class="text-center mb-4">
            <p>Are you sure you want to delete this student?</p>
        </div>
        <!-- Confirmation form -->
        <div class="text-center mb-4">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-danger">Delete</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>

