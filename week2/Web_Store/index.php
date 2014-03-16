<?php //this file change to products.php

	//products.php 		= alle producten
	//detail.php 		= productdetail van 1 product
	//					+ "nu kopen"-knop
	//cart.inc.php 		= het winkelmandje
	//products.inc.php 	= array met alle producten	
	session_start();
	include "products.inc.php";

	function logInConfirm($p_username, $p_password)
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

	if (isset($_POST['logIn']) && !empty($_POST['logIn']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (logInConfirm($username, $password)) 
		{
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
		}
		else
		{
			$loginError =  "Username or password are wrong";
		}
	}

	function loggedIn()
	{
		echo '<h1>Welcome <span>' . $_SESSION["username"] . '</span></h1>
			  <a href="logout.php">Log out</a>';
	}
	
	function loggedOut()
	{
		echo '<form action="" method="post">
				  <input type="text" placeholder="Username" name="username">

				  <input type="text" placeholder="Password" name="password">

				  <input type="submit" value="Log in" name="logIn">
			  </form>';
	}
	

 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Beer Store - Get yer beer here</title>

		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<header>
			<div id="companyName"><h1>Time travel in a bottle</h1></div>

			<div id="logIn">

				<?php if(!empty($_SESSION['username']) && !empty($_SESSION['password'])) 
					  {loggedIn();} 
				 	  else
				 	  {
				 	  	loggedOut();
				 	  	if(isset($loginError)) {echo "<p>" . $loginError . "</p>";}
				 	  }

				?>
			</div>
		</header>

		<main>
			<section id="cartCon">
				<div id="cartTitle"><h1>Your cart</h1></div>

					<?php include "cart.inc.php"; ?>

				<form action="" method="post">
					<input type="submit" value="Checkout">
				</form>
			</section>


			<section id="productCon">
				<ul id="productSecCon">

				<?php foreach ($products as $product) { ?>

					<li class="productSec">
						<a href="detail.php?id=<?php echo $product['productId']; ?>"><?php echo $product["productName"]; ?></a>
						<img src="img/<?php echo $product["productImg"]; ?>" alt="">
						<div class="desc">
							<div class="descPerc">		<p><?php echo $product["productPerc"]?>&#176;</p>		</div>
							<div class="descAmount">	<p><?php echo $product["productAmount"]?>cl</p>		</div>
							<div class="descPrice">		<p>&euro;<?php echo $product["productPrice"]?></p>		</div>
						</div>
					</li>

				<?php } ?>

				</ul>
			</section>
		</main>
	</body>
</html>