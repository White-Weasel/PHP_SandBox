<?php
    $age = isset($_POST["age"])?(int)$_POST["age"]:null;
    $submited = isset($_POST["submited"])? $_POST["submited"]:false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Xác định đối tượng</title>
</head>
<body>
    <div class="flex  justify-content-center"">
        <div>
            <section>
                <h1 class="head-title text-center">Đề bài: Xác định đối tượng</h1>
                <div>Chi tiết đề bài:
                    <ul>
                        <li>Dưới 40 là <span style='font-weight:bold'>Trẻ</span></li>
                        <li>Từ 40-60 là <span style='font-weight:bold'>Trung niên</span></li>
                        <li>Trên 60 là <span style='font-weight:bold'>Già</span></li>
                    </ul>
                </div>
            </section>
            <section>
                <form method="POST">
                    <label for="age">Nhập tuổi:</label>
                    <input class="input-field" id="age" type="number" step="1" name="age" placeholder="Nhập số thứ nhất" required>            
                    <button class="btn btn-blue" type="submit" name="submited" value="Submit">Kiểm tra</button>
                </form>
                <div>
                    <?php
                        if($submited){
                        if($age<=0)echo "Tuổi không xác định ❌";
                        elseif($age<40) echo "Tuổi của bạn đang ở mức <span style='font-weight:bold'>Trẻ</span> 🧒";
                        elseif($age<=60) echo "Tuổi của bạn đang ở mức <span style='font-weight:bold'>Trung niên</span> 👨";
                        else echo "Tuổi của bạn đang ở mức <span style='font-weight:bold'>Già</span> 👴";
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
