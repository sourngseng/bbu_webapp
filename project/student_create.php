
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>ទម្រង់បញ្ចូលព័ត៌មានសិស្ស</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .my-class{
            background-color: #f0f0f0; /* Light gray background */
            border: 1px solid #ccc; /* Gray border */
            padding: 10px; /* Padding inside the input */
            border-radius: 5px; /* Rounded corners */
        }
    </style>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">ទម្រង់បញ្ចូលព័ត៌មានសិស្ស</h2>
        <form action="student_process.php" method="POST" class="space-y-4">
            <div>
                <label class="block mb-2">ឈ្មោះសិស្ស(ឧ.សេង ស៊ង់)</label>
                <input type="text" name="student_name" required 
                    class="my-class w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label class="block mb-2">អាយុ</label>
                <input type="number" name="age" min="10" max="25" required
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label class="block mb-2">ពិន្ទុវិជ្ជាសាច្រើន (សូមបញ្ចូល 4 ពិន្ទុ)</label>
                <div class="grid grid-cols-2 gap-4">
                    <input type="number" name="scores[]" min="0" max="100" required 
                        class="px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ពិន្ទុទី 1">
                    <input type="number" name="scores[]" min="0" max="100" required 
                        class="px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ពិន្ទុទី 2">
                    <input type="number" name="scores[]" min="0" max="100" required 
                        class="px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ពិន្ទុទី 3">
                    <input type="number" name="scores[]" min="0" max="100" required 
                        class="px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ពិន្ទុទី 4">
                        
                </div>
            </div>
            
            <button type="submit" 
                class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">
                បញ្ចូលសិស្ស
            </button>
        </form>
    </div>
</body>
</html>
