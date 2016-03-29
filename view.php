<?php
session_start();
if(!isset($_SESSION["id"])) {
	header("Location: login.php");
	exit();
}
require 'app/start.php';

if(empty($_GET['id'])) {
	$animal = false;
	$title = "Animal Not Found";
} else {
	$id = $_GET['id'];
	//Find the animal
	$animal = $db->prepare("
		SELECT *
		FROM animal
		WHERE animalID = :id
		LIMIT 1
		");

	$animal->execute(['id' => $id]);

	$animal = $animal->fetch(PDO::FETCH_ASSOC);

	if($animal) {
		$title = "Viewing ". $animal['name'];
	} else {
		$title = "Animal Not Found";
	}

	
}

require VIEW_ROOT . 'view.php';