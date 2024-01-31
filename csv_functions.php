<?php

function readCSV($fileName){
	$row = 1;
	if (($handle = fopen($fileName, "r")) !== FALSE) {
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


function test2(){
	
	chdir("../");
	chdir("CSV");
	$assocData = array();

        if( ($handle = fopen( 'trivia.csv', "r")) !== FALSE) {
            $rowCounter = 0;
            while (($rowData = fgetcsv($handle, 0, ",")) !== FALSE) {
                if( 0 === $rowCounter) {
                    $headerRecord = $rowData;
                } else {
                    foreach( $rowData as $key => $value) {
                        $assocData[ $rowCounter - 1][ $headerRecord[ $key] ] = $value;  
                    }
                }
                $rowCounter++;
            }
            fclose($handle);
        }
		
       // var_dump( $assocData);
		return $assocData;
}

$array = test2();

for($i=0; $i<count($array); $i++){

foreach ($array[$i] as $key => $value) {
    echo "Key: $key; Value: $value\n";
}
}
echo 'hi';



?>