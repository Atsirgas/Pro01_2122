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
include '../conexion.php';

$nombre = $_POST['nombre'];
$apellido1 = $_POST['1apellido'];
$apellido2 = $_POST['2apellido'];
$email = $_POST['email'];
$telefono = $_POST['telf'];
$grado = $_POST['grado'];
$id = $_POST['id'];


$sql1 = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf, pt.nom_dept
FROM tbl_professor p 
INNER JOIN tbl_dept pt 
ON p.dept=pt.id_dept
WHERE p.id_professor != $id";
$cons = mysqli_query($connection, $sql1);
$lista_emails=array();
while ($fila = mysqli_fetch_assoc($cons)){
    $lista_emails[]=$fila['email_prof']; 
}

if (!in_array($email,$lista_emails)){
    $sql = "UPDATE `tbl_professor` SET `nom_prof` = '$nombre', `cognom1_prof` = '$apellido1', `cognom2_prof` = '$apellido2', `email_prof` = '$email', `telf` = '$telefono', `dept` = '$grado' WHERE `tbl_professor`.`id_professor` = $id";
    mysqli_query($connection, $sql);
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Professor modificat correctament',
                    icon: 'success',
                    background: '#f39c12',
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
<?php

}else{
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: "El usuari no s'ha pogut modificar ja que el email esta repetit",
                    imageUrl: '../img/borrar.png',
                    imageWidth: 200,
                    imageHeight: 200,
                    background: '#f39c12',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "./mostrar.php?id=prof";
                    }
                })
        }

        aviso('../index.php');
    </script>
    <?php
}
?>
</div>
</body>
</html>