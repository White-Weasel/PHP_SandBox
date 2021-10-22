<?php
    include "../services.php";
    $service = new UserService();
    if(!$service->Authenticate()){
        header("location: /PHP/LT2/login.php");
        return;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Trang thông tin cá nhân</title>
</head>
<body>
    <div>
        Xin chào <span class='text-bold'><?= $_SESSION["username"]?></span>
    </div>
    <a href="/PHP/LT2/logout.php">Thoát đăng nhập</a>
    <table class="table table-blue">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Username</td>
                    <td>Password</td>
                    <td>Gender</td>
                    <td>Birth</td>
                    <td>Hobbies</td>
                    <td>Address</td>
                    <td>Delete</td>
                    <td>Update</td>
                </tr>
            </thead>
            <?php
                $user_list = (new UserService())->GetUserAll();
                foreach($user_list as $user): ?>
                   <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->password ?></td>
                        <td><?= $user->gender ?></td>
                        <td><?= $user->birth->format("d/m/Y")?></td>
                        <td><?= join(", ",$user->hobbies) ?></td>
                        <td><?= isset($user->address->province)?$user->address->province:"" ?></td>
                        <td>
                            <a href="/PHP/LT2/users/delete.php?id=<?= $user->id?>" onclick="return confirm('Bạn có muốn xoá người dùng <?= $user->username ?> không');">Delete</a>
                        </td>
                        <td>
                            <a href="/PHP/LT2/users/update.php?id=<?= $user->id?>">Update</a>
                        </td>
                    </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>