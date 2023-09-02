<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
session_start();
error_reporting(0);
include_once 'config/config.php';
include('head.php');
?>

<?php
$search = isset($_REQUEST['search']) && $_REQUEST['search'] != '' ? $_REQUEST['search'] : die("Not allowed key is missing");
?>
<?php
$sql = "SELECT `key`, `json` FROM  data_raw WHERE `key` ='$search'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $data = json_decode($row['json'], true);
    asort($data[1]);
    // echo "<pre>"; print_r($data[1]);
    // exit;
    $indicator_value = '';
    $dataPoints = array();
    $years = array();
    // Process and display the indicator codes
    foreach ($data[1] as $indicator) {
      $date = $indicator['date'];
      $value = $indicator['value'] ? $indicator['value'] : '';
      $indicator_value = $indicator['indicator']['value'];
      if ($value  != '') {
        array_push($dataPoints, array("y" => $value, "label" => $date));
        array_push($years, $date);
      }
    }
  }
}
// $conn->close();
include('head.php');
?>



<script>
  //let flag = true;
  let dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
  let lineChart;
  var chart = 'line';

  function changeChart(value) {
    console.log('value', value)
    chart = value;
    destroyChart(lineChart);
    lineChart = displayLineChart(dataPoints);
  }
  //console.log(flag);
  window.onload = function() {
    lineChart = displayLineChart(dataPoints);
  }

  function displayLineChart(dataPoints) {
    const labels = [];
    const data = [];

    dataPoints.forEach(entry => {
      labels.push(entry.label);
      data.push(entry.y);
    });

    var ctx = document.getElementById('lineChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: chart,
      data: {
        labels: labels,
        datasets: [{
          label: '<?php echo $indicator_value; ?>',
          data: data,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.4,
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    return myChart;
  }

  // Function to destroy an existing chart
  function destroyChart(lineChart) {
    if (lineChart) {
      lineChart.destroy();
    }
  }
  // Function to destroy an existing chart
  function yearsFilter(selectedOptions) {
    var arrayFromHTMLCollection = Array.from(selectedOptions);
    var data = [];
    // Now you can access the values in the array
    for (var i = 0; i < arrayFromHTMLCollection.length; i++) {
      var value = arrayFromHTMLCollection[i].value;
      // Do something with 'value'
      data.push(value);
      console.log(value)
    }
    $.ajax({
      url: "config/functions.php",
      type: "post",
      data: {
        "yearkey": "year",
        data,
        "search": "<?php echo $_REQUEST['search']; ?>"
      },
      success: function(response) {
        let data = JSON.parse(response)
        destroyChart(lineChart);
        lineChart = displayLineChart(data);
        // You will get response from your PHP page (what you echo or print)
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
    console.log(data);
  }
</script>

<style>

</style>

<body>
  <div class="preloader">
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- /.preloader -->
  <div class="page-wrapper">
    <?php
    include('header.php');
    ?>
    <section class="page-header">
      <div class="container">
        <h2>Policyfore Database</h2>
      </div><!-- /.container -->
    </section><!-- /.page-header -->
    <section class="event-details">
      <div class="contact-one">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 d-md-flex bd-highlight">
              <select class="selectpicker" id="searchSelect" aria-label="Select Indicator" data-live-search="true">
                <?php
                $sqlIndicators = "SELECT id, Indicator_Name, Code FROM series_metadata";
                $resultIndicators = $conn->query($sqlIndicators);
                if ($resultIndicators->num_rows > 0) {
                  while ($row = $resultIndicators->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['Code']; ?>" <?php if ($search == $row['Code']) {
                                                                  echo 'selected';
                                                                } ?>>
                      <?php echo $row['Indicator_Name']; ?>
                    </option>
                <?php
                  }
                }
                ?>
              </select>
            </div>
            <div class="col-lg-4 d-flex bd-highlight mb-3">
              <select name="field2" id="field2" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3" placeholder="Select Years" onchange="yearsFilter(this.selectedOptions)">
                <?php
                foreach ($years as $year) {
                ?>
                  <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php
                }
                ?>
              </select>

            </div>

            <div class="col-lg-4 d-flex bd-highlight mb-3">
              <div class="bd-highlight">
                <span onclick="changeChart('line')" class="btn">
                  <span class="fas fa-th px-md-2 px-1"></span>
                  <span>Line Chart</span>
                </span>
              </div>
              <div class=" bd-highlight">
                <span onclick="changeChart('bar')" class="btn">
                  <span class="fas fa-th px-md-2 px-1"></span>
                  <span>Bar Chart</span>
                </span>
              </div>
              <div class=" bd-highlight">
                <button class="btn" id="downloadBtn">Download</button>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="container py-3 bd-highlight">
                <div class="row">
                  <!-- <div id="chartContainer" style="height: 370px; width: 100%;"></div> -->
                  <canvas id="lineChart" style="height: 300px;"></canvas>
                  <div class="indicatorName" style="width: 100%;margin-left: 33%;"><?php echo $indicator_value; ?></div>
                  <div class="source" style="width: 55%;margin-left: 45%;">Source: World Bank </div>
                </div>
              </div>
            </div><!-- /.col-lg-8 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.contact-one -->
    </section><!-- /.event-details -->






    <?php
    include('footer.php');
    ?>


  </div>
  <!-- /.page-wrapper -->

  <?php
  include('search-popup.php');
  ?>


  <?php
  include('side-menu.php');
  ?>

  <?php
  include('footer-script.php');
  ?>
</body>

<script>
  // Initialize chosen select
  $(document).ready(function() {
    // Change event handler for Chosen select
    $('#searchSelect').on('change', function(event, params) {
      var selectedValues = $(this).val();
      var newUrl = "indicator.php?search=" + selectedValues;
      window.location.href = newUrl;
      // Add your custom action here
    });
  });
</script>
<script>
  function downloadExcel(data) {
    const worksheet = XLSX.utils.json_to_sheet(data);
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");

    const blob = new Blob([s2ab(XLSX.write(workbook, {
      bookType: "xlsx",
      type: "binary"
    }))], {
      type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
    });

    const fileName = "<?php echo $indicator_value; ?>.xlsx";
    const downloadLink = document.createElement("a");
    downloadLink.href = URL.createObjectURL(blob);
    downloadLink.download = fileName;

    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
  }

  function s2ab(s) {
    const buf = new ArrayBuffer(s.length);
    const view = new Uint8Array(buf);
    for (let i = 0; i !== s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
    return buf;
  }

  document.getElementById("downloadBtn").addEventListener("click", function() {
    let data = [];
    dataPoints.forEach(entry => {
      data.push({
        Year: entry.label,
        Value: entry.y
      });
    });
    downloadExcel(data);
  });
</script>
<script src="multiselect-dropdown.js"></script>

</html>