<?php 
	session_start();

	if (isset($_COOKIE['loggedin'])) 
	{
		$valueLoggedIn = $_COOKIE['loggedin'];

		$crumbs = explode(",", $valueLoggedIn);
		$salt = "5RRSTA78WR990D";

		if ($crumbs[1] == md5($crumbs[0] . $salt))
		{
			header("location: index.php");
		}
		else
		{
			header("location: login.php");
		}
	}

	function loginPermission($p_username, $p_password)
	{
		if ($p_username == "name" && $p_password == "pass") 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	if (!empty($_POST)) 
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(loginPermission($username, $password)) 
		{
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			if (isset($_POST['rememberMe'])) //if "Remember Me" is checked
			{
				$salt = "5RRSTA78WR990D";
				$cookieData = ($username . "," . md5($username . $salt));
				setcookie('loggedin', $cookieData, time()+60*60);

				header("location: index.php");
			}
			else
			{
				header("location: index.php");
			}
		}
		else
		{
			$error = "<p>Invalid username and/or password</p>";
		}
	}

	

 ?><!doctype html>
<html lang="en">
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
				<form action="" method="post">
						<?php 
							if(isset($error))
							{
								echo $error;
							}
						?>
					<label for="username">Username</label>
					<input type="text" name="username" id="username" value=""/>

					<label for="password">Password</label>
					<input type="password" name="password" id="password" value=""/>

					<input type="checkbox" name="rememberMe"/>
					<label alt="" for="rememberMe">Remember Me</label>
			
					<input type="submit" value="Log In"/>
				</form>
			</section>
			<a id="lostPass" href="#">Lost your password?</a>
		</div>
	</body>
</html>