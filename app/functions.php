<?php

function escape($text) {
	return htmlspecialchars($text, ENT_QUOTES, 'utf-8');
}

function check_empty($input) {
	return empty(trim($input));
}