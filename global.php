<!DOCTYPE html>
<html>
    <body>

        <?php
           $x = 15; // global scope            
            function myTest() {
                global $x; // access global scope
                //$x = 10; // modify global scope
                echo "<p>អថេរ x ខាងក្នុង function is: $x</p>";
                // using x inside this function will generate an error                
            } 
            myTest();

            echo "<p>Variable x outside function is: $x</p>";
        ?>

    </body>
</html>