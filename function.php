<?php
$link = mysqli_connect("localhost","root","","my_works_cafe");
mysqli_query($link,"set names utf8");

#index start -------------------------------------------------------------------------------------------------------------
#navbar 導覽列
function navbar(){
    global $link;
?>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
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
                    </div>
                </li>
                <li class="nav-item dropdown" id="nav-item">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        餐點介紹
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="combo.php" target="_blank"><img src="/images/logo/other-logo01.png" alt="">套餐資訊</a>
                        <a class="dropdown-item" href="a_la_carte.php" target="_blank"><img src="/images/logo/other-logo01.png" alt="">甜點商品</a>
                    </div>
                </li>
                <li class="nav-item dropdown" id="nav-item">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        咖啡物語
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="drink.php?type=drink&kind=coffee" target="_blank"><img src="/images/logo/other-logo01.png" alt="">咖啡飲品</a>
                        <a class="dropdown-item" href="drink.php?type=drink&kind=other" target="_blank"><img src="/images/logo/other-logo01.png" alt="">其它飲品</a>
                        <a class="dropdown-item" href="drink.php?type=drink&kind=beans" target="_blank"><img src="/images/logo/other-logo01.png" alt="">嚴選咖啡豆</a>
                    </div>
                </li>
            </ul>
            <a class="navbar-brand" id="img-01_nav" href="#top" alt="回頂部"><img src="/images/nav_img_01.png" alt="導覽列logo" title="回頂部"></a>
        </div>
    </nav>
<?php
}

#header的 輪播
function header_carousel(){
    global $link;

    $res = mysqli_query($link,"select * from header_billboard where display = 1 and number between 'no-01' and 'no-06' order by number");
    while($row = mysqli_fetch_array($res)){
        $introduction = $row[2];
        $intro_str = mb_substr($introduction,0,80);
    ?>
        <div class="carousel-item <?php if($row["number"] == "no-01") echo "active";?>" id="car_item">
            <a href="event.php?parm=<?=$row[3]?>" alt="<?=$row[1]?>" target="_blank">
                <img src="/images/<?=$row[4]?>/<?=$row[5]?>" title="<?=$row[1]?>" alt="<?=$row[1]?>">
                <div class="" id="narrative" style=" position: absolute; z-index: 1;">
                    <h4 class=" text-justify mb-0 font-weight-bold"><?=$row[1]?></h4>
                    <!--<p class=" text-left"><?=$intro_str?><?php if(mb_strlen($introduction) > 80) echo "...";?></p>-->
                </div>
            </a>    
        </div>
    <?php
    }
}

#首頁header的 公佈欄
function header_billboard($type){
    global $link;
    
    $res_all = mysqli_query($link,"select * from header_billboard where ".$type." and display = 1 order by date desc limit 0,6");
    while($row_all = mysqli_fetch_array($res_all)){
        $date_time = $row_all[9];
        $date = mb_substr($date_time,0,10);
        ?>
        <tr>
            <td class=" d-flex pb-1 text-justify" style="border-top:none;border-bottom:1px solid #dee2e6;">
                <img src="/images/logo/<?=$row_all[8]?>">
                <a class="text-dark" href="event.php?parm=<?=$row_all[3]?>" alt="<?=$row_all[1]?>" target="_blank"><p><?=$row_all[1]?></p></a>
            </td>
        </tr>        
        <?php
    }
    ?>
    <?php
}

