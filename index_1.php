<?php 
    $name="John Doe";
    $age=30;
    $address="123 Main St, Cityville, Country";
    $phone="123-456-7890";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Home Page <?php echo "ទំព័រដើម"; ?></h1>    
    <h3>សូមស្វាគមន៍ <span>ទំព័រដើម</span></h3>
    <?php
        echo "<h2>សូមស្វាគមន៍មកកាន់ទំព័រដើមរបស់យើង</h2>";
        echo "នៅទីនេះអ្នកអាចស្វែងរកព័ត៌មានអំពីផលិតផល និងសេវាកម្មរបស់យើង។";
    ?>
   
   <h2>Student Info</h2>
   <p>Name : <span><?php echo $name; ?></span></p>
   <p>Age : <span><?php echo $age; ?></span></p>
   <p>Address : <span><?php echo $address; ?></span></p>
   <p>Phone : <span><?php echo $phone; ?></span></p>

</body>
</html>