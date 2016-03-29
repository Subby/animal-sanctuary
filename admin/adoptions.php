<?php
session_start();
if(!isset($_SESSION["id"]) || !isset($_SESSION["admin"])) {
	echo "<h1>403 Forbidden</h1>";
	exit();
}
$title = "Manage Adoption Requests";
require('../app/start.php');

if(isset($_GET["id"]) && isset($_GET['m']) && isset($_GET['aid']) && isset($_GET['uid'])) {
	$id = $_GET["id"];
	$manage = $_GET['m'];
	$aid = $_GET['aid'];
	$uid = $_GET['uid'];

	if($manage == 1) {
		$updateAnimal = $db->prepare("
			UPDATE animal 
			SET
			available = 0
			WHERE animalID = :aid
		");
		$updateAnimal->execute([
			'aid' => $aid
		]);

		$updateRequest = $db->prepare("
			UPDATE adoptionrequest
			SET approved = 1
			WHERE adoptonID = :id
			");	
		$updateRequest->execute([
			'id' => $id
		]);		

		$updateOtherRequest = $db->prepare("
			UPDATE adoptionrequest
			SET approved = 2
			WHERE animalID = :id
			");	
		$updateOtherRequest->execute([
			'id' => $aid
		]);

		$deleteOwns = $db->prepare("
			DELETE FROM owns
			WHERE animalID = :aid
			");	

		$deleteOwns->execute([
			'aid' => $aid
		]);	

		$insertOwns = $db->prepare("
			INSERT INTO owns (userID, animalID)
			VALUES(:userID, :animalID)
			");	
		$insertOwns->execute([
			'userID' => $uid,
			'animalID' => $aid
		]);		
		die("Sucessfully managed request.");
	} else if($manage == 2) {
		$updateRequest = $db->prepare("
			UPDATE adoptionrequest
			SET approved = 2
			WHERE adoptionID = :id
			");	
		$updateRequest->execute([
			'id' => $id
		]);	
		die("Sucessfully managed request.");	
	}


	exit();
}

$requests = $db->query("
	SELECT *
	FROM adoptionrequest
	INNER JOIN animal
	ON adoptionrequest.animalID=animal.animalID
	JOIN user
	ON adoptionrequest.userID=user.userID;
")->fetchAll(PDO::FETCH_ASSOC);

require(VIEW_ROOT . '/admin/adoptions.php');