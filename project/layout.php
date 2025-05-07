<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php include_once('includes/navbar.php'); ?>

<div class="container-fluid mt-3 bg-secondary text-white p-3">
  <h3>ការប្រើប្រាស់ Layout Bootstrap</h3>  
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 bg-primary text-dark p-3">
            <h1>ខាងធ្វេង</h1>
        </div>
        <div class="col-md-8 bg-danger text-white p-3">
            <h1>ខាងស្តាំ</h1>
            <p>នេះគឺជាឧទាហរណ៍នៃការប្រើប្រាស់ Bootstrap Layout</p>
            <div class="row">
                <div class="col-md-6 bg-success text-white p-3">
                    <h2>ជួរដេកទី ១</h2>
                    <p>នេះគឺជាឧទាហរណ៍នៃការប្រើប្រាស់ Bootstrap Layout</p>
                </div>
                <div class="col-md-6 bg-warning text-dark p-3">
                    <h2>ជួរដេកទី ២</h2>
                    <p>នេះគឺជាឧទាហរណ៍នៃការប្រើប្រាស់ Bootstrap Layout</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-3 text-white p-3"> 
  <div class="row">
        <div class="col-md-3  bg-success text-white p-3">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Long Dara</h2>
                    <img src="img/profile.png" alt="My Profile" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora ipsa aliquid necessitatibus voluptate id pariatur .</p>
                </div>
                <div class="col-md-12 text-left">
                    <h2>About Me</h2>
                    <ul class="list-group">
                        <li class="list-group-item">Service & Pricing</li>
                        <li class="list-group-item">Recume</li>
                        <li class="list-group-item">Blog</li>
                        <li class="list-group-item">Contact</li>
                        <li class="list-group-item">More Pages</li>
                    </ul>
                </div>
            </div>            
        </div>

        <div class="col-md-9 bg-info">
            <div class="row">
                <div class="col-md-8 p-3 rounded  text-dark">
                    <h2>My Work</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.</p>
                </div>
                <div class="col-md-4 text-center p-3 rounded  text-dark">                    
                    <img src="img/profile.png" alt="My Work" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                </div>
                <div class="col-md-12">
                    <h2>My Work</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.</p>
                </div>

                <div class="col-md-12">
                    <div class="row text-center">
                        <?php
                            //create multiple array with 3 items
                            $items = [
                                ["img" => "img/profile.png", "text" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."],
                                ["img" => "img/profile.png", "text" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."],
                                ["img" => "img/profile.png", "text" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."],
                                ["img" => "img/profile.png", "text" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."],
                                ["img" => "img/profile.png", "text" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."],
                                ["img" => "img/profile.png", "text" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."],
                                ["img" => "img/profile.png", "text" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."],
                                ["img" => "img/profile.png", "text" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."],
                            ];
                            foreach ($items as $item) {
                                echo '<div class="col-md-3  p-3 rounded  text-dark">';
                                    echo '<div class="col-md-12 text-center bg-light p-2 rounded  text-dark">';
                                    echo '<img src="' . $item["img"] . '" alt="My Work" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">';
                                    echo '<p>' . $item["text"] . '</p>';
                                    echo '</div>';
                                echo '</div>';
                            }                            
                        ?>
                        
                        
                    </div>
                </div>

            </div>
        </div>
  </div>

</div>

</body>
</html>


