<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';
require("../phpmailer/PHPMailer.php");
require("../phpmailer/SMTP.php");
require("../phpmailer/Exception.php");
//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);
include '../conexion.php';
$id=$_GET['id_alu'];
$sql="SELECT email_alu FROM tbl_alumne WHERE id_alumne={$id};";
$sqlfi=mysqli_query($connection, $sql);
foreach($sqlfi as $correo){
    $correo2=$correo['email_alu'];
}
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gtalayerojpg@gmail.com';                     //SMTP username
    $mail->Password   = 'ASDasd123_';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption

    //Recipients
    echo $_POST['id'];
    $mail->setFrom('gtalayerojpg@gmail.com', 'Guillem Talayero');
    $mail->addAddress("$correo2", '');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$asunto";
    $mail->Body    = "$mensaje";


    $mail->send();
    echo "El mensage se envio correctamente";
} catch (Exception $e) {
    echo "Error al enviar el mensage", $mail->ErrorInfo ;
}