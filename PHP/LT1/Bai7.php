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