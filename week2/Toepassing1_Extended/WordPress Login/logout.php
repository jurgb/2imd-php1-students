<?php 
	session_start();

	if(!isset($_SESSION['remember']) && empty($_SESSION['remember']))
	{
		session_destroy();
	}

	if (isset($_COOKIE['loggedin']))
	{
		setcookie("loggedin", "", time()-3600);
	}

	header("location: index.php");
 ?>