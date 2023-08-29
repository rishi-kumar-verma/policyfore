<?php include_once 'config.php';
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
      if($value  !=''){
        array_push($dataPoints, array("y" => $value, "label" => $date));
        array_push($years, $date);
      }
   
    }
  }
}
// $conn->close();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Policyfore</title>
  <!-- Add Bootstrap JS link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Add jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Add chosen JS link -->
  <script src="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.jquery.min.js"></script>
  <!-- Add Chart.js link -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Add Bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Add chosen CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.min.css" rel="stylesheet" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
  <link rel="stylesheet" href="style.css">

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

    $(document).ready(function() {
      $('.year').on('change', function() {
        $(".yr-range").prop("checked", false);
        var data = [];
        $(".year:checked").each(function() {
          data.push($(this).val());
        });

        $.ajax({
          url: "functions.php",
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
        // flag = false;
      });
      $('.yr-range').change(function() {
        $(".year").each(function() {
          $(this).prop("checked", false);
        });
        let data = '';
        if ($(this).is(":checked")) { // check if the radio is checked
          data = $(this).val(); // retrieve the value
        }

        $.ajax({
          url: "functions.php",
          type: "post",
          data: {
            "yearrange": "yearrange",
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
        // flag = false;
      });

    });
  </script>
</head>

<body>

  <div class="wrapper">
    <div class="d-flex bd-highlight mb-3">
      <div class="me-auto p-2 bd-highlight">
        <div class="h5"><?php echo $indicator_value; ?></div>
      </div>
      <div class="p-2 bd-highlight">
        <span onclick="changeChart('line')"  class="btn text-success">
          <span class="fas fa-th px-md-2 px-1"></span>
          <span>Line Chart</span>
        </span>
      </div>
      <div class="p-2 bd-highlight">
        <span onclick="changeChart('bar')" class="btn text-success">
          <span class="fas fa-th px-md-2 px-1"></span>
          <span>Bar Chart</span>
        </span>
      </div>
      <div class="p-2 bd-highlight">
        <button class="btn btn-outline-success" id="downloadBtn">Download Excel</button>
      </div>
    </div>
    <div class="d-flex bd-highlight mb-3">
      <div class="d-md-flex me-auto p-2 bd-highlight">
        <div class="form-inline d-flex align-items-center my-2 mr-lg-2 radio bg-light border">
          <label class="options">Last 5 Years <input type="radio" class='yr-range' name="radio" value="5">
            <span class="checkmark"></span>
          </label>
          <label class="options">Last 10 Years <input type="radio" class='yr-range' name="radio" value="10">
            <span class="checkmark"></span>
          </label>
          <label class="options">Last 15 Years <input type="radio" class='yr-range' name="radio" value="15">
            <span class="checkmark"></span>
          </label>
          <label class="options">Last 20 Years <input type="radio" class='yr-range' name="radio" value="20">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <div class="d-md-flex p-2 bd-highlight">
        <div class="input-group mt-6">
          <select class="form-select chosen-select" id="searchSelect" aria-label="Searchable select">
            <option value="">Select Indicator</option>
            <?php
            $sqlIndicators = "SELECT id, Indicator_Name, Code FROM series_metadata";
            $resultIndicators = $conn->query($sqlIndicators);
            if ($resultIndicators->num_rows > 0) {
              while ($row = $resultIndicators->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['Code']; ?>" <?php if ($search == $row['Code']) {
                                                              echo 'selected';
                                                            } ?>> <?php echo $row['Indicator_Name']; ?></option>
            <?php
              }
            }
            ?>
          </select>
        </div>
      </div>
    </div>
    <div class="filters"> <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filter<span class="px-1 fas fa-filter"></span></button> </div>
    <div id="mobile-filter">
      <div class="py-3">
        <h5 class="font-weight-bold">Years</h5>
        <form class="brand">
          <?php
          foreach ($years as $year) {
          ?>
            <div class="form-inline d-flex align-items-center py-1" style="float: left;    width: 25%;"> <label class="tick"><?php echo $year; ?> <input name="year" class='year' value="<?php echo $year; ?> " type="checkbox"> <span class="check"></span> </label> </div>

          <?php
          }
          ?>
        </form>
      </div>
    </div>
    <div class="content py-md-0 py-3">
      <section id="sidebar">
        <div class="py-3">
          <h5 class="font-weight-bold">Years</h5>
          <form class="brand">
            <?php
            foreach ($years as $year) {
            ?>
              <div class="form-inline d-flex align-items-center py-1" style="float: left;    width: 25%;"> <label class="tick"><?php echo $year; ?> <input name="year" class='year' value="<?php echo $year; ?> " type="checkbox"> <span class="check"></span> </label> </div>
            <?php
            }
            ?>
          </form>
        </div>

      </section>
      <!-- Products Section -->
      <section id="products">
        <div class="container py-3">
          <div class="row">
            <!-- <div id="chartContainer" style="height: 370px; width: 100%;"></div> -->
            <canvas id="lineChart" style="height: 300px;"></canvas>
            <div class="indicatorName" style="width: 87%;margin-left: 13%;"><?php echo $indicator_value; ?></div>
            <div class="source" style="width: 55%;margin-left: 45%;">Source: World Bank </div>
          </div>
        </div>
      </section>
    </div>
  </div>

</body>

<script>
  // Initialize chosen select
  $(document).ready(function() {
    $('.chosen-select').chosen();
    // Change event handler for Chosen select
    $('.chosen-select').on('change', function(event, params) {
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

</html>