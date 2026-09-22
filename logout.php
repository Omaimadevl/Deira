<?php
session_start();
echo "Thanks ".$_SESSION['username'].
" Stay connected<br>";
session_unset();
session_destroy();
?>
<a href='login.php'>Click here if you already have an account</a>