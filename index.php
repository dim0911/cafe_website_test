<?php
include_once "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scalc=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>逍遙派休閒咖啡工坊-官方網站</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/mycss.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/slick/slick.css">
    <link rel="stylesheet" href="/slick/slick-theme.css">
    <link rel="shortcut icon" href="/images/logo-admin.png">

</head>
<body>
    <div class="container">
        <?php navbar();?>
    </div>
    <header>
        <div class="container-fluid">
            <div class="row bg-dark" id="header_car_bill">
                <div id="carouselExampleFade" class="col-lg-8 col-12 carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner" id="car_inner">
                        <?php header_carousel()?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="col-lg-4 col-12" id="header_billboard">
                    <div id="header_billboard_bg">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">最新消息</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">特價優惠</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">好康活動</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-sm table-hover mb-0" id="header_billboard_tab">
                                    <?php header_billboard("type=0");?>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table table-sm table-hover mb-0" id="header_billboard_tab">
                                    <?php header_billboard("type='sale'");?>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table table-sm table-hover mb-0" id="header_billboard_tab">
                                    <?php header_billboard("type='other'");?>
                                </table>
                            </div>
                            <div class="" id="see_all"><a href="billboard.php" class="" target="_blank">See All...</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col text-center" id="main_all_img">
                        <img src="/images/title_frame01.png" alt="">
                    </div>
                </div>
                <div class="row " id="main_carousel">
                    <?php main_combo();?>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col d-table text-center" id="main_all_img">
                        <img src="/images/title_frame02.png" alt="">
                    </div>
                </div>
                <div class="row bg-white" id="main_featured">
                    <div class="col" id="main_featured_col">
                        <div class="row d-flex" id="main_bi">
                            <?php main_sale_banner();?>
                        </div>
                        <hr class="">
                        <p class="text-center mb-2 font-weight-bold" id="sale_p">本期優惠</p>
                        <div class="row">
                            <?php main_sale();?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col text-center" id="main_all_img">
                        <img src="/images/title_frame03.png" alt="">
                    </div>
                </div>
                <div class="row" id="main_cb_ad">
                    <?php main_drink("no-01","no-06");?>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container-fluid">
            <div class="row" id="footer_box">
                <?php footer_main();?>
            </div>
        </div>
    </footer>
    
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/slick/slick.min.js"></script>
    <script src="/js/myjs.js"></script>
</body>
</html>