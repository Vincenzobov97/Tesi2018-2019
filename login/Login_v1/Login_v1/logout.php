<?php
//$_SESSION = array();
session_start();
session_destroy();
header('location: login.html');
exit();
?>
