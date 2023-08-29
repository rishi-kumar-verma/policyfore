<?php include_once 'config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Policyfore Data</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Bootstrap DataTables CSS CDN -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="src/tooplate-gymso-style.css">
</head>

<body>

  <div class="wrapper">
    <div class="container mt-5">
      <h1 class="mb-4">Series Data With Category</h1>
    </div>


    <div class="container row mb-3">
      <div class="col-md-5">
        <input type="text" id="searchInput" class="form-control" placeholder="Search..." style="width: 100%; height: 50px; display: block; margin: 0 auto;">
      </div>
      <div class="col-md-2">
        <button class="form-control" onclick="search()" id="submit-button" name="submit" style="width: 120px; height: 50px; display: block; margin: 0 auto;">Search</button>
      </div>
      <div class="col-md-5">
        <select id="categoryFilter" class="form-control" style="width: auto; height: 50px; display: block; margin: 0 auto;">
          <option value="">All Categories</option>
          <!-- Add more categories here -->
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="container" id="datarow">
          <!-- Articles will be dynamically inserted here -->
        </div>
      </div>
    </div>

    <nav>
      <ul class="pagination" id="pagination">
        <!-- Pagination links will be dynamically inserted here -->
      </ul>
    </nav>
  </div>
  <!-- Bootstrap JS CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Bootstrap DataTables JS CDN -->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script>
    <?php
    $sql = "SELECT id, Indicator_Name, category, Short_definition, Topic, Code FROM series_metadata";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      $data = [];
      while ($row = $result->fetch_assoc()) {
        $temp = array(
          "id" => $row['id'],
          "title" => $row['Indicator_Name'],
          "Code" => $row['Code'],
          "author" => $row['Indicator_Name'],
          "topic" => base64_decode($row['Topic'], true),
          "category" => $row['category'],
          "content" => $row['Short_definition'],
        );
        array_push($data, $temp);
      }
      echo "var articles = " . json_encode($data) . ";";
    }
    ?>
    window.onload = function() {
      displayCategory();
    }
    var allArticles = articles;

    const itemsPerPage = 10; // Number of articles per page
    let currentPage = 1;
    let table;

    function initializeDataTable() {
      table = $('#articleTable').DataTable({
        pagingType: 'full_numbers',
        lengthMenu: [5, 10, 20],
        data: articles,
        columns: [{
          data: 'id'
        }, {
          data: 'title'
        }, {
          data: 'author'
        }]
      });
    }

    function renderArticles() {
      const startIndex = (currentPage - 1) * itemsPerPage;
      const endIndex = startIndex + itemsPerPage;
      const cardColumns = document.querySelector("#datarow");

      cardColumns.innerHTML = "";

      for (let i = startIndex; i < endIndex && i < articles.length; i++) {
        const article = articles[i];
        // Check if the article's category matches the selected category filter
        const card = `
                    <div class="row card p-3 mb-12">
                        <div class="blog-content card-body">
                            <h5 class="card-title">${article.title}</h5>
                            <p class="card-text">${article.content}</p>
                            <p class="card-text"><small class="text-muted">${article.topic.split(":")[0].trim()}</small></p>
                            <a href="indicator.php?search=${article.Code}" class="box_btn">View Data</a>
                        </div>
                    </div>
                `;
        cardColumns.innerHTML += card;
      }
    }

    function renderPagination() {
      const totalPages = Math.ceil(articles.length / itemsPerPage);
      const paginationContainer = document.querySelector("#pagination");
      let paginationHTML = `
        <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(1)">First</a>
        </li>
        <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">Previous</a>
        </li>
    `;

      const prevPages = Math.max(currentPage - 3, 1);
      const nextPages = Math.min(currentPage + 3, totalPages);

      for (let i = prevPages; i <= nextPages; i++) {
        paginationHTML += `
            <li class="page-item ${i === currentPage ? 'active' : ''}">
                <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
            </li>
        `;
      }

      paginationHTML += `
        <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">Next</a>
        </li>
        <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${totalPages})">Last</a>
        </li>
    `;

      paginationContainer.innerHTML = paginationHTML;
    }


    function changePage(page) {
      currentPage = page;
      renderArticles();
      renderPagination();
    }

    function search() {
      const searchInput = document.querySelector("#searchInput");
      const searchTerm = searchInput.value.toLowerCase();

      let filteredArticles = allArticles.filter(article => {
        return article.title.toLowerCase().includes(searchTerm) || article.author.toLowerCase().includes(searchTerm);
      });
      const categoryFilter = document.querySelector("#categoryFilter");
      const selectedCategory = categoryFilter.value;
      if (selectedCategory !== '') {
        filteredArticles = filteredArticles.filter(article => article.category.toLowerCase().trim() === selectedCategory.toLowerCase().trim());
      }

      // Update articles and pagination with filtered data
      articles.length = 0;
      articles.push(...filteredArticles);
      currentPage = 1;
      renderArticles();
      renderPagination();
    }


    // Attach an event listener to the category filter dropdown
    categoryFilter.addEventListener("change", (event) => {
      const value = event.target.value;
      currentPage = 1;
      let filteredArticles = allArticles.filter(article => article.category.toLowerCase().trim() === value.toLowerCase().trim());
      const searchInput = document.querySelector("#searchInput");
      const searchTerm = searchInput.value.toLowerCase();
      if (searchTerm !== '') {
        filteredArticles = articles.filter(article => {
          return article.title.toLowerCase().includes(searchTerm) || article.author.toLowerCase().includes(searchTerm);
        });
      }
      articles.length = 0;
      articles.push(...filteredArticles);
      currentPage = 1;
      renderArticles();
      renderPagination();
    });
    // Initial rendering
    renderArticles();
    renderPagination();
  </script>

  <script>
    function displayCategory() {
      $.ajax({
        url: "functions.php",
        type: "post",
        data: {
          "category": "category"
        },
        success: function(response) {
          $('#categoryFilter').append(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
      });
    }
  </script>

</body>

</html>