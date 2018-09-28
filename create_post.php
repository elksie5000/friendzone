
<?php
require_once('authorise.php');
include("connection.php");
include "head.php";


?>

<form action="upload_post.php" method="POST" role="form" enctype="multipart/form-data">
	<legend>Create post</legend>

	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" id="title" name="title" placeholder="Write a useful title">
	</div>
	<div class="form-group">
	<label for="title">Description</label>
	<input type="text" name="description" id="inputDescription" class="form-control" placeholder="Tell friends your update">
	</div>
		 Select image to upload:
    	<input type="file" name="fileToUpload" id="fileToUpload">
    	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>


 <?php  include "footer.php"; ?>