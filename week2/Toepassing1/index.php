<?php
	//validatiefunctie voor inloggen
	function login($p_username, $p_password)
	{
		if ($p_username == "imdhero" && $p_password == "test123")
		{
			return true;
		}
		else
		{
			return false;
		}
	}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Een login systeem bouwen</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/screen.css">
</head>

<body>


<section id="top">
	<div class="wrapper">
		<h1>INLOG FORMULIER</h1>
	</div>
</section>

<div class="wrapper">
<?php
	if(!empty($_POST)) //als for niet leeg is
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(login($username,$password)) //check of user mag inloggen
		{
			session_start(); //sessie toewijzen aan user
			$_SESSION['username'] = $username;

			//doorverwijzen naar andere pagina
			echo "<h2> Hallo " . $_SESSION['username'] . "</h2>";
			echo "<a href='logout.php'>" . "LOGOUT" . "</a>";
		}

		else
		{
			echo 'pass of username fout';
		}
	}
?>
</div>

<div class="wrapper">
	<form action="" method="post"
		<?php
			if(isset($_SESSION)) //als gebruiker is ingelogd, gaat display op none staan
			{
				echo "class='hidden'";
			}

		?>>
		<p class="cf">
			<label for="username">Username</label>
			<input type="text" name="username">
		</p>
		<p class="cf">
		<label for="password">Password</label>
		<input type="password" name="password">
		</p>
		<p class="cf">
		<button type="sumbit">SIGN IN</button>
		</p>
		<p class="left">
			Username = imdhero / Pass = test123
		</p>
	</form>
</div>

</body>
</html>