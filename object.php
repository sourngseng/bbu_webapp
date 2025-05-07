<?php

/* 
    OOP (Object-Oriented Programming) គឺជាវិធីសាស្រ្តមួយក្នុងការសរសេរកូដដែលផ្តោតលើវត្ថុ 
    (objects) និងថ្នាក់ (classes)។ វាអនុញ្ញាតឱ្យអ្នកបង្កើតវត្ថុដែលមានលក្ខណៈពិសេស និងអនុវត្តន៍មុខងារ។

    Class គឺជាគំរូសម្រាប់បង្កើតវត្ថុ។ វាអាចមានអត្តសញ្ញាណ (properties) និងមុខងារ (methods)។
    Object គឺជាវត្ថុដែលបង្កើតឡើងពី class មួយ។ វាអាចមានអត្តសញ្ញាណ និងអនុវត្តន៍មុខងារដែលបានកំណត់នៅក្នុង class ។

    -ក្នុង class មានអត្តសញ្ញាណ (properties) និងមុខងារ (methods)។
    -អត្តសញ្ញាណ (properties) គឺជាអថេរដែលផ្ទុកទិន្នន័យ។
    -មុខងារ (methods) គឺជាអនុគមន៍ដែលអាចអនុវត្តបាននៅលើវត្ថុ។
    -អ្នកអាចប្រើ $this->propertyName ដើម្បីចូលដំណើរការអត្តសញ្ញាណនៅក្នុងមុខងារ។
    -អ្នកអាចប្រើ $this->methodName() ដើម្បីអនុវត្តន៍មុខងារនៅក្នុងមុខងារ។
    -អ្នកអាចប្រើ public, private, protected ដើម្បីកំណត់ច្បាប់នៃការចូលដំណើរការអត្តសញ្ញាណ និងមុខងារ។

    * Create Object
    - $objectName = new ClassName(parameters); // បង្កើតវត្ថុថ្មីពី class
    - $objectName->propertyName = value; // កំណត់តម្លៃអត្តសញ្ញាណ
    - $objectName->methodName(parameters); // អនុវត្តន៍មុខងារ

*/



    class Person {
        // អត្តសញ្ញាណ (properties)
        // public, private, protected
        public $name;
        public $age;
        private $address; // អាចចូលដំណើរការបានតែពី class នេះប៉ុណ្ណោះ
        protected $phone; // អាចចូលដំណើរការបានពី class នេះ និង class ដែលធ្វើការប
        
        //Constructor (មុខងារដែលត្រូវបានអនុវត្តនៅពេលបង្កើតវត្ថុ)
        // public function __construct($name, $age) {
        function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }
        
        function introduce() {
            return "ខ្ញុំឈ្មោះ " . $this->name . " និងមានអាយុ " . $this->age . " ឆ្នាំ";
        }
        // for phone
        public function setPhone($phone) {
            if(empty($phone)) {
                $this->phone = "លេខទូរស័ព្ទមិនមាន";
            } else {
                $this->phone = $phone;
            }            
        }
        public function getPhone() {
            return $this->phone;
        }

        // for address
        public function setAddress($address) {
            $this->address = $address;
        }
        public function getAddress() {
            return $this->address;
        }
    }
    
    $person = new Person("Thida", 22); // បង្កើតវត្ថុថ្មីពី class Person
    // echo $person->introduce(); // ខ្ញុំឈ្មោះ Thida និងមានអាយុ 22 ឆ្នាំ
    $person->name = "Sophea"; // កំណត់ឈ្មោះ
    $person->age = 25; // កំណត់អាយុ
    $person->setPhone("092771244"); // កំណត់លេខទូរស័ព្ទ
    $person->setAddress("Phnom Penh"); // កំណត់អាស័យដ្ឋាន
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Object</title>
</head>
<body>
    
    <h1>Object-Oriented Programming</h1>
    <p><?php echo $person->introduce(); ?></p>


    <p>ឈ្មោះ: <?php echo $person->name; ?></p>
    <p>អាយុ: <?php echo $person->age; ?></p>
    <p>លេខទូរស័ព្ទ: <?php echo $person->getPhone(); ?></p>
    <p>អាស័យដ្ឋាន: <?php echo $person->getAddress(); ?></p>
   
</body>
</html>