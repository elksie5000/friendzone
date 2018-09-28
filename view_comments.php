<?php


require_once('authorise.php');
include("connection.php");
date_default_timezone_set('Europe/London');



$query = "SELECT * from `comments` WHERE `post_id` = ".$_SESSION['postid']." ORDER BY `createdtime` DESC;";
$result = mysqli_query($conn, $query);
mysqli_close($conn);

$holder = "<table class=\"table table-striped table-inverse table-hover\">
	  			<thead>
	  				<tr>
	  					<th>Comment</th><th>Author</th><th>Time</th>
	  				</tr>
	  			</thead>
	  			<tbody>";

while($row = mysqli_fetch_assoc($result)) {
	  		$comment = $row['comment'];
	  		$createdtime = $row['createdtime'];
			$format_date = date_create($createdtime)->format('Y-m-d H:i:s');
	  		$authorid = $row['authorid'];
	  		$post_id = $row['post_id'];

	  		$holder.= "
	  				<tr>
	  					<td>$comment</td><td>$authorid</td><td>$format_date</td>
	  				</tr>
	  			";
	  		
}

$holder.= "</tbody>
	  		</table>";
echo $holder;	  		

?>