<?php
// mysqli Method
function createStudent($conn, $name, $email, $age) {
    $sql = "INSERT INTO students (name, email, age) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $email, $age);
    
    return $stmt->execute();
}

// PDO Method
function createStudentPDO($conn, $name, $email, $age) {
    $sql = "INSERT INTO students (name, email, age) VALUES (:name, :email, :age)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    
    return $stmt->execute();
}
?>