<?php
include("head.php");
include("connection.php");
$email = $_POST['email'];
$password = $_POST['password'];

$password = hash('sha512', $password);


/*
 Query database to check whether email and password are on system
 */
$query = "SELECT * from `users` WHERE `email` = '$email' AND `password` = '$password'";

$result = mysqli_query($conn, $query);


mysqli_close($conn);

$row = mysqli_fetch_assoc($result);



if($row['email'] == $email && $row['password'] == $password ){
	// SUCCESS
	session_start();
	session_regenerate_id();
	$_SESSION['id'] = session_id();
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	$_SESSION['userid'] = $row['userid'];
	$_SESSION['first_name'] = $row['first_name'];
	$_SESSION['second_name'] = $row['second_name'];
	$_SESSION['bio'] = $row['bio'];
	$_SESSION['page_title'] = "Friendzone";
	
	$_SESSION['login'] = "TRUE";
	$location = 'posts_page.php';
}else{
	$location = 'badauth.php';
}

header("Location: $location");

exit;


?>