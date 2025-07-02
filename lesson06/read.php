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