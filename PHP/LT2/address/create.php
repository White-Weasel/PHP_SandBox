<?php 
    include "../services.php";
    $service = new UserService();
    if(!$service->Authenticate()){header("location: /PHP/LT2/login.php?redirect=/PHP/LT2/address/create.php");return;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Thêm mới địa chỉ</title>
</head>
<body>
    <div class="flex justify-content-center">
        <form class="flex flex-dir-col" method="POST" style="width: 355px;">
            <h1 class="text-center">Thêm mới địa chỉ</h1>
            <input class="input-field" type="text" name="province" placeholder="Tên tỉnh hoặc thành phố" required style="margin-bottom: 10px;">
            <input class="btn btn-blue" name="submited" type="submit" value="Create" style="margin-bottom: 10px;">
        </form>
    </div>
    <?php
        if(isset($_POST["submited"])){
            $address = new Address($_POST["province"]);
            $address_sv = new AddressService();
            if($address_sv->Create($address)){
                header("location: /PHP/LT2/address/home.php");
            }
            else echo "<script>alert('Tạo địa chỉ không thành công')</script>";
        }
    ?>
</body>
</html>