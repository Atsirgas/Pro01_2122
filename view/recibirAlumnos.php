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
if(isset($_POST["btn-enviar"])){


$select = "SELECT p.* , pt.nom_classe
FROM tbl_alumne p 
INNER JOIN tbl_classe pt 
ON p.classe=pt.id_classe;";
$datos = mysqli_query($connection, $select);
$todosDNI = array();
$todosEMAIL = array();

$name=$_POST['nombre'];
$apellido1=$_POST['apellido01'];
$apellido2=$_POST['apellido02'];
$dni=$_POST['dni'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$clase=$_POST['clase'];

while ($fila = mysqli_fetch_assoc($datos)){
    $todosDNI[]=$fila['dni_alu'];
    $todosEMAIL[]=$fila['email_alu']; 
}
/* print($lista_emails); */
if (!in_array($dni,$todosDNI) && !in_array($email,$todosEMAIL)){
    $insert="INSERT INTO `tbl_alumne`(`nom_alu`, `cognom1_alu`, `cognom2_alu`, `dni_alu`, `email_alu`, `telf_alu`, `classe`) VALUES ('$name','$apellido1','$apellido2','$dni','$email','$telefono','$clase');";
    $conexion=mysqli_query($connection,$insert);
    ?>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            function aviso(url) {
                                Swal.fire({
                                        title: 'Alumne creat correctament',
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
                                title: "El usuari no s'ha pogut crear ja que el DNI esta repetit",
                                imageUrl: '../img/borrar.png',
                                imageWidth: 200,
                                imageHeight: 200,
                                background: '#f39c12',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Volver'
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "./form-alumnos.php";
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
                                title: "El usuari no s'ha pogut crear ja que el CORREU esta repetit",
                                imageUrl: '../img/borrar.png',
                                imageWidth: 200,
                                imageHeight: 200,
                                background: '#f39c12',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Volver'
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "./form-alumnos.php";
                                }
                            })
                    }
    
                    aviso('../index.php');
                </script>
                <?php
            }
        }
}
}else{
    header("Location:form-alumnos.php");
}
?>
    </div>
</body>
</html>



