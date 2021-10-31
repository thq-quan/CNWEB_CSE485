<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;   
    use PHPMailer\PHPMailer\Exception;
    include 'phpmailer/Exception.php';
    include 'phpmailer/PHPMailer.php';
    include 'phpmailer/SMTP.php';
    function sendEmail($email,$title,$content){
        $mail = new PHPMailer(true);
        try{
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tahongquanyttq@gmail.com';
            $mail->Password = 'ynhlblifsylsthwx'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';
    
            $mail->setFrom('tahongquanyttq@gmail.com', 'Tạ Hồng Quân');
            $mail->addReplyTo('tahongquanyttq@gmail.com', 'Tạ Hồng Quân');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "'.$title.'"; 
            $mail->Body = ''.$content.'<br>Nhấn <a href="http://localhost/CNWEB_CSE485/detail.php">vào đây</a> để xem thêm';
            if($mail->send()){
                echo "Thành công";
            }
        }catch(Exception $e){
            echo "Lỗi ".$e->getMessage();
        }
    }
?>