<?php
$link = mysqli_connect("localhost","root","","my_works_cafe");
mysqli_query($link,"set names utf8");

#彈窗
function pop_up($mes,$url){
    $script = "<script>
                alert('".$mes."');
                location.href='".$url."';    
            </script>";
    return $script;
}

/*新增項目*/ 
if(isset($_GET["api"])){
    #新增公佈欄活動 start
    if($_GET["api"] == "billboard")
    {
        $file_name = $_FILES["billboard_file"]["name"];
        $type_file = $_FILES["type_file"]["name"];
        $subject = $_POST["billboard_sub"];
        $intro = $_POST["billboard_intro"];
        $number_select = $_POST["number_select"];
        $type_select = $_POST["type_select"];
        
        $sub_none = "請輸入活動主旨...";
        $intro_none = "請輸入活動內容...";

        #抓取伺服器當下時間，並且加八小時
        date_default_timezone_set('Asia/taipei');
        $mg_time = date('Y-m-d');

        # 用核取方塊判斷上傳檔案筆數
        if(!empty($_POST["check_count"]))
            $check_count = $_POST["check_count"];
            else
                echo pop_up("您沒有勾選核取方塊。","admin.php?do=add&new=billboard");
            $file_count = count($check_count); 
        
        for ($i = 0; $i < $file_count; $i++)
        {   
            $no_xx = $i+1;
            if(!empty($subject[$i]) && !empty($intro[$i]) && !empty($number_select[$i]) && !empty($type_select[$i]) && isset($check_count[$i]))
            {
                #檢查主旨和內文是否為預設文字
                if($subject[$i] !== $sub_none or $intro[$i] !== $intro_none)
                {
                    # 檢查檔案是否上傳成功
                    if ($_FILES['billboard_file']['error'][$i] === UPLOAD_ERR_OK and $_FILES['type_file']['error'][$i] === UPLOAD_ERR_OK)
                    {
                        $file = substr($file_name[$i],0,-4);
                        $path = explode("-",$file_name[$i]);
                        $list = $path[0];
                        # 檢查檔案是否已經存在於目錄內
                        if (file_exists("images/".$list."/".$file_name[$i]))
                        {
                            mysqli_query($link,"insert into header_billboard value(null,'".$subject[$i]."','".$intro[$i]."','".$file."','".$list."',
                                                '".$file_name[$i]."','".$number_select[$i]."','".$type_select[$i]."','".$type_file[$i]."','".$mg_time."','0')");

                        }else{
                        #對欲上傳之檔案的暫存路徑 和 目的路徑 宣告變數
                        $tmp_file = $_FILES["billboard_file"]["tmp_name"][$i];
                        $dest_file = "images/".$list."/".$file_name[$i];
                        #這裡是對公佈欄圖標之 暫存路徑 和 目的路徑 宣告變數
                        $tmp_type_file = $_FILES["type_file"]["tmp_name"][$i];
                        $dest_type_file = "images/logo/".$type_file[$i];

                        # 將檔案移至指定位置
                        move_uploaded_file($tmp_file, $dest_file);
                        move_uploaded_file($tmp_type_file, $dest_type_file);

                        mysqli_query($link,"insert into header_billboard value(null,'".$subject[$i]."','".$intro[$i]."','".$file."','".$list."',
                                            '".$file_name[$i]."','".$number_select[$i]."','".$type_select[$i]."','".$type_file[$i]."','".$mg_time."','0')");

                        }
                             
                    }else{
                        echo pop_up("錯誤代碼：".$_FILES['billboard_file']['error']."<br>".$_FILES['type_file']['error'],"admin.php?do=add&new=billboard");;
                    }
                }else{
                    echo pop_up("您 第".$no_xx."筆 資料有欄位尚未填寫，請重新填寫該筆資料","admin.php?do=add&new=billboard");
                } 
            }else{
                echo pop_up("您 第".$no_xx."筆 資料有欄位尚未填寫，請重新填寫該筆資料","admin.php?do=add&new=billboard");
            }
        }
        echo pop_up($no_xx." 筆資料新增成功","admin.php?do=add&new=billboard");       
    }
    #新增公佈欄活動 end 

    #新增套餐DM項目 start
    if($_GET["api"] == "combo")
    {
        $file_name = $_FILES["combo_file"]["name"];
        $title = $_POST["combo_title"];
        $intro = $_POST["combo_intro"];
        $price = $_POST["combo_price"];
        $number_select = $_POST["number_select"];
        
        $title_none = "請輸入標題...";
        $intro_none = "請輸入內文...";
        $price_none = "請設定售價...";

        #用核取方塊判斷上傳檔案筆數
        if(!empty($_POST["check_count"]))
        {
            $check_count = $_POST["check_count"];
        }else
            echo pop_up("您沒有勾選核取方塊。","admin.php?do=add&new=combo");
        
        $file_count = count($check_count); 
        for ($i = 0; $i < $file_count; $i++)
        {   
            $no_xx = $i+1;
            if(!empty($title[$i]) && !empty($intro[$i]) && !empty($price[$i]) && !empty($number_select[$i]) && isset($check_count[$i]))
            {
                #檢查標題、內文和售價欄位是否為預設文字
                if($title[$i] !== $title_none or $intro[$i] !== $intro_none or $price[$i] !== $price_none)
                {
                    # 檢查檔案是否上傳成功
                    if ($_FILES['combo_file']['error'][$i] === UPLOAD_ERR_OK)
                    {
                        $file = substr($file_name[$i],0,-4);
                        $path = explode("-",$file_name[$i]);
                        $list = $path[0];
                        #檢查檔案是否已經存在於目錄內
                        if (file_exists("images/".$list."/".$file_name[$i]))
                        {
                            mysqli_query($link,"insert main_combo value(null,'".$title[$i]."','".$intro[$i]."','".$price[$i]."','".$file."',
                                                '".$file_name[$i]."','".$number_select[$i]."','".$list."','0')");

                        }else{
                        #將暫存路徑 和 目的路徑 宣告變數
                            $tmp_file = $_FILES["combo_file"]["tmp_name"][$i];
                            $dest_file = "images/".$list."/".$file_name[$i];
                            # 將檔案移至指定位置
                            move_uploaded_file($tmp_file, $dest_file);

                            mysqli_query($link,"insert main_combo value(null,'".$title[$i]."','".$intro[$i]."','".$price[$i]."','".$file."',
                                                '".$file_name[$i]."','".$number_select[$i]."','".$list."','0')");

                        }
                             
                    }else{
                        echo pop_up("錯誤代碼：".$_FILES['combo_file']['error'],"admin.php?do=add&new=combo");
                    }
                }else{
                    echo pop_up("您 第".$no_xx."筆 資料有欄位尚未填寫，請重新填寫該筆資料","admin.php?do=add&new=combo");
                } 
            }else{
                echo pop_up("您 第".$no_xx."筆 資料有欄位尚未填寫，或沒有勾取核取方塊，請重新填寫該筆資料","admin.php?do=add&new=combo");
            }
        }
        echo pop_up($no_xx." 筆資料新增成功","admin.php?do=add&new=combo");       
    }          
    #新增套餐DM項目 end

    #新增甜點DM項目 start
    if($_GET["api"] == "sale")
    {
        $file_name = $_FILES["sale_file"]["name"];
        $title = $_POST["sale_title"];
        $intro = $_POST["sale_intro"];
        $price = $_POST["sale_price"];
        $number_select = $_POST["number_select"];
        $type_select = $_POST["type_select"];
        
        $title_none = "請輸入標題...";
        $intro_none = "請輸入內文...";
        $price_none = "請設定售價...";

        # 用核取方塊判斷上傳檔案筆數
        if(!empty($_POST["check_count"]))
        {
            $check_count = $_POST["check_count"];
        }else
            echo pop_up("您沒有勾選核取方塊。","admin.php?do=add&new=sale");
            

        $file_count = count($check_count); 
        for ($i = 0; $i < $file_count; $i++)
        {   
            $no_xx = $i+1;
            if(!empty($title[$i]) && !empty($intro[$i]) && !empty($price[$i]) && !empty($number_select[$i]) && !empty($type_select[$i]) && isset($check_count[$i]))
            {
                #檢查標題、內文和售價欄位是否為預設文字
                if($title[$i] !== $title_none or $intro[$i] !== $intro_none or $price[$i] !== $price_none)
                {
                    # 檢查檔案是否上傳成功
                    if ($_FILES['sale_file']['error'][$i] === UPLOAD_ERR_OK)
                    {
                        $file = substr($file_name[$i],0,-4);
                        $path = explode("-",$file_name[$i]);
                        $list = $path[0];
                        #檢查檔案是否已經存在於目錄內
                        if (file_exists("images/".$list."/".$file_name[$i]))
                        {
                            mysqli_query($link,"insert main_sale value(null,'".$title[$i]."','".$intro[$i]."','".$file."','".$file_name[$i]."',
                                                '".$number_select[$i]."','".$list."','".$type_select[$i]."','".$price[$i]."','0')");

                        }else{
                            #將暫存路徑 和 目的路徑 宣告變數
                            $tmp_file = $_FILES["sale_file"]["tmp_name"][$i];
                            $dest_file = "images/".$list."/".$file_name[$i];
                            # 將檔案移至指定位置
                            move_uploaded_file($tmp_file, $dest_file);

                            mysqli_query($link,"insert main_sale value(null,'".$title[$i]."','".$intro[$i]."','".$file."','".$file_name[$i]."',
                                                '".$number_select[$i]."','".$list."','".$type_select[$i]."','".$price[$i]."','0')");
                        }
                             
                    }else{
                        echo pop_up("錯誤代碼：".$_FILES['sale_file']['error'],"admin.php?do=add&new=sale");
                    }
                }else{
                    echo pop_up("您 第".$no_xx."筆 資料有欄位尚未填寫，請重新填寫該筆資料","admin.php?do=add&new=sale");
                } 
            }else{
                echo pop_up("您 第".$no_xx."筆 資料有欄位尚未填寫，或沒有勾取核取方塊，請重新填寫該筆資料","admin.php?do=add&new=sale");
            }
        }
        echo pop_up($no_xx." 筆資料新增成功","admin.php?do=add&new=sale");       
    }
    #新增甜點DM項目 end

    #新增飲品DM項目 start
    if($_GET["api"] == "drink")
    {
        $file_name = $_FILES["drink_file"]["name"];
        $title = $_POST["drink_title"];
        $intro = $_POST["drink_intro"];
        $price = $_POST["drink_price"];
        $number_select = $_POST["number_select"];
        $type_select = $_POST["type_select"];
        
        $title_none = "請輸入標題...";
        $intro_none = "請輸入內文...";
        $price_none = "請設定售價...";

        # 用核取方塊判斷上傳檔案筆數
        if(!empty($_POST["check_count"]))
        {
            $check_count = $_POST["check_count"];
        }else
            echo pop_up("您沒有勾選核取方塊。","admin.php?do=add&new=sale");
            

        $file_count = count($check_count); 
        for ($i = 0; $i < $file_count; $i++)
        {   
            $no_xx = $i+1;
            if(!empty($title[$i]) && !empty($intro[$i]) && !empty($price[$i]) && !empty($number_select[$i]) && !empty($type_select[$i]) && isset($check_count[$i]))
            {
                #檢查標題、內文和售價欄位是否為預設文字
                if($title[$i] !== $title_none or $intro[$i] !== $intro_none or $price[$i] !== $price_none)
                {
                    # 檢查檔案是否上傳成功
                    if ($_FILES['drink_file']['error'][$i] === UPLOAD_ERR_OK)
                    {
                        $file = substr($file_name[$i],0,-4);
                        $path = explode("-",$file_name[$i]);
                        $list = $path[0];
                        #檢查檔案是否已經存在於目錄內
                        if (file_exists("images/".$list."/".$file_name[$i]))
                        {
                            mysqli_query($link,"insert main_drink value(null,'".$title[$i]."','".$intro[$i]."','".$file."','".$file_name[$i]."',
                                                '".$number_select[$i]."','".$list."','".$type_select[$i]."','".$price[$i]."','0')");

                        }else{
                            #將暫存路徑 和 目的路徑 宣告變數
                            $tmp_file = $_FILES["drink_file"]["tmp_name"][$i];
                            $dest_file = "images/".$list."/".$file_name[$i];
                            # 將檔案移至指定位置
                            move_uploaded_file($tmp_file, $dest_file);

                            mysqli_query($link,"insert main_drink value(null,'".$title[$i]."','".$intro[$i]."','".$file."','".$file_name[$i]."',
                                                '".$number_select[$i]."','".$list."','".$type_select[$i]."','".$price[$i]."','0')");
                        }
                             
                    }else{
                        echo pop_up("錯誤代碼：".$_FILES['drink_file']['error'],"admin.php?do=add&new=drink");
                    }
                }else{
                    echo pop_up("您 第".$no_xx."筆 資料有欄位尚未填寫，請重新填寫該筆資料","admin.php?do=add&new=drink");
                } 
            }else{
                echo pop_up("您 第".$no_xx."筆 資料有欄位尚未填寫，或沒有勾取核取方塊，請重新填寫該筆資料","admin.php?do=add&new=drink");
            }
        }
        echo pop_up($no_xx." 筆資料新增成功","admin.php?do=add&new=drink");       
    }
    #新增飲品DM項目 end

    #新增關於我們 項目 start
    if($_GET["api"] == "about_us")
    {
        $file_name = $_FILES["about_us_file"]["name"];
        $title = $_POST["about_us_title"];
        $intro = $_POST["about_us_intro"];
        $number_select = $_POST["number_select"];
        $type_select = $_POST["type_select"];
        
        $title_none = "請輸入標題...";
        $intro_none = "請輸入內文...";

        # 用核取方塊判斷上傳檔案筆數
        if(!empty($_POST["check_count"]))
        {
            $check_count = $_POST["check_count"];
        }else
            echo pop_up("您沒有勾選核取方塊。","admin.php?do=add&new=about_us");
            
        $file_count = count($check_count); 
        for ($i = 0; $i < $file_count; $i++)
        {   
            $no_xx = $i+1;
            if(!empty($title[$i]) && !empty($intro[$i]) && !empty($number_select[$i]) && !empty($type_select[$i]) && isset($check_count[$i]))
            {
                #檢查標題、內文和售價欄位是否為預設文字
                if($title[$i] !== $title_none or $intro[$i] !== $intro_none)
                {
                    # 檢查檔案是否上傳成功
                    if ($_FILES['about_us_file']['error'][$i] === UPLOAD_ERR_OK)
                    {
                        $file = substr($type_select[$i],0,-3);

                        #檢查檔案是否已經存在於目錄內
                        if (file_exists("images/about_us/".$file_name[$i]))
                        {
                            mysqli_query($link,"insert about_us value(null,'".$title[$i]."','".$intro[$i]."','".$file_name[$i]."','".$file."',
                                                '".$type_select[$i]."','".$number_select[$i]."','0')");

                        }else{
                            #將暫存路徑 和 目的路徑 宣告變數
                            $tmp_file = $_FILES["about_us_file"]["tmp_name"][$i];
                            $dest_file = "images/about_us/".$file_name[$i];
                            # 將檔案移至指定位置
                            move_uploaded_file($tmp_file, $dest_file);

                            mysqli_query($link,"insert about_us value(null,'".$title[$i]."','".$intro[$i]."','".$file_name[$i]."','".$file."',
                                                '".$type_select[$i]."','".$number_select[$i]."','0')");
                        }
                             
                    }else{
                        echo pop_up("錯誤代碼：".$_FILES['about_us_file']['error'],"admin.php?do=add&new=about_us");
                    }
                }else{
                    echo pop_up("您 第".$no_xx."筆 資料有欄位尚未填寫，請重新填寫該筆資料","admin.php?do=add&new=about_us");
                } 
            }else{
                echo pop_up("您 第".$no_xx."筆 資料有欄位尚未填寫，或沒有勾取核取方塊，請重新填寫該筆資料","admin.php?do=add&new=about_us");
            }
        }
        echo pop_up($no_xx." 筆資料新增成功","admin.php?do=add&new=about_us");       
    }
    #新增關於我們 項目 end

    #新增 版尾項目 的商標訊息 類別 start
    if($_GET["api"] == "footer" && $_GET["type"] == "logo")
    {
        $type_logo = $_POST["type_logo"];
        $subject_logo = $_POST["subject_logo"];
        $file_logo = $_FILES["file_logo"]["name"];
        
        $type_none = "請輸入類別名稱...";
        $title_none = "請輸入標題...";

        # 用核取方塊判斷上傳檔案筆數
        if(!empty($_POST["check_count_logo"]))
        {
            $check_count_logo = $_POST["check_count_logo"];
        }else
            echo pop_up("您沒有勾選核取方塊。","admin.php?do=add&new=footer");
            
        $file_count_logo = count($check_count_logo); 
        for ($i = 0; $i < $file_count_logo; $i++)
        {   
            $logo_no_xx = $i+1;
            if(!empty($type_logo[$i]) && !empty($subject_logo[$i]) && isset($check_count_logo[$i]))
            {
                #檢查標題、內文和售價欄位是否為預設文字
                if($type_logo[$i] !== $type_none && $subject_logo[$i] !== $title_none)
                {
                    # 檢查檔案是否上傳成功
                    if ($_FILES['file_logo']['error'][$i] === UPLOAD_ERR_OK)
                    {

                        #檢查檔案是否已經存在於目錄內
                        if (file_exists("images/logo/".$file_logo[$i]))
                        {
                            mysqli_query($link,"insert footer_table value(null,'".$type_logo[$i]."','".$subject_logo[$i]."','".$file_logo[$i]."',
                                                'logo','0')");

                        }else{
                            #將暫存路徑 和 目的路徑 宣告變數
                            $tmp_file_logo = $_FILES["file_logo"]["tmp_name"][$i];
                            $dest_file_logo = "images/logo/".$file_logo[$i];
                            # 將檔案移至指定位置
                            move_uploaded_file($tmp_file_logo, $dest_file_logo);

                            mysqli_query($link,"insert footer_table value(null,'".$type_logo[$i]."','".$subject_logo[$i]."','".$file_logo[$i]."',
                                                'logo','0')");
                        }
                             
                    }else{
                        echo pop_up("錯誤代碼：".$_FILES['file_logo']['error']."上傳檔案有誤，請重新檢查。","admin.php?do=add&new=footer");
                    }
                }else{
                    echo pop_up("您的 商標訊息 第".$logo_no_xx."筆 資料有欄位尚未填寫，請重新填寫該筆資料","admin.php?do=add&new=footer");
                } 
            }else{
                echo pop_up("您的 商標訊息 第".$logo_no_xx."筆 資料有欄位尚未填寫，或沒有勾取核取方塊，請重新填寫該筆資料","admin.php?do=add&new=footer");
            }
            echo pop_up("商標訊息 ".$logo_no_xx." 筆資料新增成功。","admin.php?do=add&new=footer");
        }
    }
    #新增 版尾項目 的商標訊息 類別 end
    #新增 版尾項目 的關於我們 類別 start
    if($_GET["api"] == "footer" && $_GET["type"] == "about_us")
    {    
        $type_name = $_POST["type_name"];
        $subject = $_POST["subject"];
        $type_select= $_POST["type_select"];
        $check_count = $_POST["check_count"];
        
        $type_none = "請輸入類別名稱...";
        $title_none = "請輸入標題...";
        $url_none = "請依照格式輸入(例:xxx_ap)...";

        # 用核取方塊判斷上傳檔案筆數
        if(!empty($_POST["check_count"]))
        {
            $check_count = $_POST["check_count"];
        }else
            echo pop_up("您沒有勾選核取方塊。","admin.php?do=add&new=footer");
            
        $file_count = count($check_count); 
        for ($i = 0; $i < $file_count; $i++)
        {   
            $no_xx = $i+1;
            if(!empty($type_name[$i]) && !empty($subject[$i]) && isset($check_count[$i]))
            {
                #檢查標題、內文和售價欄位是否為預設文字
                if($type_name[$i] !== $type_none && $subject[$i] !== $title_none && $type_select[$i] !== $url_none)
                {
                    mysqli_query($link,"insert into footer_table value(null,'".$type_name[$i]."','".$subject[$i]."','".$type_select[$i]."','about_us','0')");
                }else{
                    echo pop_up("您的 關於我們 第".$no_xx."筆 資料有欄位尚未填寫，請重新填寫該筆資料","admin.php?do=add&new=footer");
                } 
            }else{
                echo pop_up("您的 關於我們 第".$no_xx."筆 資料有欄位尚未填寫，或沒有勾取核取方塊，請重新填寫該筆資料","admin.php?do=add&new=footer");
            }
        }
        echo pop_up("關於我們".$no_xx." 筆資料新增成功。","admin.php?do=add&new=footer");
    }
    #新增 版尾項目 的關於我們 類別 end        
}
?>