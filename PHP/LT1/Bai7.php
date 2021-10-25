<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <title>Bài 7</title>
    <style>
        .numbersContainer{
            width: 39%;
            height: 66vh;
            border: 2px solid;
            float: left;
            margin-right: 20px;
            padding-left: 20px;
            overflow-x:hidden;
            overflow-y: scroll;
            word-wrap: break-word;
        }
        .numTitle{
            position: fixed;
            height: 2em;
        }
        .num{
            margin-top: 2.2em;
        }
    </style>
</head>
<body>
    <div class="container" style="overflow: auto;">
        <h1>Dãy số tự nhiên</h1>
        
        <form method="post">
            Nhập số: <input type="number" min="0" max="99999" name="num">
            <input type="submit" name="sub" value="Nhập số">
        </form>
        <p>Tổng dãy số là: 
            <?php 
                if(isset($_POST["sub"]))
                    echo ($_POST['num'] * ($_POST['num'] + 1) / 2);
            ?>
        </p>

        <div class="numbersContainer">
            <p>Dãy số tự nhiên: </p>
            <p><?php
                if(isset($_POST["sub"]))
                {
                    $i=0;
                    while($i <= $_POST['num'])
                    {
                        echo $i."\t";
                        $i++;
                    }
                }
            ?></p>
        </div>

        <div class="numbersContainer">
            <p>Dãy số lẻ: </p>
            <p><?php
                if(isset($_POST["sub"]))
                {
                    $i=1;
                    while($i <= $_POST['num'])
                    {
                        echo $i."\t";
                        $i+=2;
                    }
                }
            ?></p>
        </div>
    </div>
</body>
</html> 
=======
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
>>>>>>> c0e118ad2f92df5676f72d8ed0b6ddfd7502949c
