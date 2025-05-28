### មេរៀនទី ០៣៖ HTML Forms & PHP (៣ ម៉ោង)

#### គោលបំណងនៃមេរៀន
នៅចុងបញ្ចប់នៃមេរៀននេះ សិស្សនឹងអាច៖
1. បង្កើត HTML forms ដែលមានមុខងារជាមួយប្រភេទ input ផ្សេងៗ។
2. យល់ និងអនុវត្ត GET និង POST methods សម្រាប់ការដាក់ស្នើ form។
3. ដំណើរការទិន្នន័យ form ដោយប្រើ PHP scripts។
4. អនុវត្តបច្ចេកទេស form validation នៅផ្នែក server-side ដើម្បីធានាសុចរិតភាពទិន្នន័យ។
5. អភិវឌ្ឍ registration form ពេញលេញជាមួយ validation ជាការអនុវត្តជាក់ស្តែង។

---

### ១. ការបង្កើត HTML Forms

**ទិដ្ឋភាពទូទៅ**៖ HTML forms ប្រមូលទិន្នន័យពីអ្នកប្រើប្រាស់ ដូចជា អត្ថបទ ការជ្រើសរើស ឬឯកសារ ហើយផ្ញើទៅ server សម្រាប់ដំណើរការ។ ធាតុ `<form>` ជាកន្លែងសម្រាប់ inputs នៃ form។

**Syntax**:
```html
<form action="script.php" method="post">
  <label for="inputID">Label:</label>
  <input type="text" id="inputID" name="inputName">
  <input type="submit" value="Submit">
</form>
```

- **action**: បញ្ជាក់ URL ឬឯកសារ (ឧ. `script.php`) ដែលទិន្នន័យ form ត្រូវផ្ញើទៅ។
- **method**: កំណត់របៀបផ្ញើទិន្នន័យ (`GET` ឬ `POST`)។
- **input types**: ប្រភេទទូទៅរួមមាន `text`, `password`, `email`, `radio`, `checkbox`, `file`, និង `submit`។

***បង្កើត file : script.php***
  ```php
  <?php
      //script.php
      if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST") {
          // Get the input value from the form
           $inputValue = $_POST['userName'] ?? '';
          // $inputValue = isset($_POST['userName']) ? $_POST['userName'] : '';
          //using get method
         // $inputValue = $_GET['userName'] ?? '';
          
          // Process the input value (for example, you can save it to a database or display it)
          echo "You submitted: " . htmlspecialchars($inputValue);
          echo "<br/>You submitted: $inputValue";
      } else {
          echo "No data submitted.";
      }
  ?>
  ```
**ឧទាហរណ៍**:
```html
<form action="process.php" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username">
  <label for="email">Email:</label>
  <input type="email" id="email" name="email">
  <input type="submit" value="Register">
</form>
```

**ការពន្យល់**:
- Form នេះផ្ញើទិន្នន័យទៅ `process.php` ដោយប្រើ POST method។
- គុណលក្ខណៈ `name` (`username`, `email`) ត្រូវបានប្រើដើម្បីកំណត់អត្តសញ្ញាណទិន្នន័យនៅក្នុង PHP។
- ប៊ូតុង submit ជំរុញការដាក់ស្នើ form។

---

### ២. ការប្រើប្រាស់ GET និង POST Methods

**ទិដ្ឋភាពទូទៅ**៖ GET និង POST ជា HTTP methods សម្រាប់ផ្ញើទិន្នន័យ form ទៅ server។

- **GET**:
  - បន្ថែមទិន្នន័យទៅ URL ជា query strings (ឧ. `?name=value`)។
  - អាចមើលឃើញនៅក្នុង address bar របស់ browser។
  - សមស្របសម្រាប់ទិន្នន័យមិនសម្ងាត់ ឬ form ស្វែងរក។
  - មានកម្រិតទំហំទិន្នន័យ (កម្រិតប្រវែង URL)។

- **POST**:
  - ផ្ញើទិន្នន័យនៅក្នុង request body មិនអាចមើលឃើញនៅក្នុង URL។
  - សមស្របសម្រាប់ទិន្នន័យសម្ងាត់ (ឧ. ពាក្យសម្ងាត់) ឬទិន្នន័យធំ។
  - មានសុវត្ថិភាពជាង GET។

