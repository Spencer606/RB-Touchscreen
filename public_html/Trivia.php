<?php

echo '<!DOCTYPE html>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href = "CSS/navigationBar.css"/>
<link rel="stylesheet" href = "CSS/Trivia.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="JavaScript/IdleTimeReset.js"></script>
<link rel="stylesheet" href="CSS/buttons.css"/><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.4.3/jquery.contextMenu.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.4.3/jquery.contextMenu.css" />
<link rel="stylesheet" href="CSS/global.css" /><title> Trivia </title>
</head>
<body>
<div class="container">
<div class="row text-center">
	<h1> Trivia </h1>
</div>
<br>
<hr>
<div class = "row text-center ">
<div class="well well-lg col-sm-offset-2 col-sm-8">
<h3 id="question">Question</h3>
</div>
</div>
<br>
';

	echo '
	<div class="row" >
		<div class="col-sm-6 col-sm-offset-3">
			 <button id = "a1" type="button" class="btn btn-sky btn-block" style="height:50px;">Button 1</button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			 <button id = "a2" type="button" class="btn btn-sky btn-block" style="height:50px;">Button 2</button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			 <button id = "a3" type="button" class="btn btn-sky btn-block" style="height:50px;">Button 3</button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			 <button id = "a4" type="button" class="btn btn-sky btn-block" style="height:50px;">Button 4</button>
		</div>
	</div>
	<br>
	<div class="row" id = "result">
	
	</div>
	';
	
	
	echo '
<!--Container end -->
</div>
<div class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand homeButton" href="HomeScreen.html">
				Home <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
			</a>
		</div>
		<div class="collapse navbar-collapse" >
			<ul class="nav navbar-nav">
				<li><a href="Games.html">Games</a></li>
			</ul>
		
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a class="navbar-brand homeButton" href="HomeScreen.html">
					Home <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
				</a>
			</li>
		</ul>
		</div>
	</div>
</div>


<script src="http://evanplaice.github.io/jquery-csv/src/jquery.csv.js"></script>
<script src="JavaScript/Trivia.js"></script>
</body>';


?>