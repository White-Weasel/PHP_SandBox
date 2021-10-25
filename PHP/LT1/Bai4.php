<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <title>Bài 4</title>
</head>
<body>
    <h1>Xếp loại học tập</h1>
    <form method="post">
        Nhập điểm: <input type="number" step="0.01" min="0" max="10" name="score"><br/>
        <input type="submit" name="sub" value="Nhập điểm">
    </form>

    <?php
        if(isset($_POST['sub']))
        {
            if($_POST['score'] >= 8.5)
                echo "Xếp loại Giỏi";
            elseif($_POST['score'] >= 6.5)
                echo "Xếp loại Khá";
            elseif($_POST['score'] >= 5)
                echo "Xếp loại Trung bình";
            else
                echo "Xếp loại Yếu";
        }
    ?>
</body>
</html> 
=======
<?php
    $grade = isset($_POST["grade"])? (float) $_POST["grade"]:null;
    $submited = isset($_POST["submited"])? $_POST["submited"]:false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Xếp loại kết quả học tập</title>
</head>
<body>
    <div class="flex  justify-content-center">
        <div>
            <section>
                <h1 class="head-title text-center">Đề bài: Xếp loại kết quả học tập</h1>
                <div>Chi tiết đề bài:
                    <ul>
                        <li>Giới hạn điểm số từ <span class="text-bold">0-10</span></li>
                        <li>Loại Giỏi: <span class="text-bold">8</span> điểm trở lên</li>
                        <li>Loại Khá: từ <span class="text-bold">6.5</span> trở lên</li>
                        <li>Loại Trung bình: từ <span class="text-bold">5.0</span> trở lên</li>
                        <li>Loại Yếu: từ <span class="text-bold">3.5</span> trở lên</li>
                        <li>Loại Kém: các trường hợp còn lại</li>
                    </ul>
                </div>     
            </section>
            <section>
                <form method="POST">
                    <label for="grade">Nhập điểm:</label>
                    <input class="input-field" id="grade" type="number" step="any" name="grade" placeholder="Nhập điểm" required>
                    <button class="btn btn-blue" type="submit" name="submited" value="Submit">Kiểm tra</button>
                </form>
                <div>
                    <?php
                        if($submited){
                        if($grade<0||$grade>10)echo "Điểm không xác định ❌";
                        elseif($grade>=8.0)echo "Đạt loại <span class='text-bold'>Giỏi</span>";
                        elseif($grade>=6.5)echo "Đạt loại <span class='text-bold'>Khá</span>";
                        elseif($grade>=5.0)echo "Đạt loại <span class='text-bold'>Trung bình</span>";
                        elseif($grade>=3.5)echo "Đạt loại <span class='text-bold'>Yếu</span>";
                        else echo "Đạt loại <span class='text-bold'>Kém</span>";
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
>>>>>>> c0e118ad2f92df5676f72d8ed0b6ddfd7502949c
