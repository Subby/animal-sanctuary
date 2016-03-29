<?php

require '../app/start.php';
session_start();
if(!isset($_SESSION["id"]) || !isset($_SESSION["admin"])) {
	echo "<h1>403 Forbidden</h1>";
	exit();
}
$title = "All animals in the system";

$animals = $db->query("
	SELECT *
	FROM animal
	")->fetchAll(PDO::FETCH_ASSOC);

$owned_animals = $db->query("
	SELECT *
	FROM owns
	INNER JOIN user
	ON owns.userID=user.userID
	JOIN animal
	ON owns.animalID=animal.animalID;
	")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . 'admin/list.php';