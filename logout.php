<?php
session_start();
unset($_SESSION["id"]);
if(isset($_SESSION["admin"])) {
	unset($_SESSION["admin"]);
}
session_destroy();
header("Location: index.php");
exit();