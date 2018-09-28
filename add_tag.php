<?php
require_once('authorise.php');
$_SESSION['page_title'] = "Friendzone: Add tag";
include("head.php");


include("connection.php");
date_default_timezone_set('Europe/London');

error_reporting(E_ALL);
ini_set('display_errors', '1');
$title = $_SESSION['title'];
$postid = $_SESSION['postid'];



echo "<p>Click a tag to add it to post: <strong><a href=\"view_post.php?id=$postid\">$title</a></strong></p>";
include("view_post_tags.php");
?>
<form class="navbar-form" action="submit_tag.php" method="post">
	<input type="text\" style="width: 75%;" name="tag" placeholder="Add a new tag to list">
	<button type="submit" class="btn btn-default" >Submit</button>
</form>


<?php include('view_tags.php'); ?> 

<a href = "view_post.php"><button type="button" class="btn btn-primary" ">Back to post</button></a>
