<?php

/*

	Display all faculty with the following format
	by querying the CSV file

	<div class="col-md-4">
		<div class="thumbnail">
		  <img src="..." alt="...">
		  <div class="caption">
			<h3>Faculty Name</h3>
			<h4>Title</h4>
		  </div>
		</div>
	  </div>

*/

echo '<style>
    .panel {
        font-family: Cambria;
		font-size: 20px;
    }
    
    .panel {
        background-color: red;
    }

    
</style>';


function displayFaculty(){
    $output = '';

    $row = 0;
    $output .= '
    <div class="row">
    ';
    if (($handle = fopen("faculty.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
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
            // Displaying the Faculty Name and Title under the panel-heading
            $output .= '
                <div class="panel-heading text-center"  style = "background-color: #006B54;  color: #FCC917;" >
                    <h3 style="font-weight: bold;">'.$data[0].'</h3>
                    <h4 style="font-size: 15px;">'.$data[1].'</h4>
                </div>';
            // Displaying the Image if available
            if($data[2]!= ''){
                $output .='
                <div class="panel-body"  style = "background-color: #CFC9C4;">
                    <img src="images/faculty/'.$data[2].'" alt="'.$data[0].'" height="200" class="center-block img-rounded " >
                </div>';
            }
            // Displaying the Panel Footer
            $output .= '
                <div class="panel-footer" style = "background-color: #006B54;  color: #FCC917">
                    <div class="text-center">';
            
            // Displaying additional information if available
            for ($i = 4; $i < count($data); $i++) {
                if (!empty($data[$i])) {
                    $output .= '<p>' . $data[$i] . '</p>';
                }
            }
            $output .= '
                    </div>
                </div>
            </div>
        </div>';
        }
        fclose($handle);
    }

    //closing row div
    $output .= '
    </div>';

    return $output;
}



?>
