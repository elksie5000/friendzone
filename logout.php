<?php
date_default_timezone_set('Europe/London');

require_once('authorise.php');
include("connection.php");

$_SESSION['login'] = "FALSE";

header("Location: index.php");

$_SESSION['run_update_tagged'] = "FALSE";

session_destroy();

?>