
<?php  include "testcookie.php"; 
require_once('authorise.php');
?>



<?php
date_default_timezone_set('Europe/London');


include("connection.php");

$email = $_SESSION['email'];
$_SESSION['page_title'] = "Friendzone: Posts";
$first_name = $_SESSION['first_name'];
$second_name = $_SESSION['second_name'];
$userid = $_SESSION['userid'];
include "head.php";
include("user_strap_display.php");

$userid = $_SESSION['userid'];
//Filter out current user
$query = "SELECT * from `users` where `userid` != $userid;";
$result = mysqli_query($conn, $query);



mysqli_close($conn);

$holder = "<div class=\"list-group\">";

while($row = mysqli_fetch_assoc($result)) {
	  		$userid = $row['userid'];
	  		$first_name = $row['first_name'];
	  		$second_name = $row['second_name'];
	  		$bio = $row['bio'];
	  		

	  		//Use images.php - created in Cloud Computing module to create a thumbnail
	  		//$thumbnail_link = "/images.php?path=".$image_link."&size=thumbnail";


	  		//Test for bio. If null use a placeholder
	  		if($bio === NULL){
	  			$bio = "Oh, they seem to want to be mysterious";
	  			
	  		};

	  		$holder = "<a href=\"view_profile.php?userid=$userid\" class=\"list-group-item\">$first_name $second_name: $bio</a>";

	  		echo $holder;
}


?>


<?php  include "footer.php"; ?>