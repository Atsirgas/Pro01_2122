<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Modificar Usuario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="../css/styles.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Validación por JavaScript -->
  <script type="text/javascript" src="validacion-alumnos.js"></script> 
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <?php
        include '../conexion.php';

        if (isset($_GET['id'])=="prof") {
            $id = $_GET['id'];
                // Profesores
            if($id=="prof"){
                $sql = "SELECT p.id_professor, p.nom_prof, p.cognom1_prof, p.cognom2_prof, p.email_prof, p.telf,  pt.nom_dept
                FROM tbl_professor p 
                LEFT JOIN tbl_dept pt 
                ON p.dept=pt.id_dept WHERE id_professor={$_GET['id_prof']}";
                $result = mysqli_query($connection, $sql);
                $professors = mysqli_fetch_array($result, MYSQLI_ASSOC);
                ?>
                <!-- PORTADA -->
                <div id="portada" class="padding-2">
                <div class="recuadro-alu">
                    <div class="flex">
                    <h3 style="width: 50%;"><b>Modificar Professor</b></h3>
                    <form action="./mostrar.php?id=prof" method="POST" enctype="multipart/form-data">
                    <input type="submit" class="btn btn-primary" style="float: right;" value="Tornar">
                    </form>
                </div>



            <form class="row g-3 needs-validation" novalidate action="./update-prof.php" method="post" enctype="multipart/form-data" onsubmit="return validaFormulario();">
            <div class="form-row">
            <!-- ID -->
            <input type="hidden" name="id" value="<?php echo $_GET['id_prof']; ?>">
            <!-- Nombre -->
            <div class="col-md-8 mb-3">
            <label for="validacionNombre">Nom</label>
            <input type="text" name="nombre" class="form-control" id="validacionNombre" placeholder="Inserti el seu nom..." value="<?php echo $professors['nom_prof']?>" required>
            </div>
            <!-- Primer apellido -->
            <div class="col-md-8 mb-3">
            <label for="validacionApellido01">Primer Cognom</label>
            <input type="text" name="1apellido" class="form-control" id="validacionApellido01" placeholder="Inserti el seu primer cognom..." value="<?php echo $professors['cognom1_prof']?>" required>
            </div>
            <!-- Segundo apellido -->
            <div class="col-md-8 mb-3">
                <label for="validacionApellido02">Segon Cognom</label>
                <input type="text" name="2apellido" class="form-control" id="validacionApellido02" placeholder="Inserti el seu segon cognom..." value="<?php echo $professors['cognom2_prof']?>" required>
            </div>
            <!-- Email -->
            <div class="col-md-8 mb-3">
                <label for="validacionEmail">Email</label>
                <input type="email" name="email" class="form-control" id="validacionEmail" placeholder="Inserti el seu Email..." value="<?php echo $professors['email_prof']?>" required>
            </div>
            <!-- Teléfono -->
            <div class="col-md-8 mb-3">
                <label for="validacionTel">Telèfon</label>
                <input id="validacionTel" name="telf" class="form-control" type="text" maxlength="5" value="<?php echo $professors['telf']?>" placeholder="00000...">
            </div>
            <!-- Cursos -->
            <div class="form-group col-md-8 mb-3">
            <label>Grau</label><br>
            <select name="grado" class=" btn-default btn-lg" id="select">
            <?php
            $valor = $_REQUEST['id_dept'];
            if ($valor == "Informatica") {
                ?>
                <option selected="selected" value="1">Informàtica</option>
                <option value="2">Administració i finances</option>
                <option value="3">Esports</option>
                <option value="5">Educació</option>
                <option value="6">Sanitari</option>
                <?php
            } elseif ($valor == "Administracio i finances") {
                ?>
                <option value="1">Informàtica</option>
                <option selected="selected" value="2">Administració i finances</option>
                <option value="3">Esports</option>
                <option value="5">Educació</option>
                <option value="6">Sanitari</option>
                <?php
            } elseif ($valor == "Esports") {
                ?>
                <option value="1">Informàtica</option>
                <option value="2">Administració i finances</option>
                <option selected="selected" value="3">Esports</option>
                <option value="5">Educació</option>
                <option value="6">Sanitari</option>
                <?php
            } elseif ($valor == "Educacio") {
                ?>
                <option value="1">Informàtica</option>
                <option value="2">Administració i finances</option>
                <option value="3">Esports</option>
                <option selected="selected" value="5">Educació</option>
                <option value="6">Sanitari</option>
                <?php
            } elseif ($valor == "Sanitari") {
                ?>
                <option value="1">Informàtica</option>
                <option value="2">Administracio i finances</option>
                <option value="3">Esports</option>
                <option value="5">Educació</option>
                <option selected="selected" value="6">Sanitari</option>
                <?php
            }
            ?>
            </select>
            <input type="submit" class="btn btn-primary" value="Enviar">
            </div>
            </form>
    <?php
                // Alumnos
            }  else {
                $select = "SELECT p.* , pt.nom_classe
                FROM tbl_alumne p 
                INNER JOIN tbl_classe pt 
                ON p.classe=pt.id_classe WHERE id_alumne={$_GET['id_alu']}";
                $result = mysqli_query($connection, $select);
                $alumne= mysqli_fetch_array($result, MYSQLI_ASSOC);
                ?>

                <!-- PORTADA -->
                <div id="portada" class="padding-2">
                <div class="recuadro-alu">
                    <div class="flex">
                    <h3 style="width: 50%;"><b>Modificar Alumne</b></h3>
                    <form action="./mostrar.php?id=alu" method="POST" enctype="multipart/form-data">
                    <input type="submit" class="btn btn-primary" style="float: right;" value="Tornar">
                    </form>
                </div>  

                <form class="row g-3 needs-validation" novalidate action="./update-alu.php" method="POST" enctype="multipart/form-data" onsubmit="return validaFormulario();">
                    <div class="form-row">
                        <!-- ID -->
                    <input type="hidden" name="id" value="<?php echo $_GET['id_alu']; ?>">
                        <!-- Nombre -->
                        <div class="col-md-8 mb-3">
                        <label for="validacionNombre">Nom</label>
                        <input type="text" name="nombre" class="form-control" id="validacionNombre" placeholder="Inserti el seu nom..." value="<?php echo $alumne['nom_alu']?>" required>
                        </div>
                        <!-- Primer apellido -->
                        <div class="col-md-8 mb-3">
                        <label for="validacionApellido01">Primer Cognomp</label>
                        <input type="text" name="apellido01" class="form-control" id="validacionApellido01" placeholder="Inserieel  esuprimer cognomo..." value="<?php echo $alumne['cognom1_alu']?>" required>
                        </div>
                        <!-- Segundo apellido -->
                        <div class="col-md-8 mb-3">
                        <label for="validacionApellido02">Sedn Cognomo</label>
                        <input type="text" name="apellido02" class="form-control" id="validacionApellido02" placeholder="Inserieelu su segonocognomo..." value="<?php echo $alumne['cognom2_alu']?>" required>
                        </div>
                        <!-- DNI -->
                        <div class="col-md-8 mb-3">
                        <label for="validacionDNI"> DNI </label>
                            <input type="text" name="dni" class="form-control" id="validacionDNI" placeholder="Inserieel seuu DNI..." value="<?php echo $alumne['dni_alu']?>" required>
                        </div>
                        <!-- Email -->
                        <div class="col-md-8 mb-3">
                                <label for="validacionEmail">Email</label>
                                <input type="email" name="email" class="form-control" id="validacionEmail" placeholder="Inserieel seuu Email..." value="<?php echo $alumne['email_alu']?>">
                        </div>
                        <!-- Teléfono -->
                        <div class="col-md-8 mb-3">
                                <label for="validacionTel">Teèéfoo</label>
                                <input id="validacionTel" name="telefono" class="form-control" type="text" maxlength="9" placeholder="00000..." value="<?php echo $alumne['telf_alu']?>">
                        </div>
                        <!-- Cursos -->
                        <div class="form-group col-md-8 mb-3">
                        <label>Clsase</label><br>
                        <select name="clase" class="custom-select" id="select">
                       <?php
                       $value = $_REQUEST['clase'];
                       if ($value == "AF1") {
                        ?>
                            <option selected="selected" value="23">AF1 (ro ' Administraciniy Finaceas)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                        <?php
                       } elseif ($value == "AF2") {
                        ?>                              
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option selected="selected" value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                        <?php
                        } elseif ($value == "AI1") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
  
                            <option selected="selected" value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>                          <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "AI2") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option selected="selected" value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "ASIX1/DAW1") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option selected="selected" value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "ASIX2") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option selected="selected" value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "DAW2") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option selected="selected" value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "EAS1") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option selected="selected" value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "EAS2") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option selected="selected" value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "EF1") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option selected="selected" value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "EF2") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option selected="selected" value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "GA1") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option selected="selected" value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "GA2") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option selected="selected" value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "HBD1") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option selected="selected" value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "HBD2") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option selected="selected" value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "SMX1") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option selected="selected" value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "SMX2") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option selected="selected" value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "GUIA1") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option selected="selected" value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        } elseif ($value == "GUIA2") {
                            ?>
                            <option value="23">AF1 1r d'Administració i Financess)</option>
                            <option value="24">AF2 2n d'Administració i Financess)</option>
                            <option value="25">AI1 1r de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="26">AI2 2n de Cursos Auxiliars d'Infermeriaa)</option>
                            <option value="20">ASIX1/DAW1 1r d'Administració de Sistemes Informàtics y Xarxes / 1r de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="21">ASIX2 2n d'Administració de Sistemes Informàtics y Xarxess)</option>
                            <option value="22">DAW2 2n de Desenvolupament d'Aplicacions Webb)</option>
                            <option value="27">EAS1 1r d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="28">EAS2 2n d'Ensenyament i Animació Sociodeportivaa)</option>
                            <option value="29">EF1 1r d'Eduació Infantill)</option>
                            <option value="30">EF2 2n d'Eduació Infantill)</option>
                            <option value="31">GA1 1r de Gestió Administrativaa)</option>
                            <option value="32">GA2 2n de Gestió Administrativaa)</option>
                            <option value="33">HBD1 1r de Higiene Bucodentall)</option>
                            <option value="34">HBD2 2n de Higiene Bucodentall)</option>
                            <option value="35">SMX1 1r de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="36">SMX2 2n de Sistemes Microinformàtics i Xarxess)</option>
                            <option value="37"1r de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <option selected="selected" value="38"2n de Guía (Guía en el Medi Natural i Temps Lliure))</option>
                            <?php
                        }
                       ?>
                        </select>
                        <input type="submit" class="btn btn-primary" style="float: right;" value="Enviar">
                    </div>
                </form>
               <?php
            }
        } else {

        }
    ?>

