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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../img/JPG.png">
    <link rel="stylesheet" href="../css/styles.css">
    <title>JPG</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <div id="portada" class="padding-3">
        <div class="recuadro">
            <?php
                /* echo $_SESSION["email_usu"]; */
                include '../conexion.php';
                if(isset($_GET['id'])&& ($_GET['id'])=="alu"){
                    $sql = "SELECT * FROM tbl_alumne;";
                    $listadodept= mysqli_query($connection, $sql);
                    echo "<a href='./mostrar.php?id=alu' class='btn btn-info btn-lg active' role='button' aria-pressed='true'>Alumnes</a>";
                    echo "<a href='./mostrar.php?id=prof' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Professors</a>";
                    echo '<br>';
                    echo '<br>';
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>1r Cognom</th>';
                    echo '<th>2n Cognom</th>';
                    echo '<th>Nom</th>';
                    echo '<th>Telefon</th>';
                    echo '<th>Email</th>';
                    echo '<th>DNI</th>';
                    echo '<th>Borrar</th>';
                    echo '<th>Modificar</th>';
                    echo '</tr>';

                    foreach ($listadodept as $alumno) {
                        echo '<tr>';                    
                        echo "<td>{$alumno['id_alumne']}</td>";
                        echo "<td>{$alumno['cognom1_alu']}</td>";
                        echo "<td>{$alumno['cognom2_alu']}</td>";
                        echo "<td>{$alumno['nom_alu']}</td>";
                        echo "<td>{$alumno['telf_alu']}</td>";
                        echo "<td>{$alumno['email_alu']}</td>";
                        echo "<td>{$alumno['dni_alu']}</td>";
                
                        ?>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <td><button class="btn btn-danger" onClick="aviso('./borrar.php?id=<?php echo $alumno['id']; ?>');" ><img class="imagen-edit-borr" src="../img/trash.svg" alt=""></button></td>
                        <td><button class="btn btn-info" onClick="aviso('./modificar.php?id=<?php echo $alumno['id']; ?>');" ><img class="imagen-edit-borr" src="../img/editar.png" alt=""></button></td>
                
                        </tr>
                        
                        <?php
                    }
                        echo '</table>';
                }
                if(isset($_GET['id'])&& ($_GET['id'])=="prof"){
                    $sql = "SELECT * FROM tbl_professor;";
                    $listadodept= mysqli_query($connection, $sql);
                    echo "<a href='./mostrar.php?id=alu' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Alumnes</a>";
                    echo "<a href='./mostrar.php?id=prof' class='btn btn-info btn-lg active' role='button' aria-pressed='true'>Professors</a>";
                    echo '<br>';
                    echo '<br>';
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>1r Cognom</th>';
                    echo '<th>2n Cognom</th>';
                    echo '<th>Nom</th>';
                    echo '<th>Telefon</th>';
                    echo '<th>Email</th>';
                    echo '<th>Departament</th>';
                    echo '<th>Borrar</th>';
                    echo '<th>Modificar</th>';
                    echo '</tr>';

                    foreach ($listadodept as $alumno) {
                        echo '<tr>';                    
                        echo "<td>{$alumno['id_professor']}</td>";
                        echo "<td>{$alumno['cognom1_prof']}</td>";
                        echo "<td>{$alumno['cognom2_prof']}</td>";
                        echo "<td>{$alumno['nom_prof']}</td>";
                        echo "<td>{$alumno['telf']}</td>";
                        echo "<td>{$alumno['email_prof']}</td>";
                        echo "<td>{$alumno['dept']}</td>";
                
                        ?>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <td><button class="btn btn-danger" onClick="aviso('./borrar.php?id=<?php echo $alumno['id']; ?>');" ><img class="imagen-edit-borr" src="../img/trash.svg" alt=""></button></td>
                        <td><button class="btn btn-info" onClick="aviso('./modificar.php?id=<?php echo $alumno['id']; ?>');" ><img class="imagen-edit-borr" src="../img/editar.png" alt=""></button></td>
                
                        </tr>
                        
                        <?php
                    }
                        echo '</table>';
                }

                ?>

        </div>
   

    </div>
    
</body>
</html>
