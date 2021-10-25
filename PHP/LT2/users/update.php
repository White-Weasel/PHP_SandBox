<?php
    include "../services.php";
    $service = new UserService();
    if(!$service->Authenticate()){header("location: /PHP/LT2/login.php");return;}

    $user = isset($_GET["id"])?(new UserService())->GetUser($_GET['id']): new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Cập nhật người dùng</title>
</head>
<body>
    <div class="flex justify-content-center">
        <form class="flex flex-dir-col" method="POST" style="width: 355px;">
            <h1 class="text-center">Cập nhật thông tin</h1>
            <input class="input-field" type="text" name="id" value="<?= $user->id ?>"  hidden>
            <input class="input-field" type="text" name="username" value="<?= $user->username ?>" placeholder="Tên đăng nhập" required style="margin-bottom: 10px;">
            <input class="input-field" type="text" name="password" value="<?= $user->password ?>" placeholder="Mật khẩu" required style="margin-bottom: 10px;">
            <div class="flex align-items-center" style="margin-bottom: 10px;">
                <label for="birth" style="flex:0.1 0 auto">Ngày sinh:</label>
                <input id="birth" name="birth" class="input-field" type="date" value="<?= $user->birth->format('Y-m-d') ?>" style="flex: 0.9 1 auto" required>
            </div>
            <div class="flex" style="margin-bottom: 10px;">Giới tính:
                <input id="gd_Nam" name="gender" type="radio" value="Nam" <?php if($user->gender=="Nam")echo "checked"?>>
                <label for="gd_Nam">Nam</label>
                <input id="gd_Nu" name="gender" type="radio" value="Nữ" <?php if($user->gender=="Nữ")echo "checked"?>>
                <label for="gd_Nu">Nữ</label>
                <input id="gd_Khac" name="gender" type="radio" value="Khác" <?php if($user->gender=="Khác")echo "checked"?>>
                <label for="gd_Khac">Khác</label>
            </div>
            <div class="flex align-items-center" style="margin-bottom: 10px;">
                <label for="slt_Address">Quê quán:</label>
                <select class="input-field" id="slt_Address" name="address_id">
                    <option value="0">----Chọn tên một tỉnh----</option>
                    <?php foreach((new AddressService())->GetAddressAll() as $address): ?>
                        <option value="<?= $address->id ?>" <?php if(isset($user->address)){if($user->address->id==$address->id)echo "selected";} ?> ><?= $address->province ?></option>
                    <?php endforeach; /*<?= something ?> Là lệnh echo something */ ?>    
                </select>
            </div>
            <div class="flex" style="margin-bottom: 10px;">Sở thích:
                <div>
                    <input id="hb_Game" name="hobbies[]" type="checkbox" value="Chơi game" <?php if(in_array("Chơi game", $user->hobbies))echo "checked"; ?>>
                    <label for="hb_Game">Chơi game</label>
                    <input id="hb_Phim" name="hobbies[]" type="checkbox" value="Xem phim" <?php if(in_array("Xem phim", $user->hobbies))echo "checked"; ?>>
                    <label for="hb_Phim">Xem phim</label>
                    <input id="hb_Hoc" name="hobbies[]" type="checkbox" value="Học tập" <?php if(in_array("Học tập", $user->hobbies))echo "checked"; ?>>
                    <label for="hb_Hoc">Học tập</label>
                </div>
            </div>
            <input class="btn btn-blue" name="submited" type="submit" value="Cập nhật" style="margin-bottom: 10px;">
        </form>
    </div>
    <?php
        if(isset($_POST["submited"])){
            $user = new User($_POST["username"],$_POST["password"],$_POST["gender"],new Datetime($_POST["birth"]),null, new Address());
            $user->id=$_POST["id"];
            if($_POST["address_id"]>0)$user->address->id=$_POST["address_id"];
            if(isset($_POST["hobbies"]))$user->hobbies = $_POST["hobbies"];
            $user_service = new UserService();
            if($user_service->Update($user)){
                if($user->id==$_SESSION["user_id"]&&$user->username!=$_SESSION["username"])$user_service->Logout();
                header("location: /PHP/LT2/users/home.php");
            }
            else echo "<script>alert('Cập nhật không thành công')</script>";
        }
    ?>
</body>
</html>