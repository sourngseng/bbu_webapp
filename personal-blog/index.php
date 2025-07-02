<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ប្លក់ផ្ទាល់ខ្លួន - Modern Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --background-color: #ffffff;
            --text-color: #212529;
            --card-bg: #f8f9fa;
        }

        [data-theme="dark"] {
            --primary-color: #0dcaf0;
            --secondary-color: #adb5bd;
            --background-color: #212529;
            --text-color: #f8f9fa;
            --card-bg: #343a40;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            transition: all 0.3s ease;
            font-family: 'Khmer', system-ui, sans-serif;
        }

        .card {
            background-color: var(--card-bg);
            border: none;
            transition: all 0.3s ease;
        }

        .navbar {
            background-color: var(--card-bg);
        }

        .theme-toggle {
            cursor: pointer;
            font-size: 1.2rem;
        }

        .post-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .social-links a {
            color: var(--text-color);
            margin: 0 10px;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .post-image {
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">ប្លក់ផ្ទាល់ខ្លួន</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">ទំព័រដើម</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">អំពីខ្ញុំ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#posts">អត្ថបទ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">ទំនាក់ទំនង</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link theme-toggle" onclick="toggleTheme()">
                            <i class="bi bi-moon-stars-fill"></i>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="py-5 text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">សូមស្វាគមន៍មកកាន់ប្លក់របស់ខ្ញុំ</h1>
            <p class="lead">ចែករំលែកចំណេះដឹង បទពិសោធន៍ និងគំនិតថ្មីៗ</p>
            <a href="#posts" class="btn btn-primary btn-lg mt-3">អានអត្ថបទ</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">អំពីខ្ញុំ</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="./images/work.png" class="img-fluid rounded" alt="អំពីខ្ញុំ">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <h3>ជម្រាបសួរ!</h3>
                        <p>ខ្ញុំជាអ្នកនិពន្ធប្លក់ដែលចូលចិត្តចែករំលែករឿងរ៉ាវ និងចំណេះដឹងផ្សេងៗ។ ប្លក់នេះជាកន្លែងដែលខ្ញុំសរសេរអំពីបទពិសោធន៍ ការធ្វើដំណើរ និងគន្លឹះជាច្រើន។</p>
                        <div class="social-links">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Posts Section -->
    <section id="posts" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">អត្ថបទចុងក្រោយ</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <img src="./images/post1.jpg" class="post-image" alt="អត្ថបទ ១">
                        <div class="card-body">
                            <h5 class="card-title">ការធ្វើដំណើរទៅកាន់ភ្នំគូលែន</h5>
                            <p class="card-text">ស្វែងយល់ពីបទពិសោធន៍ដ៏អស្ចារ្យនៅភ្នំគូលែន ជាមួយទេសភាពធម្មជាតិដ៏ស្រស់ស្អាត។</p>
                            <a href="#" class="btn btn-outline-primary">អានបន្ត</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <img src="./images/post2.jpg" class="post-image" alt="អត្ថបទ ២">
                        <div class="card-body">
                            <h5 class="card-title">គន្លឹះសម្រាប់ការសរសេរប្លក់</h5>
                            <p class="card-text">រៀនគន្លឹះ ៥ យ៉ាងដើម្បីបង្កើតប្លក់ដែលទាក់ទាញ និងមានអ្នកអានច្រើន។</p>
                            <a href="#" class="btn btn-outline-primary">អានបន្ត</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <img src="./images/post3.jpg" class="post-image" alt="អត្ថបទ ៣">
                        <div class="card-body">
                            <h5 class="card-title">របៀបថែរក្សាសុខភាពផ្លូវចិត្ត</h5>
                            <p class="card-text">ស្វែងយល់ពីវិធីសាស្ត្រដ៏សាមញ្ញដើម្បីថែរក្សាសុខភាពផ្លូវចិត្តរបស់អ្នក។</p>
                            <a href="#" class="btn btn-outline-primary">អានបន្ត</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">ទំនាក់ទំនង</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm p-4">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">ឈ្មោះ</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">អ៊ីមែល</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">សារ</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">ផ្ញើសារ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-center">
        <div class="container">
            <p>&copy; ២០២៥ ប្លក់ផ្ទាល់ខ្លួន។ រក្សាសិទ្ធិគ្រប់យ៉ាង។</p>
            <div class="social-links">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleTheme() {
            const body = document.body;
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        }

        function updateThemeIcon(theme) {
            const icon = document.querySelector('.theme-toggle i');
            icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.body.setAttribute('data-theme', savedTheme);
            updateThemeIcon(savedTheme);
        });
    </script>