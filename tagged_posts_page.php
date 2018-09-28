<?php
require_once('authorise.php');
include("head.php");

include("user_strap_display.php");
include("connection.php");
date_default_timezone_set('Europe/London');


?>

<h2>Tagged posts</h2>
<p>Click a tag to find more stories about a topic that interests you:</p>


<?php


$query = "SELECT * from `tags` ORDER BY `tagname` ASC;";



$result = mysqli_query($conn, $query);

mysqli_close($conn);


$holder = "<div class=\"container-fluid\">";


while($row = mysqli_fetch_assoc($result)) {
	  		$tag = $row['tagname'];
	  		$tagid = $row['tagid'];
	  		
	  		$template= "<a class=\"btn btn-primary\" href=\"view_tagged_posts.php?tagid=$tagid\" role=\"button\">$tag</a>";
			$holder.= $template;
	  		
}

$holder.= "</div>";

echo $holder;	

include("view_tagged_posts.php");

?> 