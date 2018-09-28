<?php


// If the session check is unsuccessful the browser is redirected to the badauth page. 
//Otherwise this file does nothing (so the file that includes it will carry on as normal)

session_start();


if($_SESSION['id'] != session_id() || empty($_SESSION['email'])){
	
	//check cookie too
	if(isset($_COOKIE['sessionkey']) && $_COOKIE['sessionkey'] == '123456'){
		$_SESSION['id'] = session_id();
		//$_SESSION['username'] = "james"; //retrieve there from the database for the 123456 entry
		//$_SESSION['admin'] = true;
	}else{
	
		header("Location: badauth.php");
		exit;
	}
}else{
	session_regenerate_id(); //not strictly necessary
	$_SESSION['id'] = session_id();
}

?>