<?php 
session_start();
$_SESSION = array(); // Unset all session variables
session_destroy(); // Destroy the session
header("location: ../Home/index.php"); 
exit();

?>