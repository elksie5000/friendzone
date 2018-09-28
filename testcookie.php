<?php
	  //Bounce the user to the login page if the cookie has expired
      if(isset($_COOKIE['valid']) && $_COOKIE['valid'] == 'yes'){

      }else{
      	header('Location: '."index.php");
      }

 ?>