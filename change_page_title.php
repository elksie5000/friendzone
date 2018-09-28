
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('Europe/London');
//Dynamically change page title for SEO value and usability
ob_start();
$buffer = "None";
echo "Buffer: ". $buffer;
$buffer = ob_get_contents();
print_r("Buffer: ". $buffer);
ob_end_clean();
if(isset($_SESSION['page_title'])){
	echo "True";
	$buffer = str_replace("%TITLE%",$_SESSION['page_title'],$buffer);
}else{
	echo "False";
	$buffer = str_replace("%TITLE%","Friendzone",$buffer);
};
$buffer=str_replace("%TITLE%","Friendzone",$buffer);
echo $buffer;

?>