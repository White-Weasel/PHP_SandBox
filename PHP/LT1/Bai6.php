<?php 
    $from = isset($_POST["from"])?(int) $_POST["from"]:2;
    $to = isset($_POST["to"])?(int) $_POST["to"]:10;
    $submited = isset($_POST["submited"])?$_POST["submited"]:true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Xuất ra bảng cửu chương</title>
</head>
<style>
    .b6-card{
        margin:10px;
        animation-name: show-cards;
        cursor: pointer;
    animation-timing-function:cubic-bezier(0.19, 1, 0.22, 1);
    transition: all 300ms;
    }
    .b6-card:hover{
        color:white;
        background-color: var(--flat-red);
    }
    @keyframes show-cards{
        from{opacity: 0;transform: translateY(30px);}
        to{opacity: 1;transform: translateY(0px);}
    }
</style>
<body>
    <div class="flex flex-dir-col align-items-center">
        <div>
            <section>
                <h1 class="head-title text-center">Đề bài: Xuất ra bảng cửu chương</h1>
                <div>Chi tiết đề bài:
                    <ul>
                        <li>Xây dựng một website yêu cầu xuất ra bảng cửu chương từ <span class="text-bold">2</span> đến <span class="text-bold">10</span></li>
                    </ul>
                </div>
            </section>
            <section>
                <form method="POST">
                    <label for="from">Hiển thị bảng cửu chương từ:</label>
                    <input class="input-field"  id="from" type="number" step="1" name="from" required>
                    <label for="to">Cho đến:</label>
                    <input class="input-field" id="to" type="number" step="1" name="to" required>
                    <button class="btn btn-blue" type="submit" name="submited" value="Submited">Hiển thị</button>
                </form>
            </section>
            <div>  
                <?php 
                    if($submited){
                        if($from>$to)echo "Nhập sai quy tắc ❌";
                        elseif($to>10||$from<2){echo "Chỉ cho phép chọn khoảng từ 2 đến 10";$submited=false;}
                    }                    
                ?>
            </div>
        </div>
        <div class="flex justify-content-center" style="flex-wrap: wrap;">
                <?php 
                    if($submited):
                        $count = 1;
                        while($from<=$to):?>
                            <div class='shadow-box round b6-card' style="animation-duration:<?= $count ?>s">
                                <article class='text-center text-bold' style='padding: 10px;'>Bảng <?=$from?></article>
                                <div style='padding:15px;'>
                                    <?php for($i=1;$i<=10;$i++):?>
                                        <div><?php echo "$from x $i = ".($from*$i)?></div>
                                    <?php endfor; $from++; $count+=0.2;?>
                                </div>
                            </div>
                        <?php endwhile; endif;?>               
        </div>
    </div>
</body>
</html>