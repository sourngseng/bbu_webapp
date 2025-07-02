<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'bbu_crud';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

class Student {
    private $pdo;
    private $table = 'students';

    public function __construct(Database $db) {
        $this->pdo = $db->getConnection();
    }

    public function create($data) {
        $sql = "INSERT INTO $this->table (
            first_name, 
            last_name, 
            email, 
            phone, 
            date_of_birth, 
            address
        ) VALUES (
            :first_name, 
            :last_name, 
            :email, 
            :phone, 
            :date_of_birth, 
            :address
        )";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':first_name' => $data['first_name'],
                ':last_name' => $data['last_name'],
                ':email' => $data['email'],
                ':phone' => $data['phone'],
                ':date_of_birth' => $data['date_of_birth'],
                ':address' => $data['address']
            ]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Create failed: " . $e->getMessage());
        }
    }

    public function read($id = null) {
        try {
            if ($id) {
                $sql = "SELECT * FROM $this->table WHERE id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([':id' => $id]);
                return $stmt->fetch();
            }

            $sql = "SELECT * FROM $this->table ORDER BY id ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception("Read failed: " . $e->getMessage());
        }
    }

    public function update($id, $data) {
        $sql = "UPDATE $this->table SET
            first_name = :first_name,
            last_name = :last_name,
            email = :email,
            phone = :phone,
            date_of_birth = :date_of_birth,
            address = :address,
            updated_at = CURRENT_TIMESTAMP
            WHERE id = :id";

        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':id' => $id,
                ':first_name' => $data['first_name'],
                ':last_name' => $data['last_name'],
                ':email' => $data['email'],
                ':phone' => $data['phone'],
                ':date_of_birth' => $data['date_of_birth'],
                ':address' => $data['address']
            ]);
        } catch (PDOException $e) {
            throw new Exception("Update failed: " . $e->getMessage());
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";

        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            throw new Exception("Delete failed: " . $e->getMessage());
        }
    }

    public function validate($data) {
        $errors = [];

        if (empty($data['first_name']) || strlen($data['first_name']) > 50) {
            $errors[] = 'First name is required and must be less than 50 characters';
        }

        if (empty($data['last_name']) || strlen($data['last_name']) > 50) {
            $errors[] = 'Last name is required and must be less than 50 characters';
        }

        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Valid email is required';
        }

        if (empty($data['phone']) || !preg_match('/^\+?[1-9]\d{1,14}$/', $data['phone'])) {
            $errors[] = 'Valid phone number is required';
        }

        if (empty($data['date_of_birth']) || !$this->isValidDate($data['date_of_birth'])) {
            $errors[] = 'Valid date of birth (YYYY-MM-DD) is required';
        }

        if (empty($data['address']) || strlen($data['address']) > 255) {
            $errors[] = 'Address is required and must be less than 255 characters';
        }

        return $errors;
    }

    private function isValidDate($date) {
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            return false;
        }

        try {
            $d = new DateTime($date);
            return $d && $d->format('Y-m-d') === $date;
        } catch (Exception $e) {
            return false;
        }
    }
}

class StudentController {
    private $student;

    public function __construct(Student $student) {
        $this->student = $student;
    }

    public function handleRequest() {
        $response = ['success' => false, 'message' => '', 'data' => null];

        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'POST':
                    $data = $this->getRequestData();
                    $errors = $this->student->validate($data);
                    if (!empty($errors)) {
                        $response['message'] = implode(', ', $errors);
                        break;
                    }
                    $id = $this->student->create($data);
                    $response = [
                        'success' => true,
                        'message' => 'Student created successfully',
                        'data' => ['id' => $id]
                    ];
                    break;

                case 'GET':
                    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
                    $data = $this->student->read($id);
                    if ($data === false || (is_array($data) && empty($data))) {
                        $response['message'] = 'Student not found';
                        break;
                    }
                    $response = [
                        'success' => true,
                        'message' => 'Student data retrieved successfully',
                        'data' => $data
                    ];
                    break;

                case 'PUT':
                    $data = $this->getRequestData();
                    $id = isset($data['id']) ? (int)$data['id'] : null;
                    if (!$id) {
                        $response['message'] = 'Student ID is required';
                        break;
                    }
                    $errors = $this->student->validate($data);
                    if (!empty($errors)) {
                        $response['message'] = implode(', ', $errors);
                        break;
                    }
                    if ($this->student->update($id, $data)) {
                        $response = [
                            'success' => true,
                            'message' => 'Student updated successfully'
                        ];
                    } else {
                        $response['message'] = 'Student not found';
                    }
                    break;

                case 'DELETE':
                    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
                    if (!$id) {
                        $response['message'] = 'Student ID is required';
                        break;
                    }
                    if ($this->student->delete($id)) {
                        $response = [
                            'success' => true,
                            'message' => 'Student deleted successfully'
                        ];
                    } else {
                        $response['message'] = 'Student not found';
                    }
                    break;

                default:
                    $response['message'] = 'Method not allowed';
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
        }

        $this->sendResponse($response);
    }

    private function getRequestData() {
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        
        if (strpos($contentType, 'application/json') !== false) {
            return json_decode(file_get_contents('php://input'), true) ?? [];
        }
        
        return $_POST;
    }

    private function sendResponse($response) {
        header('Content-Type: application/json');
        http_response_code($response['success'] ? 200 : 400);
        echo json_encode($response);
        exit;
    }
}

// Initialize and handle request
try {
    $db = new Database();
    $student = new Student($db);
    $controller = new StudentController($student);
    $controller->handleRequest();
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Server error: ' . $e->getMessage(),
        'data' => null
    ];
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode($response);
}
?>