var validaFormulario = function() {
    var validacion = true;

    // Nombre
    validaNombre = document.getElementById("element_1_1").value;
    if (validaNombre == null || validaNombre.length == 0 || /^\s+$/.test(validaNombre)) {
        alert('[ERROR] "Nombre" debe rellenarse obligatoriamente');
        validacion = false;
    }
}