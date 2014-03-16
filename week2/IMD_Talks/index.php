<?php 
	session_start();

	function registerValidation($p_fullName, $p_email, $p_password)
	{
		$noError = true;
		global $nameError;
		global $emailError;
		global $passError;

		//valideer naam
		$rexSafety = "/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i";
		if (preg_match($rexSafety, $p_fullName) || empty($p_fullName)) 
		{
			$nameError = "<p style='color: red; font-size: 12px; position: absolute; right: 64px; top: 70px;'>Please use a valid name</p>";
			$noError = false;
		}

		//valideer email
		if(!filter_var($p_email, FILTER_VALIDATE_EMAIL)) 
		{
			$emailError = "<p style='color: red; font-size: 12px; position: absolute; right: 64px; top: 107px;'>Please use a valid email</p>";
			$noError = false;
		}

		//valideer paswoord
		if(strlen($p_password) < 8)
		{
			$passError = "<p style='color: red; font-size: 12px; position: absolute; right: 20px; top: 142px;'>Please use at least 8 characters</p>";
			$noError = false;
		}
		return $noError; 
	}


	if(isset($_POST['register']) && !empty($_POST['register']))
	{
		$fullName = $_POST['fullName'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(registerValidation($fullName, $email, $password))
		{
			$_SESSION['user'] = $email;
		}
	}

	if(!empty($_SESSION['user']))
	{
		$nav =	'<nav>
			 		<a href="logout.php">Log out</a>
				</nav>';

		$wrap =	'<section id="wrapCon">
					<h2> Welcome back ' . $_SESSION['user'] . '</h2>
				</section>';
	}
	else
	{
		$form = '<h1>New to IMD-Talks? Sign Up</h1>
				<form action="" method="post">
					<input type="text" placeholder="Full name" name="fullName">'.
							(!empty($nameError) ?  $nameError : '') .
					'<input type="text" placeholder="Email" name="email">' .
							(!empty($emailError) ?  $emailError : '') .
					'<input type="password" placeholder="Password" name="password">' .
							(!empty($passError) ?  $passError : '') .
					'<input type="submit" name="register" value="Sign up for IMD Talks">
				</form>';
	}

 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>IMD Talks</title>

		<link rel="stylesheet" href="css/reset.css"/>
		<link rel="stylesheet" href="css/style.css"/>
	</head>


	<body>
		<?php if (isset($nav)) { echo $nav; } ?>

		<section id="mainCon">
			<section id="introLanding">
					<h1>Welcome to IMD-Talks</h1>
					<p>Find out what other IMD'ers are building around you.</p>
			</section>

			<section id="formCon">
				<?php if (isset($wrap)) { echo $wrap; } ?>

				<?php if (isset($form)) { echo $form; } ?>
			</section>
		</section>
	</body>
</html>