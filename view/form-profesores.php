<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../css/styles.css">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Validación por JavaScript   -->
  <script type="text/javascript" src="validacion-profesores.js"></script>
  <title>Formulario Profesores</title>
</head>
<body>
<div id="portada" class="padding-2">
  <div class="recuadro-alu">
    <div class="flex">
      <h3 style="margin-right: 20%;">Formulario de Profesores</h3>
      <form action="./mostrar.php?id=prof" method="POST" enctype="multipart/form-data">
      <input type="submit" class="btn btn-primary" style="float: right;" value="Volver">
      </form>
    </div>
    <!-- Formulario de Bootstrap -->
<form class="row g-3 needs-validation" novalidate action="./recibirProfesores.php" method="POST" enctype="multipart/form-data" onsubmit="return validaFormulario();">
  <div class="form-row">
    <!-- Nombre -->
    <div class="col-md-8 mb-3">
      <label for="validacionNombre">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="validacionNombre" placeholder="Inserta tu nombre..." required>
    </div>
    <!-- Primer apellido -->
    <div class="col-md-8 mb-3">
      <label for="validacionApellido01">Primer apellido</label>
      <input type="text" name="1apellido" class="form-control" id="validacionApellido01" placeholder="Inserte su apellido..." required>
    </div>
    <!-- Segundo apellido -->
    <div class="col-md-8 mb-3">
      <label for="validacionApellido02">Segundo apellido</label>
      <input type="text" name="2apellido" class="form-control" id="validacionApellido02" placeholder="Inserte su segundo apellido..." required>
    </div>
    <!-- Email -->
    <div class="col-md-8 mb-3">
            <label for="validacionEmail">Email</label>
            <input type="email" name="email" class="form-control" id="validacionEmail" value="" placeholder="Inserte su Email..." required>
    </div>
    <!-- Teléfono -->
    <div class="col-md-8 mb-3">
            <label for="validacionTel">Teléfono</label>
            <input id="validacionTel" name="telf" class="form-control" type="text" maxlength="5" placeholder="00000...">
    </div>
    <!-- Cursos -->
    <div class="form-group col-md-8 mb-3">
    <label>Grado</label><br>
    <select name="grado" class=" btn-default btn-lg" id="select">
      <option selected value="" required>Elige una de las opciones</option>
          <option value="1">Informatica</option>
          <option value="2">Administració i finances</option>
          <option value="3">Esports</option>
          <option value="5">Educació</option>
          <option value="6">Sanitari</option>
    </select>
    <br>
    <br>
    <input name="button" type="submit" class="btn btn-primary" value="Enviar">
    </div>
</form>
</div>
</div>
</body>
</html>