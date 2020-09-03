<?php

require_once dirname(dirname(__FILE__)) . '/config/config.php';
require_once dirname(dirname(__FILE__)) . '/libraries/Database.php';

$db = new Database;

$posts = "
    CREATE TABLE `posts1` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `firstname` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
        `lastname` longtext COLLATE utf8mb4_unicode_ci,
        `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
";

$users = "
    CREATE TABLE `users1` (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL DEFAULT '',
        `email` varchar(100) NOT NULL DEFAULT '',
        `password` varchar(100) NOT NULL DEFAULT '',
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
";

$db->query($posts);
$db->execute();
$db->query($users);
$db->execute();

