<?php
session_start();
if(!isset($_SESSION["id"]) || !isset($_SESSION["admin"])) {
	echo "<h1>403 Forbidden</h1>";
	exit();
}
$title = "Manage Adoption Requests";
require('../app/start.php');

if(isset($_POST["submitted"])) {
}

$requests = $db->query("
	SELECT *
	FROM adoptionrequest
	INNER JOIN animal
	ON adoptionrequest.animalID=animal.animalID
	JOIN user
	ON adoptionrequest.userID=user.userID;
")->fetchAll(PDO::FETCH_ASSOC);;

require(VIEW_ROOT . '/admin/adoptions.php');