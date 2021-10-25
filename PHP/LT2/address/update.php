<?php
    include "../services.php";
    $service = new UserService();
    if(!$service->Authenticate()){
        $header_raw = "location: /PHP/LT2/login.php?redirect=/PHP/LT2/address/update.php";
        if(isset($_GET["id"]))$header_raw.="?id=".$_GET["id"];
        header($header_raw);
        return;
    }
    $address = isset($_GET["id"])?(new AddressService($service))->GetAddress($_GET['id']) : new Address();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Cập nhật địa chỉ</title>
</head>
<body>
    <div class="flex justify-content-center">
        <form class="flex flex-dir-col" method="POST" style="width: 355px;">
            <h1 class="text-center">Cập nhật địa chỉ</h1>
            <input type="text" name="id" value="<?= $address->id ?>" hidden>
            <input class="input-field" type="text" name="province" value="<?= $address->province ?>" placeholder="Tên tỉnh hoặc thành phố" required style="margin-bottom: 10px;">
            <input class="btn btn-blue" name="submited" type="submit" value="Cập nhật" style="margin-bottom: 10px;">
        </form>
    </div>
    <?php
        if(isset($_POST["submited"])){
            $address = new Address($_POST["province"]);
            $address->id =$_POST["id"];
            $address_sv = new AddressService();
            if($address_sv->Update($address)){
                header("location: /PHP/LT2/address/home.php");
            }
            else echo "<script>alert('Cạp nhật địa chỉ không thành công')</script>";
        }
    ?>
</body>
</html>