<?php

require 'app/start.php';

$title = "View All Animals";

$animals = $db->query("
	SELECT *
	FROM animal
	")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . 'list.php';