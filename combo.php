<?php
include_once "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scalc=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>逍遙派休閒咖啡工坊-套餐DM</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/combo.css">
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
        <div class="container">
            <div class="row" id="header_row_one">
                <div class="col-12" id="header_breadcrumb_col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php" style="color:#696969;">首頁</a></li>
                            <li class="breadcrumb-item"><a href="#">精選套餐介紹</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row" id="header_row_two">
                <?php header_option("no-01","no-08")?>
            </div>
        </div>
    </header>
    <main>
        <section  id="cm_hot">
            <div class="container">
                <hr>
                <div class="row" id="cm_hot-one">
                    <?php main_hot("no-01","","");?>
                </div>
                <!-- 作個分隔線，以利辨識 -->
                <hr>
                <div class="row" id="cm_hot-two">
                    <?php main_hot("no-02","order_article","order_img");?>
                </div>  
            <hr>
            </div>
        </section>
        <section id="cm_other">
            <div class="container">
                <div class="row justify-content-around pr-4 pl-4">
                    <?php main_other("no-03","no-08");?>
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