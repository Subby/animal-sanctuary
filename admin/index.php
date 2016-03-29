<?php
require('../app/start.php');
session_start();
if(!isset($_SESSION["id"]) || !isset($_SESSION["admin"])) {
	echo "<h1>403 Forbidden</h1>";
	exit();
}
//Get all requests needing approval
$requests = $db->query("
	SELECT *
	FROM adoptionrequest
	INNER JOIN animal
	ON adoptionrequest.animalID=animal.animalID
	JOIN user
	ON adoptionrequest.userID=user.userID
	WHERE adoptionrequest.approved = 0;
")->fetchAll(PDO::FETCH_ASSOC);
//Get all animals that are available for adoption
$animals = $db->query("
	SELECT *
	FROM animal
	WHERE available = 1
	")->fetchAll(PDO::FETCH_ASSOC);

$title = "Admin";
require(VIEW_ROOT . '/admin/home.php');