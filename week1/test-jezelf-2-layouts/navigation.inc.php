<?php
	$page = $_SERVER["SCRIPT_NAME"];		// this will return a long file path
	$page = explode("/", $page);			// let's grab only the name of the page by exploding the path based on /
	$page = array_reverse($page);			// grab the last piece of the url by reversing the array, 
	$page = $page[0];						// element 0 is what we want
?>
<nav class="clearfix">
	<a <?php if($page == "index.php") echo "class='current' "; ?>href="index.php">Home</a>
	<a <?php if($page == "page1.php") echo "class='current' "; ?>href="page1.php">Page 1</a>
	<a <?php if($page == "page2.php") echo "class='current' "; ?>href="page2.php">Page 2</a>
	<a <?php if($page == "page3.php") echo "class='current' "; ?>href="page3.php">Page 3</a>
</nav>