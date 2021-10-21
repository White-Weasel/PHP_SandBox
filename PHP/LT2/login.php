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
    <title>Đăng nhập</title>
</head>
<body>
    <div class="flex justify-content-center">
        <form class="flex flex-dir-col" method="POST" style="width: 355px;">
            <h1 class="text-center">Đăng nhập</h1>
            <input class="input-field" type="text" name="username" placeholder="Tên đăng nhập" required style="margin-bottom: 10px;">
            <input class="input-field" type="password" name="password" placeholder="Mật khẩu" required style="margin-bottom: 10px;">
            <input class="btn btn-blue" name="submited" type="submit" value="Đăng nhập" required style="margin-bottom: 10px;">
            <div>Chưa có tài khoản?<a class="text-bold" href="/PHP/LT2/signup.php" style="margin-left:5px">Đăng ký</a></div>
        </form>
    </div>
    <?php
        if(isset($_POST["submited"])){
            $service = new UserService();
            if($service->Login($_POST["username"], $_POST["password"])){
                header("location: /PHP/LT2/users/home.php");
            }
            else echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
        }
    ?>
</body>
</html>