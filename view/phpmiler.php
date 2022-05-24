<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';

//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'administrador@gmail.com';                     //SMTP username
    $mail->Password   = 'asdASD123';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption

    //Recipients
    $mail->setFrom('100007907.joan23@fje.edu', '');
    $mail->addAddress('guillemtalayero@gmail.com', 'Guillem Talayero Carrasco');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Asunto';
    $mail->Body    = 'Mensage';


    $mail->send();
    echo "El mensage se envio correctamente";
} catch (Exception $e) {
    echo "Error al enviar el mensage", $mail->ErrorInfo ;
}