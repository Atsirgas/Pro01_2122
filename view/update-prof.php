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
$apellido1 = $_POST['1apellido'];
$apellido2 = $_POST['2apellido'];
$email = $_POST['email'];
$telefono = $_POST['telf'];
$grado = $_POST['grado'];
$id = $_POST['id'];

$sql = "UPDATE `tbl_professor` SET `nom_prof` = '$nombre', `cognom1_prof` = '$apellido1', `cognom2_prof` = '$apellido2', `email_prof` = '$email', `telf` = '$telefono', `dept` = '$grado' WHERE `tbl_professor`.`id_professor` = $id";
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

aviso('./mostrar.php?id=prof');
</script>
</div>
</body>
</html>