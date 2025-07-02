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
            echo "</tr>";
        }
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
}
?>