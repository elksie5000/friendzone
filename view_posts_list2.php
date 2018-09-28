<?php
require_once('authorise.php');
include("head.php");
include("connection.php");
date_default_timezone_set('Europe/London');
error_reporting(-1);
ini_set('display_errors', 'On');
$id = $_SESSION['user_codes']; // This is defined so a single user or all user posts can be returned.


$query = "SELECT * from `posts` where `authorid` LIKE '$id' ORDER BY `createdtime` DESC;";


$result = mysqli_query($conn, $query);
mysqli_close($conn);

while($row = mysqli_fetch_assoc($result)) {
			$_SESSION['title'] = $row['title'];
			$_SESSION['description'] = $row['description'];
			$_SESSION['author'] = $row['authorid'];
			$_SESSION['image_link'] = $row['image_link'];
			$_SESSION['createdtime'] = $row['createdtime'];
			$_SESSION['createdtime'] = date_create($_SESSION['createdtime'])->format('Y-m-d H:i:s');
			
			
	  		$medium_link = "images.php?path=".$_SESSION['image_link']."&size=medium";

			echo "<h1><header>".$_SESSION['title']."</header></h1>";

			//Pull in author
			include("view_author.php");

			echo " 

			<figure><img src=\"$medium_link\" class=\"img-responsive\"></figure>
			<time>".$_SESSION['createdtime']."</time>
			<article>
				<main>".$_SESSION['description']."</main>
			</article>
			<hr>
			<form class=\"navbar-form\" action=\"submit_comment.php\" method=\"post\">
				<input type=\"text\" style=\"width: 75%;\" name=\"comment\" placeholder=\"Write a comment...\">
				<button type=\"submit\" class=\"btn btn-default\" >Submit</button>
			</form>


			<nav><div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
			  <a href = \"delete_post_warning.php\"><button type=\"button\" class=\"btn btn-secondary\" \">Delete</button></a>
			  <a href = \"add_tag.php\"><button type=\"button\" class=\"btn btn-secondary\" \">Add tag</button></a>
			  
			</div></nav>";

			include("view_post_tags.php");
			include("view_comments.php");

}

?>