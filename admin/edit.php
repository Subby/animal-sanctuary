<?php 

require('../app/start.php');


if(!empty($_POST)) {
	$id = $_POST['id'];
	$label = $_POST['label'];
	$title = $_POST['title'];
	$slug = $_POST['slug'];
	$body = $_POST['body'];

	$updatePage = $db->prepare("
	UPDATE pages 
	SET
	label = :label,
	title = :title,
	slug = :slug,
	body = :body,
	updated = NOW()
	WHERE id = :id
	");

	$updatePage->execute([
		'id' => $id,
		'label' => $label,
		'title' => $title,
		'body' => $body,
		'slug' => $slug,
		]);

	header('Location: ' . BASE_URL . '/admin/index.php');
}

if(isset($_GET['id'])) {
	$page = $db->prepare("
	SELECT id, title, label, body, slug
	FROM pages
	WHERE id = :id
	");

	$page->execute(['id' => $_GET['id']]);

	$page = $page->fetch(PDO::FETCH_ASSOC);

} else {
	header('Location: ' . BASE_URL . '/admin/index.php');
	die();
}



require(VIEW_ROOT . '/admin/edit.php');