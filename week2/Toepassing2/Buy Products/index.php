<?php 

	session_start();
	$products = array(
							array(
									"productName" 	=> "Adobe Photoshop CS6",
									"productDesc" 	=> "Discover new dimensions in digital imaging.",
									"productImg"	=> "photoshopCS6.png",
									"productPrice" 	=> 831.48,
									"id" => "product1"
								 ),

							array(
									"productName"	=> "Adobe Illustrator CS6",
									"productDesc"	=> "Explore new paths with the essential vector tool.",
									"productImg"	=> "illustratorCS6.png",
									"productPrice" 	=> 712.17,
									"id" => "product2"
								 ),

							array(
									"productName"	=> "Adobe InDesign CS6",
									"productDesc"	=> "Design professional page layouts for print and digital publishing.",
									"productImg"	=> "indesignCS6.png",
									"productPrice" 	=> 831.48,
									"id" => "product3"
								 ),

							array(
									"productName"	=> "Adobe Dreamweaver CS6",
									"productDesc"	=> "Design, develop, and maintain standards-based websites and applications.",
									"productImg"	=> "dreamweaverCS6.png",
									"productPrice" 	=> 450.18,
									"id" => "product4"
								 ),

							array(
									"productName"	=> "Adobe Fireworks CS6",
									"productDesc"	=> "Optimize beautiful designs in a snap for websites and mobile apps.",
									"productImg"	=> "fireworksCS6.png",
									"productPrice" 	=> 355.47,
									"id" => "product5"
								 )
					 );

	$_SESSION['products'] = $products;

	$loggedin = false;

	//INLOGGEN
	function loginPermission ($p_username, $p_password)
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
		
		if(loginPermission($_POST['username'], $_POST['password'])) 
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
		}
	}	



	if (isset($_POST['submitProducts']) && !empty($_POST['submitProducts'])) 
	{
		
		
			echo "YES";
			$checkedProducts = $_POST;
			$checkedProductsArray = array();

			$pattern = "/^product[0-9]+$/";

			foreach ($checkedProducts as $key => $value)
			{
				if(preg_match($pattern, $key))
				{
					array_push($checkedProductsArray, $key);
				}
				
			}

			$_SESSION['selectedProducts'] = $checkedProductsArray;

			header("location: checkout.php");
	}

 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Products</title>

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

				if (isset($username) && isset($password))
				{
					echo "<h1>Welcome <span>" . $_POST['username'] . "</span></h1>" .
						  "<a href='logout.php'>Log out</a>";
				}
				else
				{	
					echo '<form action="" method="post">
						  <label for="username"></label>
						  <input type="text" placeholder="Username" name="username">

						  <label for="password"></label>
						  <input type="text" placeholder="Password" name="password">

						  <input type="submit" name="logIn" value="Log in">

						  </form>';
				}
				 ?>
			</div>

		</header>


		<form action="" method="post">
			<ul id="productCon">
			<?php 
				$countProducts = sizeof($products);
				for ($i=0; $i < $countProducts; $i++) 
				{ 
					//array leest geen comma geschreven getallen uit
					//dus zoek "." en verander naar ","  
					$convertedPrice = str_replace(".", ",", $products[$i]["productPrice"]);

					echo "<li class='productItem'>
						  	<div class='pImage'>
						 		<img src='img/" 
						  						. $products[$i]["productImg"] . 
								"'></img>
							</div>

							<div class='pInfo'>
								<h1>"
												. $products[$i]["productName"] .
								"</h1>
								<p>"
												. $products[$i]["productDesc"] .
								"</p>
							</div>

							<div class='pPrice'>
								<h2>€"
												. $convertedPrice .
								"</h2>
							</div>

							<div class='pSelect'>
								<input type='checkbox' name='product" . ($i+1) . "' value='"
												. ($i+1) .
								"'>
							</div>

						 </li>";

				}
			if(isset($_POST['logIn']) && !empty($_POST['logIn']))
			{
				echo "<input name='submitProducts' type='submit' value='Buy Products'>";
			}
			else
			{
				echo "<h3>Log in to buy products</h>";
			}
			?>
			
			</ul>
			
		</form>
	</body>
</html>