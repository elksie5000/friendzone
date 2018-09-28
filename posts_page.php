<?php
echo "Got here";


require_once('authorise.php');
date_default_timezone_set('Europe/London');

error_reporting(-1);
ini_set('display_errors', 'On');

//include "testcookie.php";
include "head.php";
include "connection.php";

exit;
//$email = $_SESSION['email'];
$_SESSION['page_title'] = "Friendzone: Posts";
$first_name = $_SESSION['first_name'];
$second_name = $_SESSION['second_name'];

//include("user_strap_display.php");


$query = "SELECT * from `posts` where `authorid` LIKE '8';";
$result = mysqli_query($conn, $query);

$_SESSION['user_codes'] = "%_%"; //This will be used in view_posts_list to return all user posts;


//include("view_posts_list2.php");



?>


<?php  include "footer.php"; ?>