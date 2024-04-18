<?php

require 'students_functions.php';

echo '<!DOCTYPE html>
<head>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href = "CSS/navigationBar.css"/>
<link rel="stylesheet" href = "CSS/Students.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="JavaScript/IdleTimeReset.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.4.3/jquery.contextMenu.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.4.3/jquery.contextMenu.css" />
<link rel="stylesheet" href="CSS/global.css" />
<title>Student Page</title>

<style>
body {
	background-color: beige;
}

.row h1 {
	font-family: \'Merriweather\', serif;
	font-weight: bold;
	color: #006B54;
}
</style>
</head>
<body>

<div class="container">
	<div class="row">
			<center><h1> Meet the Students: Class of '.$_GET['year'].'</h1></center>
		</div>
		<hr><br><br>

';


echo displayStudents($_GET['year']);




echo addNavBar();

echo'
</div>
</body>';


?>