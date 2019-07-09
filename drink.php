<?php
include_once "function.php";
if(!isset($_GET["kind"])) $_GET["kind"] = "coffee";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scalc=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>逍遙派休閒咖啡工坊-飲品項目DM</title>

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
<body>
    <div class="container">
        <?php navbar();?>
    </div>
    <header>
        <div class="container">
            <div class="row justify-content-end" id="header_title">
                <div class="col-12 align-self-center text-center"><h2 class="mb-0">飲品&咖啡豆DM</h2></div>
            </div>
            <div class="row" id="breadcrumb">
                <div class="col-lg-6 col-12" id="select_col-left">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
                            <li class="breadcrumb-item"><a href="drink.php">飲品&咖啡豆DM</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php
                                    if($_GET["kind"] == "coffee") echo "咖啡飲品";
                                    elseif($_GET["kind"] == "other") echo "其它飲品";
                                    elseif($_GET["kind"] == "beans") echo "嚴選咖啡豆商品";
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
                            <a class="dropdown-item" href="?type=drink&kind=coffee">咖啡飲品</a>
                            <a class="dropdown-item" href="?type=drink&kind=other">其它飲品</a>
                            <a class="dropdown-item" href="?type=drink&kind=beans">嚴選咖啡豆商品</a>
                        </div>
                    </div>
                    <div class="dropdown" id="select_items">
                        <button class="btn btn-secondary dropdown-toggle border-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            請選擇商品項目名稱
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php drink_items($_GET["kind"]);?>
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
                    <?php drink_page($_GET["kind"]);?>
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

    
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/slick/slick.min.js"></script>
    <script src="/js/myjs.js"></script>
</body>
</html>