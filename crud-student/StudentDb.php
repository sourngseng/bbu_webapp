<?php

declare(strict_types=1);

final class DatabaseConfig {
    private const HOST = 'localhost';
    private const DATABASE = 'crud_bbu';
    private const USERNAME = 'root';
    private const PASSWORD = '';
    private const CHARSET = 'utf8mb4';
    
    public static function getDsn(): string {
        return sprintf('mysql:host=%s;dbname=%s;charset=%s', 
            self::HOST, 
            self::DATABASE, 
            self::CHARSET
        );
    }
    
    public static function getUsername(): string {
        return self::USERNAME;
    }
    
    public static function getPassword(): string {
        return self::PASSWORD;
    }
}

final class DatabaseConnection {
    private PDO $pdo;
    
    public function __construct() {
        try {
            $this->pdo = new PDO(
                DatabaseConfig::getDsn(),
                DatabaseConfig::getUsername(),
                DatabaseConfig::getPassword(),
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_STRINGIFY_FETCHES => false
                ]
            );
        } catch (PDOException $e) {
            throw new RuntimeException('Database connection failed: ' . $e->getMessage());
        }
    }
    
    public function getPdo(): PDO {
        return $this->pdo;
    }
}

final class StudentEntity {
    private ?int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $dateOfBirth;
    
    public function __construct(
        string $firstName,
        string $lastName,
        string $email,
        string $dateOfBirth,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->dateOfBirth = $dateOfBirth;
    }
    
    public function getId(): ?int {
        return $this->id;
    }
    
    public function getFirstName(): string {
        return $this->firstName;
    }
    
    public function getLastName(): string {
        return $this->lastName;
    }
    
    public function getEmail(): string {
        return $this->email;
    }
    
    public function getDateOfBirth(): string {
        return $this->dateOfBirth;
    }
}

final class StudentValidator {
    public static function validate(StudentEntity $student): array {
        $errors = [];
        
        if (empty($student->getFirstName()) || strlen($student->getFirstName()) > 50) {
            $errors[] = 'First name must be between 1 and 50 characters';
        }
        
        if (empty($student->getLastName()) || strlen($student->getLastName()) > 50) {
            $errors[] = 'Last name must be between 1 and 50 characters';
        }
        
        if (!filter_var($student->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }
        
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $student->getDateOfBirth()) ||
            !DateTime::createFromFormat('Y-m-d', $student->getDateOfBirth())) {
            $errors[] = 'Invalid date of birth format (YYYY-MM-DD)';
        }
        
        return $errors;
    }
}

final class StudentRepository {
    private PDO $pdo;
    
    public function __construct(DatabaseConnection $db) {
        $this->pdo = $db->getPdo();
    }
    
    public function create(StudentEntity $student): bool {
        try {
            $sql = 'INSERT INTO students (first_name, last_name, email, date_of_birth) 
                    VALUES (:first_name, :last_name, :email, :date_of_birth)';
            
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                'first_name' => $student->getFirstName(),
                'last_name' => $student->getLastName(),
                'email' => $student->getEmail(),
                'date_of_birth' => $student->getDateOfBirth()
            ]);
        } catch (PDOException $e) {
            throw new RuntimeException('Failed to create student: ' . $e->getMessage());
        }
    }
    
    public function findById(int $id): ?StudentEntity {
        try {
            $sql = 'SELECT * FROM students WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            
            $data = $stmt->fetch();
            if (!$data) {
                return null;
            }
            
            return new StudentEntity(
                $data['first_name'],
                $data['last_name'],
                $data['email'],
                $data['date_of_birth'],
                $data['id']
            );
        } catch (PDOException $e) {
            throw new RuntimeException('Failed to fetch student: ' . $e->getMessage());
        }
    }
    
    public function findAll(): array {
        try {
            $sql = 'SELECT * FROM students ORDER BY last_name, first_name';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
            $results = $stmt->fetchAll();
            $students = [];
            
            foreach ($results as $data) {
                $students[] = new StudentEntity(
                    $data['first_name'],
                    $data['last_name'],
                    $data['email'],
                    $data['date_of_birth'],
                    $data['id']
                );
            }
            
            return $students;
        } catch (PDOException $e) {
            throw new RuntimeException('Failed to fetch students: ' . $e->getMessage());
        }
    }
    
    public function update(StudentEntity $student): bool {
        if ($student->getId() === null) {
            throw new InvalidArgumentException('Student ID is required for update');
        }
        
        try {
            $sql = 'UPDATE students 
                    SET first_name = :first_name,
                        last_name = :last_name,
                        email = :email,
                        date_of_birth = :date_of_birth
                    WHERE id = :id';
            
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                'first_name' => $student->getFirstName(),
                'last_name' => $student->getLastName(),
                'email' => $student->getEmail(),
                'date_of_birth' => $student->getDateOfBirth(),
                'id' => $student->getId()
            ]);
        } catch (PDOException $e) {
            throw new RuntimeException('Failed to update student: ' . $e->getMessage());
        }
    }
    
    public function delete(int $id): bool {
        try {
            $sql = 'DELETE FROM students WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            throw new RuntimeException('Failed to delete student: ' . $e->getMessage());
        }
    }
}

final class StudentService {
    private StudentRepository $repository;
    private StudentValidator $validator;
    
    public function __construct(StudentRepository $repository, StudentValidator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    
    public function createStudent(StudentEntity $student): void {
        $errors = $this->validator->validate($student);
        if (!empty($errors)) {
            throw new InvalidArgumentException(implode(', ', $errors));
        }
        
        if (!$this->repository->create($student)) {
            throw new RuntimeException('Failed to create student');
        }
    }
    
    public function getStudent(int $id): ?StudentEntity {
        return $this->repository->findById($id);
    }
    
    public function getAllStudents(): array {
        return $this->repository->findAll();
    }
    
    public function updateStudent(StudentEntity $student): void {
        $errors = $this->validator->validate($student);
        if (!empty($errors)) {
            throw new InvalidArgumentException(implode(', ', $errors));
        }
        
        if (!$this->repository->update($student)) {
            throw new RuntimeException('Failed to update student');
        }
    }
    
    public function deleteStudent(int $id): void {
        if (!$this->repository->delete($id)) {
            throw new RuntimeException('Failed to delete student');
        }
    }
}

/* Example usage:
try {
    $db = new DatabaseConnection();
    $repository = new StudentRepository($db);
    $validator = new StudentValidator();
    $service = new StudentService($repository, $validator);
    
    // Create
    $student = new StudentEntity(
        'John',
        'Doe',
        'john.doe@example.com',
        '2000-01-01'
    );
    $service->createStudent($student);
    
    // Read
    $student = $service->getStudent(1);
    $allStudents = $service->getAllStudents();
    
    // Update
    $student = new StudentEntity(
        'John',
        'Smith',
        'john.smith@example.com',
        '2000-01-01',
        1
    );
    $service->updateStudent($student);
    
    // Delete
    $service->deleteStudent(1);
    
} catch (Exception $e) {
    error_log('Error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'An error occurred']);
}
*/