<?php
include_once "function.php";
if(!isset($_GET["kind"])) $_GET["kind"] = "cake";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scalc=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>逍遙派休閒咖啡工坊-甜點品項DM</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/a_la_carte.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/slick/slick.css">
    <link rel="stylesheet" href="/slick/slick-theme.css">
    <link rel="shortcut icon" href="/images/logo-admin.png">

</head>
<body style="">
    <div class="container">
        <?php navbar();?>
    </div>
    <header>
        <div class="container">
            <div class="row justify-content-end" id="header_title">
                <div class="col-12 align-self-center text-center">
                    <h2 class="mb-0">甜點品項DM</h2>
                </div>
            </div>
            <div class="row" id="breadcrumb">
                <div class="col-lg-6 col-12" id="select_col-left">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
                            <li class="breadcrumb-item"><a href="a_la_carte.php">甜點品項DM</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php
                                    if($_GET["kind"] == "cake") echo "蛋糕類型商品";
                                    elseif($_GET["kind"] == "macaron") echo "馬卡龍(法式小圓餅)商品";
                                    elseif($_GET["kind"] == "candy") echo "糖菓類型商品";
                                    elseif($_GET["kind"] == "egg_tart") echo "蛋塔類型商品";
                                ?>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-12" id="select_col-right">
                    <div class="dropdown" id="select_type">
                        <button class="btn btn-secondary dropdown-toggle border-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            請選擇商品類型
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="?type=a_la_carte&kind=cake">蛋糕類型商品</a>
                            <a class="dropdown-item" href="?type=a_la_carte&kind=macaron">馬卡龍(法式小圓餅)商品</a>
                            <a class="dropdown-item" href="?type=a_la_carte&kind=candy">糖菓類商品</a>
                            <a class="dropdown-item" href="?type=a_la_carte&kind=egg_tart">蛋塔類型商品</a>
                        </div>
                    </div>
                    <div class="dropdown" id="select_items">
                        <button class="btn btn-secondary dropdown-toggle border-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            請選擇商品項目名稱
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php a_la_carte_items($_GET["kind"]);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <table class="table table-striped" id="a_la_carte_tab">
                <tbody>
                    <?php a_la_carte__page($_GET["kind"]);?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <div class="container-fluid">
            <div class="row" id="footer_box">
                <?php footer_main();?>
            </div>
        </div>
    </footer>
</div>
    
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/slick/slick.min.js"></script>
    <script src="/js/myjs.js"></script>
</body>
</html>