<?php 
    include "../services.php";
    $service = new UserService();
    if(!$service->Authenticate()){header("location: /PHP/LT2/login.php?redirect=/PHP/LT2/address/home.php");return;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Trang thông tin địa chỉ</title>
</head>
<body>
    <a href="/PHP/LT2/address/create.php">Thêm mới địa chỉ</a>
    <table class="table table-blue">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tên tỉnh</td>
                    <td>Delete</td>
                    <td>Update</td>
                </tr>
            </thead>
            <?php
                $address_list = (new AddressService())->GetAddressAll();
                foreach($address_list as $address): ?>
                   <tr>
                        <td><?= $address->id ?></td>
                        <td><?= $address->province?></td>
                        <td>
                            <a href="/PHP/LT2/address/delete.php?id=<?= $address->id?>" onclick="return confirm('Bạn có muốn xoá địa chỉ <?= $address->province ?> không');">Delete</a>
                        </td>
                        <td>
                            <a href="/PHP/LT2/address/update.php?id=<?= $address->id?>">Update</a>
                        </td>
                    </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>