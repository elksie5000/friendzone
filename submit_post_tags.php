<?php
session_start();
$_SESSION['page_title'] = "Friendzone: Add tag";
include("head.php");

require_once('authorise.php');
include("connection.php");
date_default_timezone_set('Europe/London');

echo "Submit";
$postid = $_SESSION['postid'];



$query = ""; //initialise query


$tagboxes = $_POST['tagboxes'];


if(empty($tagboxes)){
	header("Location: add_tag.php"); // if no tags selected go back to add_tags.php
} else {
	$number = count($tagboxes);
	for($i=0; $i < $number; $i++){
		echo $tagboxes[$i];
		//This query checks to see whether a particular tagged post exists. 
		//If it doesn't exist, the row is inserted. Else we move on to the next.
		//https://stackoverflow.com/a/16460510/386861
		$query.= "INSERT INTO `post_tag_link`(`postid`, `tagid`)
					SELECT  $postid, $tagboxes[$i]
					FROM dual 
					WHERE NOT EXISTS (SELECT 1 
										FROM `post_tag_link`
										WHERE `tagid` = $tagboxes[$i]
										AND `postid` = $postid);"; 
	}
}



echo $query;
$result = mysqli_query($conn, $query);

var_dump(mysqli_error($conn));
mysqli_close($conn);

//header( "Location: add_tag.php");
?>