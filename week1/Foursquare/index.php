<?php
	$foursquarePost = array(
								array(
										"profilePic" => "Females/Amber.jpg",
										"profileName" => "Theresa W.",
										"checkInLoc" => "East River Park",
										"locCity" => "Brooklyn",
										"locState" => "NY",
										"postTime" => "29",
										"postLikes" => "4",
										"postComments" => "1",
										"postStatus" => "liked",
										"pictureTaken" => "Taken/taken1.jpg"
									 ),
								array(
										"profilePic" => "Females/Kat.png",
										"profileName" => "Nina M.",
										"checkInLoc" => "Rubirosa",
										"locCity" => "New York",
										"locState" => "NY",
										"postTime" => "32",
										"postLikes" => "1",
										"postComments" => "",
										"postStatus" => "notLiked",
										"pictureTaken" => ""
									 ),
								array(
										"profilePic" => "Males/Adrian2.png",
										"profileName" => "Sean B.",
										"checkInLoc" => "Blue Bottle Coffee",
										"locCity" => "South of Market",
										"locState" => "San Francis...",
										"postTime" => "33",
										"postLikes" => "2",
										"postComments" => "",
										"postStatus" => "notLiked",
										"pictureTaken" => ""
									 ),
								array(
										"profilePic" => "Males/Dan.jpg",
										"profileName" => "Mike A.",
										"checkInLoc" => "Land's Enblah Kout",
										"locCity" => "San francisco",
										"locState" => "SF",
										"postTime" => "38",
										"postLikes" => "",
										"postComments" => "",
										"postStatus" => "liked",
										"pictureTaken" => "Taken/taken2.jpg"
									 ),
								array(
										"profilePic" => "Females/Val.png",
										"profileName" => "Valerie V.",
										"checkInLoc" => "Dumb Starbucks",
										"locCity" => "Las Vegas",
										"locState" => "LV",
										"postTime" => "45",
										"postLikes" => "10",
										"postComments" => "4",
										"postStatus" => "notLiked",
										"pictureTaken" => "Taken/taken6.jpg"
									 ),
								array(
										"profilePic" => "Males/Luke.png",
										"profileName" => "Luke T.",
										"checkInLoc" => "Mr Mushroom",
										"locCity" => "California",
										"locState" => "CA",
										"postTime" => "50",
										"postLikes" => "2",
										"postComments" => "1",
										"postStatus" => "liked",
										"pictureTaken" => ""
									 )
							);



