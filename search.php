<?php 
require("app/start.php");
session_start();
if(!isset($_SESSION["id"])) {
	header("Location: login.php");
	exit();
}
$title = "Search";
if(isset($_POST['submitted'])) {
	$executable = array();

	if(isset($_POST['name']) && check_empty($_POST['name'])
	&& isset($_POST['age']) && check_empty($_POST['age'])
	&& isset($_POST['type']) && $_POST['type'] == "-") { //Very messy, must be another way to do this but I'm running out of time
		$search_assoc = false;
		require VIEW_ROOT . 'search_results.php';
		die();
	}
	$query = "
	SELECT *
	FROM animal
	 ";

	if(isset($_POST['name']) && !check_empty($_POST['name'])) {
		$name = $_POST['name'];
		$query .= "WHERE animalname = :name ";
		$executable["name"] = $name;
	}

	if(isset($_POST['age']) && !check_empty($_POST['age'])) {
		$age = $_POST['age'];
		$query .= " WHERE YEAR(CURDATE()) - YEAR(dateofbirth) = :age";
		$executable["age"] = $age;
	}

	if(isset($_POST['type']) && $_POST['type'] != "-") {
		$type = $_POST['type'];
		$query .= " WHERE type = :type";
		$executable["type"] = $type;
	}	

	if(isset($_POST['breed']) && !check_empty($_POST['breed'])) {
		$breed = $_POST['breed'];
		$query .= " WHERE type = :breed";
		$executable["breed"] = $breed;
	}	


	$search = $db->prepare($query);

	$search->execute($executable);

	$search_assoc = $search->fetchAll(PDO::FETCH_ASSOC);

	require VIEW_ROOT . 'search_results.php';
	die();

}

$types = $db->query("
	SELECT DISTINCT type
	FROM animal
	")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . 'search.php';