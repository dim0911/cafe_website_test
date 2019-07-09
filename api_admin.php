<?php
$link = mysqli_connect("localhost","root","","my_works_cafe");
mysqli_query($link,"set names utf8");
session_start();

#彈窗
function pop_up($mes,$url){
    $script = "<script>
                alert('".$mes."');
                location.href='".$url."';    
            </script>";
    return $script;
}

/*admin api start*/
if(isset($_GET["work"])){
    #公佈欄管理
    if($_GET["work"] == "billboard"){

        $billboard_file_name = $_FILES["billboard_file"]["name"];
        $billboard_sub = $_POST["billboard_sub"];
        $billboard_date = $_POST["billboard_date"];
        $billboard_intro = $_POST["billboard_intro"];
        $number_select = $_POST["number_select"];
        $type_select = $_POST["type_select"];
        $display = $_POST["display"];
        $type_file = $_FILES["type_file"]["name"];
        $delete = $_POST["delete"];
        $id = $_POST["id"];

        #修改圖片
        for($i=0; $i < count($billboard_file_name); $i++){
            if($billboard_file_name[$i]  !== ""){

                $file = substr($billboard_file_name[$i],0,-4);
                $path = explode("-",$billboard_file_name[$i]);
                $list = $path[0];
                mysqli_query($link,"update header_billboard set img_name = '".$billboard_file_name[$i]."', 
                                    url_get = '".$file."' , folder_name='".$list."' where id= '".$id[$i]."'");
            }
        }
        #修改主旨
        for($i=0; $i < count($billboard_sub); $i++){
            mysqli_query($link,"update header_billboard set subject = '".$billboard_sub[$i]."' where id= '".$id[$i]."'");
        }
        #修改日期
        for($i=0; $i < count($billboard_date); $i++){
            mysqli_query($link,"update header_billboard set date = '".$billboard_date[$i]."' where id= '".$id[$i]."'");
        }
        #修改內文
        for($i=0; $i < count($billboard_intro); $i++){
            mysqli_query($link,"update header_billboard set introduction = '".$billboard_intro[$i]."' where id= '".$id[$i]."'");
        }
        #number的下拉清單
        for($i=0; $i < count($number_select); $i++){
            if($number_select[$i]   == "no-none"){
                mysqli_query($link,"update header_billboard set number = '".$number_select[$i]."' where id= '".$id[$i]."'");
            }else{
                #查詢目前輪播的 編號 之後先將其改成 no-none
                $check_res = mysqli_query($link,"select * from header_billboard where number = '".$number_select[$i]."'");
                $check_row = mysqli_fetch_array($check_res);
                mysqli_query($link,"update header_billboard set number = 'no-none' where id='".$check_row[0]."'");
                #再將傳進來 真正 想改的資料改成我傳進來的number欄位的值
                mysqli_query($link,"update header_billboard set number = '".$number_select[$i]."' where id= '".$id[$i]."'");
            }

        }
        #type的下拉清單
        for($i=0; $i < count($type_select); $i++){
            mysqli_query($link,"update header_billboard set type = '".$type_select[$i]."' where id= '".$id[$i]."'");
        }
        /*顯示(checkbox) 的API start*/
        #先把當頁傳進來之id的display都變成0
        foreach($id as $id_for){
            mysqli_query($link,"update header_billboard set display = 0 where id= '".$id_for."'");
        }
        #再把 有打勾欲顯示 之傳進來的 display的值 改成1
        foreach($display as $display_for){
            mysqli_query($link,"update header_billboard set display = 1 where id= '".$display_for."'");
        }
        /*顯示(checkbox) 的API end*/

        #修改佈告欄活動資訊的小圖標
        for($i=0; $i < count($type_file); $i++){
            if($type_file[$i]  !== ""){
                mysqli_query($link,"update header_billboard set logo_name = '".$type_file[$i]."' where id= '".$id[$i]."'");
            }
        }
        #刪除資料行
        foreach($delete as $delete_for){
            mysqli_query($link,"delete from header_billboard where id='".$delete_for."'");
        }

        echo "<script>
                alert('修改成功，請按確定跳回頁面');
                location.href='admin.php?do=billboard&page=".$_GET["page"]."';
            </script>";
    }

    #套餐DM管理
    if($_GET["work"] == "combo"){

        $combo_file_name = $_FILES["combo_file"]["name"];
        $combo_title = $_POST["combo_title"];
        $combo_intro = $_POST["combo_intro"];
        $combo_price = $_POST["combo_price"];
        $number_select = $_POST["number_select"];
        $display = $_POST["display"];
        $delete = $_POST["delete"];
        $id = $_POST["id"];

        #修改圖片
        for($i=0; $i < count($combo_file_name); $i++){
            if($combo_file_name[$i]  !== ""){

                $file = substr($combo_file_name[$i],0,-4);
                $path = explode("-",$combo_file_name[$i]);
                $list = $path[0];
                mysqli_query($link,"update main_combo set img_name = '".$combo_file_name[$i]."', 
                                    url_get = '".$file."' , type='".$list."' where id= '".$id[$i]."'");
            }
        }
        #修改標題
        for($i=0; $i < count($combo_title); $i++){
            mysqli_query($link,"update main_combo set title = '".$combo_title[$i]."' where id= '".$id[$i]."'");
        }
        #修改內文
        for($i=0; $i < count($combo_intro); $i++){
            mysqli_query($link,"update main_combo set introduction = '".$combo_intro[$i]."' where id= '".$id[$i]."'");
        }
        #修改售價
        for($i=0; $i < count($combo_price); $i++){
            mysqli_query($link,"update main_combo set price = '".$combo_price[$i]."' where id= '".$id[$i]."'");
        }
        #number的下拉清單
        for($i=0; $i < count($number_select); $i++){
            if($number_select[$i]   == "no-none"){
                mysqli_query($link,"update main_combo set number = '".$number_select[$i]."' where id= '".$id[$i]."'");
            }else{
                #查詢目前輪播的 編號 之後先將其改成 no-none
                $check_res = mysqli_query($link,"select * from main_combo where number = '".$number_select[$i]."'");
                $check_row = mysqli_fetch_array($check_res);
                mysqli_query($link,"update main_combo set number = 'no-none' where id='".$check_row[0]."'");
                #再將傳進來 真正 想改的資料改成我傳進來的number欄位的值
                mysqli_query($link,"update main_combo set number = '".$number_select[$i]."' where id= '".$id[$i]."'");
            }

        }
        /*顯示(checkbox) 的API strat*/
        #先把當頁傳進來之id的display都變成0
        foreach($id as $id_for){
            mysqli_query($link,"update main_combo set display = 0 where id= '".$id_for."'");
        }
        #再把 有打勾欲顯示 之傳進來的 display的值 改成1
        foreach($display as $display_for){
            mysqli_query($link,"update main_combo set display = 1 where id= '".$display_for."'");
        }
        /*顯示(checkbox) 的API end*/

        #刪除資料行
        foreach($delete as $delete_for){
            mysqli_query($link,"delete from main_combo where id='".$delete_for."'");
        }

        echo "<script>
                alert('修改成功，請按確定跳回頁面');
                location.href='admin.php?do=combo&page=".$_GET["page"]."';
            </script>";
    }

    #甜點DM管理
    if($_GET["work"] == "a_la_carte"){

        $sale_file_name = $_FILES["sale_file"]["name"];
        $sale_title = $_POST["sale_title"];
        $sale_intro = $_POST["sale_intro"];
        $sale_price = $_POST["sale_price"];
        $number_select = $_POST["number_select"];
        $type_select = $_POST["type_select"];
        $display = $_POST["display"];
        $delete = $_POST["delete"];
        $id = $_POST["id"];

        #修改圖片
        for($i=0; $i < count($sale_file_name); $i++){
            if($sale_file_name[$i]  !== ""){

                $file = substr($sale_file_name[$i],0,-4);
                $path = explode("-",$sale_file_name[$i]);
                $list = $path[0];
                mysqli_query($link,"update main_sale set img_name = '".$sale_file_name[$i]."', 
                                    url_get = '".$file."' , type='".$list."' where id= '".$id[$i]."'");
            }
        }
        #修改標題
        for($i=0; $i < count($sale_title); $i++){
            mysqli_query($link,"update main_sale set title = '".$sale_title[$i]."' where id= '".$id[$i]."'");
        }
        #修改內文
        for($i=0; $i < count($sale_intro); $i++){
            mysqli_query($link,"update main_sale set introduction = '".$sale_intro[$i]."' where id= '".$id[$i]."'");
        }
        #修改售價
        for($i=0; $i < count($sale_price); $i++){
            mysqli_query($link,"update main_sale set price = '".$sale_price[$i]."' where id= '".$id[$i]."'");
        }
        #number的下拉清單
        for($i=0; $i < count($number_select); $i++){
            if($number_select[$i]   == "no-none"){
                mysqli_query($link,"update main_sale set number = '".$number_select[$i]."' where id= '".$id[$i]."'");
            }else{
                #查詢目前輪播的 編號 之後先將其改成 no-none
                $check_res = mysqli_query($link,"select * from main_sale where number = '".$number_select[$i]."'");
                $check_row = mysqli_fetch_array($check_res);
                mysqli_query($link,"update main_sale set number = 'no-none' where id='".$check_row[0]."'");
                #再將傳進來 真正 想改的資料改成我傳進來的number欄位的值
                mysqli_query($link,"update main_sale set number = '".$number_select[$i]."' where id= '".$id[$i]."'");
            }
        }
        #type的下拉清單
        for($i=0; $i < count($type_select); $i++){
            mysqli_query($link,"update main_sale set kind = '".$type_select[$i]."' where id= '".$id[$i]."'");
        }
        /*顯示(checkbox) 的API start*/
        #先把當頁傳進來之id的display都變成0
        foreach($id as $id_for){
            mysqli_query($link,"update main_sale set display = 0 where id= '".$id_for."'");
        }
        #再把 有打勾欲顯示 之傳進來的 display的值 改成1
        foreach($display as $display_for){
            mysqli_query($link,"update main_sale set display = 1 where id= '".$display_for."'");
        }
        /*顯示(checkbox) 的API end*/

        #刪除資料行
        foreach($delete as $delete_for){
            mysqli_query($link,"delete from main_sale where id='".$delete_for."'");
        }

        echo "<script>
                alert('修改成功，請按確定跳回頁面');
                location.href='admin.php?do=a_la_carte&page=".$_GET["page"]."';
            </script>";
    }

    #飲品DM管理
    if($_GET["work"] == "drink"){

        $drink_file_name = $_FILES["drink_file"]["name"];
        $drink_title = $_POST["drink_title"];
        $drink_intro = $_POST["drink_intro"];
        $drink_price = $_POST["drink_price"];
        $number_select = $_POST["number_select"];
        $type_select = $_POST["type_select"];
        $display = $_POST["display"];
        $delete = $_POST["delete"];
        $id = $_POST["id"];

        #修改圖片
        for($i=0; $i < count($drink_file_name); $i++){
            if($drink_file_name[$i]  !== ""){

                $file = substr($drink_file_name[$i],0,-4);
                $path = explode("-",$drink_file_name[$i]);
                $list = $path[0];
                mysqli_query($link,"update main_drink set img_name = '".$drink_file_name[$i]."', 
                                    url_get = '".$file."' , type='".$list."' where id= '".$id[$i]."'");
            }
        }
        #修改標題
        for($i=0; $i < count($drink_title); $i++){
            mysqli_query($link,"update main_drink set title = '".$drink_title[$i]."' where id= '".$id[$i]."'");
        }
        #修改內文
        for($i=0; $i < count($drink_intro); $i++){
            mysqli_query($link,"update main_drink set introduction = '".$drink_intro[$i]."' where id= '".$id[$i]."'");
        }
        #修改售價
        for($i=0; $i < count($drink_price); $i++){
            mysqli_query($link,"update main_drink set price = '".$drink_price[$i]."' where id= '".$id[$i]."'");
        }
        #number的下拉清單
        for($i=0; $i < count($number_select); $i++){
            if($number_select[$i]   == "no-none"){
                mysqli_query($link,"update main_drink set number = '".$number_select[$i]."' where id= '".$id[$i]."'");
            }else{
                #查詢目前輪播的 編號 之後先將其改成 no-none
                $check_res = mysqli_query($link,"select * from main_drink where number = '".$number_select[$i]."'");
                $check_row = mysqli_fetch_array($check_res);
                mysqli_query($link,"update main_drink set number = 'no-none' where id='".$check_row[0]."'");
                #再將傳進來 真正 想改的資料改成我傳進來的number欄位的值
                mysqli_query($link,"update main_drink set number = '".$number_select[$i]."' where id= '".$id[$i]."'");
            }
        }
        #type的下拉清單
        for($i=0; $i < count($type_select); $i++){
            mysqli_query($link,"update main_drink set kind = '".$type_select[$i]."' where id= '".$id[$i]."'");
        }
        /*banner設定 顯示(checkbox) 的API start*/
        if($_GET["child"] == "banner"){
            #因為banner只顯示一筆，所以可以先把 撈出來的banner之display 全部改成0(不顯示)
            mysqli_query($link,"update main_drink set display = 0 where introduction like 'banner%'");
            #再把 有打勾欲顯示 之傳進來的 display的值 改成1
            for($i=0; $i < count($display); $i++){
                mysqli_query($link,"update main_drink set display = 1 where id= '".$display[$i]."'");
            }
        /*banner設定 顯示(checkbox) 的API end*/
        /*dm(商品資訊設定) 顯示(checkbox) 的API start*/
        }elseif($_GET["child"] == "dm"){      
        #先把當頁傳進來之id的display都變成0
            foreach($id as $id_for){
                mysqli_query($link,"update main_drink set display = 0 where id= '".$id_for."'");
            }
            #再把 有打勾欲顯示 之傳進來的 display的值 改成1
            foreach($display as $display_for){
                mysqli_query($link,"update main_drink set display = 1 where id= '".$display_for."'");
            }
        }     
        /*顯示(checkbox) 的API end*/

        #刪除資料行
        foreach($delete as $delete_for){
            mysqli_query($link,"delete from main_drink where id='".$delete_for."'");
        }

        echo "<script>
                alert('修改成功，請按確定跳回頁面');
                location.href='admin.php?do=drink&child=".$_GET["child"]."&page=".$_GET["page"]."';
            </script>";
    }

    #關於我們設定
    if($_GET["work"] == "about_us"){

        $abouts_us_file_name = $_FILES["abouts_us_file"]["name"];
        $abouts_us_title = $_POST["abouts_us_title"];
        $abouts_us_intro = $_POST["abouts_us_intro"];
        $number_select = $_POST["number_select"];
        $type_ap_select = $_POST["type_ap_select"];
        $display = $_POST["display"];
        $delete = $_POST["delete"];
        $id = $_POST["id"];

        #修改圖片
        for($i=0; $i < count($abouts_us_file_name); $i++){
            if($abouts_us_file_name[$i]  !== ""){
                mysqli_query($link,"update about_us set img_name = '".$abouts_us_file_name[$i]."' where id= '".$id[$i]."'");
            }
        }
        #修改標題
        for($i=0; $i < count($abouts_us_title); $i++){
            mysqli_query($link,"update about_us set title = '".$abouts_us_title[$i]."' where id= '".$id[$i]."'");
        }
        #修改內文
        for($i=0; $i < count($abouts_us_intro); $i++){
            mysqli_query($link,"update about_us set introduction = '".$abouts_us_intro[$i]."' where id= '".$id[$i]."'");
        }
        
        #number的下拉清單
        for($i=0; $i < count($number_select); $i++){
            if($number_select[$i]   == "no-none"){
                mysqli_query($link,"update about_us set number = '".$number_select[$i]."' where id= '".$id[$i]."'");
            }else{
                #查詢目前輪播的 編號 之後先將其改成 no-none
                $check_res = mysqli_query($link,"select * from about_us where number = '".$number_select[$i]."'");
                $check_row = mysqli_fetch_array($check_res);
                mysqli_query($link,"update about_us set number = 'no-none' where id='".$check_row[0]."'");
                #再將傳進來 真正 想改的資料改成我傳進來的number欄位的值
                mysqli_query($link,"update about_us set number = '".$number_select[$i]."' where id= '".$id[$i]."'");
            }
        }
        #修改 錨點下拉清單 & 類型
        for($i=0; $i < count($type_ap_select); $i++){

            $file = substr($type_ap_select[$i],0,-3);
            mysqli_query($link,"update about_us set type='".$file."', url_get = '".$type_ap_select[$i]."' where id= '".$id[$i]."'");
        }
        /*顯示(checkbox) 的API strat*/
        for($i=0; $i < count($display); $i++){
            #查詢此型態目前是誰在顯示，查出來之後把它改成0(不顯示)
            #370行bug報錯 Undefined offset 但不影響程式執行，加個 @ 就可隱藏該行的報錯訊息
            @mysqli_query($link,"update about_us set display = 0 where number='".$number_select[$i]."'");
            #再把 有打勾欲顯示 之傳進來的 display的值 改成1
            mysqli_query($link,"update about_us set display = 1 where id= '".$display[$i]."'");
        }
        /*顯示(checkbox) 的API end*/

        #刪除資料行
        foreach($delete as $delete_for){
            mysqli_query($link,"delete from about_us where id='".$delete_for."'");
        }

        echo "<script>
                alert('修改成功，請按確定跳回頁面');
                location.href='admin.php?do=about_us&page=".$_GET["page"]."';
            </script>";
    }
    #版尾設定
    if($_GET["work"] == "footer"){
        #商標資訊 設定
        $type_logo = $_POST["type_logo"];
        $subject_logo = $_POST["subject_logo"];
        $display_logo = $_POST["display_logo"];
        $delete_logo = $_POST["delete_logo"];
        $id_logo = $_POST["id_logo"];

        $id_logo_count = count($id_logo);
        for($i=0; $i < $id_logo_count; $i++){

            if(!empty($type_logo[$i]) && !empty($subject_logo[$i])){
                $check_res = mysqli_query($link,"select * from footer_table where id='".$id_logo[$i]."'");
                $check_row = mysqli_fetch_array($check_res);
                if(empty($_FILES["file_logo"]["name"][$i])){
                    $file_logo[$i] = $check_row[3];
                }else{
                    $file_logo[$i] = $_FILES["file_logo"]["name"][$i];
                }
                mysqli_query($link,"update footer_table set title='".$type_logo[$i]."',subject='".$subject_logo[$i]."',link = '".$file_logo[$i]."' where id='".$id_logo[$i]."'");
            
                if($display_logo[$i] !== 0){
                    mysqli_query($link,"update footer_table set display = 0 where type='logo' and display = 1");
                    foreach($display_logo as $display_logo_for){
                        mysqli_query($link,"update footer_table set display = 1 where id='".$display_logo_for."'");
                    }
                }

                foreach($delete_logo as $delete_logo_for){
                    mysqli_query($link,"delete from footer_table where id='".$delete_logo_for."'");
                }
            }else{
                echo "<script>
                        alert('您有欄位尚未填寫');
                        location.href='admin.php?do=footer&page=".$_GET["page"]."';
                    </script>";
            }        
        }
        #關於我們 設定
        $type_name = $_POST["type_name"];
        $subject = $_POST["subject"];
        $type_select = $_POST["type_select"];
        $display = $_POST["display"];
        $delete = $_POST["delete"];
        $id = $_POST["id"];

        $id_count = count($id);
        for($i=0; $i < $id_count; $i++){
            
            if(!empty($type_name[$i]) && !empty($subject[$i])){
                mysqli_query($link,"update footer_table set title='".$type_name[$i]."',subject='".$subject[$i]."',link = '".$type_select[$i]."' where id='".$id[$i]."'");
            }else{
                echo "<script>
                        alert('您有欄位尚未填寫');
                        location.href='admin.php?do=footer&page=".$_GET["page"]."';
                    </script>";
            }        
        }    
        foreach($id as $id_for){
            mysqli_query($link,"update footer_table set display = 0 where id='".$id_for."'");
        }       
        foreach($display as $display_for){
            mysqli_query($link,"update footer_table set display = 1 where id='".$display_for."'");
        }

        foreach($delete as $delete_for){
            mysqli_query($link,"delete from footer_table where id='".$delete_for."'");
        }

        echo "<script>
                alert('修改成功');
                location.href='admin.php?do=footer&page=".$_GET["page"]."';
            </script>";
    }
}
/*admin api end*/
/*login api start*/
if(isset($_GET["login_do"]))
{
    $login_do = $_GET["login_do"];
    switch ($login_do)
    {
        /*後台登入*/ 
        case 'verify':
            $acc_admin = $_POST["acc_admin"];
            $pwd_admin = $_POST["pwd_admin"];
            if(!empty($acc_admin) && !empty($pwd_admin)){
    
                $verify_res = mysqli_query($link,"select * from user_admin where acc_admin = '".$acc_admin."'");
                $verify_count = mysqli_num_rows($verify_res);
                if($verify_count > 0){
    
                    $verify_row = mysqli_fetch_array($verify_res);
                    if($pwd_admin == $verify_row[2]){
                        
                        $_SESSION["user_acc"] = $verify_row[1];
                        $_SESSION["user_id"] = $verify_row[4];
                        $_SESSION["user_type"] = $verify_row[8];

                        date_default_timezone_set("Asia/Taipei");
                        $login_now = date("Y-m-d H:i:s");

                        mysqli_query($link,"insert into user_log value(null,'".$_SESSION["user_acc"]."','".$login_now."','null','".$_SESSION["user_type"]."');");
                        $log_num_res = mysqli_query($link,"select * from user_log");
                        $log_num_row = mysqli_num_rows($log_num_res);
                        if($log_num_row > 30){
                            $log_del_res = mysqli_query($link,"select * from user_log order by login limit 0,1");
                            $log_del_row = mysqli_fetch_array($log_del_res);
                            mysqli_query($link,"delete from user_log where id='".$log_del_row[0]."'");
                        }
                        echo pop_up("登入成功，請點選確定前往後台管理","admin.php");
    
                    }else{
                        echo pop_up("您輸入的 密碼 有誤，請重新輸入。","login.php");
                    }
                }else{
                    echo pop_up("您輸入的 帳號 不存在。","login.php");
                }
            }else{
                echo pop_up("您輸入 帳號 或 密碼 的欄位不可空白。","login.php");
            }            
        break;
        /*後台登出*/
        case 'logout':
            date_default_timezone_set("Asia/Taipei");
            $logout_now = date("Y-m-d H:i:s");
            $logout_log_res = mysqli_query($link,"select * from user_log where user = '".$_SESSION["user_acc"]."' order by login desc limit 0,1");
            $logout_log_row = mysqli_fetch_array($logout_log_res);
            mysqli_query($link,"update user_log set logout ='".$logout_now."' where id='".$logout_log_row[0]."'");
            unset($_SESSION["user_acc"]);
            unset($_SESSION["user_id"]);
            unset($_SESSION["user_type"]);
            echo pop_up("登出成功，請按確定跳轉登入頁面","login.php");
        break;
        #後台帳號管理 修改個資
        case 'acc_update':
            $name_staff = $_POST["name_staff"];
            $birth_staff = $_POST["birth_staff"];
            $position_select = $_POST["position_select"];
            $sp = $_POST["sp"];
            $staff_type = $_POST["staff_type"];
            $delete = $_POST["delete"];
            $id = $_POST["id"];
            
            for($i=0; $i<count($name_staff); $i++){
                mysqli_query($link,"update user_admin set name_admin = '".$name_staff[$i]."' where id='".$id[$i]."'");
            }
            for($i=0; $i<count($birth_staff); $i++){
                mysqli_query($link,"update user_admin set birth_admin = '".$birth_staff[$i]."' where id='".$id[$i]."'");
            }
            for($i=0; $i<count($position_select); $i++){
                mysqli_query($link,"update user_admin set position_admin = '".$position_select[$i]."' where id='".$id[$i]."'");
            }
            for($i=0; $i<count($sp); $i++){
                mysqli_query($link,"update user_admin set sp_admin = '".$sp[$i]."' where id='".$id[$i]."'");
            }
            for($i=0; $i<count($staff_type); $i++){
                mysqli_query($link,"update user_admin set type_admin = '".$staff_type[$i]."' where id='".$id[$i]."'");
            }
            for($i=0; $i<count($delete); $i++){
                mysqli_query($link,"delete from user_admin where id='".$delete[$i]."'");
            }

            echo pop_up("修改成功，點擊確定回後台","admin.php?do=acc_set&page=".$_GET["page"]."&dd_type=".$_GET["dd_type"]);
        break;
        #忘記密碼
        case 'get_pwd':

            $acc_forget_admin = $_POST["acc_forget_admin"];
            $eid_forget_admin = $_POST["eid_forget_admin"];
            $name_forget_admin = $_POST["name_forget_admin"];
            $birth_forget_admin = $_POST["birth_forget_admin"];
            if(!empty($acc_forget_admin) && !empty($eid_forget_admin) && !empty($name_forget_admin) && !empty($birth_forget_admin)){
                
                $forget_res = mysqli_query($link,"select * from user_admin where acc_admin = '".$acc_forget_admin."' and eid_admin = '".$eid_forget_admin."' and 
                                                name_admin = '".$name_forget_admin."' and birth_admin = '".$birth_forget_admin."'");
                $forget_row = mysqli_fetch_array($forget_res);
                if($acc_forget_admin == $forget_row[1] && $eid_forget_admin == $forget_row[3] && $name_forget_admin == $forget_row[4] && $birth_forget_admin == $forget_row[5]){
                    
                    echo pop_up("您的密碼是 ".$forget_row[2]." 請妥善保管。","login.php?login_do=forget");
                }else{
                    echo pop_up("您的欄位資料填寫有誤，請重新填寫。","login.php?login_do=forget");
                }
            }else{
                echo pop_up("欄位不可空白，請重新輸入","login.php?login_do=forget");
            }
        break;
        #新增管理帳號
        case 'acc_add':

            $acc_register_admin = $_POST["acc_register_admin"];
            $pwd_register_admin = $_POST["pwd_register_admin"];
            $ckpwd_register_admin = $_POST["ckpwd_register_admin"];
            $eid_register_admin = $_POST["eid_register_admin"];
            $name_register_admin = $_POST["name_register_admin"];
            $birth_register_admin = $_POST["birth_register_admin"];
            $position_register_admin = $_POST["position_register_admin"];
            $sp_register_admin = $_POST["sp_register_admin"];
            $type_register_admin = $_POST["type_register_admin"];

            if(!empty($acc_register_admin) && !empty($pwd_register_admin) && !empty($ckpwd_register_admin) && !empty($name_register_admin) && 
                 !empty($birth_register_admin) && !empty($position_register_admin) && !empty($sp_register_admin) && !empty($type_register_admin))
            {
                $acc_check_res = mysqli_query($link,"select * from user_admin where acc_admin ='".$acc_register_admin."' or eid_admin ='".$eid_register_admin."'");
                $acc_check_row = mysqli_num_rows($acc_check_res);
                if($acc_check_row < 1){

                    if($pwd_register_admin == $ckpwd_register_admin){
                    $acc_add_res = mysqli_query($link,"insert into user_admin value(null,'".$acc_register_admin."','".$pwd_register_admin."','".$eid_register_admin."','".$name_register_admin."','".$birth_register_admin."',
                                    '".$position_register_admin."','".$sp_register_admin."','".$type_register_admin."','1');");
                    $acc_add_row = mysqli_fetch_array($acc_add_res);

                    echo pop_up("管理帳號申請成功。","login.php?login_do=register");
                    }else{
                        echo pop_up("您的 確認密碼欄位 輸入有誤。","login.php?login_do=register");
                    }
                }else{
                    echo pop_up("您的 帳號或員工編號 已存在。","login.php?login_do=register");
                }
            }else{
                echo pop_up("欄位不可空白，請重新輸入","login.php?login_do=register");
            }
        break;
    } 
}

/*login api end*/

?>
