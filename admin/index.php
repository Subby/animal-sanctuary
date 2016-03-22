<?php

session_start();
if(!isset($_SESSION["id"]) || !isset($_SESSION["admin"])) {
	echo "<h1>403 Forbidden</h1>";
	exit();
}
$title = "Manage";
echo '<a href="add.php">Add new animal</a>';