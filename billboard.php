<?php
include_once "function.php";

if(!isset($_GET["type"])) $_GET["type"] = 0;
if(!isset($_GET["page"])) $page = 1;
else $page = $_GET["page"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scalc=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>逍遙派休閒咖啡工坊-活動公佈欄</title>

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/billboard.css">
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
    <header id="billboard_header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>逍遙派活動公布欄</h1>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row" id="header_billboard_row">
                <div class="col-12 p-0" id="header_billboard">
                    <div id="header_billboard_bg">
                        <nav class="nav" id="title_nav">
                            <ul class="navbar mb-0">
                                <li class="nav-item" id="nav-item01"><a href="?#billboard_header">全部消息</a></li>
                                <li class="nav-item" id="nav-item02"><a href="?type='sale'#billboard_header">特價優惠</a></li>
                                <li class="nav-item" id="nav-item03"><a href="?type='other'#billboard_header">好康活動</a></li>
                            </ul>
                        </nav>
                        <div class="" id="nav-tabContent">
                            <div class="" id="tab_div">
                                <table class="table table-sm table-hover mb-0 text-center">
                                    <?php
                                        billboard_page("type=".$_GET['type']);
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php pagination("type",$_GET["type"],"type");?>
            </div>
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