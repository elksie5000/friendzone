<?php  
require_once('authorise.php');
$_SESSION['page_title'] = "Friendzone: Edit profile";
include("head.php");
include("connection.php");


 

?>


<form method="POST" action="submit_profile.php">
	<fieldset class="form-group">
		<label for="first_name">First name</label>

<?php echo "<input type=\"text\" class=\"form-control\" name=\"first_name\" placeholder=\"".$_SESSION['first_name']."\">";
?>
	</fieldset>
	<fieldset class="form-group">
		<label for="second_name">Surname</label>
<?php echo "<input type=\"text\" class=\"form-control\" name=\"second_name\" placeholder=\"".$_SESSION['second_name']."\">"; ?>

	</fieldset>
	<fieldset class="form-group">
		<label for="email">Email address</label>

	<?php echo "<input type=\"email\" class=\"form-control\" name=\"email\" placeholder=\"".$_SESSION['email']."\">"; ?>
		<small class="text-muted">We'll never share your email with anyone else.</small>
	</fieldset>


	<fieldset class="form-group">
		<label for="password">Bio</label>
<?php
if(is_null($_SESSION['bio'])){
	$_SESSION['bio'] = "Provide a brief description of yourself.";
};
echo "<textarea name=\"bio\" id=\"inputBio\" class=\"form-control\" placeholder=\"".$_SESSION['bio']."\" rows=\"3\"></textarea></fieldset>";

?>	

<?php echo "<input type=\"hidden\" name=\"userid\" id=\"hiddenField\" value=\"".$_SESSION['userid']."\">"; ?>


	
	<button type="submit" class="btn btn-primary">Update</button>
</form>
<a class="btn btn-default" href="posts_page.php" role="button">Back</a>

<h2>Your posts</h2>
<?php 
$_SESSION['user_codes'] = $_SESSION['userid']; //This will be used in view_posts_list to return the single user's posts

include("view_posts_list.php");
?>


<?php  include "footer.php"; ?>