#main的 精選套餐 輪播和文案 尚未完成(需要js)
function main_combo(){
    global $link;
    ?>
    <div class="col text-center" id="main_carousel_col">
        <div  class="center slider d-flex">
            <?php
            $res = mysqli_query($link,"select * from main_combo where display = 1 and number between 'no-01' and 'no-08' order by number");
            while($row = mysqli_fetch_array($res)){
                ?>
                <div id="bg_combo">
                    <a href="combo.php" alt="" target="_blank">
                        <img src="/images/cm/<?=$row[5]?>" class="w-100 img-thumbnail" id="<?=$row[1]?>">
                    </a>
                    <div class="mt-2"><h4 class="font-weight-bold text-white"><?=$row[1]?></h4></div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
}

#main的 本期主打 banner
function main_sale_banner(){
    global $link;

    $res_banner = mysqli_query($link,"select * from main_sale where display = 1 and number = 'no-banner'");
    $row_banner = mysqli_fetch_array($res_banner);
    ?>
    <div class="col-lg-8 col-12" id="main_bigad_one">
        <a href="a_la_carte.php?kind=<?=$row_banner[7]?>#<?=$row_banner[3]?>" alt="<?=$row_banner[1]?>" target="_blank"><img src="/images/<?=$row_banner[6]?>/<?=$row_banner[4]?>" class=" img-thumbnail" title="<?=$row_banner[1]?>" alt="<?=$row_banner[1]?>"></a>
    </div>
    <div class="col-lg-4 col-12 text-center" id="main_bigad_two">
        <div class="row h-100">
            <a class="w-100 h-100" href="a_la_carte.php?kind=<?=$row_banner[7]?>#<?=$row_banner[3]?>" alt="<?=$row_banner[1]?>" target="_blank" style="text-decoration:none;color:black;">
                <div class="col-12" id="title"><h4 class="mb-0 font-weight-bold"><?=$row_banner[1]?></h4></div>
                <div class="col-12" id="main">
                    <p class="mb-0 text-justify" ><?=$row_banner[2]?></p>
                </div>
            </a>    
        </div>
    </div>
   <?php
}
#main的 本期主打之 本期優惠
function main_sale(){
    global $link;

    $res = mysqli_query($link,"select * from main_sale where display = 1 and number between 'no-01' and 'no-04' order by number");
    while($row = mysqli_fetch_array($res)){
        $introduction = $row[2];
        $intro_str = mb_substr($introduction,0,100);
    ?>
    <div class="col-lg-3 col-6 d-flex" id="main_card">
        
            <div class="card p-1" id="main_card_img_p">
                <a href="a_la_carte.php?kind=<?=$row[7]?>#<?=$row[3]?>" alt="<?=$row[1]?>" target="_blank">    
                    <img src="/images/<?=$row[6]?>/<?=$row[4]?>" class="card-img-top" alt="<?=$row[3]?>">
                </a>    
                <div class="card-body" id="main_card_p">
                    <a href="a_la_carte.php?kind=<?=$row[7]?>#<?=$row[3]?>" alt="<?=$row[1]?>" target="_blank" style="text-decoration:none;color:black;">    
                        <h5 class=" text-center font-weight-bold"><hr><br><?=$row[1]?></h5>
                        <p class="card-text text-justify"><?=$intro_str?><?php if(mb_strlen($introduction) > 100) echo "...";?></p>
                    </a>
                </div>
            </div>
        
    </div>
    <?php
    }
}

#main的 咖啡物語
function main_drink(){
    global $link;

    $res_banner = mysqli_query($link,"select * from main_drink where display=1 and number ='no-banner'");
    $row_banner = mysqli_fetch_array($res_banner);
    ?>
    <div class="col p-0" id="col_banner">
        <a href="drink.php?kind=<?=$row_banner[7]?>#<?=$row_banner[3]?>" target="_blank">
            <img src="/images/<?=$row_banner[6]?>/<?=$row_banner[4]?>" title="<?=$row_banner[1]?>" alt="<?=$row_banner[1]?>">
        </a>
    </div>
    <div class="w-100"><hr></div>
    <div class="col"  id="col_ads">
        <div class="row">
            <?php
            $res = mysqli_query($link,"select * from main_drink where display = 1 and number between 'no-01' and 'no-06' order by number");
            while($row = mysqli_fetch_array($res)){
            ?>
                <div class="col-lg-2 col-4" id="card">
                    <a href="drink.php?kind=<?=$row[7]?>#<?=$row[3]?>" target="_blank" style="text-decoration:none;color:black;">
                        <img src="/images/<?=$row[6]?>/<?=$row[4]?>" class=" img-thumbnail" alt="<?=$row[1]?>" title="<?=$row[1]?>">
                        <p class="text-center font-weight-bold mb-0"><?=$row[1]?></p>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>    
        <?php
}
#index end -------------------------------------------------------------------------------------------------------------

#billboard 活動公佈欄頁面 start -----------------------------------------------------------------------------------------------------
function billboard_page($type){
    global $link;
    
    if(!isset($_GET["page"])) $page = 1;
    else $page = $_GET["page"];

    $s = $page*8-8;
    $res_all = mysqli_query($link,"select * from header_billboard where ".$type." and display = 1 order by date desc limit ".$s.",8");
    $res_num = mysqli_num_rows($res_all);
    while($row_all = mysqli_fetch_array($res_all)){
        $date_time = $row_all[9];
        $date = mb_substr($date_time,0,10);
        ?>
        <tbody>
            <tr>
                <th scope="row" class="p-0" style="width:4%; border-top:none;border-bottom:1px solid #FFFAFA;">
                    <a class="text-dark" href="event.php?parm=<?=$row_all[3]?>" alt="<?=$row_all[1]?>" target="_blank">    
                        <img src="/images/logo/<?=$row_all[8]?>">
                    </a>
                </th>
                <td class="text-justify align-middle" style="width:81%;border-top:none;border-bottom:1px solid #FFFAFA;">
                    <a class="text-dark" href="event.php?parm=<?=$row_all[3]?>" alt="<?=$row_all[1]?>" target="_blank">    
                        <p class="mb-0"><?=$row_all[1]?></p>
                    </a>
                </td>
                <td class="text-right" id="date" style="width:15%;border-top:none;border-bottom:1px solid #FFFAFA;"><?=$date?></td>
            </tr>   
        </tbody>
        <?php
    }
}
#billboard end -------------------------------------------------------------------------------------------------------

#combo start -----------------------------------------------------------------------------------------------------------
#header 套餐選項
function header_option($no_first,$no_last){
    global $link;
    $res = mysqli_query($link,"select * from main_combo where display = 1 and number between '".$no_first."' and '".$no_last."' order by number");
    while($row = mysqli_fetch_array($res)){
    ?>
        <div class="col-lg-3 col-4" id="header_combo_col">
            <div class="row" id="combo_row">
                <div class="col-12" id="img_div">
                    <a href="#<?=$row[6]?>">
                        <div id="border">
                            <img class="img-thumbnail" src="/images/<?=$row[7]?>/<?=$row[5]?>" alt="<?=$row[1]?>" title="<?=$row[1]?>">
                            <p class="bg-dark"><?=$row[1]?></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <?php
    }
}
#main 主打套餐
function main_hot($no_hot,$order_img,$order_article){
    global $link;
    
    $res = mysqli_query($link,"select * from main_combo where display = 1 and number ='".$no_hot."'");
    $row = mysqli_fetch_array($res);
    ?>
    <span class="anchor_point" id="<?=$row[6]?>"></span>
    <div class="col-lg-5 col-12 align-self-end" id="<?=$order_img?>"><img src="/images/<?=$row[7]?>/<?=$row[5]?>" alt="<?=$row[1]?>" class="img-thumbnail"></div>
    <div class="col-lg-5 col-12 p-3 align-self-end" id="<?=$order_article?>">
        <article>
            <h3><?=$row[1]?></h3>
            <p class="mb-0"><?=$row[2]?></p>
        </article>
    </div>
    <div class="col-lg-2 col-12 align-self-end" id="order_price"><p class="mb-0"><?=$row[3]?></p></div>
    <?php
}
#main 其他套餐
function main_other($no_first,$no_last){
    global $link;
    
    $res = mysqli_query($link,"select * from main_combo where display = 1 and number between '".$no_first."' and '".$no_last."' order by number");
    while($row = mysqli_fetch_array($res)){
    ?>
    <div class="col-lg-4 col-6" id="other_main">
        <div class="card" id="card">
            <span class="anchor_point" id="<?=$row[6]?>"></span>
            <img src="/images/<?=$row[7]?>/<?=$row[5]?>" class="card-img-top" alt="<?=$row[1]?>">
            <div class="row card-body" id="card-body">
                <div class="col-12"><h4><?=$row[1]?></h3><p class="card-text"><?=$row[2]?></p></div>
                <div class="col-12 align-self-end"><p class="" id="other_price"><?=$row[3]?></p></div>
            </div>
        </div>
    </div>
    <?php
    }
}
#combo end -------------------------------------------------------------------------------------------------------------

#a_la_carte start ------------------------------------------------------------------------------------------------------
/*表格顯示內容*/
function a_la_carte__page($kind){
    global $link;
    
    $n=1;
    $res = mysqli_query($link,"select * from main_sale where display = 1 and  kind = '".$kind."' order by number");
    while($row = mysqli_fetch_array($res)){
    ?>
    <tr>
        <th scope="row"><?=$n?>.</th>
        <td>
            <div class="row" id="a_la_carte_row">
                <div class="col-lg-3 ">
                    <div id="item_img">
                        <span class="anchor_point" id="<?=$row[3]?>"></span>
                        <img src="/images/<?=$row[6]?>/<?=$row[4]?>" class=" img-fluid img-thumbnail border-0" alt="<?=$row[1]?>"></div>
                    <div><h5 class="mb-0"><?=$row[1]?></h5></div>
                </div>
                <div class="col-lg-9 ">
                    <div id="item_intro"><p class="mb-0 pt-1"><?=$row[2]?></p></div>
                </div>
                <div class="col align-self-end" id="item_price"><p class="mb-0"><?=$row[8]?></p></div>
            </div>
        </td>
    </tr>
    <?php
        $n++;
    }
}
/*商品項目下拉選單*/
function a_la_carte_items($kind){
    global $link;
    
    $res = mysqli_query($link,"select * from main_sale where display = 1 and  kind = '".$kind."' order by number");
    while($row = mysqli_fetch_array($res)){
    ?>
        <a class="dropdown-item" href="#<?=$row[3]?>"><?=$row[1]?></a>
    <?php
    }
}
#a_la_carte end ------------------------------------------------------------------------------------------------------

#drink start --------------------------------------------------------------------------------------------------------
/*表格顯示內容 和a_la_carte共用css*/
function drink_page($kind){
    global $link;
    
    $n=1;
    $res = mysqli_query($link,"select * from main_drink where display = 1 and  kind = '".$kind."' and number not like '%banner' order by number");
    while($row = mysqli_fetch_array($res)){
    ?>
    <tr>
        <th scope="row"><?=$n?>.</th>
        <td>
            <div class="row" id="a_la_carte_row">
                <div class="col-lg-3 ">
                    <div id="item_img">
                        <span class="anchor_point" id="<?=$row[3]?>"></span>
                        <img src="/images/<?=$row[6]?>/<?=$row[4]?>" class=" img-fluid img-thumbnail border-0" alt="<?=$row[1]?>"></div>
                    <div><h5 class="mb-0"><?=$row[1]?></h5></div>
                </div>
                <div class="col-lg-9 ">
                    <div id="item_intro"><p class="mb-0 pt-1"><?=$row[2]?></p></div>
                </div>
                <div class="col align-self-end" id="item_price"><p class="mb-0"><?=$row[8]?></p></div>
            </div>
        </td>
    </tr>
    <?php
        $n++;
    }
}
/*商品項目下拉選單*/
function drink_items($kind){
    global $link;
    
    $res = mysqli_query($link,"select * from main_drink where display = 1 and  kind = '".$kind."' and number not like '%banner%' order by number");
    while($row = mysqli_fetch_array($res)){
    ?>
        <a class="dropdown-item" href="#<?=$row[3]?>"><?=$row[1]?></a>
    <?php
    }
}
#drink end ----------------------------------------------------------------------------------------------------------

#about_us start ------------------------------------------------------------------------------------------------------
function about_as_idea(){
    global $link;
    
    $res_idea = mysqli_query($link,"select * from about_us where display = 1 and number = 'no-01'");
    $row_idea = mysqli_fetch_array($res_idea);
    ?>
    <span class="anchor_point" id="<?=$row_idea[5]?>"></span>
    <div class="row" id="idea">
        <div class="col-lg-12">
            <div class="row w-100 h-100 m-0" id="main_row">
                <div class="col-lg-7 col-12" id="main_img">
                    <img src="/images/about_us/<?=$row_idea[3]?>" alt="<?=$row_idea[1]?>">
                </div>
                <div class="col-lg-5 col-12" id="main_intro">
                    <h3><?=$row_idea[1]?></h3>
                    <div id="bg_range">
                        <div class="w-100 h-100" id="bg_color"><p class="mb-0"><?=$row_idea[2]?></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
function about_as_drink(){
    global $link;

        $res_drink = mysqli_query($link,"select * from about_us where display = 1 and number = 'no-02'");
        $row_drink = mysqli_fetch_array($res_drink);
    ?>
    <div class="row w-100 h-100 bg-dark" id="drink">  
        <div class="col-lg-7 col-12" id="main_intro">
            <h4><?=$row_drink[1]?></h4>
            <hr class="m-0" style="height:0.5px;">
            <div id="bg_range">
                <div id="bg_color"><p class="w-100 h-100 mb-0"><?=$row_drink[2]?></p></div>
            </div>
        </div>
        <div class="col-lg-5 col-12" id="main_img">
            <span class="anchor_point" id="<?=$row_drink[5]?>"></span>
            <img src="/images/about_us/<?=$row_drink[3]?>" alt="<?=$row_drink[1]?>" class=" img-thumbnail">
        </div>
    </div>      
<?php
    $res_dessert = mysqli_query($link,"select * from about_us where display = 1 and number = 'no-03'");
    $row_dessert = mysqli_fetch_array($res_dessert);
?>
    <div class="row w-100 h-100 border border-dark" id="dessert">  
        <div class="col-lg-5 col-12" id="main_img">
            <img src="/images/about_us/<?=$row_dessert[3]?>" alt="<?=$row_dessert[1]?>" class=" img-thumbnail">
        </div>
        <div class="col-lg-7 col-12 text-dark" id="main_intro">
            <h4><?=$row_dessert[1]?></h4>
            <hr class="m-0" style="height:0.5px;">
            <div id="bg_range">
                <div id="bg_color"><p class="w-100 h-100 mb-0"><?=$row_dessert[2]?></p></div>
            </div>
        </div>
    </div>      
<?php
}
#about_us end ------------------------------------------------------------------------------------------------------

#footer start ----------------------------------------------------------------------------------------------------
function footer_main(){
    global $link;
    ?>
    <!--版尾 LOGO資訊 and 夥伴登入 -->
    <div class="col-lg-4 col-12 mb-4">
        <table class=" text-secondary font-weight-bold" id="footer_tab">
            <?php
            $res_logo = mysqli_query($link,"select * from footer_table where type='logo' and display = 1");
            $row_logo = mysqli_fetch_array($res_logo);

            $res_login = mysqli_query($link,"select * from footer_table where link='login.php' and display = 1");
            $row_login = mysqli_fetch_array($res_login);
            ?>
            <tr>
                <td id="footer_logo">
                    <a href="#top" alt="回首頁"><img src="/images/logo/<?=$row_logo[3]?>" title="回首頁" alt="回首頁"></a>
                </td>    
            </tr>
            <tr>
                <td>
                    © Copyright <script>document.write( new Date().getFullYear() )</script>
                    <div class="mt-1" id="link_login"><a href="<?=$row_login[3]?>" alt="夥伴登入" target="_blank"><?=$row_login[2]?></a></div>
                </td>
            </tr>
        </table>
    </div>
    <!-- footer的 熱門活動 -->
    <div class="col-lg-4 col-12 mb-4">
        <table class=" text-secondary font-weight-bold" id="footer_tab">
            <tr>
                <td>
                    <h3 class=" text-white" id="footer_tab_hot">
                        <a class="text-white" href="billboard.php" alt="熱門活動" target="_blank">熱門活動</a>
                        <hr>
                    </h3>
                </td>
            </tr>
            <?php 
            $res = mysqli_query($link,"select * from header_billboard where display = 1 and number between 'no-01' and 'no-03' order by number limit 0,3");
            while($row = mysqli_fetch_array($res)){
            ?>
                <tr>
                    <td>
                        <a class="" href="event.php?parm=<?=$row[3]?>" alt="<?=$row[1]?>" target="_blank">
                            <p id="footer_tab_hot_p"><?=$row[1]?></p>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <!-- 關於我們 -->
    <div class="col-lg-4 col-12">
        <table class=" text-secondary font-weight-bold" id="footer_tab">
            <tr>
                <td>
                    <h3 class=" text-white text-center" id="footer_tab_about_us">
                        <a href="about_us.php" alt="關於我們" target="_blank">關於我們</a>
                        <hr>
                    </h3>
                </td>
            </tr>
            <?php
            $res = mysqli_query($link,"select * from footer_table where display = 1 and type = 'about_us'");
            while($row = mysqli_fetch_array($res)){
            ?>
                <tr>
                    <td>
                        <a class="" href="about_us.php?#<?=$row[3]?>" alt="<?=$row[1]?>" target="_blank"> 
                            <p class=" text-center"><?=$row[2]?></p>
                        </a>
                    </td>
                </tr>
            <?php
            }
            
            ?>
                <tr>
                    <td>
                        <p class=" text-center text-white fa-500px">本店服務專線: (02)xxxx-xxxx</p>
                    </td>
                </tr>
        </table>
    </div>    
    <?php
}
#footer end ----------------------------------------------------------------------------------------------------

#跳頁
function pagination($sql_column,$sql_type,$url_get){
    global $link;

    if(!isset($_GET["type"])) $_GET["type"] = 0;
    if(!isset($_GET["page"])) $page = 1;
    else $page = $_GET["page"];

    $s = $page*8-8;
    $res_num = mysqli_query($link,"select * from header_billboard where ".$sql_column."=".$sql_type." and display = 1");
    $row_judge_type = mysqli_fetch_array($res_num);
    $row_num = mysqli_num_rows($res_num);
    
    $num = ceil($row_num/8);
    $lp = $page-1;
    $rp = $page+1;
    if($lp<1) $lp = 1;
    if($rp>$num) $rp = $num;
    ?>
    <div class="col-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center" id="page_ul">
                <li class="page-item">
                <a class="page-link" href="?<?=$url_get?>=<?=$sql_type?>&page=<?=$lp?>#billboard_header" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
                <?php
                for($i=1; $i<=$num; $i++){
                ?>
                    <li class="page-item"><a class="page-link" href="?<?=$url_get?>=<?=$sql_type?>&page=<?=$i?>#billboard_header"><?=$i?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                <a class="page-link" href="?<?=$url_get?>=<?=$sql_type?>&page=<?=$rp?>#billboard_header" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>
    <?php
}
?>

