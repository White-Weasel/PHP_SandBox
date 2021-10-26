<?php
    $numb1 = isset($_POST["numb1"])? (float)$_POST["numb1"]:null;
    $numb2 = isset($_POST["numb2"])? (float)$_POST["numb2"]:null;
    $submited = isset($_POST["submited"])? $_POST["submited"]:false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Tìm số lớn hơn, nhỏ hơn</title>
</head>
<body>
    <div class="flex  justify-content-center">
        <div>
            <section>
                <h1 class="text-center head-title">Đề bài: Tìm số lớn hơn, nhỏ hơn</h1>
            </section>
            <section>
                <form method="POST">
                    <label for="numb1">Số thứ nhất:</label>
                    <input id="numb1" class="input-field" type="number" step="any" name="numb1" placeholder="Nhập số thứ nhất" required>
                    <label for="numb2">Số thứ hai:</label>
                    <input id="numb2" class="input-field" type="number" step="any" name="numb2" placeholder="Nhập số thứ hai" required>
                    <button class="btn btn-blue" type="submit" name="submited" value="Submit">So sánh</button>
                </form>
                <div>
                    <?php
                        if($submited){
                            if($numb1>$numb2)echo $numb1." lớn hơn ".$numb2;
                            elseif($numb1<$numb2)echo $numb1." nhỏ hơn ".$numb2;
                            else echo $numb1." bằng " .$numb2;
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
