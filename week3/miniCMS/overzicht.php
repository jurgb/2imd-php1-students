<?php
	//include_once('Blogpost.class.php'); <- moet niet aangezien ik met een include werk op de index pagina en de klasse daar al geinclude is
	include_once("Db.class.php");

	//query schrijven op de blogposts op te halen
		$db = new Db();
		$sql = "select * from tblBlogpost";
		$result = $db->conn->query($sql);


		echo "<ul id='blogposts'>";
		echo "</li><h1 id='titel_overzichts'>Overzicht blogposts</h1></li>";
		foreach ($result as $post) 
		{
			echo "<li>";
			echo '<h1>' . $post['Title'] . '</h1>';
			echo '<p>' . $post['Message'] . '</p>';
			echo "</li>";
		}
		echo "</ul>";

?><!doctype html>
<html lang="en">
<head>
	<link rel="stylesheet" href="styleblog.css">
	<meta charset="UTF-8">
	<title>Overzicht blogposts</title>
</head>
<body>
	
</body>
</html>