**Syntax**:
```html
<!-- GET Method -->
<form action="search.php" method="get">
  <input type="text" name="query">
  <input type="submit" value="Search">
</form>

<!-- POST Method -->
<form action="login.php" method="post">
  <input type="text" name="username">
  <input type="password" name="password">
  <input type="submit" value="Login">
</form>
```

**ឧទាហរណ៍**:
- GET: ការដាក់ស្នើ form ស្វែងរកជាមួយ `query=hello` បណ្តាលឱ្យ `search.php?query=hello`។
- POST: ការដាក់ស្នើ form ចូលគណនីផ្ញើ `username` និង `password` នៅក្នុង request body មិនអាចមើលឃើញនៅក្នុង URL។

**ការពន្យល់**:
- ប្រើ GET សម្រាប់ប្រតិបត្តិការដែលមិនប៉ះពាល់ (ឧ. ការស្វែងរក) ដែលការទាញយកទិន្នន័យមានសុវត្ថិភាព។
- ប្រើ POST សម្រាប់ប្រតិបត្តិការដែលផ្លាស់ប្តូរស្ថានភាព server (ឧ. ការចុះឈ្មោះអ្នកប្រើ)។

---

### ៣. ការទទួល និងដំណើរការទិន្នន័យពី Forms ក្នុង PHP

**ទិដ្ឋភាពទូទៅ**៖ PHP ដំណើរការទិន្នន័យ form ដោយប្រើ superglobals៖ `$_GET` សម្រាប់ទិន្នន័យ GET និង `$_POST` សម្រាប់ទិន្នន័យ POST។
***បង្កើតfile process.php***
---
**Syntax**:
```php
<?php
// Accessing GET data
if (isset($_GET['query'])) {
  $query = $_GET['query'];
  echo "Search query: " . htmlspecialchars($query);
}

// Accessing POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  echo "Username: " . htmlspecialchars($username);
  echo "Email: " . htmlspecialchars($email);
}
?>
```

- **isset()**: ពិនិត្យថាតើអថេរមាន និងមិនមែន null។
- **htmlspecialchars()**: ការពារ XSS attacks ដោយគេចពីតួអក្សរពិសេស។
- **$_SERVER["REQUEST_METHOD"]**: កំណត់អត្តសញ្ញាណ request method (GET ឬ POST)។

**ឧទាហរណ៍**:
បង្កើតឯកសារ `process.php`:
```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  echo "<h2>Submitted Data:</h2>";
  echo "Username: " . htmlspecialchars($username) . "<br>";
  echo "Email: " . htmlspecialchars($email);
}
?>
```

**ការពន្យល់**:
- ស្គ្រីបពិនិត្យថាតើ request ជា POST។
- វាទាញ `username` និង `email` ពី `$_POST`។
- `htmlspecialchars()` ធានាលទ្ធផលប្រកបដោយសុវត្ថិភាពដើម្បីការពារ XSS។

---

### ៤. ការផ្ទៀងផ្ទាត់ទិន្នន័យ (Form Validation)

**ទិដ្ឋភាពទូទៅ**៖ Validation ធានាថាទិន្នន័យអ្នកប្រើបំពេញតាមតម្រូវការ (ឧ. វាលចាំបាច់ ទម្រង់ email ត្រឹមត្រូវ)។ Validation អាចជា client-side (HTML/JavaScript) ឬ server-side (PHP)។

**Server-Side Validation ក្នុង PHP**:
- ពិនិត្យវាលទទេ។
- ផ្ទៀងផ្ទាត់ទម្រង់ទិន្នន័យ (ឧ. email, លេខ)។
- សម្អាតទិន្នន័យដើម្បីលុបចោលខ្លឹមសារដែលបង្កគ្រោះថ្នាក់។

**Syntax**:
```php
<?php
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);

  // Validate username
  if (empty($username)) {
    $errors[] = "Username is required.";
  } elseif (strlen($username) < 3) {
    $errors[] = "Username must be at least 3 characters.";
  }

  // Validate email
  if (empty($email)) {
    $errors[] = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
  }

  // Display results
  if (empty($errors)) {
    echo "Form submitted successfully!";
  } else {
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}
?>
```

- **trim()**: លុបចន្លោះពីទិន្នន័យបញ្ចូល។
- **filter_var()**: ផ្ទៀងផ្ទាត់ទម្រង់ទិន្នន័យ (ឧ. ទម្រង់ email)។
- **$errors**: អារេសម្រាប់រក្សាទុកសារកំហុស validation។

