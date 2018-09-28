<?php
$userid=$_SESSION['userid'];
$first_name=$_SESSION['first_name'];
$second_name=$_SESSION['second_name'];

echo "<span class=\"badge\">Welcome: <a href=\"view_profile.php?userid=$userid\">$first_name $second_name</a></span>";


echo "<a class=\"btn btn-default\" href=\"create_post.php\" role=\"button\">New post</a>";

?>