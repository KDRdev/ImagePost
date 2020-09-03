<?php

require_once dirname(dirname(__FILE__)) . '/config/config.php';
require_once dirname(dirname(__FILE__)) . '/libraries/Database.php';

$db = new Database;

$name = 'USERNAME';
$email = 'EMAIL';
$password = 'PASSWORD';

$hash = password_hash($password, PASSWORD_DEFAULT);

$db->query('INSERT INTO users(name, email, password) VALUES (:name, :email, :password)');
$db->bind(':name', $name);
$db->bind(':email', $email);
$db->bind(':password', $hash);

if($db->execute()){
    return true;
} else {
    return false;
}

