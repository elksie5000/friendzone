<?php 
require_once('authorise.php'); 
$_SESSION['page_title'] = "Friendzone: View profile";
include("head.php");
include("connection.php");



$userid = $_GET['userid'];

$query = "SELECT * from `users` where `userid` = '$userid';";

$result = mysqli_query($conn, $query);
mysqli_close($conn);
while($row = mysqli_fetch_assoc($result)) {
	  		
			$first_name = $row['first_name'];
			$second_name = $row['second_name'];
			$bio = $row['bio'];


	

	$holder = "<div class=\"card\">
	  				<div class=\"card-block\">
						<h4 class=\"card-title\">$first_name $second_name</h4>
	  					<p class=\"card-text\">$bio</p>	
	  				</div>
	  			</div>";

	echo $holder;
}

$_SESSION['user_codes'] = $userid; //This will be used in view_posts_list to return the single user's posts

include("view_posts_list.php");


?>
<?php  include "footer.php"; ?>