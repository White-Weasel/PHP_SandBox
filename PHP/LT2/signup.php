<?php
    include "services.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Đăng ký</title>
</head>
<body>
    <div class="flex justify-content-center">
        <form class="flex flex-dir-col" method="POST" style="width: 355px;">
            <h1 class="text-center">Đăng ký thông tin</h1>
            <input class="input-field" type="text" name="username" placeholder="Tên đăng nhập" required style="margin-bottom: 10px;">
            <input class="input-field" type="password" name="password" placeholder="Mật khẩu" required style="margin-bottom: 10px;">
            <div class="flex align-items-center" style="margin-bottom: 10px;">
                <label for="birth" style="flex:0.1 0 auto">Ngày sinh:</label>
                <input id="birth" name="birth" class="input-field" type="date" style="flex: 0.9 1 auto" required>
            </div>
            <div class="flex" style="margin-bottom: 10px;">Giới tính:
                <input id="gd_Nam" name="gender" type="radio" value="Nam" checked>
                <label for="gd_Nam">Nam</label>
                <input id="gd_Nu" name="gender" type="radio" value="Nữ">
                <label for="gd_Nu">Nữ</label>
                <input id="gd_Khac" name="gender" type="radio" value="Khác">
                <label for="gd_Khac">Khác</label>
            </div>
            <div class="flex" style="margin-bottom: 10px;">Sở thích:
                <div>
                    <input id="hb_Game" name="hobbies[]" type="checkbox" value="Chơi game">
                    <label for="hb_Game">Chơi game</label>
                    <input id="hb_Phim" name="hobbies[]" type="checkbox" value="Xem phim">
                    <label for="hb_Phim">Xem phim</label>
                    <input id="hb_Hoc" name="hobbies[]" type="checkbox" value="Học tập">
                    <label for="hb_Hoc">Học tập</label>
                </div>
            </div>
            <input class="btn btn-blue" name="submited" type="submit" value="Đăng ký" style="margin-bottom: 10px;">
            <div>Đã có tài khoản?<a class="text-bold" href="/PHP/LT2/login.php" style="margin-left:5px">Đăng nhập</a></div>
        </form>
    </div>
    <?php
        if(isset($_POST["submited"])){
            $user = new User();
            $user->username = $_POST["username"];
            $user->password = $_POST["password"];
            $user->gender = $_POST["gender"];
            $user->birth = new Datetime($_POST["birth"]);
            if(isset($_POST["hobbies"]))$user->hobbies = $_POST["hobbies"];
            $user_service = new UserService();
            if($user_service->SignUp($user)){
                header("location: /PHP/LT2/login.php");
            }
            else echo "<script>alert('Đăng ký không thành công')</script>";
        }
    ?>
</body>
</html>