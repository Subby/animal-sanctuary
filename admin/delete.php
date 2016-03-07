<?php 

require('../app/start.php');

if(isset($_GET['id'])) {
	$delete = $db->prepare("
		DELETE FROM pages
		WHERE id = :id
	");

	$delete->execute(['id' => $_GET['id']]);
}

header('Location: ' . BASE_URL . '/admin/index.php');