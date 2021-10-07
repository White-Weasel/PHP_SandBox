<!DOCTYPE html>
<html>
<head>
    <title>Bài 1</title>
</head>
<body>
    <h1>So sánh 2 số</h1>
    <form method="POST">
        Nhập số thứ 1: <input type="number" name="num1"><br/>
        Nhập số thứ 2: <input type="number" name="num2"><br/>
        <input type="submit" name="sub" value="So sánh"/><br/>
    </form>
    <?php
        if(isset($_POST['sub']))
        {
            if($_POST['num1'] > $_POST['num2'])
                echo "Số ".$_POST['num1']." lớn hơn số ".$_POST['num2'];
            elseif($_POST['num1'] < $_POST['num2'])
                echo "Số ".$_POST['num1']." nhỏ hơn số ".$_POST['num2'];
            else
                echo "Hai số bằng nhau";
        }
    ?>
</body>
</html> 