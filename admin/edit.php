<?php
require('../app/start.php');
session_start();
if(!isset($_SESSION["id"]) || !isset($_SESSION["admin"])) {
	echo "<h1>403 Forbidden</h1>";
	exit();
}

if(!empty($_POST)) {
	$name = $_POST['name'];
	$date = $_POST['date'];
	$type = $_POST['type'];
	$desc = $_POST['desc'];
	$breed = $_POST['breed'];
	$id = $_POST['id'];
	//Setup array for easier access
	$animal = array(
		"name" => $name,
		"dateofbirth" => $date,
		"type" => $type,
		"description" => $desc,
		"breed" => $breed,
		"animalID" => $id,
		);

	$title = "Editing " . escape($animal['name']);

	if(check_empty($name) || check_empty($date) || check_empty($type) || check_empty($desc)) {
		$errors[] = "Please ensure you have filled in all the form values.";
	}

	if(check_empty($breed)) {
		$breed = "N/A";
	}
	
	$formatted_date = new DateTime($date);
	$current_date = new DateTime();
	$current_date->format("Y-m-d");
	if($formatted_date > $current_date) {
		$errors[] = "Please ensure you have entered a date of birth that is not in the future.";
	} 

	//File stuff
	$file_changed = false;
	$allowed_types = array('png', 'jpg', 'gif');
	$file_name = $_FILES["photo"]["name"];
	$file_name_tmp = $_FILES["photo"]["tmp_name"];
	$file_type = $_FILES["photo"]["type"];
	$extention = pathinfo($file_name, PATHINFO_EXTENSION);
	$encoded_file = md5($file_name).mt_rand();
	if(in_array($extention, $allowed_types)) {
		move_uploaded_file($file_name_tmp, "../images/".$encoded_file.".".$extention);
		$file_changed = true;
	} 

	if(isset($errors) && count($errors) > 0) {
		require(VIEW_ROOT . 'admin/edit.php');
		exit();
	}
	//Update image name with the query
	if($file_changed) {
		$updateAnimal = $db->prepare("
			UPDATE animal 
			SET
			name = :name,
			dateofbirth = :date,
			description = :desc,
			photo = :photo,
			type = :type,
			breed = :breed
			WHERE animalID = :id
		");
	
		$updateAnimal->execute([
			'name' => $name,
			'date' => $date,
			'type' => $type,
			'desc' => $desc,
			'breed' => $breed,
			'photo' => $encoded_file.".".$extention,
			'id' => $id,
			]);		
		if($updateAnimal) {
			die('Sucessfully edited '. escape($name));
		}
	} else {
		//No image name update with this query
		$updateAnimal = $db->prepare("
			UPDATE animal 
			SET
			name = :name,
			dateofbirth = :date,
			description = :desc,
			type = :type,
			breed = :breed
			WHERE animalID = :id
		");
	
		$updateAnimal->execute([
			'name' => $name,
			'date' => $date,
			'type' => $type,
			'desc' => $desc,
			'breed' => $breed,
			'id' => $id,
			]);
		if($updateAnimal) {
			die('Sucessfully edited '. escape($name));
		}
	}

	
}
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