
<?php
class StudentManager {
    private string $jsonFile;

    public function __construct(string $jsonFile = 'students.json') {
        $this->jsonFile = $jsonFile;
    }

    // Read existing students from JSON file
    private function readStudents(): array {
        if (!file_exists($this->jsonFile)) {
            return [];
        }
        $jsonContent = file_get_contents($this->jsonFile);
        return json_decode($jsonContent, true) ?? [];
    }

    // Write students to JSON file
    private function writeStudents(array $students): void {
        $jsonContent = json_encode($students, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($this->jsonFile, $jsonContent);
    }

    // Add new student
    public function addStudent(array $studentData): void {
        $students = $this->readStudents();
        
        // Calculate average and grade
        $averageScore = array_sum($studentData['scores']) / count($studentData['scores']);
        $studentData['average_score'] = round($averageScore, 2);
        $studentData['grade'] = $this->calculateGrade($averageScore);
        $studentData['id'] = uniqid(); // Unique identifier
        
        $students[] = $studentData;
        $this->writeStudents($students);
    }

    // Calculate letter grade
    private function calculateGrade(float $averageScore): string {
        return match(true) {
            $averageScore >= 90 => 'A',
            $averageScore >= 80 => 'B',
            $averageScore >= 70 => 'C',
            $averageScore >= 60 => 'D',
            default => 'F'
        };
    }

    // Get top performing students
    public function getTopStudents(int $limit = 3): array {
        $students = $this->readStudents();
        usort($students, fn($a, $b) => $b['average_score'] <=> $a['average_score']);
        return array_slice($students, 0, $limit);
    }

    // Get all students
    public function getAllStudents(): array {
        return $this->readStudents();
    }
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentManager = new StudentManager();
    
    $myArray=[
        'name'=>"Seng Sourng",
        'age'=>20,
        'scores'=>[90, 85, 78, 88]
    ];
    
    $studentData = [
        'name' => $_POST['student_name'] ?? '',
        'age' => intval($_POST['age'] ?? 0),
        'scores' => array_map('intval', $_POST['scores'] ?? [])
    ];

    //dump
    // var_dump($studentData);

    // Validate input
    if (!empty($studentData['name']) && 
        $studentData['age'] > 0 && 
        count($studentData['scores']) === 4) {
        
        $studentManager->addStudent($studentData);
        
        // Redirect to results page
        header('Location: student_list.php');        
        exit();
    } else {
        echo "Invalid input. Please fill all fields correctly.";
    }
}
?>
