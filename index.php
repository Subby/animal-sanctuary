<?php 
require("app/start.php");
session_start();
if(!isset($_SESSION["id"])) {
	header("Location: login.php");
	exit();
}
$title = "Home";

$owns = $db->prepare("
	SELECT * FROM owns
	LEFT JOIN animal
	ON owns.animalID = animal.animalID
	WHERE owns.userID = :uid
");

$owns->execute(['uid' => $_SESSION["id"]]);

$owns_assoc = $owns->fetchAll(PDO::FETCH_ASSOC);

$requests = $db->prepare("
	SELECT * FROM adoptionrequest
	LEFT JOIN animal
	ON adoptionrequest.animalID = animal.animalID
	WHERE adoptionrequest.userID = :uid 
");

$requests->execute(['uid' => $_SESSION["id"]]);

$requests_assoc = $requests->fetchAll(PDO::FETCH_ASSOC);

print_r($requests_assoc);

require VIEW_ROOT . 'home.php';