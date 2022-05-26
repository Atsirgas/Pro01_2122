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
        $name=$_POST['nombre'];
        $apellido1=$_POST['1apellido'];
        $apellido2=$_POST['2apellido'];
        $email=$_POST['email'];
        $telefono=$_POST['telf'];
        $grado=$_POST['grado'];
        /* echo $name;
        echo $apellido1;
        echo $apellido2;
        echo $email;
        echo $telefono;
        echo $grado;
 */
        $sql = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf, pt.nom_dept
                FROM tbl_professor p 
                INNER JOIN tbl_dept pt 
                ON p.dept=pt.id_dept;";
                $cons = mysqli_query($connection, $sql);
                $lista_emails=array();
                while ($fila = mysqli_fetch_assoc($cons)){
                    $lista_emails[]=$fila['email_prof']; 
                }
                /* print($lista_emails); */

                if (!in_array($email,$lista_emails)){
                    /* echo "no esta repetido"; */
                    $sql2 = "INSERT INTO `tbl_professor` (`nom_prof`, `cognom1_prof`,`cognom2_prof`,`email_prof`,`telf`,`dept`,`password_prof`) VALUES ('$name', '$apellido1', '$apellido2', '$email', '$telefono', '$grado', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220')";
                    $insert = mysqli_query($connection, $sql2);
                    ?>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            function aviso(url) {
                                Swal.fire({
                                        title: 'Professor creat correctament',
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
                                    title: "El usuari no s'ha pogut crear ja que el email esta repetit",
                                    imageUrl: '../img/borrar.png',
                                    imageWidth: 200,
                                    imageHeight: 200,
                                    background: '#f39c12',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Volver'
                                })
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "./form-profesores.php";
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