**ឧទាហរណ៍**:
ធ្វើបច្ចុប្បន្នភាព `process.php` ជាមួយ validation:
```php
<?php
$errors = [];
$username = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);

  // Validate username
  if (empty($username)) {
    $errors[] = "Username is required.";
  } elseif (strlen($username) < 3) {
    $errors[] = "Username must be at least 3 characters.";
  }

  // Validate email
  if (empty($email)) {
    $errors[] = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
  }

  // Output
  if (empty($errors)) {
    echo "<h2>Registration Successful!</h2>";
    echo "Username: " . htmlspecialchars($username) . "<br>";
    echo "Email: " . htmlspecialchars($email);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Form Processing</title>
</head>
<body>
  <h2>ទម្រង់ចុះឈ្មោះ</h2>
  <?php
  if (!empty($errors)) {
    echo '<div style="color: red;">';
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
    echo '</div>';
  }
  ?>
  <form action="process.php" method="post">
    <label for="username">ឈ្មោះអ្នកប្រើ:</label><br>
    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>"><br>
    <label for="email">អ៊ីម៉ែល:</label><br>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
    <input type="submit" value="ចុះឈ្មោះ">
  </form>
</body>
</html>
```

**ការពន្យល់**:
- ស្គ្រីបផ្ទៀងផ្ទាត់ `username` (មិនទទេ យ៉ាងតិច ៣ តួអក្សរ) និង `email` (មិនទទេ ទម្រង់ត្រឹមត្រូវ)។
- កំហុសត្រូវបានបង្ហាញជាពណ៌ក្រហមប្រសិនបើ validation បរាជ័យ។
- វាល form រក្សាទុកទិន្នន័យអ្នកប្រើដោយប្រើគុណលក្ខណៈ `value` សម្រាប់បទពិសោធន៍អ្នកប្រើល្អប្រសើរ។
- ឯកសារដូចគ្នាគ្រប់គ្រងទាំងការបង្ហាញ form និងការដំណើរការ។

---

### ៥. មន្ទីរពិសោធន៍៖ ការបង្កើត Registration Form ជាមួយ Validation

**គោលបំណង**៖ បង្កើត registration form ដែលប្រមូល username, email, password, និង confirm password។ ផ្ទៀងផ្ទាត់ inputs ទាំងអស់ និងបង្ហាញសារកំហុស ឬសារជោគជ័យសមស្រប។

**តម្រូវការ**:
- Username: ចាំបាច់ យ៉ាងតិច ៣ តួអក្សរ។
- Email: ចាំបាច់ ទម្រង់ email ត្រឹមត្រូវ។
- Password: ចាំបាច់ យ៉ាងតិច ៦ តួអក្សរ។
- Confirm Password: ត្រូវតែផ្គូផ្គងជាមួយ password។
- បង្ហាញកំហុស ឬសារជោគជ័យ។
- រក្សាទុកទិន្នន័យអ្នកប្រើក្នុង form បន្ទាប់ពីការដាក់ស្នើ។

**ដំណោះស្រាយ**:
```php
<?php
$errors = [];
$username = "";
$email = "";
$password = "";
$confirm_password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $confirm_password = trim($_POST['confirm_password']);

  // Validate username
  if (empty($username)) {
    $errors[] = "Username is required.";
  } elseif (strlen($username) < 3) {
    $errors[] = "Username must be at least 3 characters.";
  }

  // Validate email
  if (empty($email)) {
    $errors[] = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
  }

  // Validate password
  if (empty($password)) {
    $errors[] = "Password is required.";
  } elseif (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters.";
  }

  // Validate confirm password
  if (empty($confirm_password)) {
    $errors[] = "Confirm password is required.";
  } elseif ($password !== $confirm_password) {
    $errors[] = "Passwords do not match.";
  }

  // Output
  if (empty($errors)) {
    echo "<h2>Registration Successful!</h2>";
    echo "Username: " . htmlspecialchars($username) . "<br>";
    echo "Email: " . htmlspecialchars($email);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <style>
    .error { color: red; }
    .form-group { margin-bottom: 15px; }
  </style>
</head>
<body>
  <h2>ទម្រង់ចុះឈ្មោះ</h2>
  <?php
  if (!empty($errors)) {
    echo '<div class="error">';
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
    echo '</div>';
  }
  ?>
  <form action="register.php" method="post">
    <div class="form-group">
      <label for="username">ឈ្មោះអ្នកប្រើ:</label><br>
      <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>">
    </div>
    <div class="form-group">
      <label for="email">អ៊ីម៉ែល:</label><br>
      <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
    </div>
    <div class="form-group">
      <label for="password">ពាក្យសម្ងាត់:</label><br>
      <input type="password" id="password" name="password">
    </div>
    <div class="form-group">
      <label for="confirm_password">បញ្ជាក់ពាក្យសម្ងាត់:</label><br>
      <input type="password" id="confirm_password" name="confirm_password">
    </div>
    <input type="submit" value="ចុះឈ្មោះ">
  </form>
</body>
</html>
```

