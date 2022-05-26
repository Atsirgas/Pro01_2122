<?php
session_start();
if(!isset($_SESSION["email_usu"])){
    header("Location:../index.php");
}
if(!isset($_REQUEST['id']) OR (($_REQUEST['id'])!="alu" AND ($_REQUEST['id'])!="prof")){
    header("Location:./mostrar.php?id=alu");
}

include '../conexion.php';
/* $departamento="SELECT dept FROM tbl_admin WHERE email_admin={$_SESSION['email_usu']};";
$dept=mysqli_query($connection, $departamento); */
/* print_r($dept); */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../img/JPG.png">
    <link rel="stylesheet" href="../css/styles.css">
    <title>JPG</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <div id="portada" class="padding-3">
        <div class="recuadro" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <?php
                /* echo $_SESSION["email_usu"]; */
                
                $cantPorPagina = 5;
                

                

                if (empty($_GET["pag"])) {
                    $inicioPagina = 0;
                }
                else {
                    $inicioPagina = ($_GET["pag"]-1)*$cantPorPagina;
                }
                if(!isset($_POST['btn-search'])){
                    $sql11 = "SELECT p.* , pt.nom_classe
                    FROM tbl_alumne p 
                    INNER JOIN tbl_classe pt 
                    ON p.classe=pt.id_classe;";
                    $querypaga2 = mysqli_query($connection, $sql11);
                    $numFilas = mysqli_num_rows($querypaga2);
                    /* echo $numFilas; */
                    $cantidadPaginas = ceil($numFilas/$cantPorPagina);

                    $sqla = "SELECT p.* , pt.nom_classe
                    FROM tbl_alumne p 
                    INNER JOIN tbl_classe pt 
                    ON p.classe=pt.id_classe LIMIT $inicioPagina, $cantPorPagina;";
                    $querypaga2 = mysqli_query($connection, $sqla);

                    
                }
                if(!isset($_POST['btn-search2'])){
                    $sql10 = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf, pt.nom_dept
                    FROM tbl_professor p 
                    INNER JOIN tbl_dept pt 
                    ON p.dept=pt.id_dept;";
                    $querypagp = mysqli_query($connection, $sql10);
                    $numFilas2 = mysqli_num_rows($querypagp);
                    /* echo $numFilas2; */
                    $cantidadPaginas2 = ceil($numFilas2/$cantPorPagina);

                    $sqlp = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf, pt.nom_dept
                    FROM tbl_professor p 
                    INNER JOIN tbl_dept pt 
                    ON p.dept=pt.id_dept LIMIT $inicioPagina, $cantPorPagina;";
                    
                    $querypagp = mysqli_query($connection, $sqlp);
                    /* $numFilas2 = mysqli_num_rows($querypagp); */
                    /* echo $numFilas2; */
                    /* $cantidadPaginas2 = ceil($numFilas2/$cantPorPagina); */
                }

                
                
                if(isset($_GET['id'])&& ($_GET['id'])=="alu"){
                    /* $sql = "SELECT * FROM tbl_alumne;";
                    $listadodept= mysqli_query($connection, $sql); */
                    ?>
                    <nav class="navbar navbar-expand-lg navbar-dark ">
                        <div class="container-fluid">
                            <div class="padding-right">
                                <img class="imagen-logo" id="myImg" src="../img/JPG.png" alt="Logo" > 
                            </div>
                           

                                <!-- The Modal -->
                                <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                                </div>

                                <script>
                                // Get the modal
                                var modal = document.getElementById("myModal");

                                // Get the image and insert it inside the modal - use its "alt" text as a caption
                                var img = document.getElementById("myImg");
                                var modalImg = document.getElementById("img01");
                                var captionText = document.getElementById("caption");
                                img.onclick = function(){
                                modal.style.display = "block";
                                modalImg.src = this.src;
                                captionText.innerHTML = this.alt;
                                }

                                // Get the <span> element that closes the modal
                                var span = document.getElementsByClassName("close")[0];

                                // When the user clicks on <span> (x), close the modal
                                span.onclick = function() { 
                                modal.style.display = "none";
                                }
                                </script>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon" onclick="muestra(); return false;"></span>
                            </button>
                            <script>
                                function muestra() {
                                    var mostrar = document.getElementById("adicional");
                                    if (mostrar.className == "visible") {
                                        mostrar.className = "oculto";
                                        
                                    }else if (mostrar.className == "oculto") {
                                        mostrar.className = "visible";
                                        
                                    }
                                    

                                }
                            </script>

                            <div class="collapse navbar-collapse" id="navbarScroll">
                                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-dark btn-lg navbar-dark active"  href="./mostrar.php?id=alu">Alumnes</a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link btn btn-primary btn-lg active" 
                                            href="./mostrar.php?id=prof">Professors</a>
                                    </li>
                                    <?php
                    if($_SESSION['tipo']=="Administrador"){
                    ?>
                                    <li class="nav-item plus">
                                        <a class="nav-link btn btn-success btn-lg active" 
                                            href="./form-alumnos.php"><i class="fa-solid fa-plus"></i></a>
                                    </li>
                                    <li class="nav-item plus">
                                        <a class="nav-link btn btn-warning btn-lg active" 
                                            href="./crearCSV.php?id=alu"><i class="fa-solid fa-file-export"></i></a>
                                    </li>
                                    
                                    <li class="nav-item plus">
                                        <a class="file-select nav-link btn btn-warning btn-lg active"  onclick="document.getElementById('id01').style.display='block'">Importar</a>

                                        <div id="id01" class="modal2">
                                        <span onclick="document.getElementById('id01').style.display='none'" class="close2" title="Close Modal">×</span>
                                        <form class="modal-content2 flex" action="/insertCSV-alu?id=alu.php">
                                            <div class="container">
                                            <div class="drag-drop">
                                                    <input type="file" multiple="multiple" id="photo" />
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                                                        <i class="fa fa-circle fa-stack-1x top medium"></i>
                                                        <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
                                                    </span>
                                                    <span class="desc">Pulse aquí para añadir archivos</span>
                                                </div>
                                                <br>
                                                <br>
                                            <div class="clearfix">
                                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn btn btn-lg">Cancel·lar</button>
                                                <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn btn btn-lg">Importar</button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                        </li>

                                        <script>
                                        // Get the modal
                                        var modal2 = document.getElementById('id01');

                                        // When the user clicks anywhere outside of the modal, close it
                                        window.onclick = function(event) {
                                        if (event.target == modal2) {
                                            modal.style.display = "none";
                                        }
                                        }
                                        </script>
                    <?php
                    }
                    ?>                      
                                        
                                    
                                    <form action="mostrar.php?id=alu&busqueda=busqueda&pag=1" method="post" enctype="multipart/form-data">
                                <li class="nav-item">
                                <div class="box posicion-search">
                                    <div class="container-4"> 
                                                <div >
                                                    <input type="search" name="search" id="search" placeholder="Search..." />
                                                    
                                                    <button name="btn-search" onClick="placeholder();" type="submit" class="icon"><i class="fa fa-search"></i></button>
                                             
                                    </div>
                                                    
                                                
                                            </div>
                                        </div>
                                        </form>
                                    </li>
<!--                                     <li class="nav-item">
                                    <div >
                                        <select class="btn-lg btn-select" id="select">
                                            <option selected value="cognom1_alu">1r Cognom</option>
                                            <option value="cognom2_alu">2n Cognom</option>
                                            <option value="nom_alu">Nom</option>
                                            <option value="telf_alu">Telefon</option>
                                            <option value="email_alu">Email</option>
                                            <option value="dni_alu">DNI</option>
                                            <option value="nom_classe">Classe</option>
                                        </select>
                                    </div>
                                    </li> -->
                                    <?php
                                    if(isset($_POST['btn-search']) && ($_GET['busqueda'])=="busqueda"){
                                        $search=$_POST['search'];
                                        /* echo "<script>window.location.href='./mostrar.php?id=alu&search=$search'</script>"; */
                                        /* if($_GET['busqueda']=="busqueda"){ */
                                        $sql20 = "SELECT p.* , pt.nom_classe
                                        FROM tbl_alumne p 
                                        INNER JOIN tbl_classe pt 
                                        ON p.classe=pt.id_classe WHERE `cognom1_alu` LIKE '%$search%' OR `cognom2_alu` LIKE '%$search%' OR `nom_alu` LIKE '%$search%' OR `telf_alu` LIKE '%$search%' OR `email_alu` LIKE '%$search%' OR `dni_alu` LIKE '%$search%' OR `nom_classe` LIKE '%$search%';";

                                        $querypaga2 = mysqli_query($connection, $sql20);
                                        $numFilas1 = mysqli_num_rows($querypaga2);
                                        /* echo $numFilas2; */
                                        $cantidadPaginas3 = ceil($numFilas1/$cantPorPagina);
                                            
                                        /* echo "<script>'placeholder($numFilas2);'</script>"; */
                                        
                                        ?>
                                        
                                        <!-- <script>
                                            function placeholder(registros){
                                                $('#search').attr('placeholder','Some New Text');
                                                console.log(registros);
                                                document.getElementsByName('search')[0].placeholder='gg';
                                            }
                                        </script> -->
                                        <?php

                                        $sql21 = "SELECT p.* , pt.nom_classe
                                        FROM tbl_alumne p 
                                        INNER JOIN tbl_classe pt 
                                        ON p.classe=pt.id_classe WHERE `cognom1_alu` LIKE '%$search%' OR `cognom2_alu` LIKE '%$search%' OR `nom_alu` LIKE '%$search%' OR `telf_alu` LIKE '%$search%' OR `email_alu` LIKE '%$search%' OR `dni_alu` LIKE '%$search%' OR `nom_classe` LIKE '%$search%' LIMIT $inicioPagina, $cantPorPagina;";
                                        $querypaga2 = mysqli_query($connection, $sql21);
                                        /* } */
                                    }
                                        
                                    ?>
                                
                                <li class="nav-item padding-right3">
                                <div class="d-flex">
                                    <a onClick="aviso3();" class=' btn btn-danger btn-lg form-control ms-1' role='button' aria-pressed='true'>Logout</a>
                                   
                                </div>
                                </li>
                                <li id="loged" class="nav-item padding-right3">
                                    <p>Loged by: <?php echo $_SESSION["email_usu"];?></p>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div id="adicional" class="visible">
                    <?php
                    /* echo "<a href='./mostrar.php?id=alu' class='btn navbar-dark btn-info btn-lg active' role='button' aria-pressed='true'>Alumnes</a>";
                    echo "<a href='./mostrar.php?id=prof' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Professors</a>";
                    echo "<a href='./mostrar.php?id=alu' class=' btn btn-danger btn-lg active posicion-logout' role='button' aria-pressed='true'>Logout</a>"; */
                     if(isset($_POST['btn-search'])){
                        if ($numFilas1 == 0) {
                            ?><p style="margin-left: 50%; margin-top: -1%; color:red;"><?php echo "S'ha/n trobat $numFilas1 registre/s";?></p><?php 
                        } else {
                       ?><p style="margin-left: 50%; margin-top: -1%;"><?php echo "S'ha/n trobat $numFilas1 registre/s";?></p><?php
                        } 
                    }else{
                        ?><p style="margin-left: 50%; margin-top: -1%;"><?php echo "Hi ha/n $numFilas registre/s";?></p><?php
                    }
                    
                    echo '<br>';
                    echo '<table class="table-hover">';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>1r Cognom</th>';
                    echo '<th>2n Cognom</th>';
                    echo '<th>Nom</th>';
                    echo '<th>Telèfon</th>';
                    echo '<th>Email</th>';
                    echo '<th>DNI</th>';
                    echo '<th style="width:100%;">Classe</th>';
                    if($_SESSION['tipo']=="Administrador"){
                    echo '<th>Borrar</th>';
                    echo '<th>Modificar</th>';
                    echo '<th>Correu</th>';
                    }
                    echo '</tr>';
                    
                    foreach ($querypaga2 as $alumno) {
                        echo '<tr>';                    
                        echo "<td>{$alumno['id_alumne']}</td>";
                        echo "<td>{$alumno['cognom1_alu']}</td>";
                        echo "<td>{$alumno['cognom2_alu']}</td>";
                        echo "<td>{$alumno['nom_alu']}</td>";
                        echo "<td>{$alumno['telf_alu']}</td>";
                        echo "<td>{$alumno['email_alu']}</td>";
                        echo "<td>{$alumno['dni_alu']}</td>";
                        echo "<td>{$alumno['nom_classe']}</td>";
                
                        if($_SESSION['tipo']=="Administrador"){

                        
                        ?>
                        
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <td><button class="btn btn-danger" onClick="aviso('./borrar.php?id=alu&id_alu=<?php echo $alumno['id_alumne'];?>' , '<?php echo $alumno['nom_alu'];?>');" ><img class="imagen-edit-borr" src="../img/trash.svg" alt=""></button></td>
                        <td><button class="btn btn-info" onClick="aviso2('./modificar.php?id=alu&clase=<?php echo $alumno['nom_classe'];?>&id_alu=<?php echo $alumno['id_alumne'];?>' , '<?php echo $alumno['nom_alu'];?>');" ><img class="imagen-edit-borr" src="../img/editar.png" alt=""></button></td>
                        <td><button class="btn btn-warning" onClick="avisocorreo('./enviarcorreo-alu.php?id=alu&id_alu=<?php echo $alumno['id_alumne'];?>' , '<?php echo $alumno['nom_alu'];?>');" ><img class="imagen-edit-borr" src="../img/email.svg" alt=""></button></td>
                        </tr>
                        <?php
                        }
                    }
                        echo '</table>';
                        echo '<br>';
                        
                        if(isset($_POST['btn-search']) && ($_GET['busqueda'])=="busqueda"){
                            for($j=1;$j<=$cantidadPaginas3;$j++) {
                                echo "<span  class='padding-right2'><a class='btn btn-info' href='mostrar.php?id=alu&busqueda=busqueda&pag=$j'>$j</a></span>";
                            }
                            
                        }else{
                            for($i=1;$i<=$cantidadPaginas;$i++) {
                                echo "<span  class='padding-right2'><a class='btn btn-info' href='mostrar.php?id=alu&pag=$i'>$i</a></span>";
                            }
                            /* echo "hola"; */
                        }
                        ?>
                        </div>
                        <?php
                }
                if(isset($_GET['id'])&& ($_GET['id'])=="prof"){
                   /*  $sql = "SELECT p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf,  pt.nom_dept
                    FROM tbl_professor p 
                    LEFT JOIN tbl_dept pt 
                    ON p.dept=pt.id_dept;";
                    $listadodept= mysqli_query($connection, $sql); */
                    ?>
                    <nav class="navbar navbar-expand-lg navbar-dark ">
                        <div class="container-fluid">
                            <!-- <img src="../img/JPG.png" alt=""> -->
                            <div class="padding-right">
                                <img class="imagen-logo" id="myImg" src="../img/JPG.png" alt="Logo" >
                            </div>
                            

                                <!-- The Modal -->
                                <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                                </div>

                                <script>
                                // Get the modal
                                var modal = document.getElementById("myModal");

                                // Get the image and insert it inside the modal - use its "alt" text as a caption
                                var img = document.getElementById("myImg");
                                var modalImg = document.getElementById("img01");
                                var captionText = document.getElementById("caption");
                                img.onclick = function(){
                                modal.style.display = "block";
                                modalImg.src = this.src;
                                captionText.innerHTML = this.alt;
                                }

                                // Get the <span> element that closes the modal
                                var span = document.getElementsByClassName("close")[0];

                                // When the user clicks on <span> (x), close the modal
                                span.onclick = function() { 
                                modal.style.display = "none";
                                }
                                </script>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon" onclick="muestra2(); return false;"></span>
                            </button>
                            <script>
                                function muestra2() {
                                    var mostrar = document.getElementById("adicional2");
                                    if (mostrar.className == "visible") {
                                        mostrar.className = "oculto";
                                        
                                    }else if (mostrar.className == "oculto") {
                                        mostrar.className = "visible";
                                        
                                    }
                                    

                                }
                            </script>
                            <div class="collapse navbar-collapse" id="navbarScroll">
                                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-primary btn-lg navbar-dark active" href="./mostrar.php?id=alu">Alumnes</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn btn-dark btn-lg active" 
                                            href="./mostrar.php?id=prof">Professors</a>
                                    </li>
                    <?php
                    if($_SESSION['tipo']=="Administrador"){
                    ?>
                                    <li class="nav-item plus">
                                        <a class="nav-link btn btn-success btn-lg active" 
                                            href="./form-profesores.php"><i class="fa-solid fa-plus"></i></a>
                                    </li>
                                    <li class="nav-item plus">
                                        <a class="nav-link btn btn-warning btn-lg active" 
                                            href="./crearCSV.php?id=prof"><i class="fa-solid fa-file-export"></i></a>
                                    </li>
                                    <li class="nav-item plus">
                                        <a class="file-select nav-link btn btn-warning btn-lg active" onclick="document.getElementById('id01').style.display='block'">Importar</a>

                                        <div id="id01" class="modal2">
                                        <span onclick="document.getElementById('id01').style.display='none'" class="close2" title="Close Modal"></span>
                                        <form class="modal-content2 flex" action="./insertCSV-prof.php?id=prof" method="post" enctype="multipart/form-data">
                                            <div class="container">
                                            <div class="drag-drop">
                                                    <input type="file"  name="fichero" />
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                                                        <i class="fa fa-circle fa-stack-1x top medium"></i>
                                                        <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
                                                    </span>
                                                    <span class="desc">Premi aquí per afegir arxius</span>
                                                </div>
                                                <br>
                                                <br>
                                            <div class="clearfix">
                                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn btn btn-lg">Cancel·lar</button>
                                                <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn btn btn-lg">Importar</button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                        </li>

                                        <script>
                                        // Get the modal
                                        var modal2 = document.getElementById('id01');

                                        // When the user clicks anywhere outside of the modal, close it
                                        window.onclick = function(event) {
                                        if (event.target == modal2) {
                                            modal.style.display = "none";
                                        }
                                        }
                                        </script>
                                        
                                        
                        <?php
                    }
                    ?>
                                    <form action="mostrar.php?id=prof" method="post" enctype="multipart/form-data">
                                <li class="nav-item">
                                <div class="box posicion-search">
                                    <div class="container-4"> 
                                                <div >
                                                    <input class="nav-link2" type="search" name="search2" id="search" placeholder="Search..." />
                                                    
                                                    <button name="btn-search2" type="submit" class="icon"><i class="fa fa-search"></i></button>
                                             
                                    </div>
                                                    
                                                
                                            </div>
                                        </div>
                                        </form>
                                </li>
                                    <!-- <li class="nav-item">
                                    <div >
                                        <select class="btn-lg btn-select" id="select">
                                            <option selected value="cognom1_alu">1r Cognom</option>
                                            <option value="cognom2_alu">2n Cognom</option>
                                            <option value="nom_alu">Nom</option>
                                            <option value="telf_alu">Telefon</option>
                                            <option value="email_alu">Email</option>
                                            <option value="dni_alu">DNI</option>
                                            <option value="nom_classe">Classe</option>
                                        </select>
                                    </div>
                                    </li> -->
                                    <?php
                                    if(isset($_POST['btn-search2'])){
                                        $search=$_POST['search2'];
                                        $sql20 = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf,  pt.nom_dept
                                        FROM tbl_professor p 
                                        INNER JOIN tbl_dept pt 
                                        ON p.dept=pt.id_dept WHERE `cognom1_prof` LIKE '%$search%' OR `cognom2_prof` LIKE '%$search%' OR `nom_prof` LIKE '%$search%' OR `telf` LIKE '%$search%' OR `email_prof` LIKE '%$search%' OR `nom_dept` LIKE '%$search%';";
                                        $querypagp = mysqli_query($connection, $sql20);
                                        /* echo $search; */
                                        /* $row = mysqli_fetch_array($search);
                                        print_r($row); */
                                        /* $idusuario2 = $row[0]; */
                                        /* header('Location:mostrar.php?id=alu&search=1'); */
                                        $numFilas3 = mysqli_num_rows($querypagp);
                                        echo '</br>';
                                        echo '</br>';
                                        
                                        /* echo $numFilas3; */
                                        /* echo $numFilas2; */
                                        $cantidadPaginas2 = ceil($numFilas3/$cantPorPagina);
                                        
                                        $sql20 = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf,  pt.nom_dept
                                        FROM tbl_professor p 
                                        INNER JOIN tbl_dept pt 
                                        ON p.dept=pt.id_dept WHERE `cognom1_prof` LIKE '%$search%' OR `cognom2_prof` LIKE '%$search%' OR `nom_prof` LIKE '%$search%' OR `telf` LIKE '%$search%' OR `email_prof` LIKE '%$search%' OR `nom_dept` LIKE '%$search%' LIMIT $inicioPagina, $cantPorPagina;";
                                        $querypagp = mysqli_query($connection, $sql20);
                                    }
                                        
                                    ?>
                                    <li class="nav-item padding-right3">
                                <div class="d-flex">
                                    <a onClick="aviso3();" class=' btn btn-danger btn-lg form-control ms-1' role='button' aria-pressed='true'>Logout</a>
                                   
                                </div>
                                </li>
                                <li id="loged" class="nav-item padding-right3">
                                    <p>Loged by: <?php echo $_SESSION["email_usu"];?></p>
                                </li>
                                </ul>
                                
                            </div>
                        </div>
                    </nav>
                    <div id="adicional2" class="visible">
                    <?php
                    /* echo "<a href='./mostrar.php?id=alu' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Alumnes</a>";
                    echo "<a href='./mostrar.php?id=prof' class='btn btn-info btn-lg active disabled' role='button' aria-pressed='true'>Professors</a>"; */
                    
                    if(isset($_POST['btn-search2'])){
                        if ($numFilas3 == 0) {
                            ?><p style="margin-left: 50%; margin-top: -1%; color:red;"><?php echo "S'ha/n trobat $numFilas3 registre/s";?></p><?php 
                        } else {
                       ?><p style="margin-left: 50%; margin-top: -1%;"><?php echo "S'ha/n trobat $numFilas3 registre/s";?></p><?php
                        } 
                    }else{
                        ?><p style="margin-left: 50%; margin-top: -1%;"><?php echo "Hi ha/n $numFilas2 registre/s";?></p><?php
                    }
                    
                    /* echo '<br>'; */
                    echo '<br>';
                    echo '<table class="table-hover">';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>1r Cognom</th>';
                    echo '<th>2n Cognom</th>';
                    echo '<th>Nom</th>';
                    echo '<th>Telèfon</th>';
                    echo '<th>Email</th>';
                    echo '<th>Departament</th>';
                    if($_SESSION['tipo']=="Administrador"){
                    echo '<th>Borrar</th>';
                    echo '<th>Modificar</th>';
                    echo '<th>Correu</th>';
                    }
                    echo '</tr>';

                    foreach ($querypagp as $professors) {
                        echo '<tr>';                    
                        echo "<td>{$professors['id_professor']}</td>";
                        echo "<td>{$professors['cognom1_prof']}</td>";
                        echo "<td>{$professors['cognom2_prof']}</td>";
                        echo "<td>{$professors['nom_prof']}</td>";
                        echo "<td>{$professors['telf']}</td>";
                        echo "<td>{$professors['email_prof']}</td>";
                        echo "<td>{$professors['nom_dept']}</td>";

                        if($_SESSION['tipo']=="Administrador"){
                        ?>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <td><button class="btn btn-danger" onClick="aviso('./borrar.php?id=prof&id_prof=<?php echo $professors['id_professor'];?>' , '<?php echo $professors['nom_prof'];?>');" ><img class="imagen-edit-borr" src="../img/trash.svg" alt=""></button></td>
                        <td><button class="btn btn-info" onClick="aviso2('./modificar.php?id=prof&id_dept=<?php echo $professors['nom_dept'];?>&id_prof=<?php echo $professors['id_professor'];?>' , '<?php echo $professors['nom_prof'];?>');" ><img class="imagen-edit-borr" src="../img/editar.png" alt=""></button></td>
                        <td><button class="btn btn-warning" onClick="avisocorreo('./enviarcorreo-profes.php?id=prof&id_prof=<?php echo $professors['id_professor'];?>' , '<?php echo $professors['nom_prof'];?>');" ><img class="imagen-edit-borr" src="../img/email.svg" alt=""></button></td>
                        </tr>
                        
                        <?php
                        }
                    }
                        echo '</table>';
                        echo '<br>';
                        /* echo $cantidadPaginas2; */
                        for($i=1;$i<=$cantidadPaginas2;$i++) {
                            echo "<span class='padding-right2'><a class='btn btn-info' href='mostrar.php?id=prof&pag=$i'>$i </a></span>";
                        }
                        ?>
                        </div>
                        <?php
                }

                ?>

        </div>
   

    </div>
    <script>

