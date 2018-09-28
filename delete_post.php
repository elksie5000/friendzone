<?php
include("head.php");
require_once('authorise.php');
include("connection.php");
date_default_timezone_set('Europe/London');


$query = "DELETE from `posts` WHERE `postid` = '".$_SESSION['postid']."';";

$result = mysqli_query($conn, $query);
mysqli_close($conn);


?>

<a class="btn btn-default" href="posts_page.php" role="button"><div class="alert alert-info">
	<button type="button" class="btn btn-info" aria-hidden="false">&times;</button>
	<strong>Your post has been deleted</strong> Go back to posts
</div></a>


<?php  include "footer.php"; ?>