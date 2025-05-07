
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>បញ្ជីសិស្ស</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <?php
    require_once 'student_process.php';

    $studentManager = new StudentManager();
    $students = $studentManager->getAllStudents();
    $topStudents = $studentManager->getTopStudents(3);
    ?>

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">បញ្ជីសិស្ស</h1>
        
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">ឈ្មោះ</th>
                        <th class="px-4 py-2">អាយុ</th>
                        <th class="px-4 py-2">ពិន្ទុ</th>
                        <th class="px-4 py-2">ពិន្ទុមធ្យម</th>
                        <th class="px-4 py-2">កំរិត</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr class="border-b hover:bg-gray-100 
                            <?= match($student['grade']) {
                                'A' => 'bg-green-100',
                                'F' => 'bg-red-100',
                                default => ''
                            } ?>">
                            <td class="px-4 py-2"><?= htmlspecialchars($student['name']) ?></td>
                            <td class="px-4 py-2"><?= $student['age'] ?></td>
                            <td class="px-4 py-2"><?= implode(', ', $student['scores']) ?></td>
                            <td class="px-4 py-2"><?= $student['average_score'] ?></td>
                            <td class="px-4 py-2"><?= $student['grade'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4">សិស្សដែលមានពិន្ទុខ្ពស់បំផុត</h2>
            <div class="grid grid-cols-3 gap-4">
                <?php foreach ($topStudents as $student): ?>
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <h3 class="font-bold"><?= htmlspecialchars($student['name']) ?></h3>
                        <p>ពិន្ទុមធ្យម: <?= $student['average_score'] ?></p>
                        <p>កំរិត: <?= $student['grade'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mt-6">
            <a href="student_create.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                បញ្ចូលសិស្សថ្មី
            </a>
        </div>
    </div>
</body>
</html>
