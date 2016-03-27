<?php

require 'app/start.php';
session_start();
if(!isset($_SESSION["id"])) {
	header("Location: login.php");
	exit();
}
$title = "View All Animals";

$animals = $db->query("
	SELECT *
	FROM animal
	")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . 'list.php';