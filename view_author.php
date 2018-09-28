<?php
require_once('authorise.php');
include("connection.php");


$authorid = $_SESSION['author'];
$postid = $_SESSION['postid'];


$query = "SELECT `users`.`first_name`, `users`.`second_name`
		  FROM `posts`, `users`
		  WHERE `posts`.`authorid` = `users`.`userid`
		  AND `posts`.`authorid` = '$authorid'
		  AND `posts`.`postid` = '$postid'";

$result = mysqli_query($conn, $query);
mysqli_close($conn);

while($row = mysqli_fetch_assoc($result)) {
	$first_name = $row['first_name'];
	$second_name = $row['second_name'];
	echo "<a href= \"view_profile.php?userid=$authorid\" <span class=\"badge\">$first_name $second_name</span></a>";	
}	

?>