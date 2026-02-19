# PHP_Laravel12_Mail_Preview

Laravel 12 based project demonstrating **Browser-Based Email Preview functionality** using Laravel Mailables and Blade UI.

---


##  Step 1: Install Laravel 12 – Create Project

### Open Terminal / CMD

```bash
composer create-project laravel/laravel:^12.0 PHP_Laravel12_Mail_Preview
```

### Move to project folder

```bash
cd PHP_Laravel12_Mail_Preview
```

### Generate application key

```bash
php artisan key:generate
```

### Explanation
```php
* Laravel uses an application key for encryption and security
* Required for sessions, cookies, and encrypted data
```
---
 
  # Step 2: Setup Database (.env File)

### Create database in MySQL

```sql
CREATE DATABASE laravel12_mail_preview;
```

### Update `.env` file

```env
APP_NAME="Laravel 12 Mail Preview"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=laravel12_mail_preview
DB_USERNAME=root
DB_PASSWORD=
```

### Run default migrations

```bash
php artisan migrate
```

### Explanation
```php
* Verifies database connectivity
* Creates default Laravel tables
* Confirms environment setup is correct
```
---

## Step 3: Configure Mail for Preview Mode

### Update mail configuration in `.env`

```env
MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Explanation
```php
* `log` mailer prevents real email sending
* Emails are rendered for preview/testing
* Ideal for development and QA environments
```
---

##  Step 4: Create Mailable Class

### Run command

```bash
php artisan make:mail TestMail
```

### Files created

```
app/Mail/TestMail.php
resources/views/emails/test-mail.blade.php
```

---

##  Step 5: Configure Mailable Class

### File path
```php
`app/Mail/TestMail.php`
```
```php
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Laravel 12 Mail Preview Test')
                    ->view('emails.test-mail');
    }
}

```

### Explanation
```php
* Accepts dynamic data (`$name`)
* `build()` method defines subject and view
```
---

##  Step 6: Create Mail Blade View

### File path
```php
`resources/views/emails/test-mail.blade.php`
```
```blade
<!DOCTYPE html>
<html>
<head>
    <title>Mail Preview</title>
</head>
<body style="font-family: Arial;">
    <h2>Hello {{ $user['name'] }} </h2>

    <p>
        This is a <strong>Laravel 12 Mail Preview</strong>.
    </p>

    <p>
        Email: {{ $user['email'] }}
    </p>

    <p>
        Thanks,<br>
        <strong>Laravel Team</strong>
    </p>
</body>
</html>

```

---

##  Step 7: Create Mail Preview Route

### Open file
```php
`routes/web.php`
```
```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailPreviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mail-preview', [MailPreviewController::class, 'preview']);

```

### Explanation
```php
* Returning Mailable directly renders email in browser
* No SMTP or Mail::send() required
* This is called **Mail Preview Technique**
```
---


## Step 8: Run Laravel Project

```bash
php artisan serve
```

### Output

```
Server running on http://127.0.0.1:8000
```
<img width="1172" height="608" alt="image" src="https://github.com/user-attachments/assets/5013882c-95b6-4a49-b00d-f47c19a36007" />

---

##  Step 9: Access URLs in Browser

### Mail Preview page

```
http://127.0.0.1:8000/mail-preview
```
<img width="695" height="398" alt="image" src="https://github.com/user-attachments/assets/fb7f6d0f-5aa3-48d3-839e-e6ccea603427" />


---

## Project Folder Structure

```
PHP_Laravel12_Mail_Preview
├── app
│   └── Mail
│       └── TestMail.php
│
├── resources
│   └── views
│       └── emails
│           └── test-mail.blade.php
│
├── routes
│   └── web.php
│
├── .env
├── artisan
```

---





**Project Name:** PHP_Laravel12_Mail_Preview
