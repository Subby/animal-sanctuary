<?php

ini_set('display_errors', 'On');

define('APP_ROOT', __DIR__);
define('VIEW_ROOT', APP_ROOT . '/views/pages/');
define('BASE_URL', 'http://localhost/cs/course');

$db = new PDO('mysql:host=localhost;dbname=sanctuary;', 'root', '');

require('functions.php');