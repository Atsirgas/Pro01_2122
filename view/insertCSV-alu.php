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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" type="image/x-icon" href="../img/JPG.png">
    <title>Alert</title>
    
    
</head>
<body>
    <div id="portada">

    
    

<?php
include '../conexion.php';
$fichero=$_FILES['fichero'];
/* print_r($fichero); */
/* echo $fichero['tmp_name']; */
if(($fichero['size']<200*1024) && ($fichero['type']=="text/csv")){

    if (isset($_GET['id'])=="alu") {
            
            $id = $_GET['id'];
            /* echo $id; */
                // Profesores
            if($id=="alu"){
                /* echo "hola"; */
                $sql = "SELECT p.* , pt.nom_classe
                FROM tbl_alumne p 
                INNER JOIN tbl_classe pt 
                ON p.classe=pt.id_classe;";
                    $cons = mysqli_query($connection, $sql);
                    $lista_emails=array();
                    $todosDNI = array();
                    while ($fila = mysqli_fetch_assoc($cons)){
                        $lista_emails[]=$fila['email_alu'];
                        $todosDNI[]=$fila['dni_alu']; 
                    }
                    $lineas = file($fichero['name']);
                    /* echo $lineas; */
                    $cont=0;
                    foreach($lineas as $linea){
                        if($cont==0){
                            $cont++;
                            continue;
                        }
                        $campos = explode(",",$linea);
                        // echo $campos[3];
                        // echo "<br>";
                        $id=$campos[0];
                        $apellido1=$campos[1];
                        $apellido2=$campos[2];
                        $nombre=$campos[3];
                        $telefono=$campos[4];
                        $email=$campos[5];
                        /* echo $email; */
                        $dni=$campos[6];
                        $clase=$campos[7];
                        if (!in_array($email,$lista_emails) && !in_array($dni,$todosDNI)) {
                            $sql = "INSERT INTO `tbl_alumne`(`nom_alu`, `cognom1_alu`, `cognom2_alu`, `dni_alu`, `email_alu`, `telf_alu`, `classe`) VALUES ('$nombre','$apellido1','$apellido2','$dni','$email','$telefono','$clase');";
                            $insert = mysqli_query($connection, $sql);
                            /* echo $sql; */
                            echo '<br>';
                            echo "<script type=\"text/javascript\">alert(\"Usuario '$nombre' agregado correctamente\");</script>"; 
                            } else{
                                
                                echo "<script type=\"text/javascript\">alert(\"Usuario '$nombre' repetido\");</script>"; 
                                
                            }
                    

                    }
                    echo "<script type=\"text/javascript\">window.location.href='mostrar.php?id=alu'</script>";
            
                }
        }
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    function aviso(url) {
                        Swal.fire({
                                title: 'El archiu no es un archiu CSV o es massa gran',
                                imageUrl: '../img/warning.png',
                                imageWidth: 200,
                                imageHeight: 200,
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
    }

?>
</div>
</body>
</html>