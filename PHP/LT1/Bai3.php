<!DOCTYPE html>
<html>
<head>
    <title>Bài 3</title>
</head>
<body>
    <h1>Xác định tuổi đối tượng</h1>
    <form method="post">
        Nhập tuổi: <input type="number" min="0" name="age"><br/>
        <input type="submit" name="sub" value="Nhập tuổi">
    </form>

    <?php
        if(isset($_POST['sub']))
        {
            if($_POST['age'] > 60)
                echo "Người già";
            elseif($_POST['age'] >= 40)
                echo "Người trung niên";
            else
                echo "Người trẻ";
        }
    ?>
</body>
</html> 