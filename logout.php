<?php
session_start();
$sid=session_id();

session_destroy();
unset($_SESSION);

echo "You successfully logged out with session with id = $sid";

header("Location:userlogin.php");
?>
