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

    // DNI
    validaDNI = document.getElementById("validacionDNI").value;
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

    validaDNI = document.getElementById("validacionDNI").value;
    if (validaDNI == null || validaDNI.length == 0 || /^\s+$/.test(validaDNI)) {
        alert('[ERROR] "DNI" deu omplir-se')
        validacion = false
    } else if (!(/^\d{8}[A-Z]$/.test(validaDNI))) {
        alert('[ERROR] "DNI" deu ser rellenat correctament');
        validacion = false;
    } else if (validaDNI.charAt(8) != letras[(validaDNI.substring(0, 8)) % 23]) {
        alert('[ERROR] "DNI" és invàlid');
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
        alert('[ERROR] "Telèfon" deu ser rellenat')
        validacion = false
    } else if (!(/^\d{9}$/.test(validaTel))) {
        alert('[ERROR] "Telèfon" deu omplir-se amb el format correcte')
        validacion = false;
    }

    // Curso
    validaCurso = document.getElementById('select').value;
    if (validaCurso == "") {
        alert('[ERROR] Deu escollir un curs');
        validacion = false;
    }

    if (!validacion) {
        return false;
    }
}