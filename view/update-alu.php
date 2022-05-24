<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
<div id="portada">
<?php
include '../conexion.php';

$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido01'];
$apellido2 = $_POST['apellido02'];
$DNI = $_POST['dni'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$clase = $_POST['clase'];
$id = $_POST['id'];

$sql = "UPDATE `tbl_alumne` SET `nom_alu` = '$nombre', `cognom1_alu` = '$apellido1', `cognom2_alu` = '$apellido2', `dni_alu` = '$DNI', `email_alu` = '$email', `telf_alu` = '$telefono', `classe` = '$clase' WHERE `tbl_alumne`.`id_alumne` = $id";
mysqli_query($connection, $sql);

?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function aviso(url) {
    Swal.fire({
            title: 'Usuario modificado',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Volver'
        })
        .then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
}

aviso('./mostrar.php?id=alu');
</script>
</div>
</body>
</html>