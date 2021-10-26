<?php
    $day = isset($_POST["day"])? (int) $_POST["day"]:null;
    $submited = isset($_POST["submited"])? $_POST["submited"]:false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Xác định ngày trong tuần</title>
</head>
<body>
    <div class="flex  justify-content-center"">
        <div>
            <section>
                <h1 class="head-title text-center">Đề bài: Xác định ngày trong tuần</h1>
                <div>Chi tiết đề bài:
                    <ul>
                        <li>Nhập một ngày bất kì</li>
                        <li>Cho biết số vừa nhập là thứ mấy trong tuần</li>
                    </ul>
                </div>
            </section>
            <section>
                <form method="POST">
                    <label for="day">Nhập ngày:</label>
                    <input class="input-field" id="day" type="number" step="1" name="day" placeholder="Nhập ngày" required>
                    <button class="btn btn-blue" type="submit" name="submited" value="Submit">Kiểm tra</button>
                </form>
                <div>
                    <?php
                        if($submited){
                        switch($day%7){
                                case 0:
                                    echo "Ngày ".$day." là Chủ nhật";
                                    break;
                                case 1:
                                    echo "Ngày ".$day." là Thứ 2";
                                    break;
                                case 2:
                                    echo "Ngày ".$day." là Thứ 3";
                                    break;
                                case 3:
                                    echo "Ngày ".$day." là Thứ 4";
                                    break;
                                case 4:
                                    echo "Ngày ".$day." là Thứ 5";
                                    break;
                                case 5:
                                    echo "Ngày ".$day." là Thứ 6";
                                    break;
                                case 6:
                                    echo "Ngày ".$day." là Thứ 7";
                                    break;
                                default:
                                    echo "Ngày không hợp lệ ❌";
                                    break;
                        }
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
