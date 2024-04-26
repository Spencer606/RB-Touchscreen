<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: beige;
        }
        .project-box {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px;
    background-color: #f9f9f9;
}

.project-box h4 {
    margin-top: 0;
}

.custom-img {
    width: 100%;
    height: auto;
}

    </style>
</head>
<body>

<?php

function displayProjects() {
    // Check if the CSV file exists
    $csvFile = 'ProjectsCSV.csv';
    if (!file_exists($csvFile)) {
        return 'Projects CSV file not found.';
    }

    // Read the CSV file and display its contents
    $csvData = file($csvFile); // Read all lines into an array
    if (!$csvData) {
        return 'Unable to read Projects CSV file.';
    }

    $output = '<div class="row">';

    foreach ($csvData as $row) {
        $fields = explode(',', $row);
        if (count($fields) >= 3) {
            $course = trim($fields[0]);
            $title = trim($fields[1]);
            $image = trim($fields[2]);

            $output .= '<div class="col-md-4">';
            $output .= '<div class="project-box" style="background-color: #CFC9C4; font-family: Cambria; color: #006B54;  font-size: 17px; font-weight: bold;">';
            $output .= '<h4 style = "font-weight: bold";>' . $title . '</h4>';
            $output .= '<p>' . $course . '</p>';
            $output .= '<img src="' . $image . '" alt="' . $title . '" class="img-thumbnail custom-img">';
            $output .= '</div>';
            $output .= '</div>';
        }
    }

    $output .= '</div>';

    return $output;
}

echo '

	<br>
	<br>
    <br>
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