function aviso(url, nom) {
    Swal.fire({
        title: "Estàs segur de que vols esborrar a l'usuari  " +nom+'?',
        imageUrl: '../img/trash.svg',
        imageWidth: 200,
        imageHeight: 200,
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d33',
        background: '#f39c12',
        confirmButtonText: 'Esborrar',
        cancelButtonText: 'Millor no'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
        })
}
function avisocorreo(url, nom) {
    Swal.fire({
        title: "Vols enviar un correu a  " +nom+'?',
        imageUrl: '../img/email.svg',
        imageWidth: 200,
        imageHeight: 200,
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d33',
        background: '#f39c12',
        confirmButtonText: 'Enviar',
        cancelButtonText: 'Millor ho penso'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
        })
}
function aviso2(url, nom) {
    Swal.fire({
        title: "Estàs segur de que vols modificar a l'usuari  " +nom+'?',
        imageUrl: '../img/editar.png',
        imageWidth: 200,
        imageHeight: 200,
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d33',
        background: '#f39c12',
        confirmButtonText: 'Modificar',
        cancelButtonText: 'Cancel·lar'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
        })
}
function aviso3() {
    Swal.fire({
        title: "Estàs segur de que vols sortir? Si dius que sí, hauràs de tornar a iniciar sessió.",
        imageUrl: '../img/warning.png',
        imageWidth: 200,
        imageHeight: 200,
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d33',
        background: '#f39c12',
        confirmButtonText: 'Sí, sortir',
        cancelButtonText: 'No estic segur'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = './logout.php';
        }
        })
        
}
/* aviso3('../index.php'); */

</script>
</body>
</html>
