<?php

require 'functions/faculty_functions.php';

echo '<!DOCTYPE html>
<head>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href = "CSS/navigationBar.css"/>
<link rel="stylesheet" href = "CSS/Students.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="JavaScript/IdleTimeReset.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.4.3/jquery.contextMenu.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.4.3/jquery.contextMenu.css" />
<link rel="stylesheet" href="CSS/global.css" />
<title>Faculty Page</title>
</head>
<body>

<div class="container">
	<div class="row">
			<center><h1> Faculty </h1></center>
		</div>
		<hr><br><br>

';
echo displayFaculty();




echo '


	<div class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand homeButton" href="HomeScreen.html">
					Home <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
				</a>
			</div>
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
</body>';


?>