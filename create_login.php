<?php  session_start();
include "head.php"; ?>


<form method="POST" action="check_email.php">
	<fieldset class="form-group">
		<label for="first_name">First name</label>
		<input type="text-muted" class="form-control" name="first_name" placeholder="Your first name">
	</fieldset>
	<fieldset class="form-group">
		<label for="second_name">Surname</label>
		<input type="text-muted" class="form-control" name="second_name" placeholder="Surname">
	</fieldset>
	<fieldset class="form-group">
		<label for="email">Email address</label>
		<input type="email" class="form-control" name="email" placeholder="Enter email">
		<small class="text-muted">We'll never share your email with anyone else.</small>
	</fieldset>
	<fieldset class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" placeholder="Enter email">
	</fieldset>
	<div class="pwstrength_viewport_progress"></div>
	
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php  include "footer.php"; ?>