<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_ENV['IS_HEROKU']))
    {
        $phpmailer_src = "/app/vendor/phpmailer/phpmailer/src/";
    }
    else
    {
        $phpmailer_src = $_SERVER['DOCUMENT_ROOT'].'\\vendor\\phpmailer\\phpmailer\\src\\';
    }
    require $phpmailer_src.'Exception.php';
    require $phpmailer_src.'PHPMailer.php';
    require $phpmailer_src.'SMTP.php';
    require $phpmailer_src.'POP3.php';
    require $phpmailer_src.'OAuth.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">    
    <title>Email</title>
</head>
<body>
    <div class="flex justify-content-center">
        <form class="flex flex-dir-col" method="POST" style="width: 355px;">
            <h1 class="text-center">Gửi email xác nhận tới</h1>
            To: <input class="input-field" type="text" name="email" placeholder="Gửi tới email ..." required style="margin-bottom: 10px;">
            Subject: <input class="input-field" type="text" name="subject" placeholder="Tiêu đề" required style="margin-bottom: 10px;">
            Body: <input class="input-field" type="text" name="body" placeholder="Nội dung" required style="margin-bottom: 10px; min-height: 10em;">
            <input class="btn btn-blue" name="submited" type="submit" value="Gửi" required style="margin-bottom: 10px;">
            <div>Chưa có tài khoản?<a class="text-bold" href="/PHP/LT2/signup.php" style="margin-left:5px">Đăng ký</a></div>
        </form>
    </div>
    <?php
        $mail = new PHPMailer(true);
        if (isset($_POST['submited']))
        {
            try {
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "ltmt1.cd193569.giang@gmail.com";
                $mail->Password = "ndbghdvn";
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('ltmt1.cd193569.giang@gmail.com');
                $mail->addAddress($_POST['email']);
                $mail->isHTML(true);
                $mail->Subject = $_POST['subject'];
                $mail->Body = $_POST['body'];
                $mail->send();

                echo "email gửi thành công";
            }
            catch (Exception $e)
            {
                echo 'Cannot send email<br>Error: ', $mail->ErrorInfo;
            }
        }
    ?>
</body>
</html>