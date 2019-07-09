<?php
include_once "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scalc=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>逍遙派休閒咖啡工坊-關於我們</title>

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/about_us.css">
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
            <div class="container" id="breadcrumb_container">
                <div class="row" id="breadcrumb_row">
                    <div class="col-12" id="breadcrumb_col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php" style="color:#696969;">首頁</a></li>
                                <li class="breadcrumb-item"><a href="#">關於我們</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <?php about_as_idea();?>
            </div>
            <hr style="width:75%;align:center;margin:auto;">
            <div class="container" id="drink_container">
                <?php about_as_drink();?>
            </div>
            <hr style="width:75%;align:center;margin:auto;">
            <div class="container" id="traffic_container">
                <div class="row bg-dark" id="traffic">
                    <div class="col-lg-6 col-12" id="main_map">
                        <div class="img-thumbnail" id="bg">
                        <span class="anchor_point" id="traffic_ap"></span>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.0315468903464!2d121.44251431500557!3d24.99904398398882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34681d4d20ab3d15%3A0xd692fe2a049a7ac2!2z5rWu5rSy6Kaq5rCR5YWs5ZyS!5e0!3m2!1szh-TW!2stw!4v1559489300694!5m2!1szh-TW!2stw" width="400" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12" id="main_intro">
                        <table class="text-white" >
                            <tbody>
                                <tr>
                                    <td id="title">
                                        交通資訊
                                        <hr style="width:100%; margin:auto; align:center;border:0.3px solid white;">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex">
                                        <img src="/images/logo/other-logo02.png" alt="">
                                        <p class="mb-0">本店附設露天咖啡座，供顧客使用。</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex">
                                        <img src="/images/logo/other-logo02.png" alt="">
                                        <p class="mb-0">本店提供免費停車場，周邊也有許多機車停車格。</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex">
                                        <img src="/images/logo/other-logo02.png" alt="">
                                        <p class="mb-0">本店近 xx捷運站 x號出口，出捷運站後約步行10分鐘即可到達。</p>
                                    </td>
                                </tr>
                            </tbody>
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