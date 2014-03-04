<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Een login systeem bouwen</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/screen.css">
</head>
<body>

<?php include('include_header.php'); ?>

<div class="wrapper">
<?php
	session_start();

	//enkel welkom als sessie bestaat
	if(isset($_SESSION['username']))
	{
			echo "<h2> Hallo " . $_SESSION['username'] . "</h2>";
			echo "<a href='logout.php'>" . "LOGOUT" . "</a>";
	}
	else
	{
		header('Location: index.php');
	}
?>
</div>

</body>
</html>