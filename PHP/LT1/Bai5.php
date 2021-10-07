<!DOCTYPE html>
<html>
<head>
    <title>Bài 5</title>
</head>
<body>
    <h1>Kiểm tra ngày</h1>
    <form method="post">
        Nhập số: <input type="number" min="1" max="31" name="day"><br/>
        <input type="submit" name="sub" value="Nhập ngày">
    </form>

    <?php
        if(isset($_POST['sub']))
        {
            switch($_POST['day'] % 7)
            {
                case 1: {echo "Thứ Hai"; break;}
                case 2: {echo "Thứ Ba"; break;}
                case 3: {echo "Thứ Tư"; break;}
                case 4: {echo "Thứ Năm"; break;}
                case 5: {echo "Thứ Sáu"; break;}
                case 6: {echo "Thứ Bảy"; break;}
                case 0: {echo "Chủ Nhật"; break;}
            }
        }
    ?>
</body>
</html> 