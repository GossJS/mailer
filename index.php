<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // `true` разрешает исключения
try {
    // настройки сервера
    $mail->SMTPDebug = 2;                                 // подробный отчёт о действиях
    $mail->isSMTP();                                      // использование SMTP
    $mail->Host = 'smtp.yandex.ru';
    $mail->SMTPAuth = true;                                
    $mail->Username = 'useruser@yandex.ru';               // SMTP логин
    $mail->Password = 'jkdhg23565sfgsa';                  // пароль  
    $mail->SMTPSecure = 'tls';                            // шифрование TLS encryption, вариант – `ssl`  
    $mail->Port = 587;                                    // порт TCP   

    // setFrom и replyTo для Яндекса должны совпадать с Username
    $mail->setFrom('useruser@yandex.ru', 'Mailer');
    $mail->addAddress('your_address@gmail.com', 'Ilia G');     // кому направляете письмо

    $mail->addReplyTo('useruser@yandex.ru', 'Mailer');

    // Содержимое
    $mail->isHTML(true);                                  // формат письма – HTML
    $mail->Subject = 'Тема письма;
    $mail->Body    = 'Тело сообщения с <b>полужирным</b> шрифтом!';
    $mail->AltBody = 'Тело без тегов для не-HTML клиентов;

    $mail->send();
    echo 'Отправлено!';
} catch (Exception $e) {
    echo 'Не удалось отправить. Mailer Error: ', $mail->ErrorInfo;
}
