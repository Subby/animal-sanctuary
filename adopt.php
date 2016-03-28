<?php
session_start();
if(!isset($_SESSION["id"])) {
	header("Location: login.php");
	exit();
}
require 'app/start.php';
if(isset($_POST["submitted"])) {
	$animalID = $_POST['id'];
	$userID = $_SESSION["id"];

	$exists = $db->prepare("
		SELECT * FROM adoptionrequest 
		WHERE userID = :uid
		AND animalID = :aid
	");

	$exists->execute([
		'uid' => $userID,
		'aid' => $animalID	
	]);

	$exists_check = $exists->fetchAll(PDO::FETCH_ASSOC);

	if($exists_check) {
		echo "You have already submitted an adoption request for this animal.<br/>";
		echo "Click <a href=\"index.php\">here</a> to go back to the home page.";
		exit();
	}

	$insertRequest = $db->prepare("
		INSERT INTO adoptionrequest (userID, animalID)
		VALUES(:uid, :aid)
	");

	$insertRequest->execute([
		'uid' => $userID,
		'aid' => $animalID
	]);	

	if($insertRequest) {
		echo "You have sucessfully submitted an adoption request. Click <a href=\"index.php\">here</a> to go back to the home page.";
	} else {
		echo "Sorry, an error has occured.";
	}
	exit();
}
if(empty($_GET['id'])) {
	$animal = false;
	$title = "Animal Not Found";
} else {
	$id = $_GET['id'];


	$animal = $db->prepare("
		SELECT animalID, name
		FROM animal
		WHERE animalID = :id
		AND available = 1
		LIMIT 1
		");

	$animal->execute(['id' => $id]);

	$animal = $animal->fetch(PDO::FETCH_ASSOC);

	if($animal) {
		$title = "Adopting ". $animal['name'];
	} else {
		$title = "Animal Not Found";
	}
}

require VIEW_ROOT . 'adopt.php';