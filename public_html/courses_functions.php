<?php

/**
	Displays each course in a pannel:
	
	<div class="panel panel-default">
	  <div class="panel-heading">Panel Heading</div>
	  <div class="panel-body">Panel Content</div>
	</div>
**/
function displayCourses(){
	$output = '';
	
	$row = 0;
	$output .= '
	<div class="row">
	';
	if (($handle = fopen("courses.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($row%2==0){
				$output.='
	</div>
	<div class="row">
				';
			}
			
			$output .= '
		<div class="col-md-6">
			<div class="panel panel-default">
			  <div class="panel-heading text-center" style = "background-color: #006B54;  color: #FCC917; font-family: Cambria;">
			  <h3>'.$data[1].'</h3>
			  <h4>'.$data[0]. '  -  '.$data[3].'</h4>';
			  if($data[2]!=''){
			  $output.='
			  <h5>'.$data[2].'</h5>';
			  }
			  $output.='
			  </div>
			  <div class="panel-body" style = "background-color: #CFC9C4; font-family: Cambria; color: #006B54; font-weight: bold; font-size: 17px;">'.$data[4].'</div>
			</div>
		</div>
			';
			
			$row++;
		}
		fclose($handle);
		
	}
	
	//closing row div
	$output .= '
	</div>
	';
	
	
	
	return $output;
}
?>