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