// Generar dinámicamente opciones de asientos
const selectAsiento = document.getElementById("asiento");

// Crear opciones de 1 a 30
for (let i = 1; i <= 30; i++) {
    const option = document.createElement("option");
    option.value = i;
    option.textContent = i;
    selectAsiento.appendChild(option);
}
function mostrarCamposAdicionales() {
    const metodoPago = document.getElementById("metodoPago").value;
    const camposAdicionales = document.getElementById("camposAdicionales");
    const numeroCuentaLabel = document.getElementById("numeroCuentaLabel");

    // Mostrar campos adicionales y cambiar solo el label según el método de pago
    if (["bancolombia", "davivienda", "bbva", "bancoagrario", "nequi"].includes(metodoPago)) {
        camposAdicionales.style.display = "block";
        
        // Cambiar el label según el método de pago seleccionado
        switch (metodoPago) {
            case "bancolombia":
                numeroCuentaLabel.textContent = "Cuenta / Bancolombia:";
                break;
            case "davivienda":
                numeroCuentaLabel.textContent = "Cuenta / Davivienda:";
                break;
            case "bbva":
                numeroCuentaLabel.textContent = "Cuenta / BBVA:";
                break;
            case "bancoagrario":
                numeroCuentaLabel.textContent = "Cuenta / Banco Agrario:";
                break;
            case "nequi":
                numeroCuentaLabel.textContent = "Celular / Nequi:";
                break;
        }
    } else {
        // Ocultar campos adicionales si no es cuenta bancaria o Nequi
        camposAdicionales.style.display = "none";
        numeroCuentaLabel.textContent = "Cuenta:";
    }
}
function validarFormulario() {
    // Verifica si todos los campos obligatorios han sido completados
    var camposObligatorios = document.querySelectorAll('input[required], select[required]');
    var mensaje = document.getElementById('mensajeAdvertencia');

    // Verifica si algún campo obligatorio no ha sido llenado
    for (var i = 0; i < camposObligatorios.length; i++) {
        if (!camposObligatorios[i].value) {
            mensaje.style.display = 'block';  // Muestra el mensaje de advertencia
            return false;  // Detiene el envío del formulario
        }
    }

    // Si todos los campos obligatorios están completos, permite el envío
    mensaje.style.display = 'none';
    return true;
}

function mostrarCamposAdicionales() {
    var metodoPago = document.getElementById("metodoPago").value;
    var camposAdicionales = document.getElementById("camposAdicionales");
    if (metodoPago === "bancolombia" || metodoPago === "davivienda" || metodoPago === "bbva" || metodoPago === "bancoagrario" || metodoPago === "nequi") {
        camposAdicionales.style.display = "block";
    } else {
        camposAdicionales.style.display = "none";
    }
}