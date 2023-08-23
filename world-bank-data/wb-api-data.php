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

$sql = "SELECT t1.Code FROM series_metadata t1 LEFT JOIN data_raw t2 on t1.Code = t2.key WHERE t2.key IS NULL ORDER BY t1.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   // echo "id: " . $row["Code"];
    apiCall($row["Code"]); 
    sleep(7);
  }
} else {
  echo "0 results";
}
$conn->close();


function apiCall($indicatorCode ){
  // Define the indicator code and country code
//$indicatorCode = 'SP.POP.TOTL';
  $countryCode = 'IND';

  // Construct the API request URL
  $url = "http://api.worldbank.org/v2/country/$countryCode/indicator/$indicatorCode?format=json";

  // Send the GET request
  $response = file_get_contents($url);

  // Check if the request was successful
  if ($response !== false) {
      $data = $response;
     // $indicatorData = $data[1];
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
     $sql = "INSERT INTO data_raw (`key`,`json`)  VALUES ('".$indicatorCode ."', '". str_replace("'", "\'", $data)."')";
      if ($conn->query($sql) === TRUE) {
       echo "$indicatorCode New record created successfully<br/>";
       } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
       }
      $conn->close();
  } else {
      echo "Request failed";
  }
}

// function apiCall($indicatorCode ){
//     // Define the indicator code and country code
// //$indicatorCode = 'SP.POP.TOTL';
//     $countryCode = 'IND';

//     // Construct the API request URL
//     $url = "http://api.worldbank.org/v2/country/$countryCode/indicator/$indicatorCode?format=json";

//     // Send the GET request
//     $response = file_get_contents($url);

//     // Check if the request was successful
//     if ($response !== false) {
//         $data = json_decode($response, true);
//         $indicatorData = $data[1];
//         $servername = "localhost";
//         $username = "root";
//         $password = "password";
//         $dbname = "wb";
    
//         // Create connection
//         $conn = new mysqli($servername, $username, $password, $dbname);
//         // Check connection
//         if ($conn->connect_error) {
//             die("Connection failed: " . $conn->connect_error);
//         }
//         // Process and use the data as needed
//         foreach ($indicatorData as $entry) {
//            //echo "<pre>"; print_r($entry); exit;
//             $indicator_id = $entry['indicator']['id'];
//             $indicator_value = $entry['indicator']['value'];
//             $country_id = $entry['country']['id'];
//             $country_value = $entry['country']['value'];
//             $year = $entry['date'];
//             $value = $entry['value'];
//            // echo "Year: $year, Population: $value<br>";
//            $sql = "INSERT INTO data (Country_Name, Country_Code, Series_Code,`Year`,`Value`)
//            VALUES ('".$country_value."', '".$country_id."', '".$indicator_id. "','".$year."','".$value."')";
//            if ($conn->query($sql) === TRUE) {
//             echo "$indicator_value New record created successfully<br/>";
//             } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//             }
        
         
//         }
//         $conn->close();
//     } else {
//         echo "Request failed";
//     }
// }
?>