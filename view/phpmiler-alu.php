<?php
session_start();
if(!isset($_SESSION["email_usu"])){
    header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/JPG.png">
    <link rel="stylesheet" href="../css/styles.css">
    <title>JPG</title>
</head>
<body>
<div id="portada">



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
    /* echo $_POST['id']; */
    $mail->setFrom('gtalayerojpg@gmail.com', 'Guillem Talayero');
    $mail->addAddress("$correo2", '');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$asunto";
    $mail->Body    = "$mensaje";


    $mail->send();
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Email enviat correctament',
                    icon: 'success',
                    background: '#f39c12',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Tornar'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "./mostrar.php?id=alu";
                    }
                })
        }

        aviso('../mostrar.php?id=alu');
    </script>
    <?php
    /* echo "El missatge s'ha enviat correctament"; */
} catch (Exception $e) {
    /* echo "Error al enviar el missatge", $mail->ErrorInfo ; */
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Email no enviat per un error desconegut',
                    icon: 'danger',
                    background: '#f39c12',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Tornar'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "./mostrar.php?id=alu";
                    }
                })
        }

        aviso('../mostrar.php?id=alu');
    </script>
    <?php
}
?>
</div>
</body>
</html>