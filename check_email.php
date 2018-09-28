<?php
include("head.php");
include("connection.php");

$_SESSION['email'] = $_POST['email'];

$email = $_SESSION['email'];
$_SESSION['first_name'] = $_POST['first_name'];
$_SESSION['second_name'] = $_POST['second_name'];
$_SESSION['password'] = $_POST['password'];



$query = "SELECT * from `users` WHERE `email` = '$email';";


$result = mysqli_query($conn, $query);
	
mysqli_close($conn);


//Is the exmail unique on the database?
if(mysqli_num_rows($result) > 0){
	$location = 'email_taken.php';
	
} else{
	$location = 'submit_login.php';
	
}
header("Location: $location");
?>
<?php  include "footer.php"; ?>