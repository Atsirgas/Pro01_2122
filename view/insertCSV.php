<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Alert</title>
</head>
<body>
    <div id="portada">

    
    

<?php
include '../conexion.php';
$fichero=$_FILES['fichero'];
/* print_r($fichero); */
/* echo $fichero['tmp_name']; */


    if (isset($_GET['id'])=="prof") {
            if(($fichero['size']<200*1024) && ($fichero['type']=="text/csv")){
            $id = $_GET['id'];
            /* echo $id; */
                // Profesores
            if($id=="prof"){
                /* echo "hola"; */
                $sql = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf, pt.nom_dept
                    FROM tbl_professor p 
                    INNER JOIN tbl_dept pt 
                    ON p.dept=pt.id_dept;";
                    $cons = mysqli_query($connection, $sql);
                    $lista_emails=array();
                    while ($fila = mysqli_fetch_assoc($cons)){
                        $lista_emails[]=$fila['email_prof']; 
                    }
                    $lineas = file($fichero['name']);
                    /* echo $lineas; */
                    $cont=0;
                    foreach($lineas as $linea){
                        if($cont==0){
                            $cont++;
                            continue;
                        }
                        $campos = explode(";",$linea);
                        // echo $campos[3];
                        // echo "<br>";
                        $id=$campos[0];
                        $apellido1=$campos[1];
                        $apellido2=$campos[2];
                        $nombre=$campos[3];
                        $telefono=$campos[4];
                        $email=$campos[5];
                        /* echo $email; */
                        $dept=$campos[6];
                        if (!in_array($campos[5],$lista_emails)) {
                            $sql = "INSERT INTO `tbl_professor` (`nom_prof`, `cognom1_prof`,`cognom2_prof`,`email_prof`,`telf`,`dept`) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$telefono', '$dept')";
                            $insert = mysqli_query($connection, $sql);
                            /* echo $sql; */
                            echo '<br>';
                            echo "<script type=\"text/javascript\">alert(\"Usuario '$nombre' agregado correctamente\");</script>"; 
                            } else{
                                ?>
                                
                                <?php
                                echo "<script type=\"text/javascript\">alert(\"Usuario '$nombre' repetido\");</script>"; 
                            }
                    

                    }
            // Alumnos
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
    
                    aviso('./mostrar.php?id=prof');
                </script>
                <?php
    }

}else{
    if(($fichero['size']<200*1024) && ($fichero['type']=="text/csv")){
        $id = $_GET['id'];
        /* echo $id; */
            // Profesores
        if($id=="prof"){
            /* echo "hola"; */
            $sql = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf, pt.nom_dept
                FROM tbl_professor p 
                INNER JOIN tbl_dept pt 
                ON p.dept=pt.id_dept;";
                $cons = mysqli_query($connection, $sql);
                $lista_emails=array();
                while ($fila = mysqli_fetch_assoc($cons)){
                    $lista_emails[]=$fila['email_prof']; 
                }
                $lineas = file($fichero['name']);
                /* echo $lineas; */
                $cont=0;
                foreach($lineas as $linea){
                    if($cont==0){
                        $cont++;
                        continue;
                    }
                    $campos = explode(";",$linea);
                    // echo $campos[3];
                    // echo "<br>";
                    $id=$campos[0];
                    $apellido1=$campos[1];
                    $apellido2=$campos[2];
                    $nombre=$campos[3];
                    $telefono=$campos[4];
                    $email=$campos[5];
                    /* echo $email; */
                    $dept=$campos[6];
                    if (!in_array($campos[5],$lista_emails)) {
                        $sql = "INSERT INTO `tbl_professor` (`nom_prof`, `cognom1_prof`,`cognom2_prof`,`email_prof`,`telf`,`dept`) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$telefono', '$dept')";
                        $insert = mysqli_query($connection, $sql);
                        /* echo $sql; */
                        echo '<br>';
                        echo "<script type=\"text/javascript\">alert(\"Usuario '$nombre' agregado correctamente\");</script>"; 
                        } else{
                            ?>
                            
                            <?php
                            echo "<script type=\"text/javascript\">alert(\"Usuario '$nombre' repetido\");</script>"; 
                        }
                

                }
        // Alumnos
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

                aviso('./mostrar.php?id=prof');
            </script>
            <?php
}
}
?>
</div>
</body>
</html>