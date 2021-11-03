<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require $_SERVER['DOCUMENT_ROOT'].'\\vendor\\phpmailer\\phpmailer\\src\\Exception.php';
    require $_SERVER['DOCUMENT_ROOT'].'\\vendor\\phpmailer\\phpmailer\\src\\PHPMailer.php';
    require $_SERVER['DOCUMENT_ROOT'].'\\vendor\\phpmailer\\phpmailer\\src\\SMTP.php';
    require $_SERVER['DOCUMENT_ROOT'].'\\vendor\\phpmailer\\phpmailer\\src\\POP3.php';
    require $_SERVER['DOCUMENT_ROOT'].'\\vendor\\phpmailer\\phpmailer\\src\\OAuth.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/src/site.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="flex justify-content-center">
        <form class="flex flex-dir-col" method="POST" style="width: 355px;">
            <h1 class="text-center">Đăng nhập</h1>
            <input class="input-field" type="text" name="email" placeholder="Gửi tới email ..." required style="margin-bottom: 10px;">
            <input class="btn btn-blue" name="submited" type="submit" value="Gửi" required style="margin-bottom: 10px;">
            <div>Chưa có tài khoản?<a class="text-bold" href="/PHP/LT2/signup.php" style="margin-left:5px">Đăng ký</a></div>
        </form>
    </div>
    <?php
        $mail = new PHPMailer(true);
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
            $mail->addAddress('vanyellow1211@gmail.com', 'Thu Van');
            $mail->isHTML(true);
            $mail->Subject = "Bài tập gửi email";
            $mail->Body = "Email xác nhận";
            $mail->send();

            echo "email gửi thành công";
        }
        catch (Exception $e)
        {
            echo 'Cannot send email<br>Error: ', $mail->ErrorInfo;
        }
    ?>
</body>
</html>