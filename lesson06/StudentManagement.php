<?php
class StudentManagement {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function displayStudents() {
        $students = $this->getStudents($this->conn);
        if (empty($students)) {
            echo "<tr><td colspan='3'>No students found.</td></tr>";
            return;
        }
        foreach ($students as $student) {
            echo "<tr>";
                echo "<td>" . $student['id'] . "</td>";
                echo "<td>" . $student['first_name'] . "</td>";
                echo "<td>" . $student['last_name'] . "</td>";
                echo "<td>" . $student['email'] . "</td>";
                echo "<td>" . $student['phone'] . "</td>";
                echo "<td>" . $student['address'] . "</td>";
                echo "<td>";
                    echo "<a href='updateStudent.php?id=" . $student['id'] . "' class='btn btn-warning'>Edit</a> ";
                    echo "<a href='deleteStudent.php?id=" . $student['id'] . "' class='btn btn-danger'>Delete</a>";
            echo "</tr>";
        }
    }
    // getStudentById
    public function getStudentById($id) {
        $sql = "SELECT * FROM students WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //create function getStudents
    private function getStudents($conn) {
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        
        $students = [];
        // Check if the query was successful with PDO
        if ($result->rowCount() > 0) {
            $students = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return $students;
    }
    
    // public function addStudent($name, $email, $age) {
    //     return createStudent($this->conn, $name, $email, $age);
    // }
    // Add Student Method with PDO
    public function addStudent($firstName, $lastName, $email, $phone, $address) {
        $sql = "INSERT INTO students (first_name, last_name,email, phone, address) VALUES (:fname, :lname, :email, :phone, :address)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':fname', $firstName);
        $stmt->bindParam(':lname', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
             
        return $stmt->execute();
    }
    // Update Student Method with PDO
    public function updateStudent($id, $firstName, $lastName, $email, $phone, $address) {
        $sql = "UPDATE students SET first_name = :fname, last_name = :lname, email = :email, phone = :phone, address = :address WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fname', $firstName);
        $stmt->bindParam(':lname', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);

        return $stmt->execute();
    }
    // Delete Student Method with PDO
    public function deleteStudent($id) {
        $sql = "DELETE FROM students WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
    // Find Student by ID Method with PDO
    public function findStudentById($id) {
        $sql = "SELECT * FROM students WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data) {
            return null;
        }
        
        return $data; // Return the student data as an associative array
    }
    // Find All Students Method with PDO
    public function findAllStudents() {
        $sql = "SELECT * FROM students";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>