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

if(isset($_GET['id_prof']) && ($_GET['id'])=="prof"){
    $sql = "DELETE FROM `tbl_professor` WHERE id_professor={$_GET['id_prof']};";
    $listaprofes = mysqli_query($connection,$sql);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Usuario borrado correctamente',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "./mostrar.php?id=prof";
                    }
                })
        }

        aviso('../mostrar.php?id=prof');
    </script>
    <?php
} else{
    $sql2 = "DELETE FROM `tbl_alumne` WHERE id_alumne={$_GET['id_alu']};";
    $listaalumnos = mysqli_query($connection,$sql2);
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Usuario borrado correctamente',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver'
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