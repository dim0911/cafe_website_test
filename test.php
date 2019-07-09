<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scalc=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
    <!--<link rel="stylesheet" href="/css/mycss.css">-->
    <link rel="stylesheet" href="/slick/slick.css">
    <link rel="stylesheet" href="/slick/slick-theme.css">
    <link rel="shortcut icon" href="">

</head>
<body>
    <?php
        date_default_timezone_set('Asia/taipei');
        $mg_time = date('Y-m-d');
        echo $mg_time;
    echo "<hr>";
        $var=10;
        $var%=3;
        echo $var;
    echo "<hr>";
        function f1(){ echo "how are you?";}

        $a="f1";
        $a();
        echo $a();

    ?>
    <hr>
    <table style="border:1px solid black;border-collapse:collapse;margin-bottom:0.5rem;">
    <?php
        for($a=0;$a<=2;$a++){
            $b = 3;
            $c = $a*$b;
        ?>
            <tr>
            <?php
                for($d=1;$d<=3;$d++){
                    ?>
                        <td style="border:1px solid black;"><?php echo $c+$d;?></td>
                    <?php
                }
            ?>
            </tr>
        <?php
        }
    ?>
    </table>
    <table style="border:1px solid black;border-collapse:collapse;">
    <?php
        for($a=1;$a<=9;$a++){
        ?>
            <tr>
            <?php
                for($b=1;$b<=9;$b++){
                    ?>
                        <td style="border:1px solid black;">
                            <?php echo $a."x".$b."=".$a*$b;?>
                        </td>
                    <?php
                }
            ?>
            </tr>
        <?php
        }
    ?>
    </table>
    <hr>
    <div class="row d-flex flex-column">
        <div class="col">發</div>
        <div class="col">大</div>
        <div class="col">財</div>
    </div>
    <hr>
    <?php
        $xxx = "bbb";
        if($xxx == "") {echo "發大財";}
    ?>
    <hr>
    <?php
        $xxx = substr("cm-img01.jpg",0,-4);
        $yyy = substr("coffee-img07.jpg",0,-4);
        echo $xxx."<br>";
        echo $yyy;
    ?>

    <script type="text/javascript"> 
        <script src="/js/jquery-3.4.1.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/slick/slick.min.js"></script>
        <script src="/js/myjs.js"></script>

    </script>
</body>
</html>