<?php
	session_start();

	//sessie stoppen
	session_destroy();

	header("Location: index.php");
?>