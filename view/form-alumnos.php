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
  <link rel="icon" type="image/x-icon" href="../img/JPG.png">
    
  <title>Formulario de Alumnos</title>
</head>
<body>
<div id="portada" class="padding-2">
  <div class="recuadro-alu" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="flex">
    <h3 style="width: 50%;"><b>Formulari d'Alumnes </b></h3>
    <form action="./mostrar.php?id=alu" method="POST" enctype="multipart/form-data">
    <input type="submit" class="btn btn-primary" style="float: right;" value="Tornar">
    </form>
  </div>  
    <!-- Formulario de Bootstrap -->
<form class="row g-3 needs-validation" novalidate action="./recibirAlumnos.php" method="POST" enctype="multipart/form-data" onsubmit="return validaFormulario();">
  <div class="form-row">
    <!-- Nombre -->
    <div class="col-md-10 mb-3">
      <label for="validacionNombre">Nom</label>
      <input type="text" name="nombre" class="form-control bg-transparent" style="color: white;" id="validacionNombre" placeholder="Inserti el seu nom..." required>
    </div>
    <!-- Primer apellido -->
    <div class="col-md-10 mb-3">
      <label for="validacionApellido01">Primer cognom</label>
      <input type="text" name="apellido01" class="form-control bg-transparent" style="color: white;" id="validacionApellido01" placeholder="Inserti el seu cognom..." required>
    </div>
    <!-- Segundo apellido -->
    <div class="col-md-10 mb-3">
      <label for="validacionApellido02">Segon cognom</label>
      <input type="text" name="apellido02" class="form-control bg-transparent" style="color: white;" id="validacionApellido02" placeholder="Inserti el seu segon cognom..." required>
    </div>
    <!-- DNI -->
    <div class="col-md-10 mb-3">
    <label for="validacionDNI"> DNI </label>
        <input type="text" name="dni" class="form-control bg-transparent" style="color: white;" id="validacionDNI" placeholder="Inserti el seu DNI..." required>
    </div>
    <!-- Email -->
    <div class="col-md-10 mb-2">
            <label for="validacionEmail">Email</label>
            <input type="email" name="email" class="form-control bg-transparent" style="color: white;" id="validacionEmail" placeholder="Inserti el seu Email...">
            <small style="color: white;">El seu Email no es pot repetir amb cap altre registrat amb antelació.</small>
    </div>
    <!-- Teléfono -->
    <div class="col-md-10 mb-3">
            <label for="validacionTel">Telèfon</label>
            <input id="validacionTel" name="telefono" class="form-control bg-transparent" style="color: white;" type="text" maxlength="9" placeholder="000000000...">
    </div>
    <!-- Cursos -->
    <div class="form-group col-md-8 mb-3">
    <label>Clase</label><br>
    <select name="clase" class="custom-select bg-transparent" id="select">
        <option selected value="">Tria una de les opcions...</option>
        <option value="23">AF1 (1r d'Administració i Finances)</option>
        <option value="24">AF2 (2n d'Administració i Finances)</option>
        <option value="25">AI1 (1r de Cursos Auxiliars d'Infermeria)</option>
        <option value="26">AI2 (2n de Cursos Auxiliars d'Infermeria)</option>
        <option value="20">ASIX1/DAW1 (1r d'Administració de Sistemes Informàtics i Xarxes / 1r de Desenvolupament d'Aplicacions Web)</option>
        <option value="21">ASIX2 (2n d'Administració de Sistemes Informàtics i Xarxes)</option>
        <option value="22">DAW2 (2n de Desenvolupament d'Aplicacions Web)</option>
        <option value="27">EAS1 (1r d'Ensenyament i Animació Sociodeportiva)</option>
        <option value="28">EAS2 (2n d'Ensenyament i Animació Sociodeportiva)</option>
        <option value="29">EF1 (1r d'Eduació Infantil)</option>
        <option value="30">EF2 (2n d'Eduació Infantil)</option>
        <option value="31">GA1 (1r de Gestió Administrativa)</option>
        <option value="32">GA2 (2n de Gestió Administrativa)</option>
        <option value="33">HBD1 (1r de Higiene Bucodental)</option>
        <option value="34">HBD2 (2n de Higiene Bucodental)</option>
        <option value="35">SMX1 (1r de Sistemes Microinformàtics i Xarxes)</option>
        <option value="36">SMX2 (2n de Sistemes Microinformàtics i Xarxes)</option>
        <option value="37">1r de Guía (Guía en el Medi Natural i Temps Lliure)</option>
        <option value="38">2n de Guía (Guía en el Medi Natural i Temps Lliure)</option>
    </select>
    <input type="submit" class="btn btn-primary" style="float: left; margin-top: 3%;" value="Enviar">
    </div>
</form>
</div>
</div>
</body>
</html>