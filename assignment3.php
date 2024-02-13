<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// إعداد PHPMailer
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.example.com'; // استبدله بمعلومات الخادم البريدي الخاص بك
$mail->SMTPAuth = true;
$mail->Username = 'osamaten77@gmail.com'; // استبدله بعنوان بريدك الإلكتروني
$mail->Password = '12345678900987654321'; // استبدله بكلمة مرور بريدك الإلكتروني
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// إعداد المرسل والمستلم
$mail->setFrom('osamaten77@gmail.com', 'Osama'); // استبدله بعنوان بريدك الإلكتروني واسمك
$mail->addAddress('newosama@gmail.com', 'osama abdu ali'); // استبدله بعنوان بريد المستلم واسم المستلم

// إعداد محتوى البريد الإلكتروني
$mail->isHTML(true);
$mail->Subject = 'موضوع البريد الإلكتروني';
$mail->Body = '
  <!DOCTYPE html>
  <html>
  <head>
    <title>صفحة البريد الإلكتروني</title>
    <style>
      /* قم بتنسيق صفحة البريد الإلكتروني هنا باستخدام CSS */
    </style>
  </head>
  <body>
    <h1>مرحبًا!</h1>
    <p>هذا هو محتوى البريد الإلكتروني.</p>
  </body>
  </html>
';

// إرسال البريد الإلكتروني
if ($mail->send()) {
  echo 'تم إرسال البريد الإلكتروني بنجاح!';
} else {
  echo 'حدث خطأ أثناء محاولة إرسال البريد الإلكتروني: ' . $mail->ErrorInfo;
}
?>