
<?php 
session_start();
$_SESSION['page_title'] = "Friendzone"; 
include "head.php"; 
include "setcookie.php"; 
include("connection.php");
?>
		
		<form method="POST" action="authenticate.php">
			<fieldset class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
				<small class="text-muted">We'll never share your email with anyone else.</small>
			</fieldset>
			<fieldset class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name= "password" id="password" placeholder="Enter email">
			</fieldset>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<p><a href="create_login.php">Or create an account</a></p>
		
<?php  include "footer.php"; ?>