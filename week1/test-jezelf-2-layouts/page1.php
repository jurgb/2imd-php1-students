<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Example of using includes in PHP</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include("navigation.inc.php"); ?>
	
	<section class="content">
		<h1>This is the page 1</h1>
		<p>We can use the include statement to cut up layouts into reusable components.
	</section>

	<?php include("footer.inc.php"); ?>
</body>
</html>