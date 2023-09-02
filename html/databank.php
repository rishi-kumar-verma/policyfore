<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
session_start();
error_reporting(0);
include_once 'config/config.php';
include('head.php');
?>

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
                        <div class="col-md-5 col-lg-5 d-md-flex">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search..." style="width: 100%; height: 50px; display: block; margin: 0 auto;">
                        </div>
                        <div class="col-md-2 col-lg-2 d-md-flex">
                            <button class="form-control thm-btn data-one__btn" onclick="search()" id="submit-button" name="submit" style="width: 120px; height: 50px; display: block; margin: 0 auto;">Search</button>
                        </div>
                        <div class="col-md-5 col-lg-5 d-md-flex">
                            <select id="categoryFilter" class="form-control" style="width: 100%; height: 50px; display: block; margin: 0 auto;">
                                <option value="">All Categories</option>
                                <!-- Add more categories here -->
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="event-one event-one__event-page-2" style="padding-top: 15px;">
            <div class="container">
                <div class="row" id="datarow">

                </div>
                <!-- /.row -->

                <div class="pagination text-center d-flex justify-content-center">
                    <div class="post-pagination" id="pagination">
                    </div><!-- /.post-pagination -->
                </div><!-- /.text-center d-flex justify-content-center -->

                <!-- /.text-center -->

            </div>
            <!-- /.container -->
        </section>
        <!-- /.event-one -->
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
                "content" => base64_decode($row['Short_definition']),
            );
            array_push($data, $temp);
        }
        echo "var articles = " . json_encode($data) . ";";
    }
    ?>
    window.onload = function() {
        displayCategory();
    }
    var allArticles = JSON.parse(JSON.stringify(articles));;

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
                    <div class="col-lg-12">
                        <div class="event-one__single">
                            <div class="event-one__content">
                                <h3><a href="indicator.php?search=${article.Code}">${article.title}</a></h3>
                                <p style="color: #000000;">${article.content}</p>
                                <small class="text-muted">${article.topic.split(":")[0].trim()}</small>
                            </div>
                            <div class="event-one__btn-block">
                                <a href="indicator.php?search=${article.Code}" class="thm-btn data-one__btn">Learn More</a>
                            </div>
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
            <a class="page-link" href="#" onclick="changePage(${currentPage - 1})"><i class="fa fa-angle-right flipped"></i></a>
        </li>`;

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
            <a class="page-link" href="#" onclick="changePage(${currentPage + 1})"><i class="fa fa-angle-right"></i></a>
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
        const categoryFilter = document.querySelector("#categoryFilter");
        const selectedCategory = categoryFilter.value;
        var filteredArticles;

        if (searchTerm == '' && selectedCategory == '') {
            articles.length = 0;
            articles.push(...allArticles);
        }

        if (searchTerm == '' && selectedCategory !== '') {
            filteredArticles = allArticles.filter(article => article.category.toLowerCase().trim() === selectedCategory
                .toLowerCase().trim());
            articles.length = 0;
            articles.push(...filteredArticles);
        }

        if (searchTerm !== '' && selectedCategory !== '') {
            filteredArticles = allArticles.filter(article => {
                return article.title.toLowerCase().includes(searchTerm) || article.author.toLowerCase().includes(
                    searchTerm);
            }).filter(article => article.category.toLowerCase().trim() === selectedCategory.toLowerCase().trim());
            articles.length = 0;
            articles.push(...filteredArticles);
        }

        if (searchTerm !== '' && selectedCategory == '') {
            filteredArticles = allArticles.filter(article => {
                return article.title.toLowerCase().includes(searchTerm) || article.author.toLowerCase().includes(
                    searchTerm);
            });
            articles.length = 0;
            articles.push(...filteredArticles);
        }
        currentPage = 1;
        renderArticles();
        renderPagination();
    }


    // Attach an event listener to the category filter dropdown
    categoryFilter.addEventListener("change", (event) => {
        search();
    });
    // Initial rendering
    renderArticles();
    renderPagination();
</script>

<script>
    function displayCategory() {
        $.ajax({
            url: "config/functions.php",
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


</html>