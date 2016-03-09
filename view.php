<?php

require 'app/start.php';

if(empty($_GET['id'])) {
	$animal = false;
} else {
	$id = $_GET['id'];

	$animal = $db->prepare("
		SELECT *
		FROM animal
		WHERE animalID = :id
		LIMIT 1
		");

	$animal->execute(['id' => $id]);

	$animal = $animal->fetch(PDO::FETCH_ASSOC);

}

require VIEW_ROOT . 'view.php';