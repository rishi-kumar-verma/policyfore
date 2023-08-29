<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
session_start();
error_reporting(0);
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


        <section class="event-one event-one__event-page-2" style="padding-top: 15px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="event-one__single">
                            <div class="event-one__content">
                                <h3><a href="event-details.html">Weekend Drop-In Sessions</a></h3>
                                <p style="color: #000000;">Man face fruit divided seasons herb from herb moveth whose.</p>
                            </div>
                            <!-- /.event-one__content -->
                            <div class="event-one__btn-block">
                                <a href="event-details.html" class="thm-btn data-one__btn">Learn More</a>
                            </div>
                            <!-- /.event-one__btn-block -->
                        </div>
                        <!-- /.event-one__single -->
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <div class="event-one__single">

                            <div class="event-one__content">
                                <h3><a href="event-details.html">Calvert Richard Jones’s Duomo.</a></h3>
                                <p style="color: #000000;">Man face fruit divided seasons herb from herb moveth whose.</p>
                            </div>
                            <!-- /.event-one__content -->
                            <div class="event-one__btn-block">
                                <a href="event-details.html" class="thm-btn data-one__btn">Learn More</a>
                            </div>
                            <!-- /.event-one__btn-block -->
                        </div>
                        <!-- /.event-one__single -->
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <div class="event-one__single">

                            <div class="event-one__content">
                                <h3><a href="event-details.html">Celebrating Museum Day</a></h3>
                                <p style="color: #000000;">Man face fruit divided seasons herb from herb moveth whose.</p>
                            </div>
                            <!-- /.event-one__content -->
                            <div class="event-one__btn-block">
                                <a href="event-details.html" class="thm-btn data-one__btn">Learn More</a>
                            </div>
                            <!-- /.event-one__btn-block -->
                        </div>
                        <!-- /.event-one__single -->
                    </div>
                   
                   
                </div>
                <!-- /.row -->

                <div class="pagination text-center d-flex justify-content-center">
                    <div class="post-pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-angle-right"></i></a>
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

</html>