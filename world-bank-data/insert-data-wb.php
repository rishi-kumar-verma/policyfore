<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
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

$sql = "SELECT `key`,`json` FROM data_raw";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   // echo "id: " . $row["Code"];
    apiCall($row["key"],$row["json"]); 
    //sleep(7);
  }
} else {
  echo "0 results";
}
$conn->close();



function apiCall($indicatorCode,$response){
    // Define the indicator code and country code
        $data = json_decode($response, true);
       // echo "<pre>"; print_r($data); exit;
        $indicatorData = $data[1];
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
        // Process and use the data as needed
        foreach ($indicatorData as $entry) {
           //echo "<pre>"; print_r($entry); exit;
            $indicator_id = $entry['indicator']['id'];
            $indicator_value = $entry['indicator']['value'];
            $country_id = $entry['country']['id'];
            $country_value = $entry['country']['value'];
            $year = $entry['date'];
            $value = $entry['value'];
           // echo "Year: $year, Population: $value<br>";
         $sql = "INSERT INTO data (Country_Name, Country_Code, Series_Code,`Year`,`Value`)
           VALUES ('".$country_value."', '".$country_id."', '".$indicator_id. "','".$year."','".$value."')";
       //   exit;
          if ($conn->query($sql) === TRUE) {
            echo "$indicator_value New record created successfully<br/>";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
         
        }
        $conn->close();
 
}
?>