<?php

ini_set('display_errors', 'On');

define('APP_ROOT', __DIR__);
define('VIEW_ROOT', APP_ROOT . '/views/pages/');
define('BASE_URL', 'http://localhost/cs/course');
try {
	$db = new PDO('mysql:host=localhost;dbname=sanctuary;', 'root', '');
} catch (PDOException $ex) {
	echo "Sorry, a database error has occured. Try again later.";
}
require('functions.php');