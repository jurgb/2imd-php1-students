<?php  

	session_start();

	if(isset($_SESSION))
	{
		$catalog = $_SESSION['products'];
		$chosenProducts = $_SESSION['selectedProducts'];

		$cart = array();

		$catalogLength = sizeof($catalog);
		$chosenProductsLength = sizeof($chosenProducts);

		for ($i=0; $i < $catalogLength; $i++) 
		{ 
			for ($j=0; $j < $chosenProductsLength; $j++) 
			{
				if($catalog[$i]['id']=== $chosenProducts[$j] )
				{
					array_push($cart, $catalog[$i]);
				}

			} 
		}
	}
	else
	{
		header("location: index.php");
	}

	$totalPrice = 0;
	$amountProducts = sizeof($cart);


?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Checkout</title>

		<link rel="stylesheet" href="css/reset.css"/>
		<link rel="stylesheet" href="css/style.css"/>
	</head>


	<body>
		<header>
			<div id="shopCompany">
				<a href="http://www.adobe.com/">Adobe</a>
			</div>
			
			<div id="logIn">
				
				<?php 
				if (isset($_SESSION['username']))
				{
					echo "<h1>Welcome <span>" . $_SESSION['username'] . "</span></h1>" .
						  "<a href='logout.php'>Log out</a>";
				}
				else
				{	
					header('location: index.php');
				}
				?>

			</div>

		</header>

		<form action="" method="post">
			<ul id="checkoutCon">
			<?php 
			
				foreach ($cart as $key => $value) 
				{

					$totalPrice += $cart[$key]["productPrice"];
					//$amountProducts += $cart[$key][$value];

					echo "<li class='productItem'>
							<div class='pImage'>
								<img src='img/"
										. $cart[$key]['productImg'] .
								"'></img>
							</div>

							<div class='pInfo'>
								<h1>"
										. $cart[$key]['productName'] .
								"</h1>
						 	</div>

						 	<div class='pPrice checkoutPrice'>
						 		<h2>€"
						 				. $cart[$key]['productPrice'] .
						 		"</h2>
						 	</div>";
					
					echo "</li>";
				}
			?>

			<div id="amountList">
				<h1> Number of products: <span><?php echo $amountProducts; ?></span></h1>
			</div>

			<div id="priceList">
				<h1> Total price: <span><?php echo "€" . $totalPrice; ?></span></h1>
			</div>

			<input type="submit" name="checkoutProducts" value="Checkout"/>
			</ul>
		</form>
	</body>
</html>