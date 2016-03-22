<?php
require('../app/start.php');
if(isset($_GET['id'])) {

	$id = $_GET['id'];

	$animal = $db->prepare("
		SELECT *
		FROM animal
		WHERE animalID = :id
		LIMIT 1
		");

	$animal->execute(['id' => $id]);

	$animal = $animal->fetch(PDO::FETCH_ASSOC);

	$title = "Editing " . escape($animal['name']);

} else {
	$animal = false;
	$title = "Animal Not Found";
}

require(VIEW_ROOT . '/admin/edit.php');