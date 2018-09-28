<?php
require_once('authorise.php');
include("connection.php");
date_default_timezone_set('Europe/London');
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(isset($_GET['tagid'])){
	$tagid = $_GET['tagid'];
} else{
	$tagid = "%_%";
}

echo $tagid;

echo $_SESSION['run_update_tagged'];


if($_SESSION['run_update_tagged'] != "TRUE"){
	echo "FUCKING HWELL";

	$query = "	SELECT * 
				FROM `posts`, `post_tag_link` 
				WHERE `post_tag_link`.`postid` like '$postid'  
				AND `post_tag_link`.`postid` = `posts`.`postid`"; 


	$result = mysqli_query($conn, $query);
	mysqli_close($conn);

	var_dump($result);

	while($row = mysqli_fetch_assoc($result)) {
		  		$title = $row['title'];
		  		$crop_title = substr($title, 0, 20)."..."; // Crop as a teaser
		  		$description = $row['description'];
		  		$crop_description = substr($description, 0, 45)."..."; // Crop as a teaser
		  		$createdtime = $row['createdtime'];
		  		$myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $createdtime);
				$format_date = $myDateTime->format('M d, H:i'); 
		  		$image_link = $row['image_link'];
		  		$post_id = $row['postid'];


		  		//Use images.php - created in Cloud Computing module to create a thumbnail
		  		$thumbnail_link = "http://localhost/images.php?path=".$image_link."&size=thumbnail";


		  		//Test for image. If there is one concatenate image into placeholder HTML
		  		if($image_link === NULL){
		  			$image_bit = "";
		  			
		  		} else{
		  			
		  			$image_bit = "<img class=\"img-thumbs\" src=\"$thumbnail_link\" alt=\"Card image cap\" >";
		  		};

		  		$holder = "<div class=\"card\">
		  		<a href = \"view_post.php?id=$post_id\"><div class=\"card-block\">
							$image_bit
		  					<h4 class=\"card-title\">$crop_title</h4></a>
		  					<p class=\"card-text\">$crop_description<br>$format_date</p>
		  					
		  				</div>
		  			</div>";

		  		echo $holder;
	}
}
$_SESSION['run_update_tagged'] = "TRUE";

?>
