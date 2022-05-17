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

    // DNI
    validaDNI = document.getElementById("validacionDNI").value;
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

    validaDNI = document.getElementById("validacionDNI").value;
    if (validaDNI == null || validaDNI.length == 0 || /^\s+$/.test(validaDNI)) {
        alert('[ERROR] "DNI" debe ser rellenado')
        validacion = false
    } else if (!(/^\d{8}[A-Z]$/.test(validaDNI))) {
        alert('[ERROR] "DNI" debe ser rellenado correctamente');
        validacion = false;
    } else if (validaDNI.charAt(8) != letras[(validaDNI.substring(0, 8)) % 23]) {
        alert('[ERROR] "DNI" es inválido');
        validacion = false;
    }

    // Email
    validaCorreo = document.getElementById("validacionEmail").value;
    if (validaCorreo == null || validaCorreo.length == 0 || /^\s+$/.test(validaCorreo)) {
        alert('[ERROR] "Email" debe rellenarse');
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

    if (!validacion) {
        return false;
    }
}