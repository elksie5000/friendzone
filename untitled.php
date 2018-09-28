<?php

      if(isset($_COOKIE['valid']) && $_COOKIE['valid'] == 'yes'){
      }else{
        echo('The cookie has expired.  Please go to <a href="setcookie.php">setcookie.php</a> to reset it');
      }

 ?>