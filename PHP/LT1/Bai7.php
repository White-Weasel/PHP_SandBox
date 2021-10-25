<?php
    $numb = isset($_POST["numb"])? (int)$_POST["numb"]:null;
    $submited = isset($_POST["submited"])? $_POST["submited"]:false;
    $sum = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>In ra dãy số tự nhiên</title>
</head>
<body>
    <div class="flex  justify-content-center">
        <div>
            <section>
                <h1 class="head-title text-center">Đề bài: In ra dãy số tự nhiên</h1>
                <div>Chi tiết đề bài:
                    <ul>
                        <li>In ra dãy số tự nhiên giới hạn bởi n</li>
                    </ul>
                </div> 
            </section>
            <section>
                <form method="POST">
                    <label for="numb">Nhập số:</label>
                    <input class="input-field" id="numb" type="number" step="1" name="numb" placeholder="Số cần giới hạn (VD: 2, 4, 3,...)" required>
                    <button class="btn btn-blue" type="submit" name="submited" value="Submit">Hiển thị</button>
                </form>
                <div style="width: 250px;margin:0 auto;overflow-y:scroll;max-height:270px;">
                    <?php
                        if($submited){
                            if($numb<0)echo "Không phải số tự nhiên ❌";
                            else{
                                $sum=0;
                                for($i=0;$i<=$numb;$i++){echo $i;if($i<$numb)echo ", ";$sum+=$i;}
                            }
                        }
                    ?>
                </div>
                <div>
                    <?php 
                        if(isset($sum))echo "Tổng của dãy số là <span class='text-bold'>".$sum."</span>";
                    ?>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
