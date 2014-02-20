<?php 
	$todos = array(
						array(
								"descrip" => "PHP taken maken",
								"deadlineInHrs" => 1,
								"category" => "School"
							 ),

						array(
								"descrip" => "CV opstellen",
								"deadlineInHrs" => 36,
								"category" => "Werk"
							 ),

						array(
								"descrip" => "Weer app UI afwerken",
								"deadlineInHrs" => 45,
								"category" => "Werk"
							 ),

						array(
								"descrip" => "Bier gaan drinken",
								"deadlineInHrs" => 27,
								"category" => "Vrijetijd"
							 ),

						array(
								"descrip" => "Dagelijkse cardio",
								"deadlineInHrs" => 2,
								"category" => "Vrijetijd"
							 ),

						array(
								"descrip" => "Avond eten maken",
								"deadlineInHrs" => 3,
								"category" => "Huishouden"
							 ),

						array(
								"descrip" => "Interactie animatie beginnen",
								"deadlineInHrs" => 7,
								"category" => "Werk"
							 ),

						array(
								"descrip" => "VDAB mockups afleveren",
								"deadlineInHrs" => 10,
								"category" => "Werk"
							 ),

						array(
								"descrip" => "Motion Design script leveren",
								"deadlineInHrs" => 51,
								"category" => "School"
							 ),

						array(
								"descrip" => "SYTYCC inschijven",
								"deadlineInHrs" => 30,
								"category" => "Vrijetijd"
							 ),

						array(
								"descrip" => "Project 2 brainstorming",
								"deadlineInHrs" => 15,
								"category" => "School"
							 )
					);

	usort($todos, function($a, $b) 
	{
    	return $a['deadlineInHrs'] - $b['deadlineInHrs'];
	});

 ?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>ToDoApp</title>
		<link rel="stylesheet" href="css/reset.css">

		<style>
			html{list-style-type: none; background-color: lightgrey;}
			#appScreen{position: absolute; left: 50%; margin-left: -160px; top: 50%; margin-top: -275px;width:320px; height:550px; overflow-y:scroll; overflow-x:hidden;}
			#appScreen::-webkit-scrollbar {width: 0px;}

			li.todoList{height: 68.75px; width:100%;}
			li.todoList h1{line-height: 68.75px; font-family: Helvetica Neue; color: #FFF;}

			li.todoList.lower2{background-color: #E26351;}
			li.todoList.lower24{background-color: #E9CA32;}
			li.todoList.higher24{background-color: #61C08E;}

			.todoDead h1{font-weight: bold;}
			.todoDesc h1{font-size: 0.9em;}
			
			.todoDesc, .todoCat, .todoDead{float:left;}
			.todoDesc{width: 195px; margin-left:5px;}
			.todoCat{width: 95px;}
			.todoDead{width: 20px; text-align: center;}
		</style>

	</head>


	<body>
		<div id="appScreen">
			<ul>
				<?php 

					//foreach ($todos as $todos)
					$countArray = sizeof($todos);
					for($i=0; $i<$countArray; $i++)
					{	
						echo "<li class='todoList"; 

						switch (true) 
						{
						    case $todos[$i]['deadlineInHrs'] <= 2:
						        echo " lower2";
						        break;
						    case $todos[$i]['deadlineInHrs'] < 24:
						        echo " lower24";
						        break;
						    case $todos[$i]['deadlineInHrs'] > 24:
						        echo " higher24";
						        break;
						}

						echo "'>";	


							echo "<div class='todoDesc'><h1>" . $todos[$i]['descrip'] . "</h1></div>";
							echo "<div class='todoCat'><h1>" . $todos[$i]['category'] . "</h1></div>";
							echo "<div class='todoDead'><h1>" . $todos[$i]['deadlineInHrs'] . "</h1></div>";
						echo "</li>";
					}

				 ?>
			</ul>
		</div>
	</body>
</html>