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



        <!-- banner section -->
        <section class="banner-section banner-section__home-two banner-section__home-three">
            <div class="banner-carousel thm__owl-carousel owl-theme owl-carousel" data-options='{"loop": true, "items": 1, "margin": 0, "dots": false, "nav": true, "animateOut": "fadeOut", "animateIn": "fadeIn", "active": true, "smartSpeed": 1000, "autoplay": true, "autoplayTimeout": 6000, "autoplayHoverPause": false}'>
                <!-- Slide Item -->
                <div class="slide-item">
                    <div class="image-layer lazy-image" style="background-image: url('assets/images/main-slider/banner-3-1.jpg');"></div>
                    <div class="container">
                        <div class="content-box text-left">
                            <h3>Through November 12 (Tuesday) - 18 (Monday), 2020.</h3>
                            <h2>One of the Finest Collections of <br> Egyptian Art.</h2>
                            <div class="btn-box">
                                <a href="#" class="thm-btn btn-style-one">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide Item -->
                <div class="slide-item">
                    <div class="image-layer lazy-image" style="background-image: url('assets/images/main-slider/banner-3-2.jpg');"></div>
                    <div class="container">
                        <div class="content-box text-left">
                            <h3>Opening On Sat. Oct 20, 2020</h3>
                            <h2>The World’s Leading Museum <br />of Contemporary Art</h2>
                            <div class="btn-box">
                                <a href="#" class="thm-btn btn-style-one">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide Item -->
                <div class="slide-item">
                    <div class="image-layer lazy-image" style="background-image: url('assets/images/main-slider/banner-3-3.jpg');"></div>
                    <div class="container">
                        <div class="content-box text-left">
                            <h3>The Past is our Future</h3>
                            <h2>World’s Leading Museum of History <br> Over 2.3 k Collection</h2>
                            <div class="btn-box">
                                <a href="#" class="thm-btn btn-style-one">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner section -->

        <section class="collection-two collection-two__home-three">
            <img src="assets/images/shapes/collection-2-sculpture.png" class="collection-two__scupture" alt="">
            <div class="container">
                <div class="block-title-two text-center">
                    <div class="block-title-two__line"></div>
                    <!-- /.block-title-two__line -->
                    <p>What’s Going on</p>
                    <h3>Currently On View</h3>
                </div>
                <!-- /.block-title-two -->
                <div class="collection-two__carousel shadowed__carousel thm__owl-carousel owl-carousel owl-theme" data-options='{
                        "loop": true, "margin": 40, "autoplay": true, "autoplayTimeout": 5000, "autoplayHoverPause": true, "items": 5, "smartSpeed": 700, "dots": false, "nav": true, "responsive": {
                            "1920": { "items": 3},
                            "1440": { "items": 3},
                            "1199": { "items": 3},
                            "991": { "items": 2},
                            "767": { "items": 1},
                            "575": { "items": 1},
                            "480": { "items": 1},
                            "0": { "items": 1}
                        }
                    }'>
                    <div class="item">
                        <div class="collection-two__single">
                            <div class="collection-two__image">
                                <img src="assets/images/collection/collection-3-1.jpg" alt="">
                            </div>
                            <!-- /.collection-two__image -->
                            <div class="collection-two__content">
                                <h3><a href="#">The Exhibits Cover <br> All Time</a></h3>
                                <p>Linda M. Dugan</p>
                            </div>
                            <!-- /.collection-two__content -->
                        </div>
                        <!-- /.collection-two__single -->
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <div class="collection-two__single">
                            <div class="collection-two__image">
                                <img src="assets/images/collection/collection-3-2.jpg" alt="">
                            </div>
                            <!-- /.collection-two__image -->
                            <div class="collection-two__content">
                                <h3><a href="#">Hadrian and Athens. <br> Conversing with </a></h3>
                                <p>Linda M. Dugan</p>
                            </div>
                            <!-- /.collection-two__content -->
                        </div>
                        <!-- /.collection-two__single -->
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <div class="collection-two__single">
                            <div class="collection-two__image">
                                <img src="assets/images/collection/collection-3-3.jpg" alt="">
                            </div>
                            <!-- /.collection-two__image -->
                            <div class="collection-two__content">
                                <h3><a href="#">Classicita ed Europa. <br> common destiny</a></h3>
                                <p>Linda M. Dugan</p>
                            </div>
                            <!-- /.collection-two__content -->
                        </div>
                        <!-- /.collection-two__single -->
                    </div>
                    <!-- /.item -->

                    <div class="item">
                        <div class="collection-two__single">
                            <div class="collection-two__image">
                                <img src="assets/images/collection/collection-3-1.jpg" alt="">
                            </div>
                            <!-- /.collection-two__image -->
                            <div class="collection-two__content">
                                <h3><a href="#">The Exhibits Cover <br> All Time</a></h3>
                                <p>Linda M. Dugan</p>
                            </div>
                            <!-- /.collection-two__content -->
                        </div>
                        <!-- /.collection-two__single -->
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <div class="collection-two__single">
                            <div class="collection-two__image">
                                <img src="assets/images/collection/collection-3-2.jpg" alt="">
                            </div>
                            <!-- /.collection-two__image -->
                            <div class="collection-two__content">
                                <h3><a href="#">Hadrian and Athens. <br> Conversing with </a></h3>
                                <p>Linda M. Dugan</p>
                            </div>
                            <!-- /.collection-two__content -->
                        </div>
                        <!-- /.collection-two__single -->
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <div class="collection-two__single">
                            <div class="collection-two__image">
                                <img src="assets/images/collection/collection-3-3.jpg" alt="">
                            </div>
                            <!-- /.collection-two__image -->
                            <div class="collection-two__content">
                                <h3><a href="#">Classicita ed Europa. <br> common destiny</a></h3>
                                <p>Linda M. Dugan</p>
                            </div>
                            <!-- /.collection-two__content -->
                        </div>
                        <!-- /.collection-two__single -->
                    </div>
                    <!-- /.item -->

                    <div class="item">
                        <div class="collection-two__single">
                            <div class="collection-two__image">
                                <img src="assets/images/collection/collection-3-1.jpg" alt="">
                            </div>
                            <!-- /.collection-two__image -->
                            <div class="collection-two__content">
                                <h3><a href="#">The Exhibits Cover <br> All Time</a></h3>
                                <p>Linda M. Dugan</p>
                            </div>
                            <!-- /.collection-two__content -->
                        </div>
                        <!-- /.collection-two__single -->
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <div class="collection-two__single">
                            <div class="collection-two__image">
                                <img src="assets/images/collection/collection-3-2.jpg" alt="">
                            </div>
                            <!-- /.collection-two__image -->
                            <div class="collection-two__content">
                                <h3><a href="#">Hadrian and Athens. <br> Conversing with </a></h3>
                                <p>Linda M. Dugan</p>
                            </div>
                            <!-- /.collection-two__content -->
                        </div>
                        <!-- /.collection-two__single -->
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <div class="collection-two__single">
                            <div class="collection-two__image">
                                <img src="assets/images/collection/collection-3-3.jpg" alt="">
                            </div>
                            <!-- /.collection-two__image -->
                            <div class="collection-two__content">
                                <h3><a href="#">Classicita ed Europa. <br> common destiny</a></h3>
                                <p>Linda M. Dugan</p>
                            </div>
                            <!-- /.collection-two__content -->
                        </div>
                        <!-- /.collection-two__single -->
                    </div>
                    <!-- /.item -->
                </div>
                <!-- /.collection-two__carousel shadowed__carousel thm__owl-carousel owl-carousel owl-theme -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.collection-two -->

        <section class="about-three">
            <div class="container-fluid">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="about-three__image clearfix">
                            <img src="assets/images/resources/about-3-1.jpg" alt="">
                        </div>
                        <!-- /.about-three__image -->
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6 d-flex">
                        <div class="my-auto">
                            <div class="about-three__content">
                                <div class="block-title">
                                    <p>About Muzex</p>
                                    <h3>The Art Gallery of <br> San Francisco</h3>
                                </div>
                                <!-- /.block-title -->
                                <p class="about-three__highlight">Welcome to the World’s Leading Museum of Modern Art. It includes works of art created during the period stretching from about 1860 to the 1970s.</p>
                                <p>Man face fruit divided seasons herb from herb moveth whose. Dominion gathered winged morning, man won’t had fly beginning. Winged have saying behold morning greater void shall created whose blessed herb light fruitful open
                                    void without itself whales.</p>
                            </div>
                            <!-- /.about-three__content -->
                        </div>
                        <!-- /.my-auto -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row no-gutters -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.about-three -->

        <section class="cta-two cta-two__home-two">
            <div class="container">
                <div class="inner-container">
                    <div class="row no-gutters">
                        <div class="col-lg-4">
                            <div class="cta-two__box">
                                <div class="cta-two__icon">
                                    <i class="muzex-icon-clock"></i>
                                </div>
                                <!-- /.cta-two__icon -->
                                <div class="cta-two__content">
                                    <h3>Open Hours</h3>
                                    <p>
                                        Daily: 9.30 AM–6.00 PM <br /> Sunday & Holidays: Closed
                                    </p>
                                    <a href="contact.html" class="thm-btn">All Hours</a>
                                    <!-- /.thm-btn -->
                                </div>
                                <!-- /.cta-two__content -->
                            </div>
                            <!-- /.cta-two__box -->
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <div class="cta-two__box">
                                <div class="cta-two__icon">
                                    <i class="muzex-icon-location"></i>
                                </div>
                                <!-- /.cta-two__icon -->
                                <div class="cta-two__content">
                                    <h3>Find Location</h3>
                                    <p>
                                        Muszex Museums 32 Quincy <br /> Street Cambridge, MA
                                    </p>
                                    <a href="contact.html" class="thm-btn">Getting Here</a>
                                    <!-- /.thm-btn -->
                                </div>
                                <!-- /.cta-two__box -->
                            </div>
                            <!-- /.cta-two__content -->
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <div class="cta-two__box">
                                <div class="cta-two__icon">
                                    <i class="muzex-icon-ticket"></i>
                                </div>
                                <!-- /.cta-two__icon -->
                                <div class="cta-two__content">
                                    <h3>Get Ticket</h3>
                                    <p>
                                        Muszex Museums 32 Quincy <br /> Street Cambridge, MA
                                    </p>
                                    <a href="contact.html" class="thm-btn">Buy Online</a>
                                    <!-- /.thm-btn -->
                                </div>
                                <!-- /.cta-two__box -->
                            </div>
                            <!-- /.cta-two__content -->
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.inner-container -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.cta-two -->


        <section class="collection-three">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="collection-three__block">
                            <div class="block-title">
                                <p>Gallery</p>
                                <h3>Explore <br> the Collection</h3>
                            </div>
                            <!-- /.block-title -->
                            <p>Man face fruit divided seasons herb from herb moveth whose. Dominion gathered winged morning, man won’t had fly beginning. </p>
                            <a href="#" class="thm-btn collection-three__block-btn">All Collection</a>
                            <!-- /.thm-btn collection-three__block-btn -->
                        </div>
                        <!-- /.collection-three__block -->
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-8">
                        <div class="row masonary-layout">
                            <div class="col-lg-6 masonary-item">
                                <div class="collection-two__single">
                                    <div class="collection-two__image">
                                        <img src="assets/images/collection/collection-4-1.jpg" alt="">
                                    </div>
                                    <!-- /.collection-two__image -->
                                    <div class="collection-two__content">
                                        <h3><a href="#">St. Catherine <br> Alexandria in Prison</a></h3>
                                        <p>Linda M. Dugan</p>
                                    </div>
                                    <!-- /.collection-two__content -->
                                </div>
                                <!-- /.collection-two__single -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6 masonary-item">
                                <div class="collection-two__single">
                                    <div class="collection-two__image">
                                        <img src="assets/images/collection/collection-4-2.jpg" alt="">
                                    </div>
                                    <!-- /.collection-two__image -->
                                    <div class="collection-two__content">
                                        <h3><a href="#">Alexandria in Prison</a></h3>
                                        <p>Linda M. Dugan</p>
                                    </div>
                                    <!-- /.collection-two__content -->
                                </div>
                                <!-- /.collection-two__single -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6 masonary-item">
                                <div class="collection-two__single">
                                    <div class="collection-two__image">
                                        <img src="assets/images/collection/collection-4-3.jpg" alt="">
                                    </div>
                                    <!-- /.collection-two__image -->
                                    <div class="collection-two__content">
                                        <h3><a href="#">The Lascaux Cave</a></h3>
                                        <p>Linda M. Dugan</p>
                                    </div>
                                    <!-- /.collection-two__content -->
                                </div>
                                <!-- /.collection-two__single -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6 masonary-item">
                                <div class="collection-two__single">
                                    <div class="collection-two__image">
                                        <img src="assets/images/collection/collection-4-4.jpg" alt="">
                                    </div>
                                    <!-- /.collection-two__image -->
                                    <div class="collection-two__content">
                                        <h3><a href="#">Mercenary Soldiers <br> In Ottoman</a></h3>
                                        <p>Linda M. Dugan</p>
                                    </div>
                                    <!-- /.collection-two__content -->
                                </div>
                                <!-- /.collection-two__single -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6 masonary-item">
                                <div class="collection-two__single">
                                    <div class="collection-two__image">
                                        <img src="assets/images/collection/collection-4-5.jpg" alt="">
                                    </div>
                                    <!-- /.collection-two__image -->
                                    <div class="collection-two__content">
                                        <h3><a href="#">Tower of Babel (Babylon)</a></h3>
                                        <p>Linda M. Dugan</p>
                                    </div>
                                    <!-- /.collection-two__content -->
                                </div>
                                <!-- /.collection-two__single -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6 masonary-item">
                                <div class="collection-two__single">
                                    <div class="collection-two__image">
                                        <img src="assets/images/collection/collection-4-6.jpg" alt="">
                                    </div>
                                    <!-- /.collection-two__image -->
                                    <div class="collection-two__content">
                                        <h3><a href="#">English Landscape <br> Painting</a></h3>
                                        <p>Linda M. Dugan</p>
                                    </div>
                                    <!-- /.collection-two__content -->
                                </div>
                                <!-- /.collection-two__single -->
                            </div>
                            <!-- /.col-lg-6 -->
                        </div>
                        <!-- /.row masonary-layout -->
                    </div>
                    <!-- /.col-lg-8 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.collection-three -->

        <section class="event-one event-one__home-three">
            <img src="assets/images/shapes/event-sculpture-1-1.png" alt="" class="event-one__moc">
            <div class="container">
                <div class="block-title-two text-center">
                    <span class="block-title-two__line"></span>
                    <!-- /.block-title-two__line -->
                    <p>What’s Going on</p>
                    <h3>Our Upcoming Event</h3>
                </div>
                <!-- /.block-title-two -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="event-one__single">
                            <div class="event-one__image">
                                <div class="event-one__date">
                                    <span>31</span> Oct
                                </div>
                                <!-- /.event-one__date -->
                                <div class="event-one__image-box">
                                    <div class="event-one__image-inner">
                                        <img src="assets/images/event/event-1-1.jpg" alt="">
                                    </div>
                                    <!-- /.event-one__image-inner -->
                                </div>
                                <!-- /.event-one__image-box -->
                            </div>
                            <!-- /.event-one__image -->
                            <div class="event-one__content">
                                <h3><a href="event-details.html">Weekend Drop-In Sessions</a></h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose.</p>
                            </div>
                            <!-- /.event-one__content -->
                            <div class="event-one__btn-block">
                                <a href="event-details.html" class="thm-btn event-one__btn">Learn More</a>
                            </div>
                            <!-- /.event-one__btn-block -->
                        </div>
                        <!-- /.event-one__single -->
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <div class="event-one__single">
                            <div class="event-one__image">
                                <div class="event-one__date">
                                    <span>17</span> Nov
                                </div>
                                <!-- /.event-one__date -->
                                <div class="event-one__image-box">
                                    <div class="event-one__image-inner">
                                        <img src="assets/images/event/event-1-2.jpg" alt="">
                                    </div>
                                    <!-- /.event-one__image-inner -->
                                </div>
                                <!-- /.event-one__image-box -->
                            </div>
                            <!-- /.event-one__image -->
                            <div class="event-one__content">
                                <h3><a href="event-details.html">Calvert Richard Jones’s Duomo.</a></h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose.</p>
                            </div>
                            <!-- /.event-one__content -->
                            <div class="event-one__btn-block">
                                <a href="event-details.html" class="thm-btn event-one__btn">Learn More</a>
                            </div>
                            <!-- /.event-one__btn-block -->
                        </div>
                        <!-- /.event-one__single -->
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <div class="event-one__single">
                            <div class="event-one__image">
                                <div class="event-one__date">
                                    <span>04</span> Dec
                                </div>
                                <!-- /.event-one__date -->
                                <div class="event-one__image-box">
                                    <div class="event-one__image-inner">
                                        <img src="assets/images/event/event-1-3.jpg" alt="">
                                    </div>
                                    <!-- /.event-one__image-inner -->
                                </div>
                                <!-- /.event-one__image-box -->
                            </div>
                            <!-- /.event-one__image -->
                            <div class="event-one__content">
                                <h3><a href="event-details.html">Celebrating Museum Day</a></h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose.</p>
                            </div>
                            <!-- /.event-one__content -->
                            <div class="event-one__btn-block">
                                <a href="event-details.html" class="thm-btn event-one__btn">Learn More</a>
                            </div>
                            <!-- /.event-one__btn-block -->
                        </div>
                        <!-- /.event-one__single -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </section>
        <!-- /.event-one -->

        <section class="brand-one">
            <div class="container">
                <div class="brand-one__carousel thm__owl-carousel owl-carousel owl-theme" data-options='{
            "items": 5, "margin": 150, "smartSpeed": 700, "loop": true, "autoplay": true, "autoplayTimeout": 5000, "autoplayHoverPause": false, "nav": false, "dots": false, "responsive": {"0": {"margin": 20, "items": 2 }, "575": {"margin": 30, "items": 3 }, "767": {"margin": 40, "items": 4 }, "991": {"margin": 70, "items": 4 }, "1199": {"margin": 150, "items": 5 } } }'>
                    <div class="item">
                        <img src="assets/images/brand/brand-1-1.png" alt="" />
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <img src="assets/images/brand/brand-1-2.png" alt="" />
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <img src="assets/images/brand/brand-1-3.png" alt="" />
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <img src="assets/images/brand/brand-1-4.png" alt="" />
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <img src="assets/images/brand/brand-1-5.png" alt="" />
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <img src="assets/images/brand/brand-1-1.png" alt="" />
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <img src="assets/images/brand/brand-1-2.png" alt="" />
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <img src="assets/images/brand/brand-1-3.png" alt="" />
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <img src="assets/images/brand/brand-1-4.png" alt="" />
                    </div>
                    <!-- /.item -->
                    <div class="item">
                        <img src="assets/images/brand/brand-1-5.png" alt="" />
                    </div>
                    <!-- /.item -->
                </div>
                <!-- /.brand-one__carousel thm__owl-carousel owl-carousel owl-theme -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.brand-one -->

        <section class="team-one">
            <div class="container">
                <div class="block-title-two text-center">
                    <p>Our Team</p>
                    <h3>Expert Members</h3>
                </div>
                <!-- /.block-title-two -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-one__single">
                            <div class="team-one__image">
                                <img src="assets/images/team/team-1-1.jpg" alt="">
                                <div class="team-one__social">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-linkedin-in"></a>
                                    <a href="#" class="fab fa-google-plus-g"></a>
                                </div>
                                <!-- /.team-one__social -->
                            </div>
                            <!-- /.team-one__image -->
                            <div class="team-one__content">
                                <h3>Violet Jones</h3>
                                <p>Developer</p>
                            </div>
                            <!-- /.team-one__content -->
                        </div>
                        <!-- /.team-one__single -->
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="team-one__single">
                            <div class="team-one__image">
                                <img src="assets/images/team/team-1-2.jpg" alt="">
                                <div class="team-one__social">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-linkedin-in"></a>
                                    <a href="#" class="fab fa-google-plus-g"></a>
                                </div>
                                <!-- /.team-one__social -->
                            </div>
                            <!-- /.team-one__image -->
                            <div class="team-one__content">
                                <h3>Sarah Boyd</h3>
                                <p>Developer</p>
                            </div>
                            <!-- /.team-one__content -->

                        </div>
                        <!-- /.team-one__single -->
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="team-one__single">
                            <div class="team-one__image">
                                <img src="assets/images/team/team-1-3.jpg" alt="">
                                <div class="team-one__social">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-linkedin-in"></a>
                                    <a href="#" class="fab fa-google-plus-g"></a>
                                </div>
                                <!-- /.team-one__social -->
                            </div>
                            <!-- /.team-one__image -->
                            <div class="team-one__content">
                                <h3>Marguerite Holt</h3>
                                <p>Developer</p>
                            </div>
                            <!-- /.team-one__content -->

                        </div>
                        <!-- /.team-one__single -->
                    </div>
                    <!-- /.col-lg-4 -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.team-one -->

        <section class="blog-one">
            <div class="container">
                <div class="blog-one__top">
                    <div class="block-title">
                        <p>Muzex News</p>
                        <h3>Latest From Our News</h3>
                    </div>
                    <!-- /.block-title -->
                    <div class="more-post__block">
                        <a class="more-post__link" href="#">
                            All Post
                            <span class="curved-circle">View More &nbsp;&emsp;View More &nbsp;&emsp;View More View More
                                View More &nbsp;&emsp;View &nbsp;&emsp;
                            </span>
                            <!-- /.curved-circle -->
                        </a>
                    </div>
                    <!-- /.more-post__block -->
                </div>
                <!-- /.blog-one__top -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="blog-one__single">
                            <div class="blog-one__image">
                                <img src="assets/images/blog/blog-1-1.jpg" alt="">
                                <div class="blog-one__date">
                                    <i class="far fa-calendar-alt"></i> Oct 25, 2020
                                </div>
                                <!-- /.blog-one__date -->
                            </div>
                            <!-- /.blog-one__image -->
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li><a href="#">By Diana Leach</a></li>
                                    <li><a href="#">03 Comments</a></li>
                                </ul>
                                <!-- /.blog-one__meta list-unstyled -->
                                <h3><a href="news-details.html">Celebrating at Our Egypt Museum</a></h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose dominion gathered winged morning man.
                                </p>
                                <a href="news-details.html" class="blog-one__link">Learn More</a>
                                <!-- /.blog-one__link -->
                            </div>
                            <!-- /.blog-one__content -->
                        </div>
                        <!-- /.blog-one__single -->
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="blog-one__single">
                            <div class="blog-one__image">
                                <img src="assets/images/blog/blog-1-2.jpg" alt="">
                                <div class="blog-one__date">
                                    <i class="far fa-calendar-alt"></i> Oct 25, 2020
                                </div>
                                <!-- /.blog-one__date -->
                            </div>
                            <!-- /.blog-one__image -->
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li><a href="#">By Diana Leach</a></li>
                                    <li><a href="#">03 Comments</a></li>
                                </ul>
                                <!-- /.blog-one__meta list-unstyled -->
                                <h3><a href="news-details.html">6 Reasons Create Playdate is Great for Little Ones</a></h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose dominion gathered winged morning man.
                                </p>
                                <a href="news-details.html" class="blog-one__link">Learn More</a>
                                <!-- /.blog-one__link -->
                            </div>
                            <!-- /.blog-one__content -->
                        </div>
                        <!-- /.blog-one__single -->
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="blog-one__single">
                            <div class="blog-one__image">
                                <img src="assets/images/blog/blog-1-3.jpg" alt="">
                                <div class="blog-one__date">
                                    <i class="far fa-calendar-alt"></i> Oct 25, 2020
                                </div>
                                <!-- /.blog-one__date -->
                            </div>
                            <!-- /.blog-one__image -->
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li><a href="#">By Diana Leach</a></li>
                                    <li><a href="#">03 Comments</a></li>
                                </ul>
                                <!-- /.blog-one__meta list-unstyled -->
                                <h3><a href="news-details.html">This List has been Turned into a Web App</a></h3>
                                <p>Man face fruit divided seasons herb from herb moveth whose dominion gathered winged morning man.
                                </p>
                                <a href="news-details.html" class="blog-one__link">Learn More</a>
                                <!-- /.blog-one__link -->
                            </div>
                            <!-- /.blog-one__content -->
                        </div>
                        <!-- /.blog-one__single -->
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.blog-one -->
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