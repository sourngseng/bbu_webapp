<?php
    // mysqli Method
    function updateStudent($conn, $id, $name, $email) {
        $sql = "UPDATE students SET name = ?, email = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $email, $id);
        
        return $stmt->execute();
    }

    // PDO Method
    function updateStudentPDO($conn, $id, $name, $email) {
        $sql = "UPDATE students SET name = :name, email = :email WHERE id = :id";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
?>