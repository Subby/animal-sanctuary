<?php
require("app/start.php");
session_start();
if(isset($_SESSION["id"])) {
	header("Location: index.php");
	exit();
}
$title = "Register";
if(isset($_POST['submitted'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(check_empty($username)) {
		$errors[] = "Please ensure you have filled in the username field.";
	}	

	if(check_empty($password)) {
		$errors[] = "Please ensure you have filled in the password field.";
	}

	if(strlen($username) > 12) {
		$errors[] = "Please ensure that your username is 12 or less characters";
	}

	if(strlen($password) < 6) {
		$errors[] = "Please ensure that your password has 6 or more characters.";
	}

	if(isset($errors) && count($errors) > 0) {
		require VIEW_ROOT . 'register.php';
		exit();
	}

	$insertUser = $db->prepare("
		INSERT INTO user (password, username)
		VALUES(:password, :username)
		");

	$insertUser->execute([
		'password' => md5($password),
		'username' => $username	
	]);	
	echo "You have sucessfully registered, you may login <a href=\"login.php\">here</a>.";
	exit();
} else {
	require VIEW_ROOT . 'register.php';
}
?>
	
	

