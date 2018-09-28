<?php
include("head.php");
require_once('authorise.php');
include("connection.php");
date_default_timezone_set('Europe/London');


//Check whether the user has rights to delete post - that is, did they create it?
if($_SESSION['userid'] === $_SESSION['author']){
	$holder = "<div class=\"alert alert-warning\" role=\"alert\">
    <strong>Warning!</strong> Are you sure you want to delete this post?
	</div>
	<a class=\"btn btn-danger\" href=\"delete_post.php\" role=\"button\">Yes, delete it!</a>
	<a class=\"btn\" href=\"posts_page.php\" role=\"button\">No, go back to my posts</a>
";
}else{
	$holder = "<div class=\"alert alert-warning\" role=\"alert\">
    <strong>Warning!</strong> You're not allowed to delete this post!
	</div>
	<a class=\"btn\" href=\"posts_page.php\" role=\"button\">No, go back to my posts</a>
	";
}

echo $holder;
?>




<?php  include "footer.php"; ?>