<?php 
require("app/start.php");
session_start();
if(!isset($_SESSION["id"])) {
	header("Location: login.php");
	exit();
}
$title = "Home";
require VIEW_ROOT . 'home.php';