# មេរៀនទី៩៖ មូលដ្ឋានសុវត្ថិភាពវ៉ែប(Web Security Basics)

### មេរៀននេះនឹងផ្តល់នូវការណែនាំមូលដ្ឋានអំពីសុវត្ថិភាពវ៉ែប និងវិធីសាស្ត្រដែលអាចប្រើប្រាស់ដើម្បីការពារកម្មវិធីរបស់អ្នកពីការវាយប្រហារផ្សេងៗ។

## គោលបំណងមេរៀន
បន្ទាប់ពីសិក្សាមេរៀននេះ សិស្សនឹងអាច៖
✔️ យល់ពីគំនិតមូលដ្ឋាននៃសុវត្ថិភាពវ៉ែប  
✔️ ទប់ស្កាត់ការវាយប្រហារ XSS និង SQL Injection  
✔️ អនុវត្តការការពារ CSRF  
✔️ គ្រប់គ្រង Session និង Authentication យ៉ាងមានសុវត្ថិភាព  
✔️ អនុវត្តចំណេះដឹងក្នុងការធ្វើគម្រោងជាក់ស្តែង  

---

## ១. ការណែនាំអំពី Web Security

### ហេតុអ្វីសុវត្ថិភាពវ៉ែបមានសារៈសំខាន់?
- ការពារទិន្នន័យអ្នកប្រើប្រាស់
- ទប់ស្កាត់ការចូលប្រើប្រាស់ដោយគ្មានការអនុញ្ញាត
- រក្សាភាពសម្ងាត់និងសុវត្ថិភាពរបស់ប្រព័ន្ធ

### ប្រភេទការវាយប្រហារសំខាន់ៗ
1. **XSS (Cross-Site Scripting)**  
   - ការចាក់ស្គ្រីបពីខាងក្រៅ
   - អាចលួចយកទិន្នន័យអ្នកប្រើប្រាស់

2. **SQL Injection**  
   - ការបញ្ចូលកូដ SQL ដោយខុសច្បាប់
   - អាចធ្វើឲ្យទិន្នន័យត្រូវបានលួចឬបំផ្លាញ

3. **CSRF (Cross-Site Request Forgery)**  
   - បង្ខំអ្នកប្រើប្រាស់ឲ្យធ្វើសកម្មភាពដោយមិនដឹងខ្លួន

---

## ២. XSS Prevention

### វិធីបង្ការ XSS
```php
<?php
// អនុវត្តសុវត្ថិភាពជាមួយ htmlspecialchars()
function safeOutput($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

// ឧទាហរណ៍
$userInput = "<script>alert('Hacked!')</script>";
echo safeOutput($userInput); // លទ្ធផល: &lt;script&gt;alert(&#39;Hacked!&#39;)&lt;/script&gt;
?>
```

### ករណីអនុវត្តជាក់ស្តែង
```php
<?php
// ការពារទិន្នន័យមុនបង្ហាញនៅលើទំព័រ
$comment = $_POST['comment'];
echo "<div class='comment'>" . safeOutput($comment) . "</div>";
?>
```

---

## ៣. SQL Injection Prevention

### ការប្រើប្រាស់ Prepared Statements
```php
<?php
// ឧទាហរណ៍ដោយប្រើ PDO
$pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute(['username' => $_POST['username']]);

$user = $stmt->fetch();
?>
```

### ការហាមឃាត់ SQL Injection
```php
<?php
// ការពារដោយមិនប្រើប្រាស់អាសយដ្ឋានដោយផ្ទាល់
$unsafeQuery = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "'";
// ជំនួសដោយ៖
$safeQuery = "SELECT * FROM users WHERE username = ?";
?>
```

---

## ៤. CSRF Protection

### ការបង្កើត CSRF Token
```php
<?php
// បង្កើត token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// បញ្ចូល token ក្នុងធាតុធម្មតា
echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">';
?>
```

### ការផ្ទៀងផ្ទាត់ Token
```php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die('CSRF Token មិនត្រឹមត្រូវ!');
    }
    // បន្តដំណើរការ...
}
?>
```

---

## ៥. Session & Authentication Management

### ការគ្រប់គ្រង Session ដោយសុវត្ថិភាព
```php
<?php
// កំណត់ session ដោយសុវត្ថិភាព
session_start([
    'cookie_lifetime' => 86400,
    'cookie_secure'   => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);
?>
```

### ការផ្ទៀងផ្ទាត់អ្នកប្រើប្រាស់
```php
<?php
function authenticateUser($username, $password) {
    // 1. ស្វែងរកអ្នកប្រើប្រាស់
    // 2. ផ្ទៀងផ្ទាត់ពាក្យសម្ងាត់
    // 3. កំណត់ session
    $_SESSION['authenticated'] = true;
    $_SESSION['user_id'] = $user['id'];
    
    // 4. កំណត់ពេលវេលាផុតកំណត់
    $_SESSION['last_activity'] = time();
}
?>
```

---

## ៦. Lab: ការកែលម្អសុវត្ថិភាពគម្រោង

### ការងារក្រុម
1. ស្វែងរកចំណុចខ្វះខាតសុវត្ថិភាពក្នុងកម្មវិធីដែលបានផ្តល់
2. អនុវត្តការកែលម្អ៖
   - ការពារ XSS
   - ទប់ស្កាត់ SQL Injection
   - បន្ថែម CSRF Protection
3. បង្ហាញលទ្ធផលជាក្រុម

### ឧទាហរណ៍កូដសុវត្ថិភាព
```php
<?php
class SecurityImprovement {
    public static function secureLoginSystem() {
        // កូដដែលបានកែលម្អនឹងត្រូវបានបញ្ចូលនៅទីនេះ
    }
}
?>
```

---

## Project សម្រាប់សិស្ស
1. បង្កើតប្រព័ន្ធចុះឈ្មោះដោយសុវត្ថិភាព
2. អភិវឌ្ឍកម្មវិធីគ្រប់គ្រងអ្នកប្រើប្រាស់
3. សាកល្បង penetration testing លើកម្មវិធីរបស់អ្នក

## ធនធានសិក្សា
- [OWASP Web Security Guide](https://owasp.org/)
- [PHP Security Best Practices](https://php.net/manual/en/security.php)
- [Web Security Academy](https://portswigger.net/web-security)



## របៀបប្រើប្រាស់មេរៀននេះ៖
1. រៀនយល់ពីគំនិតមូលដ្ឋាននីមួយៗ
2. អនុវត្តកូដឧទាហរណ៍ដោយខ្លួនឯង
3. ធ្វើការងារក្រុមក្នុងផ្នែក Lab
4. អនុវត្តនៅក្នុងគម្រោងពិតប្រាកដ