
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>ប្រព័ន្ធគ្រប់គ្រងសិស្ស</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .high-score { background-color: #90EE90; }
        .low-score { background-color: #FFB6C1; }
    </style>
</head>
<body>
    <h1>ប្រព័ន្ធគ្រប់គ្រងសិស្ស</h1>
    
    <?php
    class StudentManagement {
        private $students = [];

        // Function to add student
        public function addStudent($name, $age, $scores) {
            $this->students[] = [
                'name' => $name,
                'age' => $age,
                'scores' => $scores
            ];
        }

        // Calculate average score
        private function calculateAverageScore($scores) {
            return array_sum($scores) / count($scores);
        }

        // Determine letter grade
        private function getLetterGrade($averageScore) {
            if ($averageScore >= 90) return 'A';
            if ($averageScore >= 80) return 'B';
            if ($averageScore >= 70) return 'C';
            if ($averageScore >= 60) return 'D';
            return 'F';
        }

        // Find highest and lowest scoring students
        public function findTopAndBottomStudents() {
            $averageScores = [];
            foreach ($this->students as $index => $student) {
                $averageScores[$index] = $this->calculateAverageScore($student['scores']);
            }
            
            $highestIndex = array_search(max($averageScores), $averageScores);
            $lowestIndex = array_search(min($averageScores), $averageScores);
            
            return [
                'highest' => $this->students[$highestIndex],
                'lowest' => $this->students[$lowestIndex]
            ];
        }

        // Display all students
        public function displayStudents() {
            echo "<table>";
            echo "<tr><th>ឈ្មោះ</th><th>អាយុ</th><th>ពិន្ទុ</th><th>ពិន្ទុមធ្យម</th><th>កំរិត</th></tr>";
            
            foreach ($this->students as $student) {
                $averageScore = $this->calculateAverageScore($student['scores']);
                $letterGrade = $this->getLetterGrade($averageScore);
                
                $rowClass = '';
                if ($letterGrade == 'A') $rowClass = 'high-score';
                if ($letterGrade == 'F') $rowClass = 'low-score';
                
                echo "<tr class='{$rowClass}'>";
                echo "<td>" . htmlspecialchars($student['name']) . "</td>";
                echo "<td>{$student['age']}</td>";
                echo "<td>" . implode(', ', $student['scores']) . "</td>";
                echo "<td>" . number_format($averageScore, 2) . "</td>";
                echo "<td>{$letterGrade}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    // Example usage
    $studentSystem = new StudentManagement();

    // Adding students
    $studentSystem->addStudent('សុខា', 16, [85, 90, 92, 88]);
    $studentSystem->addStudent('ដារ៉ា', 15, [75, 80, 65, 70]);
    $studentSystem->addStudent('ម៉ាលីន', 17, [95, 98, 97, 96]);
    $studentSystem->addStudent('សីហា', 16, [55, 60, 50, 58]);

    // Display all students
    $studentSystem->displayStudents();

    // Find and display top and bottom students
    $extremeStudents = $studentSystem->findTopAndBottomStudents();
    echo "<h2>សិស្សដែលមានពិន្ទុខ្ពស់បំផុត</h2>";
    echo "<p>ឈ្មោះ: " . $extremeStudents['highest']['name'] . "</p>";
    echo "<h2>សិស្សដែលមានពិន្ទុទាបបំផុត</h2>";
    echo "<p>ឈ្មោះ: " . $extremeStudents['lowest']['name'] . "</p>";
    ?>
</body>
</html>
