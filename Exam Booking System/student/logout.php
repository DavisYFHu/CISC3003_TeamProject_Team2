<?php 
// start session
session_start();
// empty session
$_SESSION = array();
// delete session file
session_destroy();
// Log out to jump to the login page
header('Location: ../index.php');
 ?>