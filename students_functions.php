<?php

function printCSV(){
	$row = 1;
	if (($handle = fopen("functions/studentsCSV.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			echo "<p> $num fields in line $row: <br /></p>\n";
			$row++;
			for ($c=0; $c < $num; $c++) {
				echo $data[$c] . "<br />\n";
			}
		}
		fclose($handle);

	}


}


/*

	Display all students with the following format
	by querying the CSV file

	<div class="col-md-4">
		<div class="thumbnail">
		  <img src="..." alt="...">
		  <div class="caption">
			<h3>Student Name</h3>
		  </div>
		</div>
	  </div>

*/
function displayStudents($year){

	$output = '';

	$row = 0;
	$output .= '
	<div class="row">
	';
	if (($handle = fopen("CSV/studentsCSV.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($data[1]==$year){
				if($row%3==0){
					$output .='
					</div>
					<div class="row">
					';
				}
				$row++;
				$output.= '
				<div class="col-md-4 '.$data[1].'">
					<div class="panel panel-default">';

				if($data[2]!= ''){
					$output .='
					<div class="panel-body">
						<img src="images/students/'.$data[2].'" alt="" height="500" class="center-block img-rounded">
					</div>
					';
				}

				$output .= '
							<div class="panel-footer text-center">
						<h3>'.$data[0].'</h3>

					  </div>
					</div>
				</div>
				';
			}
		}
		fclose($handle);

	}

	//closing row div
	$output .= '
	</div>
	';
	//No Students

		$output.='
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info text-center">
			  <p><strong>Don\'t see yourself? Need to submit a correction?</strong> </p>
				<hr>
				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Get on the Board</button>
				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myCorr">Correction</button>

			  </p>
			</div>
		</div>
	</div>

	  <!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Join the Computer Science Hall of Fame!</h4>
			</div>
			<div class="modal-body">
			How to get a qualifying image:
			  <ol>
					<li>You must be a CS major</li>
					<li>Dress up nicely</li>
					<li>Smile :) </li>
					<li>Make sure the camera has a high resolution, preferrably, ... </li>
					<li>Find someone to take the photo</li>
					<li>Crop it to make sure it is a square</li>
			  </ol>
			Email it to Dr. Egan, maegan@siena.edu, along with your class year and preferred displayed name.
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>

		</div>
	  </div>

		<!-- Modal -->
	  <div class="modal fade" id="myCorr" role="dialog">
		<div class="modal-dialog">

		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">How to Submit a Correction</h4>
			</div>
			<div class="modal-body">
			Email Dr. Egan, maegan@siena.edu, with any corrections that you notice on the board.
			<br>Be specific, for example:
			  <ul>
					<li>My name is spelled XYZ</li>
					<li>I prefer to be called XYZ</li>
					<li>I\'m not a CS major anymore</li>
					<li>I\'m the class of 2019, not 2020</li>
			  </ul>
				If you would like a different picture, then send a new photo, along with your class year and preferred displayed name.

			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>

		</div>
	  </div>

		';



	return $output;
}

function addNavBar(){
	$output = '';



	$output.= '


	<div class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand homeButton" href="HomeScreen.html">
					Home <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
				</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Students by Class Year
					<span class="caret"></span></a>
					<ul class="dropdown-menu">';

//Add the years into the navigation bar
for($year=2017;$year<= 2020; $year++){
	if($year==$_GET['year']){
		$output.= '<li class="active">';
	}
	else{
		$output.= '<li>';
	}
	$output.= '<a href="Students.php?year='.$year.'">'.$year.'</a></li>';
}



$output.= 			  '
					</ul>
				</li>
				<li>
					<a href="studentCompanies.php">
						Where Students Go
					</a>
				</li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li>
				<a class="navbar-brand homeButton" href="HomeScreen.html">
					Home <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
				</a>
			</li>
		</ul>
		</div>
	</div>';
	return $output;
}


/**
goes through and displays all the companies logos
**/
function displayStudentsWork(){
	$output .= '';

	$directory = getcwd() . '/images/CompanyLogos/';
    if (! is_dir($directory)) {
        exit('Invalid diretory path');
    }

    $files = array();

	/**
		Get list of images
	**/
    foreach (scandir($directory) as $file) {
        if ('.' === $file) continue;
        if ('..' === $file) continue;

        $files[] = $file;
    }

	$count=0;
	$output.= '
	<div class="row">

	';


	foreach($files as $file){
		if($count%4==0){
			$output.='
	</div>
	<br>
	<br>
	<div class="row">';
		}
		$output.= '
		<div class="col-md-3">
		<img src ="images/CompanyLogos/'.$file.'" alt ="" style="max-width:100%; " class="center-block">
		</div>
		';
		$count++;
	}
    $output.='
	</div>
	';

	return $output;
}


?>
