<?php 
	if (!empty($_SESSION['cart'])) 
	{
		$totalPrice = 0;
		$totalProducts = count($_SESSION['cart']);

		echo "<ul id='cart'>";
			 foreach ($_SESSION['cart'] as $cart) 
			 {
			 	$totalPrice += $products[$cart]['productPrice'];

				echo "<li><div class='productCartName'><h2>" . $products[$cart]['productName'] . "</h2></div>" .
					 "<div class='productCartPrice'><h2>&euro;" . $products[$cart]['productPrice'] . "</h2></div></li>";
			 }
		echo "<div id='cartTotalProducts'><h2>Total products: " . $totalProducts . "</h2></div>
			  <div id='cartTotalPrice'><h2>&euro;" . $totalPrice  . "</h2></div></ul>";
	}
	else
	{
		echo '<h3>Your cart is empty</h3>';
	}
 ?>