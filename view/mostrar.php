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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                    ?>
                    <nav class="navbar navbar-expand-lg navbar-dark ">
                        <div class="container-fluid">
                            <div class="padding-right">
                                <img class="navbar-band imagen-logo" id="myImg" src="../img/JPG.png" alt="Logo" > 
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
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarScroll">
                                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-dark btn-lg navbar-dark active" href="./mostrar.php?id=alu">Alumnes</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn btn-primary btn-lg active" 
                                            href="./mostrar.php?id=prof">Professors</a>
                                    </li>
                                </ul>
                                <div class="d-flex">
                                <a onClick="aviso3();" class=' btn btn-danger btn-lg form-control ms-1' role='button' aria-pressed='true'>Logout</a>
                                   
                                </div>
                            </div>
                        </div>
                    </nav>
                    
                    <?php
                    /* echo "<a href='./mostrar.php?id=alu' class='btn navbar-dark btn-info btn-lg active' role='button' aria-pressed='true'>Alumnes</a>";
                    echo "<a href='./mostrar.php?id=prof' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Professors</a>";
                    echo "<a href='./mostrar.php?id=alu' class=' btn btn-danger btn-lg active posicion-logout' role='button' aria-pressed='true'>Logout</a>"; */
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
                        <td><button class="btn btn-danger" onClick="aviso('./borrar.php?id=<?php echo $alumno['id_alumne'];?>' , '<?php echo $alumno['nom_alu'];?>');" ><img class="imagen-edit-borr" src="../img/trash.svg" alt=""></button></td>
                        <td><button class="btn btn-info" onClick="aviso2('./modificar.php?id=<?php echo $alumno['id_alumne'];?>' , '<?php echo $alumno['nom_alu'];?>');" ><img class="imagen-edit-borr" src="../img/editar.png" alt=""></button></td>
                
                        </tr>
                        
                        <?php
                    }
                        echo '</table>';
                }
                if(isset($_GET['id'])&& ($_GET['id'])=="prof"){
                    $sql = "SELECT * FROM tbl_professor;";
                    $listadodept= mysqli_query($connection, $sql);
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
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarScroll">
                                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-primary btn-lg navbar-dark active" href="./mostrar.php?id=alu">Alumnes</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn btn-dark btn-lg active" 
                                            href="./mostrar.php?id=prof">Professors</a>
                                    </li>
                                </ul>
                                <div class="d-flex">
                                <a onClick="aviso3();" class=' btn btn-danger btn-lg form-control ms-1' role='button' aria-pressed='true'>Logout</a>
                                   
                                </div>
                            </div>
                        </div>
                    </nav>
                    
                    <?php
                    /* echo "<a href='./mostrar.php?id=alu' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Alumnes</a>";
                    echo "<a href='./mostrar.php?id=prof' class='btn btn-info btn-lg active disabled' role='button' aria-pressed='true'>Professors</a>"; */
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

                    foreach ($listadodept as $professors) {
                        echo '<tr>';                    
                        echo "<td>{$professors['id_professor']}</td>";
                        echo "<td>{$professors['cognom1_prof']}</td>";
                        echo "<td>{$professors['cognom2_prof']}</td>";
                        echo "<td>{$professors['nom_prof']}</td>";
                        echo "<td>{$professors['telf']}</td>";
                        echo "<td>{$professors['email_prof']}</td>";
                        echo "<td>{$professors['dept']}</td>";
                
                        ?>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <td><button class="btn btn-danger" onClick="aviso('./borrar.php?id=<?php echo $professors['id_professor'];?>' , '<?php echo $professors['nom_prof'];?>');" ><img class="imagen-edit-borr" src="../img/trash.svg" alt=""></button></td>
                        <td><button class="btn btn-info" onClick="aviso2('./modificar.php?id=<?php echo $professors['id_professor'];?>' , '<?php echo $professors['nom_prof'];?>');" ><img class="imagen-edit-borr" src="../img/editar.png" alt=""></button></td>
                
                        </tr>
                        
                        <?php
                    }
                        echo '</table>';
                }

                ?>

        </div>
   

    </div>
    <script>

function aviso(url, nom) {
    Swal.fire({
        title: "¿Estas segur de que vols borrar l'usuari  " +nom+'?',
        imageUrl: '../img/trash.svg',
        imageWidth: 200,
        imageHeight: 200,
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d33',
        background: '#f39c12',
        confirmButtonText: 'Si',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
        })
}
function aviso2(url, nom) {
    Swal.fire({
        title: "¿Estas segur de que vols modificar l'usuari  " +nom+'?',
        imageUrl: '../img/editar.png',
        imageWidth: 200,
        imageHeight: 200,
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d33',
        background: '#f39c12',
        confirmButtonText: 'Si',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
        })
}
function aviso3() {
    Swal.fire({
        title: "Estas segur de que vols sortir, si dius que si hauras de tornar a iniciar sessió",
        imageUrl: '../img/warning.png',
        imageWidth: 200,
        imageHeight: 200,
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d33',
        background: '#f39c12',
        confirmButtonText: 'Si',
        cancelButtonText: 'Cancelar'
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
