<?php
include_once "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scalc=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>逍遙派休閒咖啡工坊-活動介紹頁面</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/event.css">
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
    <main>
        <?php
            $res_event = mysqli_query($link,"select * from header_billboard where  display=1 and url_get = '".$_GET["parm"]."'"); 
            $row_event = mysqli_fetch_array($res_event);
        ?>
        <div class="container" id="hot_event">
            <div class="row" id="hot_event_row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php" style="color:#696969;">首頁</a></li>
                            <li class="breadcrumb-item"><a href="#">活動介紹</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 col-12 text-center" id="hot_event_banner">
                    <img src="/images/<?=$row_event[4]?>/<?=$row_event[5]?>" alt="<?=$row_event[1]?>" title="<?=$row_event[1]?>" class=" img-thumbnail">                     
                </div>
                <div class="col-lg-12 col-12 text-center" id="hot_event_intro">
                    <div class="col-12 bg-dark" id="title_bg"><h2><?=$row_event[1]?></h2></div>
                    <div id="main_title">活動內容</div>
                    <p><?=$row_event[2]?></p>                     
                </div>
                <div class="w-100"></div>
                <div class="col-lg-12 col-12 text-center" id="disclaimer">
                    <table>
                        <tr>
                            <td><hr></td>
                        </tr>
                        <tr>
                            <td><h2>免責聲明</h2></span></td>
                        </tr>
                        <tr>
                            <td class=" d-flex"><span>1.</span><p>本活動店家保有活動最後解釋的權利。</p></td>
                        </tr>
                        <tr>
                            <td class=" d-flex"><span>2.</span><p>商品交易完成後視為顧客同意本活動內容，恕不退換商品。</p></td>
                        </tr>
                        <tr>
                            <td class=" d-flex"><span>3.</span><p>參加活動前請務必詳閱活動內文，或詢問店方人員，確保雙方權益。</p></td>
                        </tr>
                        <tr>
                            <td class=" d-flex"><span>4.</span><p>如活動有'加價或贈送之商品'且發生非人為缺損或毀壞之情形，請在24H之內向店方反映，經確認後店方將予以補發全新相同產品，如已無相同類型產品可補發，則將替換為等值之其他商品，或補發同等價值之折價券，以玆補償。</p> </td>
                        </tr>
                        <tr>
                            <td class=" d-flex"><span>5.</span><p>如活動有'加價或贈送之商品'，請恕無法挑選款式，商品款式採隨機發送，請見諒。</p></td>
                        </tr>
                    </table>
                </div>
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