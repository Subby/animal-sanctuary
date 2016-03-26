<?php 
$title = "Login";
require("app/start.php");
session_start();
if(isset($_SESSION["id"])) {
	header("Location: index.php");
	exit();
}
if(isset($_POST['submitted'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(check_empty($username)) {
		$errors[] = "Please ensure you have filled in the username field.";
	}	

	if(check_empty($password)) {
		$errors[] = "Please ensure you have filled in the password field.";
	}

	if(isset($errors) && count($errors) > 0) {
		require VIEW_ROOT . 'login.php';
		exit();
	}	

	$findUser = $db->prepare("
		SELECT * FROM user 
		WHERE username = :username
		AND password = :password
	");

	$findUser->execute([
		'username' => $username,
		'password' => md5($password)	
	]);

	$findUser = $findUser->fetch(PDO::FETCH_ASSOC);

	if(!$findUser) {
		$errors[] = "Please ensure you have entered a correct username and password.";
		require(VIEW_ROOT . 'login.php');
		die();
	} else {
		$_SESSION["id"] = $findUser["userID"];
		if($findUser["staff"] == 1) {
			$_SESSION["admin"] = true;
			echo "yup";
		}
		header("Location: index.php");
		exit();
		
	}

} else {
	require(VIEW_ROOT . 'login.php');
}	