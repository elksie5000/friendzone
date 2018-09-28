<?php


require_once('authorise.php');
include("connection.php");
date_default_timezone_set('Europe/London');


$query = "SELECT * from `tags` ORDER BY `tagname` ASC;";



$result = mysqli_query($conn, $query);

mysqli_close($conn);


$holder = "<form action=\"submit_post_tags.php\" method=\"POST\" role=\"form\">
						<legend>Select the tags you want to add</legend>
						
						<div class=\"form-inline\">";


while($row = mysqli_fetch_assoc($result)) {
	  		$tag = $row['tagname'];
	  		

	  		$tagid = $row['tagid'];
	  		
	  		$template= "	
	  						<div class=\"form-group\">
							<input type=\"checkbox\" name=\"tagboxes[]\" value=\"$tagid\" id=\"$tagid\" autocomplete=\"off\"/>
						        <div class=\"btn-group\">
						            <label for=\"$tag\" class=\"btn btn-primary\">
						                <span class=\"fa fa-check-square-o fa-md\"></span>
						                <span class=\"fa fa-square-o fa-md\"></span>
						                <span class=\"content\">$tag.</span>
						            </label>
						        </div>
					        </div>
						";
			$holder.= $template;
	  		
}

$holder.= "</div>
			<button type=\"submit\" class=\"btn btn-primary\">Submit</button>
					</form>";

echo $holder;	  		

?>

