<?php
include("head.php");
require_once('authorise.php');
include("connection.php");

date_default_timezone_set('Europe/London');



$comment = $_POST['comment'];
$authorid = $_SESSION['userid'];
$createdtime = date("Y-m-d H:i:s");
$post_id = $_SESSION['postid'];



	
$query = "INSERT INTO `comments`(`comment`, `post_id`, `createdtime`, `authorid`) 
					VALUES('$comment', $post_id, '$createdtime', $authorid);";





$result = mysqli_query($conn, $query);


mysqli_close($conn);



header("Location: view_post.php");
?>
<?php  include "footer.php"; ?>