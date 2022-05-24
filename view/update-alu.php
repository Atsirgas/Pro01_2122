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
$dni = $_POST['dni'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$clase = $_POST['clase'];
$id = $_POST['id'];

$select = "SELECT p.id_alumne, p.dni_alu, p.nom_alu, p.cognom1_alu, p.cognom2_alu, p.telf_alu, p.email_alu, pt.nom_classe
FROM tbl_alumne p 
INNER JOIN tbl_classe pt 
ON p.classe=pt.id_classe
WHERE p.id_alumne != $id";
$datos = mysqli_query($connection, $select);
$todosDNI = array();
$todosEMAIL = array();

while ($fila = mysqli_fetch_assoc($datos)){
    $todosDNI[]=$fila['dni_alu'];
    $todosEMAIL[]=$fila['email_alu']; 
}


if (!in_array($dni,$todosDNI) && !in_array($email,$todosEMAIL)){
    $sql = "UPDATE `tbl_alumne` SET `nom_alu` = '$nombre', `cognom1_alu` = '$apellido1', `cognom2_alu` = '$apellido2', `dni_alu` = '$dni', `email_alu` = '$email', `telf_alu` = '$telefono', `classe` = '$clase' WHERE `tbl_alumne`.`id_alumne` = $id";
    mysqli_query($connection, $sql);
    ?>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            function aviso(url) {
                                Swal.fire({
                                        title: 'Alumne modificat correctament',
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

                            aviso('./mostrar.php?id=alu');
                        </script>
                    <?php
} else {
        foreach ($todosDNI as $DNIs) {
            if ($DNIs == $dni) {
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    function aviso(url) {
                        Swal.fire({
                                title: "El usuari no s'ha pogut modificar ja que el DNI està repetit",
                                imageUrl: '../img/borrar.png',
                                imageWidth: 200,
                                imageHeight: 200,
                                background: '#f39c12',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Volver'
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "./mostrar.php?id=alu";
                                }
                            })
                    }
    
                    aviso('../index.php');
                </script>
                <?php
            }
        }
        foreach ($todosEMAIL as $CORREOS) {
            if ($CORREOS == $email) {
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    function aviso(url) {
                        Swal.fire({
                                title: "El usuari no s'ha pogut modificar ja que el CORREU està repetit",
                                imageUrl: '../img/borrar.png',
                                imageWidth: 200,
                                imageHeight: 200,
                                background: '#f39c12',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Volver'
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "./mostrar.php?id=alu";
                                }
                            })
                    }
    
                    aviso('../index.php');
                </script>
                <?php
            }
        }
}

?>
</body>
</html>