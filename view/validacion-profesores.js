var validaFormulario = function() {
    var validacion = true;
    var forms = document.querySelectorAll('.needs-validation')

    // Nombre
    validaNombre = document.getElementById("validacionNombre").value;
    if (validaNombre == null || validaNombre.length == 0 || /^\s+$/.test(validaNombre)) {
        alert('[ERROR] "Nombre" debe rellenarse obligatoriamente');
        validacion = false;
    }

    // Apellidos
    validaApellido01 = document.getElementById("validacionApellido01").value;
    if (validaApellido01 == null || validaApellido01.length == 0 || /^\s+$/.test(validaApellido01)) {
        alert('[ERROR] "1r Apellido" debe rellenarse obligatoriamente');
        validacion = false;
    }
    validaApellido02 = document.getElementById("validacionApellido02").value;
    if (validaApellido02 == null || validaApellido02.length == 0 || /^\s+$/.test(validaApellido02)) {
        alert('[ERROR] "2o Apellido" debe rellenarse obligatoriamente');
        validacion = false;
    }

    // Email
    validaCorreo = document.getElementById("validacionEmail").value;
    if (validaCorreo == null || validaCorreo.length == 0 || !(/\S+@\S+\.\S+/.test(validaCorreo))) {
        alert('[ERROR] "Email" debe rellenarse con el formato correcto');
        validacion = false
    }

    // Teléfono
    validaTel = document.getElementById("validacionTel").value;
    if (validaTel == null || validaTel.length == 0 || /^\s+$/.test(validaTel)) {
        alert('[ERROR] "Teléfono" debe ser rellenado')
        validacion = false
    } else if (!(/^\d{5}$/.test(validaTel))) {
        alert('[ERROR] "Teléfono" debe ser rellenado con el formato correcto')
        validacion = false;
    }

    // Curso
    validaCurso = document.getElementById('select').value;
    if (validaCurso == "") {
        alert('[ERROR] Debe escoger un grado');
        validacion = false;
    }

    if (!validacion) {
        return false;
    }
}