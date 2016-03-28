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
require VIEW_ROOT . 'search.php';