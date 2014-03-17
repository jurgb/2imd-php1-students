<?php
		if(!empty($_POST))
		{
			//import van de klasse blogpost wanneer het formulier gepost heeft
			include_once("blogpost.class.php");
			if (!empty($_POST['titel']) && !empty($_POST['post'])) {
				
				$blogpost = new Blogpost();
				$blogpost->Title = htmlspecialchars($_POST['titel']);
				$blogpost->Message = htmlspecialchars($_POST['post']);
				$blogpost->Save();

				//header("location:overzicht.php");
			}
			
		}

?><!doctype html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<title>Blog</title>
</head>
<body>
	<div id="wrapper">
		<form id="blogpost" action="" method="post">
			<input type="text" id="titel" name="titel" placeholder="Title">
			<textarea  id="post" rows="5" name="post" placeholder="What's on your mind?"></textarea>
			<input type="submit" id="submitknop" value="post">
		</form>

		<?php include("overzicht.php") ?>
	</div><!--End wrapper-->
</body>
</html>