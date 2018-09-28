
<?php 



$page_title = $_SESSION['page_title'];



$output = "<!DOCTYPE html>
<html lang=\"en\">
	<head>
		<meta charset=\"utf-8\">
		<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
		<title>$page_title</title>

		<!-- Bootstrap CSS -->
		<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">
		<!-- Custom Strength password CSS - Credits: https://github.com/ablanco/jquery.pwstrength.bootstrap/blob/master/dist/pwstrength-bootstrap.min.js -->
		<link href=\"styles.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js\"></script>
			<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
		<![endif]-->
	</head>
	<body>
	<div class=\"container-fluid\">";

if($_SESSION['login'] === "TRUE"){
	$output.="<nav class=\"navbar navbar-expand-md navbar-dark bg-dark\">
  <a class=\"navbar-brand\" href=\"posts_page.php\">Friendzone</a>
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    <span class=\"navbar-toggler-icon\"></span>
  </button>
  <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
    <ul class=\"navbar-nav\">
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"posts_page.php\">All posts</a>
      </li>
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"edit_profile.php\">My profile</a>
      </li>
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"users_page.php\">Users</a>
      </li>
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"tagged_posts_page.php\">Tagged posts</a>
      </li>
	  <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"logout.php\">Logout</a>
      </li>	

    </ul>
  </div>
</nav>
		";
} else{
  $output.="<nav class=\"navbar navbar-expand-md navbar-dark bg-dark\">
  <a class=\"navbar-brand\" href=\"index.php\">Friendzone</a></nav>";

}

echo $output;
?>


