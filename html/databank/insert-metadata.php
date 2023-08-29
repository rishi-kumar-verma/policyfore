<?php

use Shuchkin\SimpleXLSX;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
require_once __DIR__.'/src/SimpleXLSX.php';

if ($xlsx = SimpleXLSX::parse('metadata.xlsx')) {
    //print_r($xlsx->rows()); exit;
    $i=0;
    foreach($xlsx->rows() as $arr_val){
	//	$k = implode(",",$arr_val); 
	//echo	$str = str_replace(' ', '_', $k); exit;
		//echo "<pre>"; print_r($arr_val); exit;
    	if($i>=1){
			$Code=''; 
			$License_Type=''; 
			$Indicator_Name=''; 
			$Short_definition=''; 
			$Long_definition=''; 
			$Source=''; 
			$Topic=''; 
			$Dataset=''; 
			$Unit_of_measure=''; 
			$Periodicity=''; 
			$Base_Period=''; 
			$Aggregation_method=''; 
			$Statistical_concept_and_methodology=''; 
			$Development_relevance=''; 
			$Limitations_and_exceptions=''; 
			$General_comments=''; 
			$Other_notes=''; 
			$Notes_from_original_source=''; 
			$Related_source_links=''; 
			$Other_web_links=''; 
			$Related_indicators=''; 
			$License_URL='';
			$Code=$arr_val[0]; 
			$License_Type=$arr_val[1]; 
			$Indicator_Name=str_replace("'", "\'",$arr_val[2]); 
			$Short_definition=base64_encode($arr_val[3]); 
			$Long_definition=base64_encode($arr_val[4]); 
			$Source=base64_encode($arr_val[5]); 
			$Topic=base64_encode($arr_val[6]); 
			$Dataset=$arr_val[7]; 
			$Unit_of_measure=$arr_val[8]; 
			$Periodicity=$arr_val[9]; 
			$Base_Period=$arr_val[10]; 
			$Aggregation_method=$arr_val[11]; 
			$Statistical_concept_and_methodology=base64_encode($arr_val[12]); 
			$Development_relevance=base64_encode($arr_val[13]); 
			$Limitations_and_exceptions=base64_encode($arr_val[14]); 
			$General_comments=base64_encode($arr_val[15]); 
			$Other_notes=base64_encode($arr_val[16]); 
			$Notes_from_original_source=base64_encode($arr_val[17]); 
			$Related_source_links=base64_encode($arr_val[18]); 
			$Other_web_links=base64_encode($arr_val[19]); 
			$Related_indicators=base64_encode($arr_val[20]); 
			$License_URL=$arr_val[21];
			//echo "<pre>"; print_r($arr_val); exit;
			insertMeta($Code,$License_Type,$Indicator_Name,$Short_definition,$Long_definition,$Source,$Topic,$Dataset,$Unit_of_measure,$Periodicity,$Base_Period,$Aggregation_method,$Statistical_concept_and_methodology,$Development_relevance,$Limitations_and_exceptions,$General_comments,$Other_notes,$Notes_from_original_source,$Related_source_links,$Other_web_links,$Related_indicators,$License_URL);
    	}
    //	
    	$i++;
    }
    echo $i;
} else {
    echo SimpleXLSX::parseError();
}


function insertMeta($Code,$License_Type,$Indicator_Name,$Short_definition,$Long_definition,$Source,$Topic,$Dataset,$Unit_of_measure,$Periodicity,$Base_Period,$Aggregation_method,$Statistical_concept_and_methodology,$Development_relevance,$Limitations_and_exceptions,$General_comments,$Other_notes,$Notes_from_original_source,$Related_source_links,$Other_web_links,$Related_indicators,$License_URL){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "policyfore";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

$sql = "INSERT INTO series_metadata (Code,License_Type,Indicator_Name,Short_definition,Long_definition,Source,Topic,Dataset,Unit_of_measure,Periodicity,Base_Period,Aggregation_method,Statistical_concept_and_methodology,Development_relevance,Limitations_and_exceptions,General_comments,Other_notes,Notes_from_original_source,Related_source_links,Other_web_links,Related_indicators,License_URL)
	VALUES ('".$Code."', 
'".$License_Type."', 
'".$Indicator_Name."', 
'".$Short_definition."', 
'".$Long_definition."', 
'".$Source."', 
'".$Topic."', 
'".$Dataset."', 
'".$Unit_of_measure."', 
'".$Periodicity."', 
'".$Base_Period."', 
'".$Aggregation_method."', 
'".$Statistical_concept_and_methodology."', 
'".$Development_relevance."', 
'".$Limitations_and_exceptions."', 
'".$General_comments."', 
'".$Other_notes."', 
'".$Notes_from_original_source."', 
'".$Related_source_links."', 
'".$Other_web_links."', 
'".$Related_indicators."', 
'".$License_URL."')";

	if ($conn->query($sql) === TRUE) {
	echo "$Indicator_Name New record created successfully<br/>";
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

