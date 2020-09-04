# ImagePost
An image posting system built using vanilla PHP 7.3, JavaScript, Bootstrap

************************************************

After cloning the repository, configure your URLROOT, SITENAME and DB connection parameters: DB_HOST, DB_USER, DB_PASS, DB_NAME in app/config/config.php file. 

**app/config/config.php**
```C
// Database params

    define('DB_HOST', 'myhost');
    define('DB_USER', 'user');
    define('DB_PASS', 'mypass');
    define('DB_NAME', 'db');

    // App Root
    define('APPROOT', dirname(dirname(__FILE__)));

    // URL root
    define('URLROOT', 'http://mysite.com');

    // Pub root
    define('PUBROOT', URLROOT . '/public/');

    // Site name
    define('SITENAME', 'MySiteName');

```

************************************************

Run the command below to create DB tables.

``` C
php app/setup/db.php
```

************************************************

Go to app/setup/pass_hash.php and enter your username, email and password. These details are required for viewing the added records list.

**app/setup/pass_hash.php**
```C
$name = 'USERNAME';
$email = 'EMAIL';
$password = 'PASSWORD';
```

************************************************

Run the following command to create a db record for your user. **ATTENTION** clear $email, $password values from pass_hash.php file after creating user.

``` C
php app/setup/pass_hash.php
```

