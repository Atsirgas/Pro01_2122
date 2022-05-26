var validaFormulario = function() {
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var validacion = true;
    if (email.value == null || email.value.length == 0 || /^\s+$/.test(email.value)) {
        alert('[ERROR] "Email" debe rellenarse');
        validacion = false;
    } else if (email.value == null || email.value.length == 0 || !(/\S+@\S+\.\S+/.test(email.value))) {
        alert('[ERROR] "Email" debe rellenarse con el formato correcto');
        validacion = false
    }

    if (password.value === null || password.value === '') {
        alert('[ERROR] "Contraseña" debe rellenarse');
        validacion = false;
    }
    var tipo = document.getElementsByName("tipo");
    var val = false;
    for (var i = 0; i < tipo.length; i++) {
        if ((tipo[i].checked)) {
            val = true;
            break;
        }
    }
    if (!val) {
        alert('[ERROR] Debe elegirse Profesor o Administrador');
        return false;
    }
    if (!validacion) {
        return false;
    }


}