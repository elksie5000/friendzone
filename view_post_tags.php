<?php
//This script returns the tags for a single article.

require_once('authorise.php');
include("connection.php");
date_default_timezone_set('Europe/London');

$postid = $_SESSION['postid'];
//var_dump($_SESSION);

$query = "	SELECT `tags`.`tagname`, `tags`.`tagid`
			FROM `posts`, `post_tag_link`, `tags`
			WHERE `posts`.`postid` = $postid
			AND `post_tag_link`.postid = `posts`.`postid`
			AND `post_tag_link`.`tagid` = `tags`.`tagid`";

$result = mysqli_query($conn, $query);

mysqli_close($conn);

$output = "<p><strong>Tags: ";
while($row = mysqli_fetch_assoc($result)) {
	$tagname = $row['tagname'];
	$tagid = $row['tagid'];
	$output.= "<a href = \"view_tagged_posts.php?tagid=$tagid\" <span class=\"badge\">$tagname</span></a>";
}	
$output.= "<p>";

echo $output;


?>