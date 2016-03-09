<?php 
require("app/start.php");
session_start();
$title = "Home";
require VIEW_ROOT . 'home.php';