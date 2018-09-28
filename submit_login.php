<?php  session_start();
include "head.php"; ?>
<?php
	include("connection.php");
	
	$first_name = $_SESSION['first_name'];
	$second_name = $_SESSION['second_name'];
	$email = $_SESSION['email'];
	$password = $_SESSION['password'];
	$password = hash('sha512', $password);
	
	
	
	$query = "INSERT INTO `users`(`first_name`, `second_name`, `email`, `password`) 
				VALUES ('$first_name', '$second_name', '$email', '$password')";

	$result = mysqli_query($conn, $query);
	
  	mysqli_close($conn);

?>


    <h2>Login created</h2>

    <p>Congratulations! You now have an account!</p>
    <p><a href="index.php">Return to the login page</a></p>

 <?php  include "footer.php"; ?>