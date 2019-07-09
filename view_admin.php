<?php
include_once "api_admin.php";

#跳頁
function pagination($table,$key,$url_get,$url_type){
    global $link;

    if(!isset($_GET["do"])) $_GET["do"] = 0;
    if(!isset($_GET["page"])) $page = 1;
    else $page = $_GET["page"];

    $s = $page*$key-$key;
    $res_num = mysqli_query($link,"select * from ".$table);
    $row_num = mysqli_num_rows($res_num);
    
    $num = ceil($row_num/$key);
    $lp = $page-1;
    $rp = $page+1;
    if($lp<1) $lp = 1;
    if($rp>$num) $rp = $num;
    ?>
    <div class=" d-inline-block">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center" id="page_ul">
                <li class="page-item">
                <a class="page-link" href="?<?=$url_get?>=<?=$url_type?>&page=<?=$lp?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
                <?php
                for($i=1; $i<=$num; $i++){
                ?>
                    <li class="page-item"><a class="page-link" href="?<?=$url_get?>=<?=$url_type?>&page=<?=$i?>"><?=$i?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                <a class="page-link" href="?<?=$url_get?>=<?=$url_type?>&page=<?=$rp?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>
    <?php
}
//後台管理的 頂部導覽列
function header_nav_admin(){
        ?>
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
            <div class="mt-2 mr-3 font-weight-bold" style= 'white-space:nowrap;font-size:16px;'><a class="text-decoration-none" href="api_admin.php?login_do=logout" alt="登出" onMouseOver="this.style.color='#FFF'" onMouseOut="this.style.color='#C0C0C0'" style="color:#C0C0C0;">帳號登出</a></div>    
            <a class="navbar-brand" id="img-01_nav" href="#top" alt="回頂部"><img src="/images/nav_img_01.png" alt="導覽列logo" title="回頂部"></a>
        </div>
    </nav>
<?php
}

//左側導覽列
function nav_main_admin(){
    ?>
    <nav class="nav">
    <div class="navbar-brand w-100 m-0 text-center"><a href="admin.php"><img src="/images/logo-admin.png" alt="回管理首頁" title="回管理首頁"></a></div>
    <ul class="">
        <li>
            <div class="bg-dark" id="bg"><div id="dot"></div><a href="?do=billboard&page=1">公佈欄管理</a></div>
        </li>
        <li>
            <div class="bg-dark" id="bg"><div id="dot"></div><a href="?do=combo&page=1">套餐DM管理</a></div>
        </li>
        <li>
            <div class="bg-dark" id="bg"><div id="dot"></div><a href="?do=a_la_carte&page=1">甜點DM管理</a></div>
        </li>
        <li>
            <div class="bg-dark" id="bg"><div id="dot"></div><a href="?do=drink&page=1">飲品DM管理</a></div>
        </li>
        <li>
            <div class="bg-dark" id="bg"><div id="dot"></div><a href="?do=about_us&page=1">關於我們設定</a></div>
        </li>
        <li>
            <div class="bg-dark" id="bg"><div id="dot"></div><a href="?do=footer&page=1">版尾設定</a></div>
        </li>
        <li>
            <div class="bg-dark dropdown" id="bg"><div id="dot"></div>
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        新增項目
                </a>
                <div class="dropdown-menu" id="news_dropdown" aria-labelledby="navbarDropdown">
                    <ul class="mt-0">
                        <li class="dropdown-item mb-1 p-0"><a class="text-dark text-left p-0" href="?do=add&new=billboard">新增公佈欄項目</a></li>
                        <li class="dropdown-item mb-1 p-0"><a class="text-dark text-left p-0" href="?do=add&new=combo">新增套餐DM項目</a></li>
                        <li class="dropdown-item mb-1 p-0"><a class="text-dark text-left p-0" href="?do=add&new=sale">新增甜點DM項目</a></li>
                        <li class="dropdown-item mb-1 p-0"><a class="text-dark text-left p-0" href="?do=add&new=drink">新增飲品DM項目</a></li>
                        <li class="dropdown-item mb-1 p-0"><a class="text-dark text-left p-0" href="?do=add&new=about_us">新增關於我們</a></li>
                        <li class="dropdown-item mb-1 p-0"><a class="text-dark text-left p-0" href="?do=add&new=footer">新增版尾項目</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <?php 
        if($_SESSION["user_type"] == 1 or $_SESSION["user_type"] == 2){
        ?>
            <li>
                <div class="bg-dark" id="bg"><div id="dot"></div><a href="?do=acc_set&page=1">後台帳號管理</a></div>
            </li>        
        <?php
        }
        ?>

    </ul>
    </nav>
<?php
}

//麵包屑
function breadcrumb_main_admin(){
    ?>
    <nav aria-label="breadcrumb" id="breadcrumb_nav">
        <ol class="breadcrumb mb-0 d-inline-block mr-auto" style="border-bottom:none;">
            <li class="breadcrumb-item d-inline"><a href="index.php">後台管理</a></li>
            <li class="breadcrumb-item d-inline <?php if($_GET["do"] !== "add") echo "active";?>" aria-current="page">
                <?php
                    if(!$_GET) echo "首頁";
                    elseif($_GET["do"] == "billboard") echo "公佈欄管理";
                    elseif($_GET["do"] == "combo") echo "套餐DM管理";
                    elseif($_GET["do"] == "a_la_carte") echo "甜點DM管理";
                    elseif($_GET["do"] == "drink") echo "飲品DM管理";
                    elseif($_GET["do"] == "about_us") echo "關於我們設定";
                    elseif($_GET["do"] == "footer") echo "版尾設定";
                    elseif($_GET["do"] == "add") echo "新增項目";
                    elseif($_GET["do"] == "acc_set") echo "後台帳號管理";
                ?>
            </li>
            <?php
            if(isset($_GET["do"]) && $_GET["do"] == "drink"){
            ?>
                <li class="breadcrumb-item d-inline">
                    <div class="dropdown d-inline">
                        <button class="btn btn-secondary btn-sm  d-inline-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                            if(empty($_GET["child"]) || $_GET["child"] == "banner")
                                echo "banner設定";
                            elseif($_GET["do"] == "drink" && $_GET["child"] == "dm")
                                echo "商品資訊設定";
                        ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="?do=drink&child=banner&page=1">banner設定</a>
                            <a class="dropdown-item" href="?do=drink&child=dm&page=1">商品資訊設定</a>
                        </div>
                    </div>
                </li>
            <?php
            }
            if(!empty($_GET["do"]) && $_GET["do"] == "add"){
            ?>
            <li class="breadcrumb-item d-inline active" aria-current="page">
                <?php
                    if($_GET["new"] == "billboard") echo "新增公佈欄項目";
                    elseif($_GET["new"] == "combo") echo "新增套餐DM項目";
                    elseif($_GET["new"] == "sale") echo "新增甜點DM項目";
                    elseif($_GET["new"] == "drink") echo "新增飲品DM項目";
                    elseif($_GET["new"] == "about_us") echo "新增關於我們";
                    elseif($_GET["new"] == "footer") echo "新增版尾項目";
                    ?>

            </li>
            <?php 
            }
            if(!empty($_GET["do"]) && $_GET["do"] == "acc_set"){
                global $link;
            ?>
            <li class="breadcrumb-item d-inline">
                <div class="dropdown d-inline">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php 
                        if(isset($_GET["dd_type"])){
                            if($_GET["dd_type"] > $_SESSION["user_type"])
                                echo $_GET["dd_type"]; 
                            else echo "請選擇權限";
                        } 
                        else echo "請選擇權限";
                    ?>
                        
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item d-block <?php if(!isset($_GET["dd_type"])) echo "active";?>" href="?do=acc_set&page=1">請選擇權限</a>
                        <?php
                        $drop_down_res = mysqli_query($link,"select type_admin from user_admin where type_admin > ".$_SESSION["user_type"]." and display_admin = 1 group by type_admin order by type_admin");
                        while($drop_down_row = mysqli_fetch_array($drop_down_res)[0]){
                        ?>
                            <a class="dropdown-item d-block <?php if(isset($_GET["dd_type"]) && $_GET["dd_type"] == $drop_down_row) echo "active";?>" href="?do=acc_set&page=1&dd_type=<?=$drop_down_row?>"><?=$drop_down_row?></a>        
                        <?php
                        }
                        ?>    
                    </div>
                </div>
            </li>
            <?php 
            }
            ?>
        </ol>

        <div class=" d-inline mt-3 float-right text-danger font-weight-bold" style= 'white-space:nowrap;font-size:16px;'>
            <?php echo "<span class='text-dark' style='font-weight: bold;'>管理者: </span>".$_SESSION["user_id"];?>
        </div>
    </nav>
<?php
}

//admin首頁
function index_admin(){
?>
    <div class="w-100" id="index_bg">
        <div class="row w-100 h-100 m-0 justify-content-center ">
            <div class="col-10 h-50" style="top:20%;">
                <div class="row"></div>
                    <div class="col-12 font-weight-bold font-italic text-center" id="index_text_top">
                        <p class=" d-inline-block text-left">
                            <span style="color:	#844200; font-size:6rem;">逍遙派</span><br><span class="text-white" style="font-size:4rem; -webkit-text-stroke: 2px black">休閒咖啡工坊</span>
                        </p>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-12 font-weight-bold text-right" id="index_text_bottom">後臺管理</div>
                </div>
            </div>
        </div>
    </div>
<?php
}
//公佈欄設定-內容區塊
function billboard_main_admin(){
    global $link;

    ?>
    <form action="api_admin.php?work=billboard&page=<?=$_GET["page"]?>" method="post" enctype="multipart/form-data">
        <table class="table" id="billboard">
            <thead>
                <tr>
                    <th width="20%" class="text-left pl-3">圖片</th>
                    <th width="20%">主旨&日期</th>
                    <th width="30%">內文</th>
                    <th width="10%">輪播&類型</th>
                    <th width="10%">type圖標</th>
                    <th width="10%">刪除</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(!isset($_GET["do"])) $_GET["do"] = 0;
            if(!isset($_GET["page"])) $page = 1;
            else $page = $_GET["page"];
        
            $s = $page*4-4;
            $res = mysqli_query($link,"select * from header_billboard order by number,date desc limit ".$s.",4");
            while($row = mysqli_fetch_array($res)){
            ?>
            <tr>
                <td class=" text-left">
                    <img class="img-thumbnail" id="billboard_img" src="/images/<?=$row[4]?>/<?=$row[5]?>" alt="<?=$row[5]?>" title="<?=$row[5]?>">
                    <input type="file" name="billboard_file[]" id="billboard_file">
                </td>
                <td>
                    <textarea name="billboard_sub[]" id="" cols="20" rows="3"><?=$row[1]?></textarea>
                    <div class="">
                        <input type="text" name="billboard_date[]" id="" value="<?=$row[9]?>" style="width:100%;">
                    </div>
                </td>
                <td><textarea name="billboard_intro[]" id="" cols="30" rows="6"><?=$row[2]?></textarea></td>
                <td class="text-center">
                    <select class="mb-2" name="number_select[]" id="number">
                    <?php
                        for($i=1; $i<=6;$i++){
                            $no_xx = 'no-0'.$i;
                            ?>
                            <option value="<?=$no_xx?>" <?php if($no_xx == $row[6]) echo "selected";?>>
                                <?=$no_xx?>
                            </option>
                            <?php
                        }    
                    ?>
                            <option value="no-none" <?php if($row[6] == "no-none") echo "selected";?>>no-none</option>
                    </select>
                    <select id="type" name="type_select[]">
                        <option value="sale" <?php if($row[7] == "sale") echo "selected";?>>sale</option>
                        <option value="other" <?php if($row[7] == "other") echo "selected";?>>other</option>
                    </select>
                    <div class="mt-3">
                        <p class=" d-inline mb-0">顯示中:</p> 
                        <input type="hidden" name="display[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法-->
                        <input type="checkbox" name="display[]" class="d-inline" id="checkbox" value="<?=$row[0]?>" <?php if($row[10] == 1) echo "checked";?>>
                    </div>
                </td>
                <td class="text-center">
                    <img class="" id="type_img" src="/images/logo/<?=$row[8]?>" alt="">
                    <input type="file" name="type_file[]" id="type_file">
                </td>
                <td class="text-center">
                    <input type="hidden" name="delete[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法-->
                    <input type="checkbox" name="delete[]" id="checkbox" value="<?=$row[0]?>">
                </td>
                <input type="hidden" name="id[]" id="" value="<?=$row[0]?>">
            </tr>
        <?php
        }
        ?>
            </tbody>
        </table>
        <div class="text-center">
            <?php pagination("header_billboard",4,"do","billboard");?>
            <div class=" d-inline-block float-right">
                <input type="submit" name="submit" class="" id="" value="送出">
                <input type="reset" name="reset" class="" id="" value="重置">
            </div>
        </div>
    </form>
<?php
}

//套餐DM管理-內容區塊，套用公佈欄的css
function combo_main_admin(){
    global $link;
?>
    <form action="api_admin.php?work=combo&page=<?=$_GET["page"]?>" method="post" enctype="multipart/form-data">
        <table class="table" id="billboard">
            <thead>
                <tr>
                    <th width="20%" class="text-left pl-3">圖片</th>
                    <th width="20%">標題</th>
                    <th width="30%">內文</th>
                    <th width="10%">售價</th>
                    <th width="10%">排序&顯示中</th>
                    <th width="10%">刪除</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(!isset($_GET["do"])) $_GET["do"] = 0;
            if(!isset($_GET["page"])) $page = 1;
            else $page = $_GET["page"];
        
            $s = $page*4-4;
            $res = mysqli_query($link,"select * from main_combo order by number limit ".$s.",4");
            while($row = mysqli_fetch_array($res)){
            ?>
            <tr>
                <td class=" text-left">
                    <img class="img-thumbnail" id="combo_img" src="/images/<?=$row[7]?>/<?=$row[5]?>" alt="<?=$row[5]?>" title="<?=$row[5]?>">
                    <input type="file" name="combo_file[]" id="billboard_file">
                </td>
                <td><textarea name="combo_title[]" id="" cols="18" rows="3"><?=$row[1]?></textarea></td>
                <td><textarea name="combo_intro[]" id="" cols="32" rows="6"><?=$row[2]?></textarea></td>
                <td class="text-center">
                    <input type="text" name="combo_price[]" id="" value="<?=$row[3]?>" style="width:8rem;">
                </td>
                <td class="text-center">
                    <select class="mb-2" name="number_select[]" id="number">
                    <?php
                        for($i=1; $i<=8;$i++){
                            $no_xx = 'no-0'.$i;
                            ?>
                            <option value="<?=$no_xx?>" <?php if($no_xx == $row[6]) echo "selected";?>>
                                <?=$no_xx?>
                            </option>
                            <?php
                        }    
                    ?>
                            <option value="no-none" <?php if($row[6] == "no-none") echo "selected";?>>no-none</option>
                    </select>
                    <div class="mt-3">
                        <p class=" d-inline mb-0">顯示中:</p> 
                        <input type="hidden" name="display[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法-->
                        <input type="checkbox" name="display[]" class="d-inline" id="checkbox" value="<?=$row[0]?>" <?php if($row[8] == 1) echo "checked";?>>
                    </div>
                </td>
                <td class=" text-center">
                    <input type="hidden" name="delete[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法-->
                    <input type="checkbox" name="delete[]" id="checkbox" value="<?=$row[0]?>">
                </td>
                <input type="hidden" name="id[]" id="" value="<?=$row[0]?>">
            </tr>
        <?php
        }
        ?>
            </tbody>
        </table>
        <div class="text-center">
            <?php pagination("main_combo",4,"do","combo");?>
            <div class=" d-inline-block float-right">
                <input type="submit" name="submit" class="" id="" value="送出">
                <input type="reset" name="reset" class="" id="" value="重置">
            </div>
        </div>
    </form>
<?php
}

//甜點DM管理-內容區塊，套用公佈欄的css
function sale_main_admin(){
    global $link;
?>
    <form action="api_admin.php?work=a_la_carte&page=<?=$_GET["page"]?>" method="post" enctype="multipart/form-data">
        <table class="table" id="billboard">
            <thead>
                <tr>
                    <th width="20%" class="text-left pl-3">圖片</th>
                    <th width="20%">標題</th>
                    <th width="30%">內文</th>
                    <th width="10%">售價</th>
                    <th width="10%">排序&類型</th>
                    <th width="10%">刪除</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(!isset($_GET["do"])) $_GET["do"] = 0;
            if(!isset($_GET["page"])) $page = 1;
            else $page = $_GET["page"];
        
            $s = $page*4-4;
            $res = mysqli_query($link,"select * from main_sale order by number limit ".$s.",4");
            while($row = mysqli_fetch_array($res)){
            ?>
            <tr>
                <td class=" text-left">
                    <img class="img-thumbnail" id="billboard_img" src="/images/<?=$row[6]?>/<?=$row[4]?>" alt="<?=$row[4]?>" title="<?=$row[4]?>">
                    <input type="file" name="sale_file[]" id="billboard_file">
                </td>
                <td><textarea name="sale_title[]" id="" cols="15" rows="3"><?=$row[1]?></textarea></td>
                <td><textarea name="sale_intro[]" id="" cols="30" rows="6"><?=$row[2]?></textarea></td>
                <td class="text-center">
                    <input type="text" name="sale_price[]" id="" value="<?=$row[8]?>" style="width:8rem;">
                </td>
                <td class="text-center">
                    <select class="mb-2" name="number_select[]" id="number">
                    <?php
                        for($i=1; $i<=4;$i++){
                            $no_xx = 'no-0'.$i;
                            ?>
                            <option value="<?=$no_xx?>" <?php if($no_xx == $row[5]) echo "selected";?>>
                                <?=$no_xx?>
                            </option>
                            <?php
                        }    
                    ?>
                            <option value="no-none" <?php if($row[5] == "no-none") echo "selected";?>>no-none</option>
                            <option value="no-banner" <?php if($row[5] == "no-banner") echo "selected";?>>no-banner</option>
                    </select>
                    <select id="type" name="type_select[]">
                        <option value="cake" <?php if($row[7] == "cake") echo "selected";?>>cake</option>
                        <option value="macaron" <?php if($row[7] == "macaron") echo "selected";?>>macaron</option>
                        <option value="candy" <?php if($row[7] == "candy") echo "selected";?>>candy</option>
                        <option value="egg_tart" <?php if($row[7] == "egg_tart") echo "selected";?>>egg_tart</option>
                    </select>
                    <div class="mt-3">
                        <p class=" d-inline mb-0">顯示中:</p>
                        <input type="hidden" name="display[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法--> 
                        <input type="checkbox" name="display[]" class="d-inline" id="checkbox" value="<?=$row[0]?>" <?php if($row[9] == 1) echo "checked";?>>
                    </div>
                </td>
                <td class="text-center">
                    <input type="hidden" name="delete[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法-->
                    <input type="checkbox" name="delete[]" id="checkbox" value="<?=$row[0]?>">
                </td>
                <input type="hidden" name="id[]" id="" value="<?=$row[0]?>">
            </tr>
        <?php
        }
        ?>
            </tbody>
        </table>
        <div class="text-center">
            <?php pagination("main_sale",4,"do","a_la_carte");?>
            <div class=" d-inline-block float-right">
                <input type="submit" name="submit" class="" id="" value="送出">
                <input type="reset" name="reset" class="" id="" value="重置">
            </div>
        </div>
    </form>
<?php
}

//飲品DM管理-內容區塊，套用公佈欄的css
function drink_main_admin(){
    global $link;
?>
    <form action="api_admin.php?work=drink&<?php if(empty($_GET["child"])) echo "child=banner";else echo "child=".$_GET["child"];?>&page=<?=$_GET["page"]?>" method="post" enctype="multipart/form-data">
        <table class="table" id="billboard">
            <thead>
                <tr>
                    <th width="20%" class="text-left pl-3">圖片</th>
                    <th width="20%">標題</th>
                    <th width="30%">內文</th>
                    <th width="10%">售價</th>
                    <th width="10%">排序&類型</th>
                    <th width="10%">刪除</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(!isset($_GET["do"])) $_GET["do"] = 0;
            if(!isset($_GET["page"])) $page = 1;
            else $page = $_GET["page"];
        
            $s = $page*4-4;

            if(empty($_GET["child"]) || $_GET["child"] == "banner") 
                $res = mysqli_query($link,"select * from main_drink where introduction like 'banner%' order by number limit ".$s.",4");
            elseif($_GET["child"] == "dm") 
                $res = mysqli_query($link,"select * from main_drink where introduction not like 'banner%' order by number limit ".$s.",4");
            while($row = mysqli_fetch_array($res)){
            ?>
            <tr>
                <td class=" text-left">
                    <img class="img-thumbnail" id="billboard_img" src="/images/<?=$row[6]?>/<?=$row[4]?>" alt="<?=$row[4]?>" title="<?=$row[4]?>">
                    <input type="file" name="drink_file[]" id="billboard_file">
                </td>
                <td><textarea name="drink_title[]" id="" cols="18" rows="3"><?=$row[1]?></textarea></td>
                <td><textarea name="drink_intro[]" id="" cols="32" rows="6"><?=$row[2]?></textarea></td>
                <td class="text-center">
                    <input type="text" name="drink_price[]" id="" value="<?=$row[8]?>" style="width:8rem;">
                </td>
                <td class="text-center">
                    <select class="mb-2" name="number_select[]" id="number">
                    <?php
                        for($i=1; $i<=6;$i++){
                            $no_xx = 'no-0'.$i;
                            ?>
                            <option value="<?=$no_xx?>" <?php if($no_xx == $row[5]) echo "selected";?>>
                                <?=$no_xx?>
                            </option>
                            <?php
                        }    
                    ?>
                            <option value="no-none" <?php if($row[5] == "no-none") echo "selected";?>>no-none</option>
                            <option value="no-banner" <?php if($row[5] == "no-banner") echo "selected";?>>no-banner</option>
                    </select>
                    <select id="type" name="type_select[]">
                        <option value="coffee" <?php if($row[7] == "coffee") echo "selected";?>>coffee</option>
                        <option value="other" <?php if($row[7] == "other") echo "selected";?>>other</option>
                        <option value="beans" <?php if($row[7] == "beans") echo "selected";?>>beans</option>
                    </select>
                    <div class="mt-3">
                        <p class=" d-inline mb-0">顯示中:</p>
                        <input type="hidden" name="display[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法--> 
                        <input type="checkbox" name="display[]" class="d-inline" id="checkbox" value="<?=$row[0]?>" <?php if($row[9] == 1) echo "checked";?>>
                    </div>
                </td>
                <td class="text-center">
                    <input type="hidden" name="delete[]" value="a"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法-->
                    <input type="checkbox" name="delete[]" id="checkbox" value="<?=$row[0]?>">
                </td>
                <input type="hidden" name="id[]" id="" value="<?=$row[0]?>">
            </tr>
        <?php
        }
        ?>
            </tbody>
        </table>
        <div class="text-center">
            <?php
                if(empty($_GET["child"]) || $_GET["child"] == "banner") 
                    pagination("main_drink where introduction like 'banner%'",4,"do","drink&child=banner");
                elseif($_GET["child"] == "dm") 
                    pagination("main_drink where introduction not like 'banner%'",4,"do","drink&child=dm");
            ?>
            <div class=" d-inline-block float-right">
                <input type="submit" name="submit" class="" id="" value="送出">
                <input type="reset" name="reset" class="" id="" value="重置">
            </div>
        </div>
    </form>
<?php
}

//關於我們設定-內容區塊，套用公佈欄的css
function about_us_admin(){
    global $link;
?>
    <form action="api_admin.php?work=about_us&page=<?=$_GET["page"]?>" method="post" enctype="multipart/form-data">
        <table class="table" id="billboard">
            <thead>
                <tr>
                    <th width="20%" class="text-left pl-3">圖片</th>
                    <th width="20%">標題</th>
                    <th width="30%">內文</th>
                    <th width="10%">排序&錨點</th>
                    <th width="10%">顯示中</th>
                    <th width="10%">刪除</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(!isset($_GET["do"])) $_GET["do"] = 0;
            if(!isset($_GET["page"])) $page = 1;
            else $page = $_GET["page"];
        
            $s = $page*4-4;
            $res = mysqli_query($link,"select * from about_us order by number limit ".$s.",4");
            while($row = mysqli_fetch_array($res)){
            ?>
                <tr>
                    <td class=" text-left">
                        <img class="img-thumbnail" id="billboard_img" src="/images/about_us/<?=$row[3]?>" alt="<?=$row[3]?>" title="<?=$row[3]?>">
                        <input type="file" name="abouts_us_file[]" id="billboard_file">
                    </td>
                    <td><textarea name="abouts_us_title[]" id="" cols="25" rows="3"><?=$row[1]?></textarea></td>
                    <td><textarea name="abouts_us_intro[]" id="" cols="30" rows="6"><?=$row[2]?></textarea></td>
                    <td class="text-center">
                        <select class="mb-2" id="number" name="number_select[]">
                        <?php
                            for($i=1; $i<=3;$i++){
                                $no_xx = 'no-0'.$i;
                            ?>
                                <option value="<?=$no_xx?>" <?php if($no_xx == $row[6]) echo "selected";?>>
                                    <?=$no_xx?>
                                </option>
                            <?php   
                            } 
                            ?>
                                <option value="no-none" <?php if($row[6] == "no-none") echo "selected";?>>no-none</option>
                        </select>
                        <select id="type" name="type_ap_select[]">
                            <option value="idea_ap" <?php if($row[5] == "idea_ap") echo "selected";?>>idea_ap</option>
                            <option value="drink_ap" <?php if($row[5] == "drink_ap") echo "selected";?>>drink_ap</option>
                            <option value="dessert_ap" <?php if($row[5] == "dessert_ap") echo "selected";?>>dessert_ap</option>
                        </select>
                    </td>
                    <td class="text-center">
                        <input type="hidden" name="display[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法-->
                        <input type="checkbox" name="display[]" class="d-inline" id="checkbox" value="<?=$row[0]?>" <?php if($row[7] == 1) echo "checked";?>>
                    </td>
                    <td class=" text-center">
                        <input type="hidden" name="delete[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法-->
                        <input type="checkbox" name="delete[]" id="checkbox" value="<?=$row[0]?>">
                    </td>
                    <input type="hidden" name="id[]" id="" value="<?=$row[0]?>">
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>

        <div class="text-center">
            <?php pagination("about_us",4,"do","about_us");?>
            <div class=" d-inline-block float-right">
                <input type="submit" name="submit" class="" id="" value="送出">
                <input type="reset" name="reset" class="" id="" value="重置">
            </div>
        </div>
    </form>
<?php
}

//版尾設定-內容區塊，套用公佈欄的css
function footer_admin(){
global $link;
?>
    <form action="api_admin.php?work=footer&page=<?=$_GET["page"]?>" method="post" enctype="multipart/form-data">
        <table class="table" id="footer_admin">
            <thead class="table w-100">
                <tr>
                    <th width="25%" class="text-left" id="th_01">類別</th>
                    <th width="25%" id="th_01">logo域名</th>
                    <th width="30%" id="th_01">logo圖檔</th>
                    <th width="10%" id="th_01">顯示中</th>
                    <th width="10%" id="th_01">刪除</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(!isset($_GET["do"])) $_GET["do"] = 0;
            if(!isset($_GET["page"])) $page = 1;
            else $page = $_GET["page"];
        
            $s = $page*4-4;
            $res_logo = mysqli_query($link,"select * from footer_table where type='logo'");
            while($row_logo = mysqli_fetch_array($res_logo)){
            ?>
                <tr>
                    <td class=" text-left"><input type="text" name="type_logo[]" id="" value="<?=$row_logo[1]?>"></td>
                    <td><input type="text" name="subject_logo[]" id="" value="<?=$row_logo[2]?>"></td>
                    <td>
                        <img class="img-thumbnail w-25" id="billboard_img" src="/images/logo/<?=$row_logo[3]?>" alt="<?=$row_logo[3]?>" title="<?=$row_logo[2]?>">
                        <input type="file" name="file_logo[]" class=" d-block text-center mr-auto ml-auto" id="footer_file">
                    </td>
                    <td>
                        <input type="hidden" name="display_logo[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法-->
                        <input type="radio" name="display_logo[]" id="checkbox" value="<?=$row_logo[0]?>" <?php if($row_logo[5] == 1) echo "checked";?>>
                    </td>
                    <td>
                        <input type="hidden" name="delete_logo[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法-->
                        <input type="checkbox" name="delete_logo[]" id="checkbox" value="<?=$row_logo[0]?>">
                    </td>
                    <input type="hidden" name="id_logo[]" id="" value="<?=$row_logo[0]?>">
                </tr>
            <?php
            }
            ?>
            <tr>
                <th id="th_02">類別</th>
                <th id="th_02">標題</th>
                <th id="th_02">URL參數(錨點)</th>
                <th id="th_02">顯示中</th>
                <th id="th_02">刪除</th>
            </tr>
            <?php
            $res = mysqli_query($link,"select * from footer_table where type='about_us' limit ".$s.",4");
            while($row = mysqli_fetch_array($res)){
            ?>
                <tr>
                    <td class=" text-left"><input type="text" name="type_name[]" id="" value="<?=$row[1]?>"></td>
                    <td><input type="text" name="subject[]" id="" value="<?=$row[2]?>"></td>
                    <td>
                        <select id="type" name="type_select[]">
                            <option value="idea_ap" <?php if($row[3] == "idea_ap") echo "selected";?>>idea_ap</option>
                            <option value="drink_ap" <?php if($row[3] == "drink_ap") echo "selected";?>>drink_ap</option>
                            <option value="traffic_ap" <?php if($row[3] == "traffic_ap") echo "selected";?>>traffic_ap</option>
                            <option value="enlist_ap" <?php if($row[3] == "enlist_ap") echo "selected";?>>enlist_ap</option>
                            <option value="teamwork_ap" <?php if($row[3] == "teamwork_ap") echo "selected";?>>teamwork_ap</option>
                            <option value="login.php" <?php if($row[3] == "login.php") echo "selected";?>>login.php</option>
                        </select>
                    </td>
                    <td>
                        <input type="hidden" name="display[]" value="0"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法--> 
                        <input type="checkbox" name="display[]" class="d-inline" id="checkbox" value="<?=$row[0]?>" <?php if($row[5] == 1) echo "checked";?>>
                    </td>
                    <td>
                        <input type="hidden" name="delete[]" value="a"><!-- 避免checkbox全都沒勾選時，沒值傳過去會報錯的折衷辦法-->
                        <input type="checkbox" name="delete[]" id="checkbox" value="<?=$row[0]?>">
                    </td>
                    <input type="hidden" name="id[]" id="" value="<?=$row[0]?>">
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <div class="text-center">
            <?php
                pagination("footer_table where type='about_us'",4,"do","footer");
            ?>
            <div class=" d-inline-block float-right">
                <input type="submit" name="submit" class="" id="" value="送出">
                <input type="reset" name="reset" class="" id="" value="重置">
            </div>
        </div>
    </form>
<?php
}
/*新增項目 start*/
//新增公佈欄項目 strat -----------------------------------------------------------------------------------------------
function billboard_news_admin(){
?>
    <form action="add_api_admin.php?api=billboard" method="post" enctype="multipart/form-data">
        <table class="table" id="billboard">
            <thead>
                <tr>
                    <th width="20%" class="text-left pl-3">上傳圖片&type圖標</th>
                    <th width="25%">主旨設定</th>
                    <th width="30%">內文設定</th>
                    <th width="25%">設定排序&類型</th>
                </tr>
            </thead>
            <tbody>
            <?php
            for($i=0; $i<4; $i++){
            echo '
                <tr>
                    <td class=" text-left">
                        <div class="mb-3" id="img_news01">
                            上傳活動圖片:
                            <input type="file" name="billboard_file[]" id="billboard_file">
                        </div>
                        <div class="" id="img_news02">
                            上傳公佈欄圖標:
                            <input type="file" name="type_file[]" id="type_file">
                        </div>
                    </td>
                    <td>
                        <textarea name="billboard_sub[]" id="" cols="30" rows="4">請輸入活動主旨...</textarea>
                    </td>
                    <td>
                        <textarea name="billboard_intro[]" id="" cols="40" rows="7">請輸入活動內容...</textarea>
                    </td>
                    <td class="text-center">
                    <select class="mb-2" name="number_select[]" id="number">
                        <option value="">請選擇項目</option>
                        <option value="no-none">no-none</option>
                        /*這邊用迴圈的話，外層的迴圈會失效，不知為何，只能先直接這樣做。*/
                        <option value="no-01">no-01</option>
                        <option value="no-02">no-02</option>
                        <option value="no-03">no-03</option>
                        <option value="no-04">no-04</option>
                        <option value="no-05">no-05</option>
                        <option value="no-06">no-06</option>
                    </select>
                    <select id="type" name="type_select[]">
                        <option value="">請選擇項目</option>
                        <option value="sale">sale</option>
                        <option value="other">other</option>
                    </select>
                    <div class="text-center d-block mt-3">
                        確認新增(請勾選):
                        <input type="checkbox" name="check_count['.$i.']" id="checkbox" value="'.$i.'">
                    </div>
                    </td>
                </tr>
            '; 
            } 
            ?>
            </tbody>
        </table>
        <div class=" d-block text-center mb-3">
            <input type="submit" name="submit" class="" id="" value="送出">
            <input type="reset" name="reset" class="" id="" value="重置">
        </div>
    </form>
<?php
}
//新增公佈欄項目 end -------------------------------------------------------------------------------------------------
//新增套餐DM項目 start -------------------------------------------------------------------------------------------------
function combo_news_admin(){
    ?>
        <form action="add_api_admin.php?api=combo" method="post" enctype="multipart/form-data">
            <table class="table" id="billboard">
                <thead>
                    <tr>
                        <th width="20%" class="text-left pl-3">上傳圖片</th>
                        <th width="20%">標題設定</th>
                        <th width="25%">內文設定</th>
                        <th width="15%">售價設定</th>
                        <th width="20%">設定排序&類型</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                for($i=0; $i<4; $i++){
                echo '
                    <tr>
                        <td class=" text-left">
                            上傳套餐圖片:
                            <input type="file" name="combo_file[]" id="billboard_file">
                        </td>
                        <td>
                            <textarea name="combo_title[]" id="" cols="20" rows="4">請輸入標題...</textarea>
                        </td>
                        <td>
                            <textarea name="combo_intro[]" id="" cols="30" rows="7">請輸入內文...</textarea>
                        </td>
                        <td>
                            <input type="text" name="combo_price[]" id="type_file" value="請設定售價...">
                        </td>
                        <td class="text-center">
                            <select class="mb-2" name="number_select[]" id="number">
                                <option value="">請選擇項目</option>
                                <option value="no-none">no-none</option>
                                /*這邊用迴圈的話，外層的迴圈會失效，不知為何，只能先直接這樣做。*/
                                <option value="no-01">no-01</option>
                                <option value="no-02">no-02</option>
                                <option value="no-03">no-03</option>
                                <option value="no-04">no-04</option>
                                <option value="no-05">no-05</option>
                                <option value="no-06">no-06</option>
                                <option value="no-07">no-07</option>
                                <option value="no-08">no-08</option>
                            </select>
                            <div class="text-center d-block mt-3">
                                確認新增(請勾選):
                                <input type="checkbox" name="check_count['.$i.']" id="checkbox" value="'.$i.'">
                            </div>
                        </td>
                    </tr>
                '; 
                } 
                ?>
                </tbody>
            </table>
            <div class=" d-block text-center mb-3">
                <input type="submit" name="submit" class="" id="" value="送出">
                <input type="reset" name="reset" class="" id="" value="重置">
            </div>
        </form>
    <?php
    }
//新增套餐DM項目 end -------------------------------------------------------------------------------------------------    
//新增甜點DM項目 start -------------------------------------------------------------------------------------------------
function sale_news_admin(){
?>
        <form action="add_api_admin.php?api=sale" method="post" enctype="multipart/form-data">
            <table class="table" id="billboard">
                <thead>
                    <tr>
                        <th width="20%" class="text-left pl-3">上傳圖片</th>
                        <th width="20%">標題設定</th>
                        <th width="25%">內文設定</th>
                        <th width="15%">售價設定</th>
                        <th width="20%">設定排序&類型</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                for($i=0; $i<4; $i++){
                echo '
                    <tr>
                        <td class=" text-left">
                            上傳甜點圖片:
                            <input type="file" name="sale_file[]" id="billboard_file">
                        </td>
                        <td>
                            <textarea name="sale_title[]" id="" cols="20" rows="4">請輸入標題...</textarea>
                        </td>
                        <td>
                            <textarea name="sale_intro[]" id="" cols="30" rows="7">請輸入內文...</textarea>
                        </td>
                        <td>
                            <input type="text" name="sale_price[]" id="type_file" value="請設定售價...">
                        </td>
                        <td class="text-center">
                            <select class="mb-2" name="number_select[]" id="number">
                                <option value="">請選擇項目</option>
                                <option value="no-none">no-none</option>
                                <option value="no-banner">no-banner</option>
                                /*這邊用迴圈的話，外層的迴圈會失效，不知為何，只能先直接這樣做。*/
                                <option value="no-01">no-01</option>
                                <option value="no-02">no-02</option>
                                <option value="no-03">no-03</option>
                                <option value="no-04">no-04</option>
                            </select>
                            <select id="type" name="type_select[]">
                                <option value="">請選擇項目</option>
                                <option value="cake">cake</option>
                                <option value="macaron">macaron</option>
                                <option value="candy">candy</option>
                                <option value="egg_tart">egg_tart</option>
                            </select>  
                            <div class="text-center d-block mt-3">
                                確認新增(請勾選):
                                <input type="checkbox" name="check_count['.$i.']" id="checkbox" value="'.$i.'">
                            </div> 
                        </td>
                    </tr>
                '; 
                } 
                ?>
                </tbody>
            </table>
            <div class=" d-block text-center mb-3">
                <input type="submit" name="submit" class="" id="" value="送出">
                <input type="reset" name="reset" class="" id="" value="重置">
            </div>
        </form>
    <?php
    }
//新增甜點DM項目 end -------------------------------------------------------------------------------------------------
//新增飲品DM項目 start -------------------------------------------------------------------------------------------------
function drink_news_admin(){
?>
    <form action="add_api_admin.php?api=drink" method="post" enctype="multipart/form-data">
        <table class="table" id="billboard">
            <thead>
                <tr>
                    <th width="20%" class="text-left pl-3">上傳圖片</th>
                    <th width="20%">標題設定</th>
                    <th width="25%">內文設定</th>
                    <th width="15%">售價設定</th>
                    <th width="20%">設定排序&類型</th>
                </tr>
            </thead>
            <tbody>
            <?php
            for($i=0; $i<4; $i++){
            echo '
                <tr>
                    <td class=" text-left">
                        上傳飲品圖片:
                        <input type="file" name="drink_file[]" id="billboard_file">
                    </td>
                    <td>
                        <textarea name="drink_title[]" id="" cols="20" rows="4">請輸入標題...</textarea>
                    </td>
                    <td>
                        <textarea name="drink_intro[]" id="" cols="30" rows="7">如為上傳banner，此欄位請遵照格式輸入(例:banner-xx)...</textarea>
                    </td>
                    <td>
                        <input type="text" name="drink_price[]" id="type_file" value="請設定售價...">
                    </td>
                    <td class="text-center">
                        <select class="mb-2" name="number_select[]" id="number">
                            <option value="">請選擇項目</option>
                            <option value="no-none">no-none</option>
                            <option value="no-banner">no-banner</option>
                            /*這邊用迴圈的話，外層的迴圈會失效，不知為何，只能先直接這樣做。*/
                            <option value="no-01">no-01</option>
                            <option value="no-02">no-02</option>
                            <option value="no-03">no-03</option>
                            <option value="no-04">no-04</option>
                            <option value="no-05">no-05</option>
                            <option value="no-06">no-06</option>
                        </select>
                        <select id="type" name="type_select[]">
                            <option value="">請選擇項目</option>
                            <option value="coffee">coffee</option>
                            <option value="beans">beans</option>
                            <option value="other">other</option>
                        </select>
                        <div class="text-center d-block mt-3">
                            確認新增(請勾選):
                            <input type="checkbox" name="check_count['.$i.']" id="checkbox" value="'.$i.'">
                        </div> 
                    </td>
                </tr>
            '; 
            } 
            ?>
            </tbody>
        </table>
        <div class=" d-block text-center mb-3">
            <input type="submit" name="submit" class="" id="" value="送出">
            <input type="reset" name="reset" class="" id="" value="重置">
        </div>
    </form>
<?php
}
//新增飲品DM項目 end -------------------------------------------------------------------------------------------------
//新增關於我們項目 start -------------------------------------------------------------------------------------------------
function about_us_news_admin(){
?>
    <form action="add_api_admin.php?api=about_us" method="post" enctype="multipart/form-data">
        <table class="table" id="billboard">
            <thead>
                <tr>
                    <th width="20%" class="text-left pl-3">上傳圖片</th>
                    <th width="25%">標題設定</th>
                    <th width="30%">內文設定</th>
                    <th width="25%">設定排序&錨點</th>
                </tr>
            </thead>
            <tbody>
            <?php
            for($i=0; $i<4; $i++){
            echo '
                <tr>
                    <td class=" text-left">
                        上傳圖片:
                        <input type="file" name="about_us_file[]" id="billboard_file">
                    </td>
                    <td>
                        <textarea name="about_us_title[]" id="" cols="20" rows="4">請輸入標題...</textarea>
                    </td>
                    <td>
                        <textarea name="about_us_intro[]" id="" cols="30" rows="7">請輸入內文...</textarea>
                    </td>
                    <td class="text-center">
                        <select class="mb-2" name="number_select[]" id="number">
                            <option value="">請選擇項目</option>
                            <option value="no-none">no-none</option>
                            /*這邊用迴圈的話，外層的迴圈會失效，不知為何，只能先直接這樣做。*/
                            <option value="no-01">no-01</option>
                            <option value="no-02">no-02</option>
                            <option value="no-03">no-03</option>
                        </select>
                        <select id="type" name="type_select[]">
                            <option value="">請選擇項目</option>
                            <option value="idea_ap">idea_ap</option>
                            <option value="drink_ap">drink_ap</option>
                            <option value="dessert_ap">dessert_ap</option>
                        </select>
                        <div class="text-center d-block mt-3">
                            確認新增(請勾選):
                            <input type="checkbox" name="check_count['.$i.']" id="checkbox" value="'.$i.'">
                        </div>    
                    </td>
                </tr>
            '; 
            } 
            ?>
            </tbody>
        </table>
        <div class=" d-block text-center mb-3">
            <input type="submit" name="submit" class="" id="" value="送出">
            <input type="reset" name="reset" class="" id="" value="重置">
        </div>
    </form>
    <?php
    }
//新增關於我們項目 end -------------------------------------------------------------------------------------------------
//新增版尾項目 start -------------------------------------------------------------------------------------------------
function footer_news_admin(){
?>
    <form action="add_api_admin.php?api=footer&type=logo" method="post" enctype="multipart/form-data">
        <table class="table" id="footer_admin">
            <thead>
                <tr>
                    <th width="20%" class="text-left pl-3" id="th_01">新增類別(商標資訊)</th>
                    <th id="th_01" width="25%">新增標題</th>
                    <th id="th_01" width="30%">上傳logo圖片</th>
                    <th id="th_01" width="25%">勾選確認新增</th>
                </tr>
            </thead>
            <tbody>
            <?php
            for($i=0; $i<3; $i++){
                echo '
                    <tr>
                        <td class="pt-3 pb-3 text-left"><input type="text" name="type_logo[]" value="請輸入類別名稱..."></td>
                        <td class="pt-3 pb-3"><input type="text" name="subject_logo[]" value="請輸入標題..."></td>
                        <td class="pt-3 pb-3"><input type="file" name="file_logo[]"></td>
                        <td class="pt-3 pb-3">
                            <input type="checkbox" name="check_count_logo['.$i.']" id="checkbox" value="'.$i.'" style="width:1.3rem;height:1.3rem;">
                        </td>
                    </tr>
                    '; 
            }
            ?>
            <tr>
                <td class="pt-3 pb-3" colspan="4">
                    <input type="submit" name="submit" value="送出" style="width:auto;height:auto;">
                    <input type="reset" name="reset" value="重設" style="width:auto;height:auto;">
                </td>
            </tr>
            </form>
                <tr>
                    <th id="th_02" width="20%" class="text-left pl-3">新增類別(關於我們)</th>
                    <th id="th_02" width="25%">新增標題</th>
                    <th id="th_02" width="30%">新增URL參數(錨點)</th>
                    <th id="th_02" width="25%">勾選確認新增</th>
                </tr>
                <form action="add_api_admin.php?api=footer&type=about_us" method="post" enctype="multipart/form-data">    
            <?php
            for($i=0; $i<3; $i++){
                echo '
                    <tr>
                        <td class="pt-3 pb-3 text-left"><input type="text" name="type_name[]" value="請輸入類別名稱..."></td>
                        <td class="pt-3 pb-3"><input type="text" name="subject[]" value="請輸入標題..."></td>
                        <td class="pt-3 pb-3"><input type="text" name="type_select[]" value="請依照格式輸入(例:xxx_ap)..."></td>
                        <td class="pt-3 pb-3">
                            <input type="checkbox" name="check_count['.$i.']" id="checkbox" value="'.$i.'" style="width:1.3rem;height:1.3rem;">
                        </td>
                    </tr>
                    '; 
            } 
            ?>
            </tbody>
        </table>
        <div class=" d-block text-center mb-4">
            <input type="submit" name="submit" class="" id="" value="送出">
            <input type="reset" name="reset" class="" id="" value="重設">
        </div>
    </form>
    <?php
    }
//新增版尾項目 end -------------------------------------------------------------------------------------------------
/*新增項目 end*/

//後台帳號管理，套用公佈欄的css
function account_set_up(){
    global $link;
    ?>
    <form action="api_admin.php?login_do=acc_update&page=<?=$_GET["page"]?>&dd_type=<?=$_GET["dd_type"]?>" method="post" enctype="multipart/form-data">
        <table class="table" id="billboard">
            <thead>
                <tr>
                    <th width="15%" class="text-left" id="th_01">帳號</th>
                    <th width="10%" class="text-left" id="th_01">密碼</th>
                    <th width="10%" class="text-left" id="th_01">員工編號</th>
                    <th width="15%" id="th_01">姓名&出生日期</th>
                    <th width="20%" id="th_01">職位&任職期間</th>
                    <th width="10%" id="th_01">權限</th>
                    <th width="10%" id="th_01">刪除</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(isset($_GET["dd_type"])){
                if($_GET["dd_type"] > $_SESSION["user_type"])
                    $dd_type = "=".$_GET["dd_type"];
                else $dd_type = ">".$_SESSION["user_type"]; ;
            }
            else 
            $dd_type = ">".$_SESSION["user_type"]; 
            
            if(!isset($_GET["do"])) $_GET["do"] = 0;
            if(!isset($_GET["page"])) $page = 1;
            else $page = $_GET["page"];
        
            $s = $page*8-8;
            $res = mysqli_query($link,"select * from user_admin where acc_admin = '".$_SESSION["user_acc"]."' or type_admin ".$dd_type." and display_admin = 1 order by acc_admin limit ".$s.",8");
            while($row = mysqli_fetch_array($res)){
            ?>
                <tr>
                    <td class=" text-left pl-0"><?=$row[1]?></td>
                    <td class="text-left"><?=$row[2]?></td>
                    <td class="text-left"><?=$row[3]?></td>
                    <td class="text-center">
                        <input type="text" name="name_staff[]" class="mb-2" id="" value="<?=$row[4]?>">
                        <input type="text" name="birth_staff[]" id="" value="<?=$row[5]?>">
                    </td>
                    <td class="text-center">
                        <select class="mb-3" name="position_select[]" id="number">
                            <option value="manager" <?php if($row[6] == "manager") echo "selected";?>>manager</option>
                            <option value="deputy_manager" <?php if($row[6] == "deputy_manager") echo "selected";?>>deputy_manager</option>
                            <option value="senior_staff" <?php if($row[6] == "senior_staff") echo "selected";?>>senior_staff</option>
                            <option value="staff" <?php if($row[6] == "staff") echo "selected";?>>staff</option>
                            <option value="rookie" <?php if($row[6] == "rookie") echo "selected";?>>rookie</option>
                        </select>
                        <input type="text" name="sp[]" id="" value="<?=$row[7]?>">
                    </td>
                    <td class="text-center" style="font-size:18px;">
                        <select name="staff_type[]" id="">
                        <?php
                            $type_judge = $_SESSION["user_type"];
                        $type_count = 6-$type_judge;
                        for($i=0; $i<$type_count; $i++){
                        ?>
                            <option value="<?=$type_judge?>" <?php if($row[8] == $type_judge) echo "selected";?>><?=$type_judge?></option>
                        <?php
                            $type_judge++;
                        }
                        ?>
                        </select>
                    </td>
                    <input type="hidden" name="delete[]" id="" value="0">
                    <td class="text-center"><input type="checkbox" name="delete[]" id="checkbox" value="<?=$row[0]?>"></td>    
                    <input type="hidden" name="id[]" id="" value="<?=$row[0]?>">
                </tr>
            <?php
            }
            ?>
                    <tr>
                        <td colspan="7">
                            <div class=" d-inline-block float-right">
                                <input type="submit" name="submit" class="" id="" value="送出">
                                <input type="reset" name="reset" class="" id="" value="重置">
                            </div>
                        </td>
                    </tr>
            </tbody>
        </table>
        <div class="text-center">
            <?php 
                $acc_res = mysqli_query($link,"select * from user_admin where name_admin = '".$_SESSION["user_id"]."' or type_admin ".$dd_type." and display_admin = 1");
                $acc_num = mysqli_num_rows($acc_res);
            ?>
            <div class="<?php if($acc_num <=8) echo 'd-none'; else echo "d-inline-block";?>"><?php pagination("user_admin",8,"do","acc_set");?></div>
        </div>
    </form>
<?php
}

//管理登入的 內容 start --------------------------------------------------------------------------------------
#登入頁面
function login_verify(){
    ?>
    <div class="col-4 position-relative">
        <form action="api_admin.php?login_do=verify" method="post" enctype="multipart/form-data" class="position-absolute" style="top:25%;">
            <div class="form-group font-weight-bold">
                <label for="exampleInputEmail1">請輸入管理帳號:</label>
                <input type="text" name="acc_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Account">
            </div>
            <div class="form-group font-weight-bold">
                <label for="exampleInputPassword1">請輸入管理密碼:</label>
                <input type="password" name="pwd_admin" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">登入</button>
        </form>
    </div>
    <?php
}
#忘記密碼頁面
function login_forget(){
    ?>
    <div class="col-8 position-relative mt-4">
        <form action="api_admin.php?login_do=get_pwd" method="post" enctype="multipart/form-data" class="row justify-content-center position-absolute w-100">
            <div class="col-6">
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入管理者帳號:</label>
                    <input type="text" name="acc_forget_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Account">
                </div>
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入員工編號:</label>
                    <input type="text" name="eid_forget_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Eid">
                </div>
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入姓名:</label>
                    <input type="text" name="name_forget_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                </div>
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入出生日期:</label>
                    <input type="text" name="birth_forget_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="範例格式:2000/10/10">
                </div>
                <button type="submit" class="btn btn-primary">確認查詢</button>
            </div>
        </form>
    </div>
    <?php
}
#忘記密碼頁面
function login_register(){
    ?>
    <div class="col-10 position-relative mt-4">
        <form action="api_admin.php?login_do=acc_add" method="post" enctype="multipart/form-data" class="row justify-content-center position-absolute w-100" style="top:5%;">
            <div class="col-6">
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入管理帳號:</label>
                    <input type="text" name="acc_register_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Account">
                </div>
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入管理密碼:</label>
                    <input type="password" name="pwd_register_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
                </div>
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請確認管理密碼:</label>
                    <input type="password" name="ckpwd_register_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Check Password">
                </div>
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入員工編號:</label>
                    <input type="text" name="eid_register_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Eid">
                </div>
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入姓名:</label>
                    <input type="text" name="name_register_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入出生日期</label>
                    <input type="text" name="birth_register_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="範例格式:2000/10/10">
                </div>
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入擔任職位:</label>
                    <input type="text" name="position_register_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Position">
                </div>
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入任職期前:</label>
                    <input type="text" name="sp_register_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Term">
                </div>
                <div class="form-group font-weight-bold">
                    <label for="exampleInputEmail1">請輸入權限:</label>
                    <input type="text" name="type_register_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Type">
                </div>
                <button type="submit" class="btn btn-primary float-right">確定申請</button>
                <button type="reset" class="btn btn-primary float-right mr-2">清空欄位</button>
            </div>
        </form>
    </div>
    <?php
}
//管理登入頁面的 內容 end --------------------------------------------------------------------------------------
?>
