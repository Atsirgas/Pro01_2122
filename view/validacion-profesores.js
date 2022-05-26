var validaFormulario = function() {
    var validacion = true;
    var forms = document.querySelectorAll('.needs-validation')

    // Nombre
    validaNombre = document.getElementById("validacionNombre").value;
    if (validaNombre == null || validaNombre.length == 0 || /^\s+$/.test(validaNombre)) {
        alert('[ERROR] "Nom" deu omplir-se obligatoriament');
        validacion = false;
    }

    // Apellidos
    validaApellido01 = document.getElementById("validacionApellido01").value;
    if (validaApellido01 == null || validaApellido01.length == 0 || /^\s+$/.test(validaApellido01)) {
        alert('[ERROR] "1r Cognom" deu omplir-se obligatoriament');
        validacion = false;
    }
    validaApellido02 = document.getElementById("validacionApellido02").value;
    if (validaApellido02 == null || validaApellido02.length == 0 || /^\s+$/.test(validaApellido02)) {
        alert('[ERROR] "2n Cognom" deu omplir-se obligatoriament');
        validacion = false;
    }

    // Email
    validaCorreo = document.getElementById("validacionEmail").value;
    if (validaCorreo == null || validaCorreo.length == 0 || !(/\S+@\S+\.\S+/.test(validaCorreo))) {
        alert('[ERROR] "Email" deu omplir-se amb el format correcte');
        validacion = false
    }

    // Teléfono
    validaTel = document.getElementById("validacionTel").value;
    if (validaTel == null || validaTel.length == 0 || /^\s+$/.test(validaTel)) {
        alert('[ERROR] "Teléfono" deu ser emplenat')
        validacion = false
    } else if (!(/^\d{5}$/.test(validaTel))) {
        alert('[ERROR] "Telèfon" deu omplir-se amb el format correcte')
        validacion = false;
    }

    // Curso
    validaCurso = document.getElementById('select').value;
    if (validaCurso == "") {
        alert('[ERROR] Deu escollir-se un grau');
        validacion = false;
    }

    if (!validacion) {
        return false;
    }
}