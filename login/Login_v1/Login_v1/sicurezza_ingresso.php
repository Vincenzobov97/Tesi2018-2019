<?php
//session_start();

//$confronto=strcmp($_SESSION["login"],"log");
//if ($confronto==0){
if (isset($_SESSION["login"])){
}
else
{
//session_destroy();
//	header("Location :home.php");
 header("Location:../login/Login_v1/Login_v1/login.html");
}
?>
