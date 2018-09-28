<?php
include("head.php");
require_once('authorise.php');
include("connection.php");

date_default_timezone_set('Europe/London');



$tag = $_POST['tag'];


$tag = mysqli_real_escape_string($conn, $tag); //Escape the string value 
$tag = strtolower($tag);
$query = "INSERT INTO `tags`(`tagname`)
			SELECT '$tag'
			FROM dual 
			WHERE NOT EXISTS (SELECT * FROM `tags`
								WHERE `tagname` = '$tag');"; 





$result = mysqli_query($conn, $query);


mysqli_close($conn);



header("Location: add_tag.php");
?>
<?php  include "footer.php"; ?>