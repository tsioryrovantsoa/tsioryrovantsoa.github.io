<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'darwin.dnshostnetwork.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'noreply@tsioryrakotoarimalala.com';
    $mail->Password   = '!1Kor1510a<3$&';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('noreply@tsioryrakotoarimalala.com', 'noreply@tsioryrakotoarimalala.com');
    $mail->addAddress('noreplyproject99@gmail.com');

    $mail->Subject = 'Test Mail';
    $mail->Body    = 'Bonjour <b>Tsiory !</b>, Toutes mes felicitations. Vous avez reussi !';

    $mail->send();
    $mail->clearAllRecipients();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
