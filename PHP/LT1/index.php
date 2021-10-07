<!DOCTYPE html>
<html lang="en-VN">
<head>
    <title>Giang - LTMT1 - CD193569</title>
    <style>
        button{
            min-width: 300px;
            min-height: 50px;
            text-align: left;
            padding-left: 50px;
            margin-bottom: 5px;
        }
        .func_select{
            border-right: 2px solid;
            max-width: 50%;
            height: 100%;
            max-height: 100%;
            padding-left: 50px;
            padding-right: 50px;
            float:left;
        }
        .func_show{
            min-height: 100%;
            min-width: 50%;
            padding-left: 50px;
            overflow: hidden;
            flex-grow: 1;
        }
        h1{
            text-align: center;
        }
    </style>
    <style>
        .multtable{
            display: inline-block;
            border-radius: 10px;;
            border: 2px solid;
            min-width: 115px;
            padding-bottom: 1em;
            padding-top: 1em;
            margin-left: 10px;
        }
        .multtable p{
            margin-left: 20%;
            margin-top: 0.25em;
            margin-bottom: 0.25px;
        }
    </style>
</head>
<body>
    <div style="width: 100vw; height: 100vh; position: absolute; display: flex; top:0px; left:0px;">
        <div class="func_select">
            <h1>Chọn bài</h1>
            <form method="post">
                <button type="submit" name="bai" value="./Bai1.php">Bài 1: Kiểm tra lớn nhỏ</button><br/>
                <button type="submit" name="bai" value="./Bai2.php">Bài 2: Kiểm tra chẵn lẻ</button><br/>
                <button type="submit" name="bai" value="./Bai3.php">Bài 3: Xác định đối tượng</button><br/>
                <button type="submit" name="bai" value="./Bai4.php">Bài 4: Xếp loại học tập</button><br/>
                <button type="submit" name="bai" value="./Bai5.php">Bài 5: Kiểm tra thứ</button><br/>
                <button type="submit" name="bai" value="./Bai6.php">Bài 6: Bảng cửu chương</button><br/>
                <button type="submit" name="bai" value="./Bai7.php">Bài 7: Dãy số tự nhiên</button><br/>
            </form>
        </div>

        <div class="func_show">
            <?php
                if(isset($_POST['bai']))
                    echo '<iframe src="'.$_POST['bai'].'" style="width:100%; height: 100%; border: none"></iframe>';
                else
                    echo '<h1>Bài tập được chọn sẽ hiển thị tại đây<h1>';
            ?>
            
        </div>
    </div>
</body>
</html> 