**ការពន្យល់**:
- Form ប្រមូល `username`, `email`, `password`, និង `confirm_password`។
- PHP ផ្ទៀងផ្ទាត់នីមួយៗ៖
  - Username: មិនទទេ យ៉ាងតិច ៣ តួអក្សរ។
  - Email: មិនទទេ ទម្រង់ត្រឹមត្រូវ។
  - Password: មិនទទេ យ៉ាងតិច ៦ តួអក្សរ។
  - Confirm Password: ផ្គូផ្គងជាមួយ password។
- កំហុសត្រូវបានបង្ហាញជាពណ៌ក្រហម ហើយការដាក់ស្នើត្រឹមត្រូវបង្ហាញសារជោគជ័យ។
- វាល form រក្សាទុកទិន្នន័យអ្នកប្រើដោយប្រើគុណលក្ខណៈ `value`។
- CSS មូលដ្ឋានធ្វើឱ្យ form មានរូបរាងល្អប្រសើរ។

---

### លំហាត់អនុវត្តជាក់ស្តែង

1. **លំហាត់ទី ១៖ ទម្រង់ទំនាក់ទំនងសាមញ្ញ**
   - បង្កើតទម្រង់ទំនាក់ទំនងជាមួយវាលសម្រាប់ `name`, `email`, និង `message`។
   - ប្រើ POST method ដើម្បីដាក់ស្នើទៅ `contact.php`។
   - ផ្ទៀងផ្ទាត់ថាវាលទាំងអស់ត្រូវបានបំពេញ និង email ត្រឹមត្រូវ។
   - បង្ហាញទិន្នន័យដែលបានដាក់ស្នើ ឬកំហុស។

2. **លំហាត់ទី ២៖ ទម្រង់ Radio Button**
   - បង្កើតទម្រង់ជាមួយ radio buttons សម្រាប់ជ្រើសរើសពណ៌ដែលចូលចិត្ត (`red`, `blue`, `green`)។
   - ប្រើ GET method ដើម្បីដាក់ស្នើទៅ `color.php`។
   - បង្ហាញពណ៌ដែលបានជ្រើសរើស ឬកំហុសប្រសិនបើមិនបានជ្រើសរើសពណ៌។

3. **លំហាត់ទី ៣៖ ទម្រង់ចុះឈ្មោះបន្ថែម**
   - ពង្រីក registration form របស់មន្ទីរពិសោធន៍ដើម្បីរួមបញ្ចូលវាល `phone`។
   - ផ្ទៀងផ្ទាត់លេខទូរស័ព្ទ (ឧ. ត្រូវតែជាលេខ មាន ១០ ខ្ទង់)។
   - បង្ហាញទិន្នន័យទាំងអស់នៅពេល validation ជោគជ័យ។

---

### សេចក្តីសន្និដ្ឋាន
មេរៀននេះបានគ្របដណ្តប់លើការបង្កើត HTML forms, ការប្រើប្រាស់ GET និង POST methods, ការដំណើរការទិន្នន័យ form ជាមួយ PHP, និងការអនុវត្ត server-side validation។ មន្ទីរពិសោធន៍បានផ្តល់បទពិសោធន៍ជាក់ស្តែងជាមួយ registration form ដែលពង្រឹងបច្ចេកទេស validation។ សិស្សត្រូវបានលើកទឹកចិត្តឱ្យបំពេញលំហាត់ដើម្បីស៊ីជម្រៅការយល់ដឹងរបស់ពួកគេ។

---
