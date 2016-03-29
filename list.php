<?php

require 'app/start.php';
session_start();
if(!isset($_SESSION["id"])) {
	header("Location: login.php");
	exit();
}
$title = "Animals Available For Adoption";

$animals = $db->query("
	SELECT *
	FROM animal
	WHERE available = 1
	")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . 'list.php';