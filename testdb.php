<?php 
include("connection.php");
$query = "SELECT email from users";
$result = mysqli_query($conn, $query);


var_dump($result);
//var_dump(mysqli_error($conn));
var_dump(mysqli_num_rows($conn));

?>