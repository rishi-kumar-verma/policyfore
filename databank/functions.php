<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once 'config.php';
if (isset($_REQUEST['yearkey']) && $_REQUEST['yearkey'] == 'year') {
  $search = isset($_REQUEST['search']) && $_REQUEST['search'] != '' ? $_REQUEST['search'] : die("Not allowed key is missing");

  // print_r( $year_arr); exit;
  $sql = "SELECT `key`, `json` FROM  data_raw WHERE `key` ='$search'";
  $result = $conn->query($sql);
  $indicator_value = '';
  $dataPoints = array();
  $dataPoints_empty = array();
  $years = array();
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $data = json_decode($row['json'], true);
      asort($data[1]);
      // echo "<pre>"; print_r($data[1]);
      // exit;

      // Process and display the indicator codes
      foreach ($data[1] as $indicator) {
        $date = $indicator['date'];
        $value = $indicator['value'] ? $indicator['value'] : '';
        $dataPoints[trim($date)] = $value;
       if($value !=''){
        array_push($dataPoints_empty, array("y" => $value, "label" => $date));
       }
       
      }
    }
    $dataPoints_filter = array();
    if (isset($_REQUEST['data']) && count($_REQUEST['data']) > 0) {
      $year_arr = $_REQUEST['data'];
      foreach ($year_arr as $yr) {
        // echo $yr; exit;
        array_push($dataPoints_filter, array("y" => $dataPoints[trim($yr)], "label" => trim($yr)));
      }
      echo json_encode($dataPoints_filter);
    } else {
      array_push($dataPoints_empty, array("y" => $value, "label" => $date));
      echo json_encode($dataPoints_empty);
    }


    // array_push($years, $date);

  }
  $conn->close();
}



if (isset($_REQUEST['yearrange']) && $_REQUEST['yearrange'] == 'yearrange') {
  $search = isset($_REQUEST['search']) && $_REQUEST['search'] != '' ? $_REQUEST['search'] : die("Not allowed key is missing");
  $len = isset($_REQUEST['data']) && $_REQUEST['data'] != '' ? $_REQUEST['data'] : die("Not allowed Length is missing");

  // print_r( $year_arr); exit;
  $sql = "SELECT `key`, `json` FROM  data_raw WHERE `key` ='$search'";
  $result = $conn->query($sql);
  $indicator_value = '';
  $dataPoints = array();
  $dataPoints_empty = array();
  $years = array();
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $data = json_decode($row['json'], true);
        asort($data[1]);
      // echo "<pre>"; print_r($data[1]);
      // exit;

      // Process and display the indicator codes
      foreach ($data[1] as $indicator) {
        $date = $indicator['date'];
        $value = $indicator['value'] ? $indicator['value'] : '';
        if( $value !=''){
          $dataPoints[trim($date)] = $value;
          array_push($dataPoints_empty, array("y" => $value, "label" => $date));
          array_push($years, (int)trim($date));
        }

      }
    }
    $dataPoints_filter = array();
    if (!empty($years) && count($years) > 0) {
      $year_arr = array_reverse($years);
      // echo "<pre>"; print_r($data[1]);
      // exit;
      $i = 1;
      foreach ($year_arr as $yr) {
        if ($i <= $len + 1) {
          array_push($dataPoints_filter, array("y" => $dataPoints[trim($yr)], "label" => trim($yr)));
        } else {
          break;
        }
        $i++;
        // echo $yr; exit;

      }
      //  echo "<pre>"; print_r(array_reverse($dataPoints_filter));
      // exit;
      echo json_encode(array_reverse($dataPoints_filter));
    } else {
      array_push($dataPoints_empty, array("y" => $value, "label" => $date));
      echo json_encode($dataPoints_empty);
    }


    // array_push($years, $date);

  }
  $conn->close();
}

// category display
if (isset($_REQUEST['category']) && $_REQUEST['category'] == 'category') {
  $sql = "SELECT DISTINCT category FROM series_metadata";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    $li = '';
    while ($row = $result->fetch_assoc()) {
      $category = $row['category'];
      if ($category != '')
        $li .=  "<option  value='". $category."'>" . $category ."</option>";
    }
    echo $li;
    exit;
  }
}
// end category display
