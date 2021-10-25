<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <title>Bài 2</title>
</head>
<body>
    <h1>Kiểm tra chẵn lẻ</h1>
    <form method="post">
        Nhập số: <input type="number" name="num">
        <input type="submit" name="sub" value="Nhập số">
    </form>

    <?php
        if(isset($_POST['sub']))
        {
            $so = $_POST['num'];
            if($so % 2 == 0)
                echo "Số ".$so." là số chẵn";
            else
                echo "Số ".$so." là số lẻ";
        }
    ?>
</body>
</html> 
=======
<?php
    $numb = isset($_POST["numb"])? (float)$_POST["numb"]:null;
    $submited = isset($_POST["submited"])? $_POST["submited"]:false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Kiểm tra tính chẵn lẻ của một số</title>
</head>
<body>
    <div class="flex  justify-content-center"">
        <div>
            <section>
                <h1 class="head-title text-center">Đề bài: Kiểm tra tính chẵn lẻ của một số </h1>
            </section>
            <section>
                <form method="POST">
                    <label for="numb">Nhập số:</label>
                    <input class="input-field" id="numb" type="number" step="any" name="numb" placeholder="Số cần kiểm tra (VD: 2, 4, 3,...)" required>
                    <button class="btn btn-blue" type="submit" name="submited" value="Submit">Kiểm tra</button>
                </form>
                <div>
                    <?php
                        if($submited){
                            if($numb%2==0)echo $numb." là số chẵn";
                            else echo $numb." là số lẻ";
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
>>>>>>> c0e118ad2f92df5676f72d8ed0b6ddfd7502949c
