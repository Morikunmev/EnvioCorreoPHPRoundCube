<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SSL/TLS
    $mail->isSMTP();
    $mail->Host = 'mail.alphadocere.cl';
    $mail->SMTPAuth = true;
    $mail->Username = 'developers@alphadocere.cl';
    $mail->Password = '}BoQC-zxWXyX';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Configuración del correo
    $mail->setFrom('developers@alphadocere.cl', 'Developers');
    $mail->addAddress('ricky201325@gmail.com'); // Cambié el destinatario por el que mencionaste

    // Contenido
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Subject = 'Prueba de envío desde PHP';
    $mail->Body = '<h1>Hola!</h1><p>Este es un correo de prueba enviado desde PHP usando PHPMailer</p>';
    $mail->AltBody = 'Hola! Este es un correo de prueba enviado desde PHP usando PHPMailer';

    $mail->send();
    echo 'El mensaje ha sido enviado correctamente';
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error: {$mail->ErrorInfo}";
}
