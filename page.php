<?php

require 'app/start.php';

if(empty($_GET['page'])) {
	$page = false;
} else {
	$slug = $_GET['page'];

	$page = $db->prepare("
		SELECT *
		FROM pages
		WHERE slug = :slug
		LIMIT 1
		");

	$page->execute(['slug' => $slug]);

	$page = $page->fetch(PDO::FETCH_ASSOC);

	if($page) {
		$page['created'] = new DateTime($page['created']);

		if($page['updated']) {
			$page['updated'] = new DateTime($page['updated']);
		}

	}
}

require VIEW_ROOT . '/page/show.php';