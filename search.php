<?php 
require("app/start.php");
session_start();
if(!isset($_SESSION["id"])) {
	header("Location: login.php");
	exit();
}
$title = "Search";
if(isset($_POST['submitted'])) {

}

$types = $db->query("
	SELECT DISTINCT type
	FROM animal
	")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . 'search.php';