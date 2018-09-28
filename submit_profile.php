<?php  include "head.php"; ?>
<?php
	include("connection.php");
	require_once('authorise.php');
	
	//Check what fields have updated - except for email address
	$first_name = $_POST['first_name'];
	if($first_name == ""){
		$first_name = $_SESSION['first_name'];
	}

	$second_name = $_POST['second_name'];
	if($second_name ==""){
		$second_name = $_SESSION['second_name'];
	}

	$email = $_SESSION['email']; // This is fixed to login

	$bio = $_POST['bio'];
	if($bio == ""){
		$bio = $_SESSION['bio'];
	}
	
	$userid = $_SESSION['userid']; // This is fixed to login
	
	$password = $_SESSION['password']; // This is fixed to login
		

	$query = "UPDATE `users` SET `first_name` = '$first_name', `second_name` = '$second_name', `email` = '$email',
				`bio` = '$bio', `password` = '$password' WHERE `userid` = '$userid'";
	$result = mysqli_query($conn, $query);
	


	mysqli_close($conn);
	

?>


    <h2>Profile updated</h2>

    <p>You have updated your profile.</p>
    <p><a href="posts_page.php\" class=\"btn btn-info\" role=\"button\"">Return to your posts</a></p>

 <?php  include "footer.php"; ?>