<!DOCTYPE html>
<html>
<head>
    <title>Bài 2</title>
</head>
<body>
    <h1>Kiểm tra chẵn lẻ</h1>
    <form method="post">
        Nhập số: <input type="number" name="num">
        <input type="submit" name="sub" value="Nhập số">
    </form>

    <?php
        if(isset($_POST['sub']))
        {
            $so = $_POST['num'];
            if($so % 2 == 0)
                echo "Số ".$so." là số chẵn";
            else
                echo "Số ".$so." là số lẻ";
        }
    ?>
</body>
</html> 