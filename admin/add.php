<?php
session_start();
if(!isset($_SESSION["id"]) || !isset($_SESSION["admin"])) {
	echo "<h1>403 Forbidden</h1>";
	exit();
}
$title = "Add New Animal";
require('../app/start.php');

if(isset($_POST["submitted"])) {
	$name = $_POST['name'];
	$date = $_POST['date'];
	$type = $_POST['type'];
	$desc = $_POST['desc'];

	if(check_empty($name) || check_empty($date) || check_empty($type) || check_empty($desc)) {
		$errors[] = "Please ensure you have filled in all the form values.";
	}
	
	$formatted_date = new DateTime($date);
	$current_date = new DateTime();
	$current_date->format("Y-m-d");
	if($formatted_date > $current_date) {
		$errors[] = "Please ensure you have entered a date of birth that is not in the future.";
	} 

	//File stuff
	$allowed_types = array('png', 'jpg', 'gif');
	$file_name = $_FILES["photo"]["name"];
	$file_name_tmp = $_FILES["photo"]["tmp_name"];
	$file_type = $_FILES["photo"]["type"];
	$extention = pathinfo($file_name, PATHINFO_EXTENSION);
	$encoded_file = md5($file_name).mt_rand();
	if(in_array($extention, $allowed_types)) {
		move_uploaded_file($file_name_tmp, "../images/".$encoded_file.".".$extention);
	} else {
		$errors[] = "The photo uploaded is not of a valid file type.";
	}

	if(isset($errors) && count($errors) > 0) {
		require(VIEW_ROOT . 'admin/add.php');
		exit();
	}



	$insertAnimal = $db->prepare("
		INSERT INTO animal (name, dateofbirth, description, photo, type)
		VALUES(:name, :date, :desc, :photo, :type)
	");

	$insertAnimal->execute([
		'name' => $name,
		'date' => $date,
		'desc' => $desc,
		'photo' => $encoded_file.".".$extention,
		'type' => $type	
	]);

	if($insertAnimal) {
		echo "Sucessfully added!";
		exit();
	} else {
		print_r($insertAnimal);
		die("Error!");
		exit();
	}
} else {

}

require(VIEW_ROOT . '/admin/add.php');