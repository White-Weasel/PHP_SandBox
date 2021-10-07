<!DOCTYPE html>
<html>
<head>
    <title>Bài 1</title>
    <link rel="stylesheet" href="Bai1.css">
</head>
<body>
    <div class="all">
        <form name="method_select" method="get" style="position: fixed;">
            <?php 
                $method;
                $cur_method;
                if(isset($_GET['submit_method']) && strcmp($_GET['submit_method'], "POST") == 0)
                {
                        $method = "GET";
                        $cur_method = "POST";
                }
                else
                {
                    $method = "POST";
                    $cur_method = "GET";
                }

                echo '
        <button class="method_select" type="submit" name="submit_method" value="'.$method.'">'.$cur_method.'</button><br/>
        </form>
        <h1>Đăng ký thông tin</h1>
        <form method="'.$cur_method.'" name="thong_tin">
        
            <input class="boxinput" type="text" name="name" placeholder="Nhập tên" style="width: 500px;"><br/>
            <input class="boxinput" type="password" name="pass" placeholder="Nhập mật khẩu" style="width: 250px;"><br/>
            <input class="boxinput" type="date" name="date"><br/>
            <p style="margin-left:25px;">Giới tính:  
                        <input type="radio" id="gt_Nam" name="gt" value="nam"><label for="gt_Nam">Nam</label>
                        <input type="radio" id="gt_nu" name="gt" value="nu"><label for="gt_nu">Nữ</label>
                        <input type="radio" id="gt_khac" name="gt" value="khac"><label for="gt_khac">Khác</label>
            </p>

            <p style="margin-left:25px;">Sở thích:   
                        <input type="checkbox" name="st[]" value="Hoc">Học
                        <input type="checkbox" name="st[]" value="Phim">Xem phim
                        <input type="checkbox" name="st[]" value="Game">Chơi game
            </p>
            <input class="confirm" type="submit" name="sub" value="Đăng ký"/><br/>
        </form>';
            if(strcmp($cur_method, "POST") == 0)
            {
                if(isset($_POST['sub']))
                {
                    echo "<p>Tên: ".$_POST['name']."</p>";
                    echo "<p>Mật khẩu: ".$_POST['pass']."</p>";
                    echo "<p>Giới tính: ".$_POST['gt']."</p>";
                    
                    if(isset($_POST['st']) && !empty($_POST['st']))
                    {
                        echo "<p>Sở thích: ";
                        foreach ($_POST['st'] as $st)
                            echo $st."    ";
                    }

                }
            }
            else
            {
                if(isset($_GET['sub']))
                {
                    echo "<p>Tên: ".$_GET['name']."</p>";
                    echo "<p>Mật khẩu: ".$_GET['pass']."</p>";
                    echo "<p>Giới tính: ".$_GET['gt']."</p>";
                    
                    if(isset($_GET['st']) && !empty($_GET['st']))
                    {
                        echo "<p>Sở thích: ";
                        foreach ($_GET['st'] as $st)
                            echo $st."    ";
                    }
                }

            }
        ?>
    </div>
</body>
</html> 