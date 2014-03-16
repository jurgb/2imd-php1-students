<?php 
	session_start();
	include "products.inc.php";

	$productId = $_GET['id'];

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

	if(!empty($_POST['addToCart'])) 
	{
		if(!empty($_SESSION['username']))
		{
			if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) 
			{
				array_push($_SESSION['cart'], $productId);
			}
			else
			{
				$_SESSION['cart'] = array($productId);
			}

			header('location: detail.php?id=' . $productId . '');
		}
		else
		{
			$addToCartError = "<p id='cartError'>Log in to add products to your cart</p>";
		}
	}

 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>

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


			<section id="productDetailCon">

					<div id="detailTitle">
						<h1><?php echo $products[$productId]['productName']; ?></h1>
						<a href="index.php">Back to the keg</a>
					</div>

					<div id="detailImg">
						<img src="img/<?php echo $products[$productId]['productImg']; ?>" alt="">
					</div>

					<ul id="detailDescSense">
						<li id="descSight"><p><?php echo $products[$productId]['productSight']; ?></p></li>
						<li id="descSmell"><p><?php echo $products[$productId]['productSmell']; ?></p></li>
						<li id="descTaste"><p><?php echo $products[$productId]['productTaste']; ?></p></li>
					</ul>

					<div id="detailDescProd">
						<div id="detailPerc">
							<p><?php echo $products[$productId]['productPerc']; ?>&#176;</p>
						</div>

						<div id="detailAmount">
							<p><?php echo $products[$productId]['productAmount']; ?>cl</p>
						</div>

						<div id="detailPrice">
							<p>&euro;<?php echo $products[$productId]['productPrice']; ?></p>
						</div>
					</div>

					<form action="" method="post">
						<input type="hidden" name="product" value="<?php echo $productId;?>">
						<input type="submit" name="addToCart" value="Add to cart">
					</form>
					<?php if (!empty($addToCartError)) 
						  { echo $addToCartError;} 
					?>
			</section>
		</main>
		
	</body>
</html>