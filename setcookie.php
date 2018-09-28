<?php 

 // Store the cookie data before writing any output

  // Cookie will expire in 30 days

  $expiry = time() +  (86400 * 30);

  setcookie('valid', 'yes', $expiry);

  $expstr = date('d M Y H:i', $expiry);

 ?>