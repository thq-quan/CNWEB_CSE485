<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;   
    use PHPMailer\PHPMailer\Exception;
    // Chỉnh đường dẫn phù hợp với phần Tổ chức thư mục của BẠN
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    // Đóng gói đoạn xử lý gửi Email vào Function
    function sendEmail($email,$title,$content){
        // 1. Cài đặt môi trường sử dụng phpmailer
        // 2. Tạo ra đối tượng PHPMailer
        $mail = new PHPMailer(true); //Biến $mail đang là 1 object

        // 3. Xử lý gửi Email thông qua đối tượng $mail
        // Quá trình này có thể có lỗi phát sinh, dừng thực thi chương trình.
        try{
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'tahongquanyttq@gmail.com';// SMTP username
            $mail->Password = 'ynhlblifsylsthwx'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
    
            $mail->setFrom('tahongquanyttq@gmail.com', 'Tạ Hồng Quân');
            $mail->addReplyTo('tahongquanyttq@gmail.com', 'Tạ Hồng Quân');
            $mail->addAddress($email);
            // Gửi tới: kitudu99@gmail.com
            // Tiêu đề Email là gì?
            $mail->isHTML(true);   // Set email format to HTML
            $mail->Subject = "'.$title.'";
            // Nội dung Email
           
            $mail->Body = ''.$content.'<br>Nhấn <a href="http://localhost/CNWEB_CSE485/detail.php">vào đây</a> để xem thêm';
            // Tệp tên đính kèm Email gửi đi
            // $mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Nếu bạn muốn đính kèm tệp tin gửi đi

            // Gửi thư
            if($mail->send()){
                echo 'Thư đã gửi đi thành công!';
            }

        }catch(Exception $e){
            echo "Lỗi ".$e->getMessage();
        }

    }

?>