<?php
include_once "view_admin.php";

if(isset($_SESSION["user_id"])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scalc=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>逍遙派休閒咖啡工坊-後台管理</title>

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
        <?php header_nav_admin();?>
    </div>
    <div class="container m-0" style="max-width:100%;">
        <div class="row justify-content-end">
            <div class="col-2" id="nav_col">
                <?php nav_main_admin();?>
            </div>
            <div class="col-10 p-0" id="main_col">
                <div class="col-12 w-100" id="breadcrumb" style="border-bottom: 1px solid slategray;">
                    <?php breadcrumb_main_admin();?>
                </div>
                <div class="w-100"></div>
                <div class="col-12" id="main_table">
                    <?php
                        if(!$_GET) index_admin();
                        elseif($_GET["do"] == "billboard") billboard_main_admin();
                        elseif($_GET["do"] == "combo") combo_main_admin();
                        elseif($_GET["do"] == "a_la_carte") sale_main_admin();
                        elseif($_GET["do"] == "drink") drink_main_admin();
                        elseif($_GET["do"] == "about_us") about_us_admin();
                        elseif($_GET["do"] == "footer") footer_admin();
                        elseif($_GET["do"] == "add"){
                            if($_GET["new"] == "billboard") billboard_news_admin();
                            elseif($_GET["new"] == "combo") combo_news_admin();
                            elseif($_GET["new"] == "sale") sale_news_admin();
                            elseif($_GET["new"] == "drink") drink_news_admin();
                            elseif($_GET["new"] == "about_us") about_us_news_admin();
                            elseif($_GET["new"] == "footer") footer_news_admin();
                        }
                        elseif($_GET["do"] == "acc_set" && $_SESSION["user_type"] == 1 or $_SESSION["user_type"] == 2)
                            account_set_up();
                    ?>
                </div>
                <div class="w-100"></div>
                <div class="col-12 bg-dark p-3 pb-2 fixed-bottom" id="footer">
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
<?php
}else{
        header("location:login.php");
}

?>
