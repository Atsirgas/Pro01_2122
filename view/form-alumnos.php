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
  <title>Formulario de Alumnos</title>
</head>
<body>
<div id="portada" class="padding-2">
  <div class="recuadro-alu">
    <h3 style="width: 50%;">Formulario de Alumnos</h3>
    <form action="./mostrar.php?id=alu" method="POST" enctype="multipart/form-data">
    <input type="submit" class="btn btn-primary" style="float: right;" value="Volver">
    </form>
    <!-- Formulario de Bootstrap -->
<form class="row g-3 needs-validation" novalidate action="./mostrar.php?id=alu" method="POST" enctype="multipart/form-data" onsubmit="return validaFormulario();">
  <div class="form-row">
    <!-- Nombre -->
    <div class="col-md-8 mb-3">
      <label for="validacionNombre">Nombre</label>
      <input type="text" class="form-control" id="validacionNombre" placeholder="Inserta tu nombre..." required>
    </div>
    <!-- Primer apellido -->
    <div class="col-md-8 mb-3">
      <label for="validacionApellido01">Primer apellido</label>
      <input type="text" class="form-control" id="validacionApellido01" placeholder="Inserte su apellido..." required>
    </div>
    <!-- Segundo apellido -->
    <div class="col-md-8 mb-3">
      <label for="validacionApellido02">Segundo apellido</label>
      <input type="text" class="form-control" id="validacionApellido02" placeholder="Inserte su segundo apellido..." required>
    </div>
    <!-- DNI -->
    <div class="col-md-8 mb-3">
    <label for="validacionDNI"> DNI </label>
        <input type="text" class="form-control" id="validacionDNI" placeholder="Inserte su DNI..." required>
    </div>
    <!-- Email -->
    <div class="col-md-8 mb-3">
            <label for="validacionEmail">Email</label>
            <input type="email" class="form-control" id="validacionEmail" placeholder="Inserte su Email...">
    </div>
    <!-- Teléfono -->
    <div class="col-md-8 mb-3">
            <label for="validacionTel">Teléfono</label>
            <input id="validacionTel" class="form-control" type="text" maxlength="5" placeholder="00000...">
    </div>
    <!-- Cursos -->
    <div class="form-group col-md-8 mb-3">
    <label>Clase</label><br>
    <select class="custom-select" id="select">
        <option selected value="">Elige una de las opciones</option>
        <option value="1">AF1 (1o de Administración y Finanzas)</option>
        <option value="2">AF2 (2o de Administración y Finanzas)</option>
        <option value="3">AI1 (1o de Cursos Auxiliares de Enfermeria)</option>
        <option value="4">AI2 (2o de Cursos Auxiliares de Enfermeria)</option>
        <option value="5">ASIX1/DAW1 (1o de Administración de Sistemas Informáticos y Redes / 1o de Desarrollo de Aplicaciones Web)</option>
        <option value="6">ASIX2 (2o de Administración de Sistemas Informáticos y Redes)</option>
        <option value="7">DAW2 (2o de Desarrollo de Aplicaciones Web)</option>
        <option value="8">EAS1 (1o de Enseñanza y Animación Sociodeportiva)</option>
        <option value="9">EAS2 (2o de Enseñanza y Animación Sociodeportiva)</option>
        <option value="10">EF1 (1o de Eduación Infantil)</option>
        <option value="11">EF2 (2o de Eduación Infantil)</option>
        <option value="12">GA1 (1o de Gestión Administrativa)</option>
        <option value="13">GA2 (2o de Gestión Administrativa)</option>
        <option value="14">HBD1 (1o de Higiene Bucodental)</option>
        <option value="15">HBD2 (2o de Higiene Bucodental)</option>
        <option value="16">SMX1 (1r de Sistemas Microinformáticos y Redes)</option>
        <option value="17">SMX2 (2o de Sistemas Microinformáticos y Redes)</option>
        <option value="18">1o de Guía (Guía en el Medio Natural y Tiempo Libre)</option>
        <option value="19">2o de Guía (Guía en el Medio Natural y Tiempo Libre)</option>
    </select>
    <input type="submit" class="btn btn-primary" style="float: right;" value="Enviar">
    </div>
</form>
</div>
</div>
</body>
</html>