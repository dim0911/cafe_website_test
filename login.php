<?php
include_once "view_admin.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scalc=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>逍遙派休閒咖啡工坊-管理登入</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/slick/slick.css">
    <link rel="stylesheet" href="/slick/slick-theme.css">
    <link rel="shortcut icon" href="/images/logo-admin.png">

</head>
<body>
    <div class="container m-0 p-0" style="max-width:100%;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div id="img-02_nav">
                    <a href="index.php" alt="回首頁"><img src="/images/nav_img_02.png" alt="回首頁" title="回首頁"></a>
                </div>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" id="ul_nav">
                    <li class="nav-item" id="nav-item">
                        <a class="nav-link text-white" href="billboard.php" target="_blank">熱門活動 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown" id="nav-item">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            關於我們
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="about_us.php?#idea_ap" target="_blank"><img src="/images/logo/other-logo01.png" alt="">經營理念</a>
                        <a class="dropdown-item" href="about_us.php?#drink_ap" target="_blank"><img src="/images/logo/other-logo01.png" alt="">本店介紹</a>
                        <a class="dropdown-item" href="about_us.php?#traffic_ap" target="_blank"><img src="/images/logo/other-logo01.png" alt="">交通資訊</a>
                    </li>
                    <li class="nav-item dropdown" id="nav-item">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            餐點介紹
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="combo.php" target="_blank"><img src="/images/logo/other-logo01.png" alt="">套餐資訊</a>
                        <a class="dropdown-item" href="a_la_carte.php" target="_blank"><img src="/images/logo/other-logo01.png" alt="">甜點商品</a>
                    </li>
                    <li class="nav-item dropdown" id="nav-item">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            咖啡物語
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="drink.php?type=drink&kind=coffee" target="_blank"><img src="/images/logo/other-logo01.png" alt="">咖啡飲品</a>
                        <a class="dropdown-item" href="drink.php?type=drink&kind=other" target="_blank"><img src="/images/logo/other-logo01.png" alt="">其它飲品</a>
                        <a class="dropdown-item" href="drink.php?type=drink&kind=beans" target="_blank"><img src="/images/logo/other-logo01.png" alt="">嚴選咖啡豆</a>
                    </li>
                </ul>
                <a class="navbar-brand" id="img-01_nav" href="#top" alt="回頂部"><img src="/images/nav_img_01.png" alt="導覽列logo" title="回頂部"></a>
            </div>
        </nav>
    </div>
    <div class="container m-0" style="max-width:100%;">
        <div class="row justify-content-end">
            <div class="col-2" id="nav_col">
                <nav class="nav">
                    <div class="navbar-brand w-100 m-0 text-center"><a href="login.php"><img src="/images/logo-admin.png" alt="回登入頁面" title="回登入頁面"></a></div>
                    <ul class="">
                        <li>
                            <div class="bg-dark" id="bg"><div id="dot"></div><a href="?login_do=register">申請管理帳號</a></div>
                        </li>
                        <li>
                            <div class="bg-dark" id="bg"><div id="dot"></div><a href="?login_do=forget">忘記密碼</a></div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-10 p-0" id="main_col">
                <div class="col-12 w-100" id="breadcrumb" style="border-bottom: 1px solid slategray;">
                    <nav aria-label="breadcrumb" id="breadcrumb_nav">
                        <ol class="breadcrumb mb-0 d-inline-block mr-auto" style="border-bottom:none;">
                            <li class="breadcrumb-item d-inline"><a href="index.php">後台管理</a></li>
                            <li class="breadcrumb-item d-inline <?php if(!empty($_GET["login_do"])) echo "active";?>" aria-current="page">
                                <?php
                                    if(!$_GET) echo "後台管理登入";
                                    elseif($_GET["login_do"] == "register") echo "申請管理帳號";
                                    elseif($_GET["login_do"] == "forget") echo "忘記密碼";
                                ?>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="w-100"></div>
                <div class="col-12 justify-content-center" id="main_login">
                    <div class="row w-100 h-100 m-0 p-0 justify-content-center">
                        <?php
                            if(!$_GET) login_verify();
                            elseif($_GET["login_do"] == "add_acc") echo "申請管理帳號";
                            elseif($_GET["login_do"] == "register") login_register();
                            elseif($_GET["login_do"] == "forget") login_forget();
                        ?>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-12 bg-dark p-3 pb-2" id="footer">
                    <div class="row ">
                        <div class="col-8 align-self-start text-center font-italic">
                            <span class=" font-weight-bold" style="color:rgb(159, 128, 96); font-size:2.5rem;">逍遙派</span>
                            <span class=" text-white font-weight-bold" style=" font-size:1.8rem;">休閒咖啡工坊</span>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-4 align-self-center text-center  font-italic">
                            <span class=" text-dark font-weight-bold" style="-webkit-text-stroke: 0.5px white;font-size:2.5rem;">後臺系統</span>
                        </div>
                        <div class="col-4 align-self-center text-right text-white">
                            © Copyright <script>document.write( new Date().getFullYear() )</script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>

    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/slick/slick.min.js"></script>
    <script src="/js/myjs.js"></script>
</body>
</html>
