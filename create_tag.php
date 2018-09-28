<?php
session_start();
$_SESSION['page_title'] = "Friendzone: View post";
include("head.php");
require_once('authorise.php');
include("connection.php");
date_default_timezone_set('Europe/London');

if(isset($_GET['id'])){
	$_SESSION['postid'] = $_GET['id'];
}

?>
<h2>Click a tag to add it to post</h2>
<form class="navbar-form pull-right" action="submit_tag.php" method="post">
	<input type="text\" style="width: 75%;" name="tag" placeholder="Or create a new one...">
	<button type="submit" class="btn btn-default" >Submit</button>
</form>