?><!doctype html>
<html lang="en">
	<head>
		<title>Foursquare</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		
		<style type="text/css">
		body{background-color: lightgrey;}
			#fourquareScreen{position: absolute; left: 50%; margin-left: -160px; top: 50%; margin-top: -275px;width: 320px; height: 550px;overflow-y:scroll; overflow-x:hidden;}
			.FoursquarePost{margin-top: 10px;float:left; border-bottom: 1px solid #DCDBD9; margin-left:10px;}
			#postScreen{background-color:#FFF; float:left; margin-top:44px;}
			#fourquareScreen::-webkit-scrollbar 
			{
				    width: 0px;
			}


			.profilePicture
			{
				float:left;
				width:50px;
				height:50px;

			}
			.profilePicture img
			{width:100%; height:auto;border-radius: 50%;}

			.profilePost
			{
				float:left;
				width:250px;
				margin-left:10px;
			}

			.profilePost
			{
				font-family: Helvetica Neue;
			}

			.profileStatus h1
			{
				font-size: 0.95em;
				padding-bottom:2.5px;
				color:#53ADC6;
			}

			.profileStatus h2
			{
				font-size: 1em;
				font-weight: bold;
				padding-bottom:5px;
				color:#53ADC6;
			}

			.profileStatus p
			{
				font-size: 0.7em;
				font-weight: bold;
				margin-bottom:4px;
				color:#8B898A;
				margin-bottom:10px;
			}

			span.spanHeart{padding-left: 7.5px;padding-right: 2.5px;color: #E35F6D;}
			span.messageBubble{padding-left: 7.5px;padding-right: 2.5px;color: #27A3DD;}

			.postFunctions{float:right; margin-right:10px;}
			
			.postFunctions p.heart
			{
				color:#DCDBD9; 
				background-color:#FFF;
				border: 1px solid #DCDBD9;
				overflow:hidden;
				text-align: center;
				height:27.5px;
				width:27.5px;
				line-height: 30px;
				border-radius: 50%;
				margin-bottom:8px;
				cursor: pointer;
			}

			.postFunctions p.heart.liked, .postFunctions p.heart:hover
			{background-color:#F26D65;color:#fff; border:none; margin-bottom:10px;}

			.postFunctions h3
			{
				font-family: Helvetica Neue;
				font-size: 0.9em;
				color:#DCDBD9;
			}

			.postImage
			{
				float:left;
				width:250px;
				margin-bottom:9px;

			}

			.postImage img{width:100%; height:auto;}

			#sorting
			{
				text-align: center;
				width: 320px;
				margin: 0 auto;
				height: 44px;
				background-color:#2CADE3;
				position:fixed;
			}

			#sorting input
			{
				text-align: center;
				font-family: Helvetica Neue;
				width:200px;
				font-size: 1.1em;
				height:30px;
				border-radius: 15px;
				box-shadow: none;
				border:none;
				background-color: #fff;
				color: #53ADC6;
				border: 1px solid #53ADC6;
				margin-top: 6px;
				cursor: pointer;

			}
		</style>

	</head>


	<body> 
		
		<div id="fourquareScreen">
				<div id="sorting">
					<?php
							$sorting = "Newest";

							function cmpDesc($a, $b)
							{
							 	 return strcmp($b['postTime'] , $a['postTime'] );
							}

							function cmpAsc($a, $b)
							{
							    return strcmp($a['postTime'] , $b['postTime'] );
							}
							
							echo '<form action="" method="POST">';
							
							

							if (isset($_POST['sort'])) 
							{
								$sorting = $_POST['sort'];

								if($sorting == 'Oldest')
								{
									$sorting = 'Newest';
									usort($foursquarePost, "cmpAsc");

								}
								else
								{
									$sorting = 'Oldest';
									usort($foursquarePost, "cmpDesc");
								}
							}
							echo '<input id="submitSort" type="submit" name="sort" value="' . $sorting  . '" />';

							echo '</form>';
					?>
				</div>
			<div id="postScreen">
		<?php

			foreach($foursquarePost as $foursquarePost)
			{	

				echo "<div class='FoursquarePost'><div class='profilePicture'> <img src='img/" . $foursquarePost['profilePic'] . "'</img></div>";
				
				echo  "<div class='profilePost'>";
				

						echo "<div class='postFunctions'>" .

								"<p class='heart"; 

								if ($foursquarePost['postStatus'] == "liked") 
								{
									echo " liked";
								}

								echo "'>&#9829;</p>" . 
								"<h3>" . $foursquarePost['postTime'] . "m" . "</h3>"

						. "</div>";
						
						echo "<div class='profileStatus'>" .

								"<h1>" . $foursquarePost['profileName'] . "</h1>" .
								"<h2>" . $foursquarePost['checkInLoc'] . "</h2>" .

								"<p>" . $foursquarePost['locCity'] . ", " . $foursquarePost['locState'];

									if (!empty($foursquarePost['postLikes'])) 
									{
										echo "<span class='spanHeart'>&#9829;</span>" . $foursquarePost['postLikes'];
									}
									
									if (!empty($foursquarePost['postComments'])) 
									{
										echo "<span class='messageBubble'>&clubs;</span><span class='pMessage'>" . $foursquarePost['postComments'] . "</span></p>";
									}

						echo "</div>";


						

						if (!empty($foursquarePost['pictureTaken'])) 
						{
							echo "<div class='postImage'><img src='img/" . $foursquarePost['pictureTaken'] . "'<img></div>";
						}

				echo "</div></div>";
			}
		?>
			</div>
		</div> 

		
	</body>

	
</html>