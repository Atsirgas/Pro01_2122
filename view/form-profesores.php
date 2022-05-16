<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Formulario Profesores</title>
</head>
<body>
    <!-- Formulario de Bootstrap -->
<form class="needs-validation" novalidate>
  <div class="form-row">

    <!-- Nombre -->
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Nombre</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Inserta tu nombre..." required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>

    <!-- Primer apellido -->
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Primer apellido</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Inserte su apellido..." required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>

    <!-- Segundo apellido -->
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Segundo apellido</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Inserte su segundo apellido..." required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>

    <!-- Email -->
    <div class="col-md-4 mb-3">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Inserte su Email...">
    </div>

    <!-- Teléfono -->
    <div class="col-md-4 mb-3">
            <label for="inputPhone">Teléfono</label>
            <input id="validationPhone" class="form-control" type="text" maxlength="5" placeholder="00000...">
    </div>

    <!-- Cursos -->
    <div class="form-group col-md-4 mb-3">
    <label for="inputGrado">Grado</label>
    <select class="custom-select">
        <option selected>Elige una de las opciones</option>
        <option value="1">AF (Administración y Finanzas)</option>
        <option value="2">AI (Cursos Auxiliares de Enfermeria)</option>
        <option value="3">ASIX1 (1o de Administración de Sistemas Informáticos y Redes)</option>
        <option value="4">ASIX2 (2o de Administración de Sistemas Informáticos y Redes)</option>
        <option value="5">DAW (Desarrollo de Aplicaciones Web)</option>
        <option value="6">EAS (Enseñanza y Animación Sociodeportiva)</option>
        <option value="7">EF (Eduación Infantil)</option>
        <option value="8">GA (Gestión Administrativa)</option>
        <option value="9">HBD (Higiene Bucodental)</option>
        <option value="10">SMX1 (1r de Sistemas Microinformáticos y Redes)</option>
        <option value="11">SMX2 (2o de Sistemas Microinformáticos y Redes)</option>
        <option value="12">Guía (Guía en el Medio Natural y Tiempo Libre)</option>
    </select>
    </div>

  <button class="btn btn-primary" type="submit">Enviar</button>
</form>
</body>
</html>