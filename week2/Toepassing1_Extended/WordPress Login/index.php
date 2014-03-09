<?php 
	session_start();

	if (isset($_COOKIE['loggedin']))
	{		
		$valueLoggedIn = $_COOKIE['loggedin'];

		$crumbs = explode(",", $valueLoggedIn);
		$salt = "5RRSTA78WR990D";

		if ($crumbs[1] =! md5($crumbs[0] . $salt))
		{
			header("location: login.php");
		}
	}
	elseif (isset($_SESSION['remember']) && !empty($_SESSION['remember'])) 
	{
		header("location: login.php");
	}


 ?><html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>WordPress</title>

		<link rel="stylesheet" href="css/reset.css"/>
		<link rel="stylesheet" href="css/style.css"/>
	</head>


	<body>
		<div id="loginCon">
			<img src="img/logo.png" alt=""/>
			<section id="formCon">

				<?php 
					if(isset($_SESSION['username']))
					{
						echo "<h1>Welcome " . $_SESSION['username'] . ", you're logged in</h1>";
					}
					else
					{
						header("location: login.php");
					}
				 ?>
					<a id="logout" href="logout.php">Log out</a>
			</section>
		</div>
	</body>
</html>